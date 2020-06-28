<?php

namespace App\Http\Controllers\Admin;

use App\tin_tuc;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NewController extends Controller
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
        $news = tin_tuc::with('user')->get();
        return view('admin.tin_tuc.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tin_tuc.create');
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
            'user_id' => Auth::user()->id
        ])->toArray();
        tin_tuc::create($data);
        return redirect('admin/news')->with("message", "Thêm thành công !");
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
        $news = tin_tuc::with('user')->find($id);
        return view('admin.tin_tuc.update', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = tin_tuc::find($id);
        return view('admin.tin_tuc.update', compact('news'));
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
        tin_tuc::find($id)->update($request->all());
        return redirect('admin/news' . $request->loai_kh)->with("message", "Cập nhật thành công !");
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
        tin_tuc::find($id)->delete();
        return redirect('admin/news')->with("message", "Xóa thành công!");
    }
}
