<?php

namespace App\Http\Controllers\Admin;

use App\ncc;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NccController extends Controller
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
        $ncc = ncc::all();
        return view('admin.ncc.index', compact('ncc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ncc.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ncc::create($request->all());
        return redirect('admin/ncc/')->with("message", "Thêm thành công !");
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
        $ncc = ncc::find($id);
        return view('admin.ncc.update', compact('ncc'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ncc = ncc::find($id);
        return view('admin.ncc.update', compact('ncc'));
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
        ncc::find($id)->update($request->all());
        return redirect('admin/ncc/' . $request->loai_kh)->with("message", "Cập nhật thành công !");
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
        $kh = ncc::find($id);
        try {
            $kh->delete();
            return redirect('admin/ncc/' . $kh->loai_kh)->with("message", "Xóa thành công!");
        } catch (\Exception $e) {
            return redirect('admin/ncc/' . $kh->loai_kh)->with("error", "Thất bại, khách hàng đang có đơn đặt hàng!");
        }
    }
}
