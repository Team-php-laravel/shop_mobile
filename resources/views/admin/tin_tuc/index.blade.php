@extends('admin.layout.admin')

@section('app')
@section('title', 'Dashboard')

@section('content_header')
    <h5>Quản lý tin tức</h5>
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
                <th>Tiêu đề</th>
                <th>Người Đăng</th>
                <th>Mô tả</th>
                <th>Ngày đăng</th>
                <th style="width: 150px">
                    <button class="btn btn-sm btn-success" onclick="location.href = '/admin/news/create'">
                        +Thêm
                    </button>
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($news as $key=>$val)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>
                        {{$val->tieu_de}}
                    </td>
                    <td>
                        {{$val['user']['name']}}
                    </td>
                    <td>
                        {{$val->mo_ta}}
                    </td>
                    <td>
                        {{$val->ngay_dang}}
                    </td>
                    <td>
                        <button class="btn btn-sm btn-warning"
                                onclick="location.href = '/admin/news/{{$val->id}}'">Cập nhật
                        </button>

                        <button class="btn btn-sm btn-outline-danger"
                                onclick="confirm('Đồng ý xóa?') ? document.getElementById('{{"delete".$val->id}}').submit():''">
                            Xóa
                        </button>
                        <form id="delete{{$val->id}}" action="/admin/news/{{$val->id}}" method="POST">
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
