@extends('layout.index')

@section('main')
    <section class="container t3-mainbody">
        <div class="row">
            <div class="main-content">
                <!-- MAIN CONTENT -->
                <div class="span12">
                    <h3 class="module-title">Sản phẩm đang giảm giá</h3>
                </div>
                <div id="t3-content" class="t3-content span12">
                    <div class="Front_VM2">
                        <div class="latest-view">
                            <div id="product_list" class="grid layout product-box">
                                <ul id="slider" class="vmproduct">
                                    @foreach($sp_new as $item)
                                        @php
                                            if($item->giam_gia == 0){
                                                $gia = $item->gia;
                                            }else{
                                                $gia = $item->gia - ($item->gia * $item->giam_gia / 100);
                                            }
                                        @endphp
                                        <li>
                                            <div class="prod-row">
                                                <div class="disc">
                                                    <div class="browseImage ">
                                                        <a href="/detail/{{$item->id}}">
                                                            <img
                                                                    src="./uploads/product/{{$item->hinh_anh}}"
                                                                    alt="p-lưng-Bee-ring-iPhone-11-Pro-Max-av75"
                                                                    class="browseProductImage featuredProductImage"
                                                                    id="Img_to_Js_4475" border="0"/>
                                                        </a>
                                                    </div>
                                                    <div class="Title">
                                                        <a href="/detail/{{$item->id}}"
                                                           title="Ốp lưng Bee ring iPhone 11 Pro">{{$item->ten_sp}}</a>
                                                    </div>
                                                    <div class="product-price marginbottom12">Giá:
                                                        @if($item->giam_gia != 0)
                                                            <span class="PricebasePriceWithTax">{{_manny($item->gia)}}
                                                                ₫</span>
                                                            <span class="PricesalesPrice">-{{$item->giam_gia}}%</span>
                                                        @endif
                                                        <div class="PricesalesPrice" style="display : block;"><span
                                                                    class="PricesalesPrice">{{_manny($gia."")}} ₫</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clear"></div>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- //MAIN CONTENT -->
            </div>
        </div>
    </section>


    <!-- SPOTLIGHT 2 -->
    <section class="container t3-sl t3-sl-2 pad-boxed">
        <!-- SPOTLIGHT -->
        <div class="t3-spotlight t3-spotlight-2  row">
            <div class="span12 item-first" data-default="span12">
                <div class="t3-module moduletintucmoinhat" id="Mod805">
                    <div class="module-inner">
                        <h3 class="module-title"><span>Tin tức Gomhang.vn</span></h3>
                        <b class="click"></b>
                        <div class="module-ct">

                            <div id="k2ModuleBox805" class="k2ItemsBlock tintucmoinhat">
                                <ul>
                                    <li class="even">
                                        <a class="k2Avatar moduleItemAuthorAvatar" rel="author"
                                           href="tin-bai-2/itemlist/user/42-gomhangvn.html">
                                            <img src="./assets/media/k2/users/43423.jpg" alt=""
                                                 style="width:50px;height:auto;"/>
                                        </a>
                                        <a class="moduleItemTitle"
                                           href="tin-gomhang/item/232-gomhangvn-gop-suc-cung-dh-mo-ha-noi-phong-chong-dich-covid-19.html">Gomhang.vn
                                            góp sức cùng ĐH Mở Hà Nội phòng, chống dịch Covid-19</a>
                                        <div class="moduleItemIntrotext">

                                            Đại dịch Covid-19 đã ảnh hưởng đến toàn thế giới nói chung và Việt Nam nói
                                            riêng. Gomhang.vn muốn
                                            đóng góp một phần nhỏ đối với cộng đồng và cũng coi đây là trách nhiệm đối
                                            với
                                            Tổ quốc khi đất
                                            nước đang gặp khó khăn. Sáng 7/4, đại diện&#8230;
                                        </div>
                                        <div class="clr"></div>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- SPOTLIGHT -->
    </section>
    <!-- //SPOTLIGHT 2 -->
@endsection