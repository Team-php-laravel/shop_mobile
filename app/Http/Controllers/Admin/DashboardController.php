<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    public function show()
    {
        $data = DB::select('SELECT sum(tong_gia) as \'ttien\', MONTH(ngay_tao) as \'thang\' FROM `hoa_don` GROUP BY  MONTH(ngay_tao)');
        $value = [];
        for ($i = 0; $i < 12; $i++) {
            $value[$i] = 0;
            for ($j = 0; $j < sizeof($data); $j++) {
                if ($i + 1 == $data[$j]->thang) {
                    $value[$i] = $data[$j]->ttien;
                }
            }
        }

        $date = getdate();

        $day = DB::select("SELECT ten_sp, sum(don_gia) as \"ttien\"
            FROM chi_tiet_hoa_don ct JOIN san_pham sp on  sp.id=ct.sp_id
            WHERE ct.hd_id IN (SELECT id
            FROM hoa_don WHERE DAY(ngay_tao) = ? and MONTH(ngay_tao) = ? and YEAR(ngay_tao) = ?)
            GROUP BY ten_sp ORDER BY ttien ASC limit 3", [$date['mday'], $date['mon'], $date['year']]);

        $mon = DB::select("SELECT ten_sp, sum(don_gia) as \"ttien\"
            FROM chi_tiet_hoa_don ct JOIN san_pham sp on  sp.id=ct.sp_id
            WHERE ct.hd_id IN (SELECT id
            FROM hoa_don WHERE MONTH(ngay_tao) = ? and YEAR(ngay_tao) = ?)
            GROUP BY ten_sp ORDER BY ttien ASC limit 3", [$date['mon'], $date['year']]);

        return response()->json(compact('value', 'day', 'mon'));
    }
}
