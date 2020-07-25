<?php

namespace App\Http\Controllers\Admin;

use App\khach_hang;
use App\ncc;
use App\nhap_kho;
use App\san_pham;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class storeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $store = nhap_kho::with('ncc')->where('parent_id', 0)->get();
        return view('admin.store.index', compact('store'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kh = ncc::all();
        $san_pham = san_pham::all();
        return view('admin.store.create', compact('kh', 'san_pham'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nhap = nhap_kho::create(['ncc_id' => $request->ncc_id, 'ngay_nhap' => $request->ngay_nhap, 'gia' => $request->manny]);
        foreach ($request->san_pham as $val) {
            $sp = san_pham::find($val['id']);
            $sp->update(['so_luong' => $sp->so_luong + $val['sl_mua']]);
            nhap_kho::create(['sp_id' => $val['id'], 'so_luong' => $val['sl_mua'], 'gia' => $val['gia'], 'parent_id' => $nhap->id]);
        }
        return redirect('admin/store')->with("message", "Nhập sản phẩm thành công !");
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $kh = ncc::get();
        $san_pham = san_pham::get();
        $store = nhap_kho::find($id);
        return view('admin.store.update', compact('store', 'kh', 'san_pham'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $san_pham = nhap_kho::with('san_pham')->where('parent_id', $id)->get();
        return response()->json(['sp' => $san_pham]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        nhap_kho::find($id)->update(['ncc_id' => $request->ncc_id, 'gia' => $request->manny]);
        $del = nhap_kho::where('parent_id', $id);
        foreach ($del->get() as $val) {
            $san_pham = san_pham::findOrFail($val->sp_id);
            $san_pham->update(['so_luong' => ($san_pham->so_luong + $val->so_luong)]);
        }
        $del->delete();
        foreach ($request->san_pham as $val) {
            $sp = san_pham::find($val['id']);
            $sp->update(['so_luong' => $sp->so_luong - $val['sl_mua']]);
            nhap_kho::create(['sp_id' => $val['id'], 'so_luong' => $val['sl_mua'], 'gia' => $val['gia'], 'parent_id' => $id]);
        }
        return 1;

//        $store = nhap_kho::find($id);
//        $sp = san_pham::find($request->sp_id);
//        if ($sp->so_luong - $store->so_luong + $request->so_luong < 0) {
//            return redirect('admin/store')->with("error", "Thất bại, sản phẩm trong kho không đủ!");
//        }
//        $sp->update(['so_luong' => $sp->so_luong - $store->so_luong + $request->so_luong]);
//        $store->update($request->all());
//        return redirect('admin/store')->with("message", "Cập nhật loại sản phẩm thành công !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            nhap_kho::find($id)->delete();
            nhap_kho::where('parent_id', $id)->delete();
            return redirect('admin/store')->with("message", "Xóa thành công!");
        } catch (\Exception $e) {
            return redirect('admin/store')->with("error", "Sản phẩm đã bán không thể xóa!");
        }
    }
}
