<?php

namespace App\Http\Controllers\Admin;

use App\loai_sp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class CatController extends Controller
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
        if (isset(\request()->chil)) {
            $cat = loai_sp::where('loai_id', \request()->chil)->get();
            $label = loai_sp::find(\request()->chil);
            return view('admin.cat.index', compact('cat', 'label'));
        } else {
            $cat = loai_sp::with('children')->where('loai_id', 0)->get();
            return view('admin.cat.index', compact('cat'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (isset(\request()->chil)) {
            $cat = loai_sp::with('children')->where('loai_id', 0)->get();
            return view('admin.cat.create', compact('cat'));
        } else {
            return view('admin.cat.create');
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
        loai_sp::create($request->all());
        if (isset(\request()->chil)) {
            return redirect('admin/cat?chil=' . $request->loai_id)->with("message", "Thêm loại sản phẩm thành công !");
        } else {
            return redirect('admin/cat')->with("message", "Thêm loại sản phẩm thành công !");
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
            $listcat = loai_sp::with('children')->where('loai_id', 0)->get();
            $cat = loai_sp::findOrFail($id);
            return view('admin.cat.update', compact('cat', 'listcat'));
        } else {
            $cat = loai_sp::findOrFail($id);
            return view('admin.cat.update', compact('cat'));
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
        $cat = loai_sp::find($id);
        $cat->update($request->all());
        if (isset(\request()->chil)) {
            return redirect('admin/cat?chil=' . $request->loai_id)->with("message", "Cập nhật loại sản phẩm thành công !");
        } else {
            return redirect('admin/cat')->with("message", "Cập nhật loại sản phẩm thành công !");
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
        //
        try {
            loai_sp::find($id)->delete();
            return redirect('admin/cat')->with("message", "Xóa loại sản phẩm thành công!");
        } catch (\Exception $e) {
            return redirect('admin/cat')->with("error", "Loại sản phẩm đang có sản phẩm!");
        }
    }
}
