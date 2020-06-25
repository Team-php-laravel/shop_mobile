<?php

namespace App\Http\Controllers\Admin;

use App\loai_sp;
use App\san_pham;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class ProductController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if ($request->hasFile('hinh_anh')) {
            $image = Str::random() . '.' . $request->hinh_anh->getClientOriginalExtension();
            $request->hinh_anh->move("uploads/product/", $image);
        }
        $data = collect($request->all())->merge([
            'hinh_anh' => $request->hasFile('hinh_anh') ? $image : null
        ])->toArray();
        san_pham::create($data);

        return redirect('admin/product/' . $request->loai_id)->with("message", "Thêm thành công !");
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
        $cat = loai_sp::with('san_pham')->find($id);
        return view('admin.product.index', compact('cat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sanpham = san_pham::find($id);
        return view('admin.product.update', compact('sanpham'));
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
        $sanpham = san_pham::findOrFail($id);
        if ($request->hasFile('hinh_anh')) {
            $image = Str::random() . '.' . $request->hinh_anh->getClientOriginalExtension();
            $request->hinh_anh->move("uploads/product/", $image);
            $data = collect($request->all())->merge([
                'hinh_anh' => $request->hasFile('hinh_anh') ? $image : null,
            ])->toArray();
        } else {
            $data = collect($request->all())->merge([
                'hinh_anh' => $sanpham->hinh_anh,
            ])->toArray();
        }

        $sanpham->update($data);

        return redirect('admin/product/' . $sanpham->loai_id)->with("message", "Cập nhật thành công !");
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
        $sp = san_pham::findOrFail($id);
        try {
            $sp->delete();
            return redirect('admin/product/' . $sp->loai_id)->with("message", "Xóa thành công !");
        } catch (\Exception $e) {
            return redirect('admin/product/' . $sp->loai_id)->with("error", "Sản phẩm đang có dữ liệu liên quan !", 500);
        }
    }
}
