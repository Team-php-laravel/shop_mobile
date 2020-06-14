<?php

namespace App\Http\Controllers;

use App\hoa_don;
use App\khach_hang;
use App\loai_sp;
use App\san_pham;
use Illuminate\Http\Request;


class PageController extends Controller
{
    public function home()
    {
        if (isset(\request()->search) || isset(\request()->cat)) {
            $san_pham = san_pham::where('ten_sp', 'like', '%' . \request()->search . '%')->paginate(12);
            if (isset(\request()->cat)) {
                $san_pham = san_pham::where('ten_sp', 'like', '%' . \request()->search . '%')->where('loai_id', \request()->cat)->paginate(12);
            }
        } else {
            $san_pham = san_pham::paginate(12);
        }
        $cat = loai_sp::all();
        return view('home', compact('san_pham', 'cat'));
    }

    public function detail($id)
    {
        $data = san_pham::find($id);
        $data->thong_so = explode(';', $data->thong_so);
        $cat = loai_sp::all();
        return view('detail', compact('data', 'cat'));
    }


    public function order(Request $request)
    {
        $kh = khach_hang::updateOrCreate(['ten_kh' => $request->ten_kh, 'email' => $request->email, 'dien_thoai' => $request->dien_thoai], ['dia_chi' => $request->dia_chi]);
        hoa_don::create([
            'khach_hang_id' => $kh->id,
            'san_pham_id' => $request->san_pham_id,
            'sl_mua' => $request->sl_mua,
            'tong_tien' => $request->sl_mua * san_pham::find($request->san_pham_id)->gia
        ]);
        return 1;
    }

}
