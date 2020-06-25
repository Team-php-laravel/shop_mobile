@extends('layout.index')

@section('main')
    <!-- SPOTLIGHT 2 -->
    <section class="container t3-sl t3-sl-2 pad-boxed">
        <!-- SPOTLIGHT -->
        <div class="t3-spotlight t3-spotlight-2  row">
            <div class="span12 item-first">
                <div class="t3-module moduletintucmoinhat">
                    <div class="module-inner">
                        <div class="module-ct">
                            <div class="k2ItemsBlock tintucmoinhat">
                                <ul>
                                    @foreach($news as $item)
                                        <li class="even">
                                            <a class="k2Avatar moduleItemAuthorAvatar" rel="author"
                                               href="/new-detail/{{$item->id}}">
                                                <img src="./assets/media/k2/users/43423.jpg" alt=""
                                                     style="width:50px;height:auto;"/>
                                            </a>
                                            <a class="moduleItemTitle"
                                               href="/new-detail/{{$item->id}}">{{$item->tieu_de}}</a>
                                            <div class="moduleItemIntrotext">{{$item->mo_ta}}
                                            </div>
                                            <div class="clr"></div>
                                        </li>
                                    @endforeach
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