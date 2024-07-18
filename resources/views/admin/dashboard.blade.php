@extends('admin.layout.appadmin')
@section('content')

                    <!-- Content Row -->
                    <div class="row">
                    @if (Auth::user()->role == 'admin')
                    <!-- Penumpang -->
                    <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">

                            <a href="{{url('admin/penumpang')}}">

                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Data Penumpang</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                            <!-- <a href="{{url('admin/produk')}}"><i class="fas fa-calendar fa-2x text-gray-300"></i></a> -->
                                            <!-- <i class="fab fa-product-hunt"></i> -->
                                        </div>
                                    </div>
                                </div>

                            </a>

                            </div>
                        </div>

                        <!-- Member-->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">

                            <a href="{{url('admin/member')}}">

                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Data Member</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                            <!-- <a href="{{url('admin/produk')}}"><i class="fas fa-calendar fa-2x text-gray-300"></i></a> -->
                                            <!-- <i class="fab fa-product-hunt"></i> -->
                                        </div>
                                    </div>
                                </div>

                            </a>

                            </div>
                        </div>

                                                 <!-- Transaksi -->
                                                 <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">

                            <a href="{{url('admin/transaksi')}}">

                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Data transaksi</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                            <!-- <a href="{{url('admin/produk')}}"><i class="fas fa-calendar fa-2x text-gray-300"></i></a> -->
                                            <!-- <i class="fab fa-product-hunt"></i> -->
                                        </div>
                                    </div>
                                </div>

                            </a>

                            </div>
                        </div>

                        <!-- Pembayaran -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">

                            <a href="{{url('admin/pembayaran/index')}}">

                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Data Pembayaran</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                            <!-- <a href="{{url('admin/produk')}}"><i class="fas fa-calendar fa-2x text-gray-300"></i></a> -->
                                            <!-- <i class="fab fa-product-hunt"></i> -->
                                        </div>
                                    </div>
                                </div>

                            </a>

                            </div>
                        </div>
                    
                        @endif 

                        <!-- Armada -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                            <a href="{{url('admin/armada')}}">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Data Armada</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                            <!-- <a href="{{url('admin/produk')}}"><i class="fas fa-calendar fa-2x text-gray-300"></i></a> -->
                                            <!-- <i class="fab fa-product-hunt"></i> -->
                                        </div>
                                    </div>
                                </div>

                            </a>

                            </div>
                        </div>


                        <!-- jadwal -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">

                            <a href="{{url('admin/jadwal')}}">

                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Data Jadwal</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                            <!-- <a href="{{url('admin/produk')}}"><i class="fas fa-calendar fa-2x text-gray-300"></i></a> -->
                                            <!-- <i class="fab fa-product-hunt"></i> -->
                                        </div>
                                    </div>
                                </div>

                            </a>

                            </div>
                        </div>

                        <!-- Rute -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">

                            <a href="{{url('admin/rute')}}">

                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Data Rute</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                            <!-- <a href="{{url('admin/produk')}}"><i class="fas fa-calendar fa-2x text-gray-300"></i></a> -->
                                            <!-- <i class="fab fa-product-hunt"></i> -->
                                        </div>
                                    </div>
                                </div>

                            </a>

                            </div>
                        </div>

                                                 <!-- Tiket -->
                                                 <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">

                            <a href="{{url('admin/tiket')}}">

                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Data tiket</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                            <!-- <a href="{{url('admin/produk')}}"><i class="fas fa-calendar fa-2x text-gray-300"></i></a> -->
                                            <!-- <i class="fab fa-product-hunt"></i> -->
                                        </div>
                                    </div>
                                </div>

                            </a>

                            </div>
                        </div>




                        <!-- Area Chart -->
                            <div class="col-md-12">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Chart data dari Data Transaksi pada Pelanggan</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart-area">
                                            <canvas id="myArea"></canvas>
                                        </div>
                                        <hr>
                                        Chart data dari Data Transaksi pada Pelanggan {{$transaksi}}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Chart perbandingan banyaknya tiket yang terjual </h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4">
                                        <canvas id="myPie"></canvas>
                                    </div>
                                    <hr>
                                    Berikut ini adalah perbandingan tiket_id dari transaksi dengan total {{$transaksi}}
                                    
                                </div>
                            </div>
                        </div>

                        <script>
    // Pie Chart Example
    var label = [@foreach($jenis_tiket as $jt) '{{ $jt->tiket_id }}', @endforeach];
    var data2 = [@foreach($jenis_tiket as $jt) {{ $jt->jumlah }}, @endforeach];

    document.addEventListener("DOMContentLoaded", () => {
        new Chart(document.querySelector('#myPie'), {
            type: 'doughnut',
            data: {
                labels: label,
                datasets: [{
                    data: data2,
                    backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
                    hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                legend: {
                    display: false
                },
                cutoutPercentage: 80,
            },
        });
    });
</script>

<script>
   // Area Chart Example
   var lbl = [@foreach($hitung_harga as $hitung) '{{ $hitung->name }}', @endforeach];
var data = [@foreach($hitung_harga as $hitung) {{ $hitung->total_harga }}, @endforeach];


function number_format(number) {
    return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(number);
}

document.addEventListener("DOMContentLoaded", () => {
    var ctx = document.getElementById("myArea").getContext("2d");

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: lbl,
            datasets: [{
                label: "Total Harga",
                lineTension: 0.3,
                backgroundColor: "rgba(78, 115, 223, 0.05)",
                borderColor: "rgba(78, 115, 223, 1)",
                pointRadius: 3,
                pointBackgroundColor: "rgba(78, 115, 223, 1)",
                pointBorderColor: "rgba(78, 115, 223, 1)",
                pointHoverRadius: 3,
                pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                pointHitRadius: 10,
                pointBorderWidth: 2,
                data: data,
            }],
        },
        options: {
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                }
            },
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        maxTicksLimit: 7
                    }
                }],
                yAxes: [{
                    ticks: {
                        maxTicksLimit: 5,
                        padding: 10,
                        callback: function(value, index, values) {
                            return 'Rp.' + number_format(value);
                        }
                    },
                    gridLines: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                    }
                }],
            },
            legend: {
                display: false
            },
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                intersect: false,
                mode: 'index',
                caretPadding: 10,
                callbacks: {
                    label: function(tooltipItem, chart) {
                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                        return datasetLabel + ': Rp.' + number_format(tooltipItem.yLabel);
                    }
                }
            }
        }
    });
});
</script>


@endsection
