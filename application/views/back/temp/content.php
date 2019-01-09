
<!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">Dashboard</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                    <div class="col-md-7 col-4 align-self-center">
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <?php $level= $this->session->userdata('level'); 
                                if($level=='admin'){?>
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-3 col-md-5">
                        <div class="card">
                            <div class="card-block">
                                <h3 class="text-muted  text-success" align="center">Total User</h3><hr>
                                <h2 align="center"><?php echo $user;?></h2>
                                
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-5">
                        <div class="card">
                            <div class="card-block">
                                <h3 class="text-muted  text-warning" align="center">Total Faktor</h3><hr>
                                <h2 align="center"><?php echo $faktor;?></h2>
                                
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-5">
                        <div class="card">
                            <div class="card-block">
                                <h3 class="text-muted text-info" align="center">Total Kategori</h3><hr>
                                <h2 align="center"><?php echo $kategori;?></h2>
                                
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-5">
                        <div class="card">
                            <div class="card-block">
                                <h3 class="text-muted text-primary" align="center">Total Gejala</h3><hr>
                                <h2 align="center"><?php echo $gejala;?></h2>
                                
                            </div>
                        </div>
                    </div>

                </div>
                <?php } else { ?>
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-12 col-md-7">
                        <div class="card">
                            <div class="card-block">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="d-flex flex-wrap">
                                            <div>
                                                <h3 class="card-title">Sistem Pakar Untuk Mendeteksi Tingkat Depresi Seseorang Dengan Metode Fuzzy Tsukamoto</h3><hr>
                                                <i>Terimakasih anda telah menggunakan aplikasi ini, silahkan pilih menu bagian pemeriksaan untuk melalukan pemeriksaan.</i> </div>
                                            
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                <?php } ?>
                <!-- Row -->
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->