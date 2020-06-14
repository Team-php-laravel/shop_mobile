@extends('layout.app')
@section('content')
    <!-- SECTION LATEST -->
    <section>
        <div class="container">
            <div class="row">
                <h2>THÔNG TIN CHI TIẾT:</h2>
            </div>
            <div class="row border border-bottom-0 py-4">
                <div class="col-md-8">
                    <div class="text-center">
                        <h4 class="heading">
                            {{$data->ten_sp}}
                        </h4>
                        @for($i = 0; $i < $data->sao; $i++)
                            <i class="fa fa-star text-warning" aria-hidden="true"></i>
                        @endfor
                        @for($i = 0; $i < (5-$data->sao); $i++)
                            <i class="far fa-star text-warning"></i>
                        @endfor
                        <p style="font-size: 12px">$ - {{_manny($data->gia)}} VNĐ <i
                                    class="text-danger">-{{$data->sale}}
                                %</i></p>
                        <button data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-outline-primary">
                            Đặt ngay
                        </button>
                    </div>
                    <style>
                        p {
                            font-size: 12px;
                        }

                        table, li {
                            font-size: 15px;
                        }

                    </style>
                    <h2>THÔNG SỐ KỸ THUẬT</h2>
                    <table align="center" class="w-100" style="font-size: 15px">
                        <tbody>
                        <tr>
                            <td>Màn hình:</td>
                            <td>{{$data->thong_so[0]}}</td>
                        </tr>
                        <tr>
                            <td>Hệ điều hành:</td>
                            <td>{{$data->thong_so[1]}}</td>
                        </tr>
                        <tr>
                            <td>Camera sau:</td>
                            <td>{{$data->thong_so[2]}}</td>
                        </tr>
                        <tr>
                            <td>Camera trước:</td>
                            <td>{{$data->thong_so[3]}}</td>
                        </tr>
                        <tr>
                            <td>CPU:</td>
                            <td>{{$data->thong_so[4]}}</td>
                        </tr>
                        <tr>
                            <td>RAM:</td>
                            <td>{{$data->thong_so[5]}}</td>
                        </tr>
                        <tr>
                            <td>Bộ nhớ trong:</td>
                            <td>{{$data->thong_so[6]}}</td>
                        </tr>
                        <tr>
                            <td>Thẻ nhớ:</td>
                            <td>{{$data->thong_so[7]}}</td>
                        </tr>
                        <tr>
                            <td>Thẻ Sim:</td>
                            <td>{{$data->thong_so[8]}}</td>
                        </tr>
                        <tr>
                            <td>Dung lượng pin:</td>
                            <td>{{$data->thong_so[9]}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-4">
                    <img class="w-100" src="/uploads/product/{{$data->hinh_anh}}" alt="">
                </div>
                <div class="col-md-12">
                    <hr width="100%">
                    {!! $data->mo_ta !!}
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade show" id="exampleModalCenter" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h3 class="text-center text-info">HÓA ĐƠN</h3>
                    <hr class="w-100">
                    <div class="form-group m-0">
                        <label for="title">Họ & tên:</label>
                        <input type="text" class="form-control m-0" name="name" required="">
                    </div>
                    <div class="row">
                        <div class="form-group m-0 col-md-6">
                            <label for="title">Email:</label>
                            <input type="email" class="form-control m-0" name="email" required="">
                        </div>
                        <div class="form-group m-0 col-md-6">
                            <label for="title">Điện thoại:</label>
                            <input type="number" class="form-control m-0" name="phone" required="">
                        </div>
                    </div>
                    <div class="form-group m-0">
                        <label for="title">Địa chỉ:</label>
                        <input type="text" class="form-control m-0" name="address" required="">
                    </div>
                    <div class="form-group m-0">
                        <label for="title">Số lượng mua:</label>
                        <input type="number" value="1" class="form-control" name="number" required="">
                    </div>

                    <div class="col-12 text-center">
                        <button id="book"
                                class="btn btn-outline-primary"
                                onclick="order({{$data->id}})">
                            Đặt ngay
                        </button>
                    </div>

                    <script>
                        function inputNull(name, text) {
                            if (name.trim() == '') {
                                alert(text + ' không được để trông!');
                                return true;
                            }
                            return false
                        }

                        function order(id) {
                            const name = $('input[name="name"]').val();
                            if (inputNull(name, 'Họ & tên')) {
                                return;
                            }
                            const email = $('input[name="email"]').val();
                            if (inputNull(email, 'Email')) {
                                return;
                            }
                            const phone = $('input[name="phone"]').val();
                            if (inputNull(phone, 'Điện thoại')) {
                                return;
                            }
                            const address = $('input[name="address"]').val();
                            if (inputNull(address, 'Địa chỉ')) {
                                return;
                            }
                            const number = $('input[name="number"]').val();
                            if (inputNull(address, 'Số lượng mua')) {
                                return;
                            }
                            if (number < 1) {
                                alert('Bạn chưa nhập số lượng!');
                                return;
                            }
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            $.post('/order', {
                                san_pham_id: id,
                                ten_kh: name,
                                email: email,
                                dien_thoai: phone,
                                dia_chi: address,
                                sl_mua: number
                            }, function (data) {
                                if (data == 1) {
                                    alert("Đặt hàng thành công, vui lòng chờ điện thoại xác nhận!");
                                    $('#exampleModalCenter').modal('hide');
                                } else {
                                    alert("Đặt hàng thất bại, vui lòng thử lại!");
                                }
                            });
                        }
                    </script>
                    <style>
                        .form-group, .btn {
                            font-size: 15px;
                        }

                        .form-control {
                            height: calc(2.25rem + 10px) !important;
                            padding: .5rem .75rem;
                            font-size: 15px;
                        }
                    </style>
                </div>
            </div>
        </div>
    </div>
    <style>
        p {
            font-size: 15px !important;
        }
    </style>
@endsection