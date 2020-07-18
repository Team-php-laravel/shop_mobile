<?php

namespace App\Http\Controllers\Admin;

use App\cthd;
use App\hoa_don;
use App\Http\Controllers\Controller;
use App\khach_hang;
use App\ncc;
use App\san_pham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $hoa_don = hoa_don::with('khach_hang', 'user')->where('type_id', 1)->get();
        return view('admin.export.index', compact('hoa_don'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $san_pham = san_pham::where('so_luong', '>', 0)->get();
        $hd = hoa_don::with('khach_hang')->where('type_id', 0)->get();
        return view('admin.export.create', compact('san_pham', 'hd'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $temp = substr($request->id_kh, 0, 2);
            $tg = 0;
            if ($temp == 'kh') {
                $tg = 1;
                $kh_id = substr($request->id_kh, 2);
            } else
                $ncc_id = substr($request->id_kh, 2);

            if ($tg == 1)
                $hd = hoa_don::create(['kh_id' => $kh_id, 'tong_gia' => $request->manny, 'user_id' => Auth::user()->id, 'type_id' => 1]);
            else
                $hd = hoa_don::create(['ncc_id' => $ncc_id, 'tong_gia' => $request->manny, 'user_id' => Auth::user()->id, 'type_id' => 1]);

            foreach ($request->san_pham as $val) {
                cthd::create(['hd_id' => $hd->id, 'sp_id' => $val['id'], 'so_luong' => $val['sl_mua'], 'don_gia' => $val['sl_mua'] * ($val['gia'] - $val['gia'] * $val['giam_gia'] / 100)]);
                $sp = san_pham::find($val['id']);
                $sp->update(['so_luong' => ($sp->so_luong - $val['sl_mua'])]);
            }
            return 1;
        } catch (\Exception $e) {
            return 0;
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
        $hoa_don = hoa_don::with('khach_hang', 'user')->find($id);
        $cthd = cthd::with('san_pham')->where('hd_id', $id)->get();
        return response()->json(['hoa_don' => $hoa_don, 'cthd' => $cthd]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $san_pham = san_pham::where('so_luong', '>', 0)->get();
        $khach_hang = khach_hang::all();
        $ncc = ncc::all();
        $hoa_don = hoa_don::findOrFail($id);
        return view('admin.export.update', compact('hoa_don', 'khach_hang', 'san_pham', 'ncc'));
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
        try {
            $cthd = cthd::where('hd_id', $id);
            if(isset($request->create)){
                $cthd->delete();

            }else{
                foreach ($cthd->get() as $val) {
                    $san_pham = san_pham::findOrFail($val->sp_id);
                    $san_pham->update(['so_luong' => ($san_pham->so_luong + $val->so_luong)]);
                }
                $cthd->delete();
            }

            if (isset($request->id_kh)) {
                $temp = substr($request->id_kh, 0, 2);
                $tg = 0;
                if ($temp == 'kh') {
                    $tg = 1;
                    $kh_id = substr($request->id_kh, 2);
                } else
                    $ncc_id = substr($request->id_kh, 2);

                if ($tg == 1)
                    hoa_don::findOrFail($id)->update(['kh_id' => $kh_id, 'tong_gia' => $request->manny, 'type_id' => 1]);
                else
                    hoa_don::findOrFail($id)->update(['kh_id' => $ncc_id, 'tong_gia' => $request->manny, 'type_id' => 1]);


                foreach ($request->san_pham as $val) {
                    cthd::create(['hd_id' => $id, 'sp_id' => $val['id'], 'so_luong' => $val['sl_mua'], 'don_gia' => $val['sl_mua'] * ($val['gia'] - $val['gia'] * $val['giam_gia'] / 100)]);
                    $sp = san_pham::find($val['id']);
                    $sp->update(['so_luong' => ($sp->so_luong - $val['sl_mua'])]);
                }
            } else {
                hoa_don::findOrFail($id)->update(['type_id' => 1]);
                foreach ($request->san_pham as $val) {
                    cthd::create(['hd_id' => $id, 'sp_id' => $val['id'], 'so_luong' => $val['sl_mua'], 'don_gia' => $val['sl_mua'] * ($val['gia'] - $val['gia'] * $val['giam_gia'] / 100)]);
                    $sp = san_pham::find($val['id']);
                    $sp->update(['so_luong' => ($sp->so_luong - $val['sl_mua'])]);
                }
            }

            return 1;
        } catch (\Exception $e) {
            return 0;
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
        $hd = hoa_don::find($id);
        if ($hd) {
            $cthd = cthd::where('hd_id', $id);
            foreach ($cthd->get() as $val) {
                $san_pham = san_pham::findOrFail($val->sp_id);
                $san_pham->update(['so_luong' => ($san_pham->so_luong + $val->so_luong)]);
            }
            $cthd->delete();
            $hd->delete();
            return redirect()->back()->with(['message' => "Xóa hóa đơn thành công!"]);
        } else
            return redirect()->back()->with(['error' => "Xóa hóa đơn không thành công!"]);
    }
}
