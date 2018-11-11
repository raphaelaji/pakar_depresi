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
                        <h3 class="text-themecolor">User</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Data user</a></li>
                            <li class="breadcrumb-item active">Tambah user</li>
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
                <?php 
                  if ($this->session->flashdata('sukses')) {
                    echo '<p class="warning" style="margin: 10px 20px;">'.$this->session->flashdata('sukses').'</p>';
                  }
                  echo validation_errors('<p class="warning" style="margin: 10px 20px;">','</p>');
                ?>
                <div class="row">
                    <!-- column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-block">
                              <center class="m-t-30">

                                <form class="form-horizontal form-material" action="<?php echo base_url(). 'back/user/tambah_aksi'; ?>" method="POST">


                                  <div class="form-group">
                                  <label for="username" class="col-lg-2">Username</label>
                                    <div class="col-sm-4">
                                      <input type="text" name="username" required="" class="form-control" />
                                    </div>
                                  </div>

                                  <div class="form-group">
                                  <label for="password" class="col-lg-2">Password</label>
                                    <div class="col-sm-4">
                                      <input type="password" name="password" required="" class="form-control" />
                                    </div>
                                  </div>

                                  <div class="form-group">
                                  <label for="nama" class="col-lg-2">Nama</label>
                                    <div class="col-sm-4">
                                      <input type="text" name="nama" required="" class="form-control" />
                                    </div>
                                  </div>

                                  <div class="form-group">
                                  <label for="alamat" class="col-lg-2">Alamat</label>
                                    <div class="col-sm-4">
                                      <textarea class="form-control" rows="3" name="alamat" required="" class="form-control" /></textarea>
                                    </div>
                                  </div>

                                  <div class="form-group">
                                  <label for="usia" class="col-lg-2">Usia</label>
                                    <div class="col-sm-4">
                                      <input type="number" placeholder="1" step="1" min="1" max="100" name="usia" required="" class="form-control" />
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="gender" class="col-lg-2">Gender</label>
                                      <div class="col-sm-4">
                                        <select name="gender" id="" required="" class="form-control">
                                        <option >--Pilih Gender--</option>
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                        </select>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="gender" class="col-lg-2">Level</label>
                                      <div class="col-sm-4">
                                        <select name="level" id="" required="" class="form-control">
                                        <option >--Pilih Level--</option>
                                        <option value="admin">Admin</option>
                                        <option value="user">User</option>
                                        </select>
                                      </div>
                                  </div>

                                  </br>
                                  
                                  <div  class="col-xs-6 col-xs-offset-5">
                                      <button type="submit" class="btn btn-info">Simpan</button>
                                      <button type="reset" class="btn btn-info">Reset</button>
                                  </div>
                              </form>
                              </center>
                              </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->