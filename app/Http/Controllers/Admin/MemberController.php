<?php

namespace App\Http\Controllers\Admin;

use App\khach_hang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MemberController extends Controller
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
        $member = khach_hang::all();
        return view('admin.member.index', compact('member'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.member.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        khach_hang::create($request->all());
        return redirect('admin/member/' . $request->loai_kh)->with("message", "Thêm thành công !");
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
        $member = khach_hang::where('loai_kh', $id)->get();
        return view('admin.member.index', compact('member', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member = khach_hang::find($id);
        return view('admin.member.update', compact('member'));
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
        khach_hang::find($id)->update($request->all());
        return redirect('admin/member/' . $request->loai_kh)->with("message", "Cập nhật thành công !");
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
        $kh = khach_hang::find($id);
        try {
            $kh->delete();
            return redirect('admin/member/' . $kh->loai_kh)->with("message", "Xóa thành công!");
        } catch (\Exception $e) {
            return redirect('admin/member/' . $kh->loai_kh)->with("error", "Thất bại, khách hàng đang có đơn đặt hàng!");
        }
    }
}
