@extends('layout.app')
@section('content')
    <!-- SECTION EXPERTS -->
    <style>
        .experts__item-content::after {
            border-radius: 25px;
        }

        .pagination {
            float: right;
        }
    </style>
    <section id="team" class="experts p-0">
        <div class="container">
            <div class="row">
                <h2>{{isset($_GET['cat']) ? 'Danh mục: '.$_GET['search']: (isset($_GET['search']) && $_GET['search'] != '' ?'Tìm kiếm: '. $_GET['search']:'ĐIỆN THOẠI NỔI BẬT NHẤT')}}</h2>
            </div>
            <div class="row border">
                @foreach($san_pham as $val)
                    <div class="col-12 col-md-3 py-4">
                        <a href="/detail/{{$val->id}}">
                            <div class="experts__item">
                                <div class="experts__item-img">
                                    <img class="img-fluid"
                                         src="/uploads/product/{{$val->hinh_anh}}"
                                         alt="">
                                </div>
                                <div class="experts__item-content">
                                    <div class="experts__item-info d-flex">
                                        <ul class="experts__list-social">
                                            <li class="experts__item-social square-canvas">
                                                <i class="fa fa-facebook" aria-hidden="true"></i>
                                            </li>
                                            <li class="experts__item-social square-canvas">
                                                <i class="fa fa-twitter" aria-hidden="true"></i>
                                            </li>
                                            <li class="experts__item-social square-canvas">
                                                <i class="fa fa-google-plus" aria-hidden="true"></i>
                                            </li>
                                            <li class="experts__item-social square-canvas">
                                                <i class="fa fa-youtube" aria-hidden="true"></i>
                                            </li>
                                        </ul>
                                        <div class="experts__item-user text-center">
                                            <span class="experts__item-user-name text-center">{{$val->ten_sp}}</span>
                                            @for($i = 0; $i < $val->sao; $i++)
                                                <i class="fa fa-star text-warning" aria-hidden="true"></i>

                                            @endfor
                                            @for($i = 0; $i < (5-$val->sao); $i++)
                                                <i class="far fa-star text-warning"></i>
                                            @endfor
                                            <span class="experts__item-user-job text-center">$ - {{_manny($val->gia)}}
                                                VNĐ <i class="text-danger">-{{$val->sale}}%</i></span>
                                            <span class="experts__item-user-job">{{$val->mota}}</span>
                                        </div>
                                    </div>
                                    <span class="experts__plus square-canvas">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-12 p-0 my-2" style="font-size: 15px;">
                    {{ $san_pham->links() }}
                </div>
            </div>
        </div>
    </section>

@endsection