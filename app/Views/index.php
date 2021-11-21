<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tugas 10 - Grafik</title>

    <link href="<?= base_url(); ?>/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3">Grafik</h1>
                    <p>Tugas 10</p>
                    <p>Brama Tri Hadi Syapoetra</p>
                    <p>41519010001</p>
                    <a class="btn btn-warning"><i class="fa fa-file"></i> Export PDF
                    </a>

                    <div class="col-xl-12 ">

                        <!-- Area Chart -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Penjualan Perbulan</h6>
                            </div>
                            <div class="card-body">
                                <div class="chart-area">
                                    <canvas id="myAreaChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- End of Main Content -->

                <!-- Bootstrap core JavaScript-->
                <script src="<?= base_url(); ?>/assets/vendor/jquery/jquery.min.js"></script>
                <script src="<?= base_url(); ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                <!-- Core plugin JavaScript-->
                <script src="<?= base_url(); ?>/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

                <!-- Custom scripts for all pages-->
                <script src="<?= base_url(); ?>/assets/js/sb-admin-2.min.js"></script>

                <!-- Page level plugins -->
                <script src="<?= base_url(); ?>/assets/vendor/chart.js/Chart.min.js"></script>

                <?php

                foreach ($pjl_produk as $pjls_produk) {
                    $nama_produk[] = $pjls_produk['nama_produk'];
                    $terjual[] = $pjls_produk['terjual'];
                }

                foreach ($produk_teratas as $produk_teratass) {
                    $nama_produk_teratas[] = $produk_teratass['nama_produk'];
                    $terjual_teratas[] = $produk_teratass['terjual'];
                }
                ?>
                <script>
                    var ctx = document.getElementById("myAreaChart");
                    var myLineChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: <?php echo json_encode($nama_produk) ?>,
                            datasets: [{
                                label: "Terjual",
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
                                data: <?php echo json_encode($terjual) ?>,
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
                                    // ticks: {
                                    //     maxTicksLimit: 5,
                                    //     padding: 10,
                                    //     // Include a dollar sign in the ticks
                                    //     callback: function(value, index, values) {
                                    //         return '$' + number_format(value);
                                    //     }
                                    // },
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
                                // callbacks: {
                                //     label: function(tooltipItem, chart) {
                                //         var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                                //         return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
                                //     }
                                // }
                            }
                        }
                    });
                </script>
</body>

</html>