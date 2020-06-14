<?php

namespace App\Http\Controllers\Admin;

use App\Hotel;
use App\Http\Controllers\Controller;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $hotel = Hotel::all();
        return view('admin.hotel.index', compact('hotel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.hotel.create');
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
        try {
            if ($request->hasFile('image')) {
                $image = Str::random() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move("uploads/hotel/", $image);
            }
            $data = collect($request->all())->merge([
                'image' => $request->hasFile('image') ? $image : null,
                'user_id' => Auth::user()->id
            ])->toArray();
            Hotel::create($data);
            return redirect('/admin/hotel')->with('message', 'Thêm khách sạn thành công!');
        } catch (\Exception $e) {
            return response()->json(['error' => 'Có lỗi xảy ra, thử lại!'], 422);
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
        $hotel = Hotel::find($id);
        return view('admin.hotel.update', compact('hotel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Hotel::with('service')->find($id);
        $arr = [];
        foreach ($data->service as $key => $val) {
            $arr[$key] = $val;
        }
        $ids = array_column($arr, 'id');
        $all = Service::where('parent_id', 0)->get();
        $service = Service::with('children')->whereIn('id', $ids)->get();

        return view('admin.hotel.service', compact('data', 'service', 'ids', 'all'));
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
        try {
            $hotel = Hotel::find($id);
            if ($request->hasFile('image')) {
                $image = Str::random() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move("uploads/hotel/", $image);
            }
            $data = collect($request->all())->merge([
                'image' => $request->hasFile('image') ? $image : $hotel->image,
            ])->toArray();
            $hotel->update($data);
            return redirect('/admin/hotel')->with('message', 'Cập nhật thông tin khách sạn thành công!');
        } catch (\Exception $e) {
            return response()->json(['error' => 'Có lỗi xảy ra, thử lại!'], 422);
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
        Hotel::find($id)->service()->detach();
        Hotel::find($id)->delete();
        return redirect('/admin/hotel')->with('message', 'Xóa khách sạn thành công!');
    }

    public function service(Request $request, $id)
    {
        Hotel::find($id)->service()->sync($request->data);
        return 1;
    }
}
