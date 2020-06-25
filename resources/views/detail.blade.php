@extends('layout.index')

@section('main')
    <div id="t3-mainbody">
        <section class="container t3-mainbody">
            <div class="row">
                <div class="main-content">
                    <!-- MAIN CONTENT -->
                    <div class="t3-content span12">
                        <div id="crumbs">
                            <ul>
                                <li><a href="./index.html"><i class="icon icon-home"></i></a></li>
                                <li><a href="./phu-kien-dien-thoai.html">Phụ kiện điện thoại</a></li>
                                <li><a href="./phu-kien-iphone.html">Phụ kiện iPhone</a></li>
                            </ul>
                        </div>
                        <h1 class="title minhcc">{{$sp->ten_sp}}</h1>
                    </div>
                    <div id="t3-content" class="t3-content span9">
                        <div id="productdetailsview" class="productdeitails-view minhtiensty">
                            <div class="wrapper2">
                                <div class="fleft image_loader" id="imgmkk">
                                    <div class="tisoduongvienanh">
                                        <img src="./uploads/product/{{$sp->hinh_anh}}"
                                             alt="" itemprop="image" class="medium-image" id="medium-image"/>
                                    </div>
                                </div>
                                <div class="fright">
                                    @php
                                        if($sp->giam_gia == 0){
                                            $gia = $sp->gia;
                                        }else{
                                            $gia = $sp->gia - ($sp->gia * $sp->giam_gia / 100);
                                        }
                                    @endphp
                                    <div class="price">
                                        <div class="product-price" id="productPrice4475 ">Giá:
                                            @if($sp->giam_gia != 0)
                                                <span class="PricebasePriceWithTax">{{_manny($sp->gia)}} ₫</span>
                                            @endif
                                            <div class="PricesalesPrice" style="display : block;"><span
                                                        class="PricesalesPrice">{{_manny($gia."")}} ₫</span></div>
                                        </div>
                                        <div class="tagcloud05" style="margin-top: -50px;">
                                            <ul>
                                                <li>
                                                    <a href='https://docs.google.com/forms/d/e/1FAIpQLSf4pOwCXmMxCIzM2bRmdIRtuFC2OS5PVjMbVbT_Z8p8MSJ44g/viewform'><span>Bảo hành giá</span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="mpaddon">
                                        @if($sp->mau_sac != '')
                                            <ul>
                                                <li>{{$sp->mau_sac}}</li>
                                            </ul>
                                        @endif
                                    </div>
                                    <div class="custom">
                                        <div class="tisoMuaNgay">
                                            <div class="aloButton">
                                                <a class="tisoMuaNgay" href="#">
                                                    <span>
                                                        <span>
                                                            <strong>MUA NGAY</strong>
                                                            <span>Giao hàng toàn quốc, thanh toán sau khi kiểm tra</span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="goidien">Tư vấn, đặt hàng:
                                                <a href="tel:0842246006">08.4224.6006</a> (8h-22h)
                                            </div>
                                            <br/>
                                            <div class="goidien">Bảo hành, hỗ trợ: <a href="tel:19006028">1900.6028</a>
                                                (8h-22h)
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                    <!-- Area -->
                                    <div class="tabs-wrapper mccArea">
                                        <input type="radio" name="tab" id="tab1" class="tab-head" checked="checked"/>
                                        <label for="tab1"><strong>Hà Nội</strong></label>
                                        <input type="radio" name="tab" id="tab2" class="tab-head"/>
                                        <label for="tab2"><strong>TpHCM</strong></label>
                                        <input type="radio" name="tab" id="tab3" class="tab-head"/>
                                        <label for="tab3"><strong>Đà Nẵng</strong></label>
                                        <input type="radio" name="tab" id="tab4" class="tab-head"/>
                                        <label for="tab4"><strong>Toàn Quốc</strong></label>
                                        <div class="tab-body-wrapper">
                                            <div id="tab-body-1" class="tab-body">
                                                <div class="custom">
                                                    <span>Giao hàng miễn phí trong nội thành.</span></div>
                                                <div class="custom">
                                                    <img src="./assets/img/home.png"> 370 Xã Đàn, Đống Đa, Hà Nội
                                                    <br/>
                                                    <img src="./assets/img/home.png"> 55C Hàng Đậu, Hoàn Kiếm, Hà Nội
                                                    <br/>
                                                    <img src="./assets/img/home.png"> 31 Văn Cao, Ba Đình Hà Nội
                                                    <br/>
                                                    <img src="./assets/img/home.png"> 180 Trương Định, Hoàng Mai, Hà Nội
                                                    <br/>
                                                    <img src="./assets/img/home.png"> 142 Ngọc Hà, Ba Đình, Hà Nội
                                                    <p>Tham khảo
                                                        <a href="./cskh/141-8cs.html"> 8 chính sách vàng Gomhang.vn</a>
                                                    </p>
                                                </div>
                                            </div>
                                            <div id="tab-body-2" class="tab-body">
                                                <div class="custom">
                                                    <span>Giao hàng miễn phí trong nội thành.</span>
                                                </div>
                                                <div class="custom">
                                                    <img alt="" src="./assets/img/home.png"/>
                                                    Số 640 Cách Mạng Tháng 8, P.11, Q3, TpHCM
                                                    <br/>
                                                    <img alt="" src="./assets/img/home.png"/>
                                                    Số 1040 Cách Mạng Tháng 8, P.4, Q.Tân Bình, TpHCM
                                                    <br/>
                                                    <img alt="" src="./assets/img/home.png"/>
                                                    Số 270/20a Hòa Hảo, p4, q10, TpHCM </p>
                                                    <p>Tham khảo
                                                        <a href="./cskh/141-8cs.html"> 8 chính sách vàng Gomhang.vn</a>
                                                    </p>
                                                </div>
                                            </div>
                                            <div id="tab-body-3" class="tab-body">
                                                <div class="custom">
                                                    <span>Giao hàng miễn phí trong nội thành.</span></div>
                                                <div class="custom">
                                                    <img src="./assets/img/home.png"> Số 166 Lê Đình Lý, Hải Châu, Đà
                                                    Nẵng<br/>
                                                    Tham khảo <a href="./cskh/141-8cs.html"> 8 chính sách vàng
                                                        Gomhang.vn</a></div>
                                            </div>
                                            <div id="tab-body-4" class="tab-body">
                                                <div class="custom">
                                                    <p>
                                                        <i class="tisoVN"></i>
                                                        <span class="tisoAdd">
                                                            Giao hàng tận nơi, thanh toán sau khi kiểm tra,
                                                            đổi trả bất kể lý do trong trong 8 ngày</span>
                                                    </p>
                                                    <ul>
                                                        <li>Phí vận chuyển 30K, miễn phí các đơn &gt;199K</li>
                                                        <li>Thành phố từ 1-2 ngày, huyện xã 3-4 ngày&nbsp;</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end of Area -->
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <!-- //MAIN CONTENT -->
                    <!-- SIDEBAR 2 -->
                    <div class="t3-sidebar t3-sidebar-2 span3">
                        <div class="t3-module module">
                            <div class="module-inner">
                                <h3 class="module-title"><span>Giới thiệu GOM</span></h3>
                                <b class="click"></b>
                                <div class="module-ct">
                                    <div class="custom">
                                        <p><a href="feedback-khach-hang.html">
                                                <img alt="Feedback" src="./assets/images/feedback-gomhang.jpg"/></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- //SIDEBAR 2 -->
                    <div class="span12">
                        <div class="tisoBonChinhSach">
                            <div class="custom">
                                <a class="bon-chinh-sach">
                                    <img alt="giao-hang-toan-quoc" src="./assets/images/giao-hang-toan-quoc-2.jpg"/>
                                    <img alt="8-ngay-doi-tra" src="./assets/images/8-ngay-doi-tra.png"/>
                                    <img alt="bao-hanh-12-thang" src="./assets/images/bao-hanh-12-thang-2.jpg"/>
                                    <img alt="support-tron-doi" src="./assets/images/support-tron-doi.jpg"/>
                                </a>
                            </div>
                        </div>
                        @if($sp->mo_ta != 0)
                            <div class="product-description">
                                <div class="sidebar-box black" style="height: auto">
                                    {!! $sp->mo_ta !!}
                                    <div class="clear"></div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection