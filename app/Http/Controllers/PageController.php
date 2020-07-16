<?php

namespace App\Http\Controllers;

use App\cthd;
use App\hoa_don;
use App\khach_hang;
use App\loai_sp;
use App\san_pham;
use App\tin_tuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PageController extends Controller
{
    public function home()
    {
        if (isset(\request()->search)) {
            $sp_new = san_pham::where('ten_sp', 'like', '%' . \request()->search . '%')->where('trang_thai', 1)->orderBy('created_at', 'desc')->get();
        } else {
            $sp_new = san_pham::orderBy('created_at', 'desc')->where('trang_thai', 1)->get();
        }
        $news = tin_tuc::limit(5)->get();
        return view('home', compact('sp_new', 'news'));
    }

    public function sale()
    {
        $news = tin_tuc::limit(5)->get();
        $sp_new = san_pham::where('giam_gia', '>', '0')->where('trang_thai', 1)->orderBy('created_at', 'desc')->get();
        return view('sale', compact('sp_new', 'news'));
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
            $sp = sizeof($ids) <= 0 ? [] : san_pham::where('loai_id', $ids)->where('trang_thai', 1)->get();
        } else {
            $sp = san_pham::where('loai_id', $id)->where('trang_thai', 1)->get();
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
        $kh = khach_hang::updateOrCreate(['ten_kh' => $request->ten_kh, 'email' => $request->email, 'sdt' => $request->sdt], ['dia_chi' => $request->dia_chi]);
        $hd = hoa_don::create([
            'kh_id' => $kh->id,
            'user_id' => Auth::user()->id,
            'tong_gia' => $request->so_luong * san_pham::find($request->id_sp)->gia
        ]);

        cthd::create([
            'hd_id' => $hd->id,
            'sp_id' => $request->id_sp,
            'so_luong' => $request->so_luong,
            'don_gia' => $request->so_luong * san_pham::find($request->id_sp)->gia
        ]);

        return 1;
    }

}
