<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
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
        $user = User::all();
        return view('admin.user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
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
        if ($request->hasFile('avatar')) {
            $image = Str::random() . '.' . $request->avatar->getClientOriginalExtension();
            $request->avatar->move("uploads/user/", $image);
        }

        $data = collect($request->all())->merge([
            'avatar' => $request->hasFile('avatar') ? $image : null,
            'password' => '123456',
            'trang_thai' => 0
        ])->toArray();


        User::create($data);

        return redirect('admin/user')->with("message", "Thêm nhân viên thành công !");
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
        $user = User::findOrFail($id);
        return view('admin.user.update', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Auth::user()->id;
        return view('admin.user.password', compact('id'));
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
        $user = User::findOrFail($id);
        if (isset($request->password_config)) {
            if ($request->password_config == $request->password) {
                $data = collect($request->all())->merge([
                    'password' => Hash::make($request->password)
                ])->toArray();
                unset($data['password_config']);
                User::findOrFail($id)->update($data);
                return redirect('/admin/user/0/edit')->with("message", "Cập nhật thành công!");
            } else {
                return redirect('/admin/user/0/edit')->with(["error" => "Mật khẩu không trùng khớp!"]);
            }
        } elseif (isset($request->trang_thai)) {
            $data = collect($request->all())->merge([
                'trang_thai' => $request->trang_thai,
                'password' => $request->trang_thai == 1 ? Hash::make('123456') : '123456'
            ])->toArray();
            $user->update($data);
            return redirect('admin/user')->with("message", "Đổi trạng thái thành công !");
        } elseif ($request->hasFile('avatar')) {
            $image = Str::random() . '.' . $request->avatar->getClientOriginalExtension();
            $request->avatar->move("uploads/user/", $image);
            $data = collect($request->all())->merge([
                'avatar' => $request->hasFile('avatar') ? $image : null,
                'chuc_vu' => $user->chuc_vu == 1 ? 1 : $request->chuc_vu
            ])->toArray();
        } else {
            $data = collect($request->all())->merge([
                'avatar' => $user->avatar,
                'chuc_vu' => $user->chuc_vu == 1 ? 1 : $request->chuc_vu
            ])->toArray();
        }

        $user->update($data);

        return redirect('admin/user')->with("message", "Cập nhật nhân viên thành công !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::with('post')->findOrFail($id);
        if (sizeof($user->post) == 0) {
            User::findOrFail($id)->delete();
            return redirect('admin/user')->with("message", "Xóa nhân viên thành công !");
        } else {
            return redirect('admin/user')->with("error", "Thất bại, nhân viên này là chủ sở hữu của 1 só bài viết!");
        }
    }
}