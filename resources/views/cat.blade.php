@extends('layout.index')

@section('main')
    <div id="t3-mainbody">
        <section class="container t3-mainbody">
            <div class="row">
                <div class="main-content">
                    <!-- MAIN CONTENT -->
                    <div id="t3-content" class="t3-content span12">
                        <div id="crumbs">
                            <ul>
                                <li><a href="index.html"><i class="icon icon-home"></i></a></li>
                                <li><a href="phu-kien-dien-thoai.html">{{$cat->ten_loai}}</a></li>
                            </ul>
                        </div>
                        <div id="prodlist-box" itemscope itemtype="http://schema.org/LocalBusiness">
                            <h1 class="module-title">
                                <div><span>{{$cat->ten_loai}}</span></div>
                            </h1>

                            <div id="product_list" class="grid layout" style="margin-top: 10px;">
                                <ul id="slider" class="vmproduct">
                                    @foreach($sp as $item)
                                        @php
                                            if($item->giam_gia == 0){
                                                $gia = $item->gia;
                                            }else{
                                                $gia = $item->gia - ($item->gia * $item->giam_gia / 100);
                                            }
                                        @endphp
                                        <li style="height: 355px;">
                                            <div class="prod-row">
                                                <div class="product-box spacer disc ">
                                                    <div class="browseImage ">
                                                        <a href="/detail/{{$item->id}}">
                                                            <img src="./uploads/product/{{$item->hinh_anh}}"
                                                                 alt="op-lung-ho-co-sieu-trong-iphone"
                                                                 class="browseProductImage featuredProductImage"
                                                                 id="Img_to_Js_3947" border="0"/></a></div>
                                                    <h2 class="Title">
                                                        <a href="/detail/{{$item->id}}"
                                                           title="{{$item->ten_sp}}">{{$item->ten_sp}}</a></h2>
                                                    <div class="product-price marginbottom12">Giá:
                                                        @if($item->giam_gia != 0)
                                                            <span class="PricebasePriceWithTax">{{_manny($item->gia)}}
                                                                ₫</span>
                                                        @endif
                                                        <div class="PricesalesPrice" style="display : block;"><span
                                                                    class="PricesalesPrice">{{_manny($gia."")}} ₫</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <!-- //MAIN CONTENT -->
                </div>
            </div>
        </section>
    </div>
@endsection