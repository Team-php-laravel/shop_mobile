@extends('admin.layout.admin')

@section('app')
@section('title', 'Dashboard')

@section('content_header')
    <h5>Danh mục loại sản phẩm<a href="#" onclick="window.history.back();"
                                 class="text-info">: {{isset($label) ? $label->ten_loai:''}}</a></h5>
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
                <th>Tên danh mục</th>
                <th style="width: 150px">
                    @if(isset($_GET['chil']))
                        <button class="btn btn-sm btn-success" onclick="location.href = 'cat/create?chil=create'">
                            +Thêm
                        </button>
                    @else
                        <button class="btn btn-sm btn-success" onclick="location.href = 'cat/create'">+Thêm</button>
                    @endif
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($cat as $key=>$val)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>
                        {{$val->ten_loai}}
                    </td>
                    <td>
                        @if(isset($_GET['chil']))
                            <button class="btn btn-sm btn-outline-primary"
                                    onclick="location.href = '/admin/product/{{$val->id}}'">xem
                            </button>
                            <button class="btn btn-sm btn-warning"
                                    onclick="location.href = 'cat/{{$val->id}}?chil={{$val->id}}'">Cập nhật
                            </button>
                        @else
                            <button class="btn btn-sm btn-outline-primary"
                                    onclick="location.href = '?chil={{$val->id}}'">xem
                            </button>
                            <button class="btn btn-sm btn-warning"
                                    onclick="location.href = 'cat/{{$val->id}}'">Cập nhật
                            </button>
                        @endif

                        <button class="btn btn-sm btn-outline-danger"
                                onclick="confirm('Đồng ý xóa?') ? document.getElementById('{{"delete".$val->id}}').submit():''">
                            Xóa
                        </button>
                        <form id="delete{{$val->id}}" action="cat/{{$val->id}}" method="POST">
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
