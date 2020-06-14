<?php

namespace App\Http\Controllers\Admin;

use App\khach_hang;
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
        $store = nhap_kho::with('khach_hang', 'san_pham')->get();
        return view('admin.store.index', compact('store'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kh = khach_hang::where('loai_kh', 0)->get();
        $sp = san_pham::where('trang_thai', 1)->get();
        return view('admin.store.create', compact('kh', 'sp'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sp = san_pham::find($request->san_pham_id);
        $sp->update(['so_luong' => $sp->so_luong + $request->sl_nhap]);
        nhap_kho::create($request->all());
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
        $kh = khach_hang::where('loai_kh', 0)->get();
        $sp = san_pham::where('trang_thai', 1)->get();
        $store = nhap_kho::find($id);
        return view('admin.store.update', compact('store', 'kh', 'sp'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $store = nhap_kho::find($id);
        $sp = san_pham::find($request->san_pham_id);
        if ($sp->so_luong - $store->sl_nhap + $request->sl_nhap < 0) {
            return redirect('admin/store')->with("error", "Thất bại, sản phẩm trong kho không đủ!");
        }
        $sp->update(['so_luong' => $sp->so_luong - $store->sl_nhap + $request->sl_nhap]);
        $store->update($request->all());
        return redirect('admin/store')->with("message", "Cập nhật loại sản phẩm thành công !");
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
            $store = nhap_kho::find($id);
            $sp = san_pham::find($store->san_pham_id);
            if ($sp->so_luong - $store->sl_nhap < 0) {
                return redirect('admin/store')->with("error", "Sản phẩm đã bán không thể xóa!");
            }
            $sp->update(['so_luong' => $sp->so_luong - $store->sl_nhap]);
            $store->delete();
            return redirect('admin/store')->with("message", "Xóa thành công!");
        } catch (\Exception $e) {
            return redirect('admin/store')->with("error", "Sản phẩm đã bán không thể xóa!");
        }
    }
}
