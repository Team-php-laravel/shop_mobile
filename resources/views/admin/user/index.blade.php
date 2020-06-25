{{-- resources/views/admin/dashboard.blade.php --}}

@extends('admin.layout.admin')

@section('app')
@section('title', 'Dashboard')

@section('content_header')
    <h1>Quản lý nhân viên</h1>
@stop

@section('content')
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
                {{$err}}<br>
            @endforeach
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    @if (session('message'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Thông báo</h4>
            {{ session('message') }}
        </div>
    @endif
    <div class="callout-top callout-top-danger col-md-12">
        <table id="data-table" align="center" width="100%"
               class="table table-hover table-striped table-bordered border text-center">
            <thead>
            <tr class="bg-primary">
                <th>Mã NV</th>
                <th style="width: 100px">Avatar</th>
                <th>Tài khoản</th>
                <th>Thông tin</th>
                <th>Trạng thái</th>
                <th>
                    <button class="btn btn-sm btn-success" onclick="location.href = 'user/create'">+Thêm</button>
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($user as $key=>$val)
                <tr>
                    <td>NV00{{$val->id}}</td>
                    <td>
                        <img class="w-100" src="/uploads/user/{{$val->avatar}}" alt="Ảnh">
                    </td>
                    <td class="text-left">
                        <p><b>Tài khoản: </b>{{$val->ten}}</p>
                        <p><b>Email: </b>{{$val->email}}</p>
                        <p>
                            <b>Chức
                                vụ: </b>{{$val->chuc_vu == 1 ? 'Admin': ($val->chuc_vu == 2 ? 'Quản lý': 'Nhân viên') }}
                        </p>
                    </td>
                    <td class="text-left">

                        <p><b>Ngày sinh: </b>{{$val->ngay_sinh}}</p>
                        <p><b>Điện thoại: </b>{{$val->dien_thoai}}</p>
                        <p><b>Địa chỉ: </b>{{$val->dia_chi}}</p>
                    </td>
                    <td>
                        <form action="user/{{$val->id}}" method="POST">
                            @method('PUT')
                            @csrf
                            <input class="d-none" name="trang_thai" type="text" value="{{$val->trang_thai == 1 ? 0:1}}">
                            @if($val->trang_thai == 1)
                                <button @if($val->chuc_vu == 1) disabled @endif class="btn btn-sm btn-outline-primary"
                                        type="submit">Hiển thị
                                </button>
                            @else
                                <button @if($val->chuc_vu == 1) disabled @endif class="btn btn-sm btn-outline-danger"
                                        type="submit">
                                    Đang ẩn
                                </button>
                            @endif
                        </form>
                    </td>
                    <td>
                        <button class="btn btn-sm btn-warning"
                                onclick="location.href = 'user/{{$val->id}}'">Cập nhật
                        </button>
                        <button class="btn btn-sm btn-outline-danger"
                                onclick="confirm('Xóa nhân viên này?') ? document.getElementById('{{'delete'.$val->id}}').submit():''">
                            Xóa
                        </button>
                        <form id="delete{{$val->id}}" action="user/{{$val->id}}" method="POST">
                            @method('DELETE')
                            @csrf
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop
@stop
