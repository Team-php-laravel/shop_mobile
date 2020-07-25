@extends('admin.layout.admin')

@section('app')
@section('title', 'Dashboard')

@section('content_header')
    <h5><a href="#" onclick="window.history.back()">Nhập kho</a></h5>
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
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <div class="callout-top callout-top-danger">
        <table align="center" class="text-right">
            <tbody id="data1">
            <tr>
                <td>Nhà cung cấp:</td>
                <td style="width: 240px;text-align: left">
                    <div class="form-group m-0 khach_hang">
                        <select class="form-control select2" name="ncc_id" required>
                            <option value="">-------------chọn--------------</option>
                            @foreach($kh as $item)
                                <option @if($store->ncc_id == $item->id) selected
                                        @endif value="{{$item->id}}">{{$item->ten_ncc}} - {{$item->ms_thue}}</option>
                            @endforeach
                        </select>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Ngày nhập:</td>
                <td style="width: 240px;text-align: left">
                    <div class="form-group m-0">
                        <input name="ngay_nhap" value="{{$store->ngay_nhap}}" type="text" class="form-control" disabled>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Tổng tiền:</td>
                <td id="tong_tien">0 vnđ</td>
            </tr>
            <tr>
                <td>Giảm giá:</td>
                <td id="sale">0 vnđ</td>
            </tr>
            <tr class="border-danger border-top">
                <td>Thành tiền:</td>
                <td id="thanh_tien">0 vnđ</td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="button" class="btn btn-sm btn-danger" onclick="pay({{$store->id}})">Nhập hàng
                    </button>
                </td>
            </tr>
            </tbody>
        </table>
        <div class="table-responsive" style="height: 300px">
            <table align="center" width="100%"
                   class="table table-head-fixed table-hover table-striped border-danger text-center">
                <thead>
                <tr>
                    <th class="bg-primary">STT</th>
                    <th class="bg-primary">Tên sản phẩm</th>
                    <th class="bg-primary">Số lượng mua</th>
                    <th class="bg-primary">Đơn giá</th>
                    <th class="bg-primary">Thành tiền</th>
                    <th class="bg-primary">
                        <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal">
                            +Thêm
                        </button>
                    </th>
                </tr>
                </thead>
                <tbody id="san_pham" detail="{{$store->id}}">
                {{--jQuery--}}
                </tbody>
            </table>
        </div>
    </div>
    <script>
        //
    </script>
    <!-- Modal -->
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header py-1">
                    <h6 class="modal-title">Danh sách sản phẩm:</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body table-responsive">
                    <table id="data-table" class="table table-hover table-striped table-bordered text-center">
                        <thead>
                        <tr class="bg-primary">
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Đơn giá</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($san_pham as $val)
                            <tr>
                                <td>{{$val->ten_sp}}</td>
                                <td>{{$val->so_luong}}</td>
                                <td>{{_manny($val->gia)}} vnđ</td>
                                <td>
                                    <button type="button" id="sp-{{$val->id}}" class="btn btn-sm btn-success"
                                            onclick="book({{$val}})">
                                        +Thêm
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <script type="text/javascript">
                        var san_pham = [];
                        var giam_gia = 0;
                        var manny = 0;

                        function _manny(str) {
                            str = str.split('').reverse().join('');
                            var tg = "";
                            var i = 0;
                            for (i; i < str.length; i++) {
                                tg += str[i];
                                if (i !== str.length - 1 && (i + 1) % 3 === 0) {
                                    tg += '.';
                                }
                            }
                            return tg.split('').reverse().join('');
                        }

                        function fManny(id) {
                            san_pham = san_pham.map(v => (v.id === id ? {
                                ...v, gia: $('#gia-' + id).val()
                            } : v));
                            manny = 0;
                            giam_gia = 0;
                            printf();
                        }

                        function printf() {
                            var str = "";
                            var i;
                            for (i = 0; i < san_pham.length; i++) {
                                manny += ((100 - san_pham[i].giam_gia) * san_pham[i].gia / 100) * san_pham[i].sl_mua;
                                giam_gia += 0;
                                str += "<tr>\n" +
                                    "<td>" + (i + 1) + "</td>\n" +
                                    "<td class=\"text-left\">" + san_pham[i].ten_sp + "</td>\n" +
                                    "<td><input style=\"width: 100px;\" onchange=\"sl(" + san_pham[i].id + ")\" id='sl-" + san_pham[i].id + "' type=\"number\" value=\"" + san_pham[i].sl_mua + "\"></td>\n" +
                                    "<td><input type='number' onchange='fManny(" + san_pham[i].id + ")' id='gia-" + san_pham[i].id + "' value='" + san_pham[i].gia + "'> vnđ</td>\n" +
                                    "<td>" + _manny("" + (san_pham[i].gia * san_pham[i].sl_mua)) + " vnđ</td>\n" +
                                    "<td>\n" +
                                    "    <button type=\"button\" onclick=\"del(" + san_pham[i].id + ")\" id='del-" + san_pham[i].id + "' class=\"btn btn-sm btn-danger\">Xóa</button>\n" +
                                    "</td>\n" +
                                    "</tr>";
                            }
                            $('#san_pham').html(str);
                            $('#sl_mua').html(san_pham.length);
                            $('#tong_tien').html(_manny("" + (manny + giam_gia)) + " vnđ");
                            $('#sale').html(_manny("" + giam_gia) + " vnđ");
                            $('#thanh_tien').html(_manny("" + manny) + " vnđ");
                        }

                        function book(obj) {
                            $('#sp-' + obj.id).hide();
                            if (san_pham.findIndex(v => (v.id === obj.id)) === -1) {
                                san_pham.push({...obj, sl_mua: 1});
                                manny = 0;
                                giam_gia = 0;
                                printf();
                            }
                        }

                        function pay(id) {
                            if ($('select[name="ncc_id"]').val() === "") {
                                alert("Vui lòng chọn nhà cung cấp?");
                            }
                            else if (san_pham.length === 0) {
                                alert("Vui lòng chọn sản phẩm?")
                            }
                            else {
                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });
                                $.ajax({
                                    url: '/admin/store/' + id,
                                    method: 'PUT',
                                    data: {
                                        ncc_id: $('select[name="ncc_id"]').val(),
                                        manny: manny,
                                        san_pham: san_pham
                                    }
                                }).done(function () {
                                    alert("Giao dịch thành công!");
                                    location.href = "/admin/store";
                                }).fail(function () {
                                    alert("Giao dịch không thành công!")
                                })
                            }
                        }

                        function sl(id) {
                            san_pham = san_pham.map(v => (v.id === id ? {
                                ...v, sl_mua: $('#sl-' + id).val()
                            } : v));
                            manny = 0;
                            giam_gia = 0;
                            printf();
                        }

                        function controlSl(oldNum, newNum) {
                            if (newNum < 0)
                                return 1;
                            if (newNum > oldNum) {
                                alert("Kho không đủ số lượng!");
                                return oldNum;
                            }
                            return newNum;
                        }


                        function del(id) {
                            $('#sp-' + id).show();
                            manny = 0;
                            giam_gia = 0;
                            san_pham = san_pham.filter(v => v.id !== id);
                            printf();
                        }

                    </script>
                </div>
            </div>
        </div>
    </div>
@stop
@stop
@section('jquery')
    <script>
        //
        $(document).ready(function () {
            var id = $('#san_pham').attr('detail');
            $.get('/admin/store/' + id + '/edit', function (data) {
                for (var i = 0; i < data.sp.length; i++) {
                    san_pham.push({
                        ...data.sp[i].san_pham,
                        sl_mua: data.sp[i].so_luong,
                        so_luong: data.sp[i].so_luong + data.sp[i].san_pham.so_luong,
                        gia: data.sp[i].gia
                    });
                }
                printf();
            })
        });
    </script>
@endsection
