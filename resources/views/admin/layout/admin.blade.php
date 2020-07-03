{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@yield('app')

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="https://adminlte.io/themes/v3/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
    <script>
        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', {
            'placeholder': 'dd/mm/yyyy'
        })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', {
            'placeholder': 'mm/dd/yyyy'
        })
        //Money Euro
        $('[data-mask]').inputmask()
    </script>
    <script>
        $(document).ready(function () {
            $('#data-table').DataTable(
                {
                    "oLanguage": {
                        "sProcessing": "Đang xử lý...",
                        "sLengthMenu": "Xem _MENU_ mục",
                        "sZeroRecords": "không có dữ liệu",
                        "sInfo": "_TOTAL_ mục",
                        "sInfoEmpty": "0 mục",
                        "sInfoFiltered": "",
                        "sInfoPostFix": "",
                        "sSearch": "Tìm:",
                        "sUrl": "",
                        "oPaginate": {
                            "sPrevious": "<",
                            "sNext": ">",
                        }
                    }
                }
            );
        });
    </script>
    <script src="/ckeditor/ckeditor.js"></script>
    <script>
        $(function () {
            $.get('/admin/chart', function (data) {
                var areaChartData = {
                    labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
                    datasets: [
                        {
                            label: 'Doanh thu(đ)',
                            backgroundColor: 'rgba(60,141,188,0.9)',
                            borderColor: 'rgba(60,141,188,0.8)',
                            pointRadius: false,
                            pointColor: '#3b8bba',
                            pointStrokeColor: 'rgba(60,141,188,1)',
                            pointHighlightFill: '#fff',
                            pointHighlightStroke: 'rgba(60,141,188,1)',
                            data: data.value
                        }

                    ]
                };

                //
                // //-------------
                // //- BAR CHART -
                // //-------------
                var barChartCanvas = $('#year').get(0).getContext('2d')
                var barChartData = jQuery.extend(true, {}, areaChartData)

                var barChartOptions = {
                    responsive: true,
                    maintainAspectRatio: false,
                    datasetFill: false
                }
                //
                new Chart(barChartCanvas, {
                    type: 'bar',
                    data: barChartData,
                    options: barChartOptions
                })


                //==============================
                var bg = ['#3b8bba', '#f70307', '#06a019'];
                var day_datasets = [];
                for (var i = 0; i < data.day.length; i++) {
                    day_datasets = [...day_datasets, {
                        label: data.day[i].ten_sp,
                        backgroundColor: bg[i],
                        borderColor: bg[i],
                        pointRadius: false,
                        pointColor: bg[i],
                        pointStrokeColor: 'rgba(60,141,188,1)',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data: [parseFloat(data.day[i].ttien)]
                    }]
                }

                var day = {
                    labels: ["Doanh thu(đ)"],
                    datasets: day_datasets
                };
                //
                // //-------------
                // //- BAR CHART -
                // //-------------
                var barChartCanvas1 = $('#day').get(0).getContext('2d')
                var barChartData1 = jQuery.extend(true, {}, day)

                var barChartOptions1 = {
                    responsive: true,
                    maintainAspectRatio: false,
                    datasetFill: false
                }
                //
                new Chart(barChartCanvas1, {
                    type: 'bar',
                    data: barChartData1,
                    options: barChartOptions1
                })

                //    ========================================
                //==============================
                var mon_datasets = [];
                for (var i = 0; i < data.mon.length; i++) {
                    mon_datasets = [...mon_datasets, {
                        label: data.mon[i].ten_sp,
                        backgroundColor: bg[i],
                        borderColor: bg[i],
                        pointRadius: false,
                        pointColor: bg[i],
                        pointStrokeColor: 'rgba(60,141,188,1)',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data: [parseFloat(data.mon[i].ttien)]
                    }]
                }

                var mon = {
                    labels: ["Doanh thu(đ)"],
                    datasets: mon_datasets
                };
                //
                // //-------------
                // //- BAR CHART -
                // //-------------
                var barChartCanvas2 = $('#mon').get(0).getContext('2d')
                var barChartData2 = jQuery.extend(true, {}, mon)

                var barChartOptions2 = {
                    responsive: true,
                    maintainAspectRatio: false,
                    datasetFill: false
                }
                //
                new Chart(barChartCanvas2, {
                    type: 'bar',
                    data: barChartData2,
                    options: barChartOptions2
                })
            });
        });
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2();
        });
    </script>
    @yield('jquery')
@stop
