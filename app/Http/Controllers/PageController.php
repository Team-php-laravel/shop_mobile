<?php

namespace App\Http\Controllers;

use App\hoa_don;
use App\khach_hang;
use App\loai_sp;
use App\san_pham;
use App\tin_tuc;
use Illuminate\Http\Request;


class PageController extends Controller
{
    public function home()
    {
        $sp_new = san_pham::orderBy('created_at', 'desc')->get();
        return view('home', compact('sp_new'));
//        if (isset(\request()->search) || isset(\request()->cat)) {
//            $san_pham = san_pham::where('ten_sp', 'like', '%' . \request()->search . '%')->paginate(12);
//            if (isset(\request()->cat)) {
//                $san_pham = san_pham::where('ten_sp', 'like', '%' . \request()->search . '%')->where('loai_id', \request()->cat)->paginate(12);
//            }
//        } else {
//            $san_pham = san_pham::paginate(12);
//        }
//        $cat = loai_sp::all();
//        return view('home', compact('san_pham', 'cat'));
    }

    public function sale()
    {
        $sp_new = san_pham::orderBy('created_at', 'desc')->get();
        return view('sale', compact('sp_new'));
    }

    public function detail($id)
    {
        $sp = san_pham::find($id);
        return view('detail', compact('sp'));
    }

    public function cat($id)
    {
        $cat = loai_sp::find($id);
        if ($cat->loai_id == 0) {
            $sp = loai_sp::where('loai_id', $id)->get()->toArray();
            $ids = array_column($sp, 'id');
            $sp = sizeof($ids) <= 0 ? [] : san_pham::where('loai_id', $ids)->get();
        } else {
            $sp = san_pham::where('loai_id', $id)->get();
        }
        return view('cat', compact('sp', 'cat'));
    }

    public function news()
    {
        $news = tin_tuc::all();
        return view('news', compact('news'));
    }

    public function newDetail($id)
    {
        $new = tin_tuc::with('user')->find($id);
        return view('new-detail', compact('new'));
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
