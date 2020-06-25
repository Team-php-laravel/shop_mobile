@extends('layout.index')

@section('main')
    <div id="t3-mainbody">
        <section class="container t3-mainbody">
            <div class="row">
                <div class="main-content">
                    <!-- MAIN CONTENT -->
                    <div id="t3-content" class="t3-content span12">
                        <div id="k2Container" class="itemListView" style="display: flex">
                            <div class="itemList">
                                <!-- Leading items -->
                                <div id="itemListLeading">
                                    <div class="K2ItemsRow K2Row-0">
                                        <div class="itemContainer itemContainerLast">
                                            <div class="catItemView groupLeading">
                                                <div class="catItemHeader">
                                                    <h3 class="module-title">
                                                        {{$new->tieu_de}}
                                                    </h3>
                                                    <span class="catItemAuthor">Người đăng: <b>{{$new->user->ten}}</b></span>
                                                    <span class="catItemDateCreated">Ngày đăng: {{$new->ngay_dang}}</span>
                                                </div>
                                                <div class="catItemBody">
                                                    <div class="catItemIntroText">
                                                        {{$new->mo_ta}}
                                                    </div>
                                                    {!! $new->noi_dung !!}
                                                    <div class="clr"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection