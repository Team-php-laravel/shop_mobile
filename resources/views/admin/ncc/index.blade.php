@extends('admin.layout.admin')

@section('app')
@section('title', 'Dashboard')

@section('content_header')
    <h5>Danh sách nhà cung cấp</h5>
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
    <div class="callout-top callout-top-danger col-md-12 table-responsive">
        <table id="data-table" align="center" width="100%"
               class="table table-hover table-striped table-bordered border text-center">
            <thead>
            <tr class="bg-primary">
                <th>STT</th>
                <th>Tên nhà cung cấp</th>
                <th>Mã số thuế</th>
                <th>Số tài khoản</th>
                <th>Điện thoại</th>
                <th>Địa chỉ</th>
                <th style="width: 150px">
                    <button class="btn btn-sm btn-success"
                            onclick="location.href = 'ncc/create'">
                        +Thêm
                    </button>
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($ncc as $key=>$val)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>
                        {{$val->ten_ncc}}
                    </td>
                    <td>{{$val->ms_thue}}</td>
                    <td>{{$val->stk}}</td>
                    <td>{{$val->sdt}}</td>
                    <td>{{$val->dia_chi}}</td>

                    <td>
                        <button class="btn btn-sm btn-warning"
                                onclick="location.href = 'ncc/{{$val->id}}'">Cập nhật
                        </button>
                        <button class="btn btn-sm btn-outline-danger"
                                onclick="confirm('Đồng ý xóa?') ? document.getElementById('{{"delete".$val->id}}').submit():''">
                            Xóa
                        </button>
                        <form id="delete{{$val->id}}" action="ncc/{{$val->id}}" method="POST">
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
