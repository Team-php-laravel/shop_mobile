@extends('admin.layout.admin')

@section('app')
@section('title', 'Dashboard')

@section('content_header')
    <h5><a href="#" onclick="window.history.back();">Thư mục loại sản phẩm</a> / Cập nhật thông tin thư mục</h5>
@stop

@section('content')
    <div class="callout-top callout-top-danger col-md-12">
        <form action="/admin/cat/{{$cat->id}}{{isset($_GET['chil']) ? '?chil='.$_GET['chil']:''}}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="title">Tên thư mục</label>
                <input type="text"
                       class="form-control" name="ten_loai" value="{{$cat->ten_loai}}" aria-describedby="helpId"
                       placeholder="" required>
            </div>
            @isset($_GET['chil'])
                <div class="form-group">
                    <label for="">Thư mục cha:</label>
                    <select class="form-control" name="loai_id" required>
                        @foreach($listcat as $item)
                            <option @if($cat->loai_id == $item->id) selected
                                    @endif value="{{$item->id}}">{{$item->ten_loai}}</option>
                        @endforeach
                    </select>
                </div>
            @endif
            <div class="text-center">
                <button class="btn btn-sm btn-warning" type="submit">Cập nhật</button>
            </div>
        </form>
    </div>
@stop
@stop
