@extends('admin.layout.admin')

@section('app')
@section('title', 'Dashboard')

@section('content_header')
    <h5><a href="#" onclick="window.history.back();">Quản lý báo hành</a> / Thêm thư mục</h5>
@stop

@section('content')
    <div class="callout-top callout-top-danger col-md-12">
        <form action="/admin/cat{{isset($_GET['chil']) ? '?chil='.$_GET['chil']:''}}" method="POST"
              enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Tên thư mục</label>
                <input type="text"
                       class="form-control" name="ten_loai" aria-describedby="helpId" placeholder="" required>
            </div>
            @isset($_GET['chil'])
                <div class="form-group">
                    <label for="">Thư mục cha:</label>
                    <select class="form-control" name="loai_id" required>
                        @foreach($cat as $item)
                            <option value="{{$item->id}}">{{$item->ten_loai}}</option>
                        @endforeach
                    </select>
                </div>
            @endif
            <div class="text-center">
                <button class="btn btn-sm btn-outline-success" type="submit">+Thêm</button>
            </div>
        </form>
    </div>
@stop
@stop
