<?php

namespace App\Http\Controllers\Admin;

use App\bao_hanh;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class BaoHanhController extends Controller
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

        $bh = bao_hanh::with('san_pham')->get();
        return view('admin.bh.index', compact('bh'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (isset(\request()->chil)) {
            $bh = bao_hanh::with('children')->where('loai_id', 0)->get();
            return view('admin.bh.create', compact('bh'));
        } else {
            return view('admin.bh.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        bao_hanh::create($request->all());
        if (isset(\request()->chil)) {
            return redirect('admin/bh?chil=' . $request->loai_id)->with("message", "Thêm loại sản phẩm thành công !");
        } else {
            return redirect('admin/bh')->with("message", "Thêm loại sản phẩm thành công !");
        }

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
        if (isset(\request()->chil)) {
            $listbh = bao_hanh::with('children')->where('loai_id', 0)->get();
            $bh = bao_hanh::findOrFail($id);
            return view('admin.bh.update', compact('bh', 'listbh'));
        } else {
            $bh = bao_hanh::findOrFail($id);
            return view('admin.bh.update', compact('bh'));
        }
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
        $bh = bao_hanh::find($id);
        $bh->update($request->all());
        if (isset(\request()->chil)) {
            return redirect('admin/bh?chil=' . $request->loai_id)->with("message", "Cập nhật loại sản phẩm thành công !");
        } else {
            return redirect('admin/bh')->with("message", "Cập nhật loại sản phẩm thành công !");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        bao_hanh::find($id)->delete();
        return redirect('admin/bh')->with("message", "Xóa thành công!");
    }
}
