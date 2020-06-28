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
                {{--console.log({{$data}});--}}
                /* ChartJS
                 * -------
                 * Here we will create a few charts using ChartJS
                 */

                //--------------
                //- AREA CHART -
                //--------------

                // Get context with jQuery - using jQuery's .get() method.
                var areaChartCanvas = $('#barChart').get(0).getContext('2d')

                var areaChartData = {
                    labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
                    datasets: [
                        {
                            label: 'Doanh thu(vnđ)',
                            backgroundColor: 'rgba(60,141,188,0.9)',
                            borderColor: 'rgba(60,141,188,0.8)',
                            pointRadius: false,
                            pointColor: '#3b8bba',
                            pointStrokeColor: 'rgba(60,141,188,1)',
                            pointHighlightFill: '#fff',
                            pointHighlightStroke: 'rgba(60,141,188,1)',
                            data: data
                        }
                    ]
                }

                var areaChartOptions = {
                    maintainAspectRatio: false,
                    responsive: true,
                    legend: {
                        display: false
                    },
                    scales: {
                        xAxes: [{
                            gridLines: {
                                display: false,
                            }
                        }],
                        yAxes: [{
                            gridLines: {
                                display: false,
                            }
                        }]
                    }
                }

                //-------------
                //- BAR CHART -
                //-------------
                var barChartCanvas = $('#barChart').get(0).getContext('2d')
                var barChartData = jQuery.extend(true, {}, areaChartData)
                var temp0 = areaChartData.datasets[0]
                barChartData.datasets[0] = temp0

                var barChartOptions = {
                    responsive: true,
                    maintainAspectRatio: false,
                    datasetFill: false
                }

                var barChart = new Chart(barChartCanvas, {
                    type: 'bar',
                    data: barChartData,
                    options: barChartOptions
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
