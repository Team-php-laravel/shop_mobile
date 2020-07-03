{{-- resources/views/admin/dashboard.blade.php --}}

@extends('admin.layout.admin')

@section('app')
@section('title', 'Dashboard')

@section('content')
    <div class="">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-6">
                    <div class="callout-top callout-top-danger">
                        <div class="card-header pt-0">
                            <h4 class="m-0">Doanh thu sản phẩm bán chạy trong ngày</h4>
                        </div>
                        <div class="chart">
                            <canvas id="day" style="height:230px; min-height:230px"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="callout-top callout-top-danger">
                        <div class="card-header pt-0">
                            <h4 class="m-0">Doanh thu sản phẩm bán chạy trong tháng</h4>
                        </div>
                        <div class="chart">
                            <canvas id="mon" style="height:230px; min-height:230px"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="callout-top callout-top-danger">
                        <div class="card-header pt-0">
                            <h4 class="m-0">Thống kê doanh thu theo tháng của năm hiện tại</h4>
                        </div>
                        <div class="chart">
                            <canvas id="year" style="height:230px; min-height:230px"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>

    <!-- /.content-wrapper -->
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Add Content Here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

@stop
@stop
