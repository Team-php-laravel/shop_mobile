@extends('admin.layout.admin')

@section('app')
@section('title', 'Dashboard')

@section('content_header')
    <h5><a href="#" onclick="window.history.back();">Quản lý báo hành</a> / Thêm sản phẩm bảo hành</h5>
@stop

@section('content')
    <div class="callout-top callout-top-danger col-md-12">
        <form action="/admin/bh" method="POST"
              enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Chọn sản phẩm:</label>
                <select class="form-control" name="sp_id" required>
                    @foreach($sp as $item)
                        <option value="{{$item->id}}">{{$item->ten_sp}}</option>
                    @endforeach
                </select>

            </div>
            <div class="form-group">
                <label for="">Lý do bảo hành:</label>
                <textarea type="text"
                          class="form-control" name="ly_do_bao_hanh" aria-describedby="helpId" placeholder=""
                          required></textarea>
            </div>
            <div class="text-center">
                <button class="btn btn-sm btn-outline-success" type="submit">+Thêm</button>
            </div>
        </form>
    </div>
@stop
@stop
