<?php

namespace App\Http\Controllers\Admin;

use App\hoa_don;
use App\khach_hang;
use App\san_pham;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class orderController extends Controller
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
        $order = hoa_don::with('khach_hang', 'user', 'cthd')->get();

        return view('admin.order.index', compact('order'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kh = khach_hang::where('loai_kh', 1)->get();
        $sp = san_pham::where('trang_thai', 1)->where('so_luong', '>', 0)->get();
        return view('admin.order.create', compact('kh', 'sp'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = collect($request->all())->merge([
            'tong_tien' => san_pham::find($request->san_pham_id)->gia * $request->sl_mua,
            'create_by' => Auth::user()->id
        ])->toArray();
        $sp = san_pham::find($request->san_pham_id);
        $sp->update(['so_luong' => $sp->so_luong - $request->sl_mua]);
        hoa_don::create($data);
        return redirect('admin/order')->with("message", "Thêm thành công !");
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
        $kh = khach_hang::where('loai_kh', 1)->get();
        $sp = san_pham::where('trang_thai', 1)->where('so_luong', '>', 0)->get();
        $order = hoa_don::find($id);
        return view('admin.order.update', compact('order', 'kh', 'sp'));
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
        $hd = hoa_don::find($id);
        $sp = san_pham::find($request->san_pham_id);
        if ($sp->so_luong + $hd->sl_mua - $request->sl_mua < 0) {
            return redirect('admin/order')->with("error", "Thất bại, số lượng trong kho không đủ!");
        }
        $sp->update(['so_luong' => $sp->so_luong + $hd->sl_mua - $request->sl_mua]);
        $hd->update($request->all());
        return redirect('admin/order')->with("message", "Cập nhật thành công !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hd = hoa_don::find($id);
        try {
            $sp = san_pham::find($hd->san_pham_id);
            $sp->update(['so_luong' => $sp->so_luong + $hd->sl_mua]);
            $hd->delete();
            return redirect('admin/order')->with("message", "Xóa thành công!");
        } catch (\Exception $e) {
            return redirect('admin/order')->with("error", "Thất bại!");
        }
    }
}
