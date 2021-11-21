<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Tugas 10 - Grafik</title>

    <link href="<?php echo base_url('/assets/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('/assets/css/sb-admin-2.min.css'); ?>" rel="stylesheet">

</head>

<body id="page-top">
    <?php
    $session = session();
    $error = $session->getFlashdata('error');
    $success = $session->getFlashdata('success');
    ?>
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid p-5">

                    <!-- Page Heading -->
                    <h1 class="mb-2 text-gray-800">Grafik</h1>
                    <p>Tugas 10</p>
                    <p>Brama Tri Hadi Syapoetra</p>
                    <p>41519010001</p>
                    <?php if ($error) { ?>
                        <div class="position-fixed top-0 right-0 p-3" style="z-index: 5; right: 0; top: 50px;">
                            <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">
                                <div class="toast-header bg-danger">
                                    <strong class="mr-auto text-white">Gagal</strong>
                                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="toast-body">
                                    <?= $error; ?>
                                </div>
                            </div>
                        </div>
                        <!-- <h1>gagal</h1> -->
                    <?php } ?>
                    <?php if ($success) { ?>
                        <div class="position-fixed top-0 right-0 p-3" style="z-index: 5; right: 0; top: 50px;">
                            <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">
                                <div class="toast-header bg-success">
                                    <strong class="mr-auto text-white">Berhasil</strong>
                                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="toast-body">
                                    <?= $success; ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="col-xl-">
                        <!-- <h3>Laporan Penjualan</h3> -->
                        <form action="<?= base_url('laporan') ?>" method="post">
                            <div class="form-row align-items-center">
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-warning mb-2">Export PDF</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xl-12">
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
                </div>
            </div>
        </div>
    </div>
    <!-- End of Main Content -->

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('/assets/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('/assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('/assets/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('/assets/js/sb-admin-2.min.js'); ?>"></script>

    <!-- Page level plugins -->
    <script src="<?php echo base_url('/assets/vendor/chart.js/Chart.min.js'); ?>"></script>

    <?php

    foreach ($tbl_pjl_produk as $tbl_pjl_produks) {
        $nama_produk[] = $tbl_pjl_produks['nama_produk'];
        $terjual[] = $tbl_pjl_produks['terjual'];
    }
    ?>

    <script>
        if ($('#myAreaChart').length) {
            var ctx = document.getElementById("myAreaChart");
            var myAreaChart = new Chart(ctx, {
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
                        data: <?php echo json_encode($terjual) ?>
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
                    }
                }
            });
        }
        $('.toast').toast('show');
    </script>
</body>

</html>