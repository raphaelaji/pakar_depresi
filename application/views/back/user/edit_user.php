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
                            <li class="breadcrumb-item active">Edit user</li>
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

                                <?php foreach($data_user as $list) { ?>

                                <form class="form-horizontal form-material" action="<?php echo base_url(). 'back/user/edit_aksi'; ?>" method="POST">

                                  <div class="form-group">
                                      <label for="id_user" class="col-lg-2">ID user</label>
                                      <div class="col-sm-4">
                                          <input type="text" name="id_user" required="" value="<?php echo $list['id_user']; ?>" readonly="readonly" class="form-control" />
                                      </div>
                                  </div>

                                  <div class="form-group">
                                  <label for="id_user" class="col-lg-2">Username</label>
                                    <div class="col-sm-4">
                                      <input type="text" name="username" required="" class="form-control" value="<?php echo $list['username']; ?>" />
                                    </div>
                                  </div>

                                  <div class="form-group">
                                  <label for="bobot" class="col-lg-2">Password</label>
                                    <div class="col-sm-4">
                                      <input type="password" name="password" required="" class="form-control" value="<?php echo $list['password']; ?>" readonly="readonly" />
                                    </div>
                                  </div>

                                  <div class="form-group">
                                  <label for="bobot" class="col-lg-2">Nama</label>
                                    <div class="col-sm-4">
                                      <input type="text" name="nama" required="" class="form-control" value="<?php echo $list['nama']; ?>" />
                                    </div>
                                  </div>

                                  <div class="form-group">
                                  <label for="bobot" class="col-lg-2">Alamat</label>
                                    <div class="col-sm-4">
                                      <textarea class="form-control" rows="3" name="alamat" class="form-control" /><?php echo $list['alamat']; ?></textarea>
                                    </div>
                                  </div>

                                  <div class="form-group">
                                  <label for="bobot" class="col-lg-2">Usia</label>
                                    <div class="col-sm-4">
                                      <input type="number" placeholder="1" step="1" min="1" max="100" name="usia" class="form-control" value="<?php echo $list['usia']; ?>" />
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="gender" class="col-lg-2">Gender</label>
                                      <div class="col-sm-4">
                                        <select name="gender" id="" class="form-control">
                                        <option >--Pilih Gender--</option>
                                        <option value="L"<?php if($list['gender'] == 'L'){ echo 'selected'; } ?>>Laki-laki</option>
                                        <option value="P"<?php if($list['gender'] == 'P'){ echo 'selected'; } ?>>Perempuan</option>
                                        </select>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="level" class="col-lg-2">Level</label>
                                      <div class="col-sm-4">
                                        <select name="level" id="" class="form-control">
                                        <option >--Pilih Level--</option>
                                        <option value="admin"<?php if($list['level'] == 'admin'){ echo 'selected'; } ?>>Admin</option>
                                        <option value="user"<?php if($list['level'] == 'user'){ echo 'selected'; } ?>>User</option>
                                        </select>
                                      </div>
                                  </div>

                                 <?php } ?>
                                  
                                  <div  class="col-xs-6 col-xs-offset-5">
                                      <button type="submit" class="btn btn-info">Simpan</button>
                                      <a href="<?php echo base_url(); ?>back/user" label class="btn btn-info">Kembali</a>
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