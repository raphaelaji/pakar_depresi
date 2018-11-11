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
                            <li class="breadcrumb-item active">Profile User</li>
                        </ol>
                    </div>
                    <div class="container text-right">
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
                                <div class="table-responsive">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table">

                                              <?php 

                                              foreach($data_user as $list) {

                                              ?>

                                              <tr>
                                                <th>Username</th>
                                                <th>:</th>
                                                <td><?php echo $list['username']; ?></td>
                                              </tr>

                                              <tr>
                                                <th>Password</th>
                                                <th>:</th>
                                                <td><?php echo $list['password']; ?></td>
                                              </tr>

                                              <tr>
                                                <th>Nama</th>
                                                <th>:</th>
                                                <td><?php echo $list['nama']; ?></td>
                                              </tr>

                                              <tr>
                                                <th>Alamat</th>
                                                <th>:</th>
                                                <td><?php echo $list['alamat']; ?></td>
                                              </tr>

                                              <tr>
                                                <th>Usia</th>
                                                <th>:</th>
                                                <td><?php echo $list['usia']; ?></td>
                                              </tr>

                                              <tr>
                                                <th>Gender</th>
                                                <th>:</th>
                                                <td><?php echo $list['gender']; ?></td>
                                              </tr>

                                              <tr>
                                                <th>Level</th>
                                                <th>:</th>
                                                <td><?php echo $list['level']; ?></td>
                                              </tr>
                                    </table>
                                    <br/>

                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Edit Profile</button>

                                      <div class="modal fade" id="myModal" role="dialog">
                                        <div class="modal-dialog">
                          
                                          <!-- Modal content-->
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                              <h4 align="center" class="modal-title">Edit Profile</h4>
                                            </div>
                                            <div class="modal-body">
                                              <?php echo $this->session->flashdata('pesan'); ?>

                                               <form action="<?php echo base_url('back/user/edit_profile'); ?>" method="POST">

                                                    <div class="form-group">
                                                      <input type="hidden" name="id_user" value="<?php echo $list['id_user']; ?>" readonly="readonly" class="form-control" />
                                                    </div>

                                                    <div class="form-group">
                                                      <label for="username">Username</label>
                                                      <input type="text" name="username" required="" value="<?php echo $list['username']; ?>" class="form-control" />
                                                    </div>

                                                    <div class="form-group">
                                                      <label for="password">Password</label>
                                                      <input type="password" name="password" required="" value="<?php echo $list['password']; ?>" readonly="readonly" class="form-control" />
                                                    </div>

                                                    <div class="form-group">
                                                      <input type="hidden" class="form-control" name="level" value="<?php echo $list['level']; ?>">
                                                    </div>

                                                    <div class="form-group">
                                                      <label for="username">Nama</label>
                                                      <input type="text" name="nama" required="" value="<?php echo $list['nama']; ?>" class="form-control" />
                                                    </div>

                                                    <div class="form-group">
                                                      <label for="password">Gender</label>
                                                      <select name="gender" id="gender" class="form-control">
                                                          <option>--Pilih Gender--</option>
                                                          <option value="<?php echo $list['gender']?>"<?php if($list['gender'] == 'L'){ echo 'selected'; } ?>>Laki - laki</option>
                                                          <option value="<?php echo $list['gender']?>"<?php if($list['gender'] == 'P'){ echo 'selected'; } ?>>Perempuan</option>
                                                      </select>
                                                    </div>

                                                    <div class="form-group">
                                                      <label for="username">Usia</label>
                                                      <input type="number" placeholder="1.00" step="1.00" min="1" max="100" name="usia" class="form-control" value="<?php echo $list['usia']; ?>"  />
                                                    </div>

                                                    <div class="form-group">
                                                      <label for="username">Alamat</label>
                                                      <textarea class="form-control" rows="4" name="alamat" class="form-control" /><?php echo $list['alamat']; ?></textarea>
                                                    </div>

                                            </div>
                                            <div class="modal-footer">
                                              <button type="submit" class="btn btn-info">Simpan</button>
                                              <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                                            </div>
                                            </form>
                                          </div>
                                          
                                        </div>
                                      </div>

                                      <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal2">Ubah Password</button>

                                      <div class="modal fade" id="myModal2" role="dialog">
                                        <div class="modal-dialog">
                          
                                          <!-- Modal content-->
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                              <h4 align="center" class="modal-title">Ubah Password</h4>
                                            </div>
                                            <div class="modal-body">
                                              <?php echo $this->session->flashdata('pesan'); ?>

                                               <form action="<?php echo base_url('back/user/edit_pass'); ?>" method="POST">

                                                    <div class="form-group">
                                                      <input type="hidden" name="id_user" value="<?php echo $list['id_user']; ?>" readonly="readonly" class="form-control" />
                                                    </div>

                                                    <div class="form-group">
                                                      
                                                      <input type="hidden" name="username" required="" value="<?php echo $list['username']; ?>" class="form-control" />
                                                    </div>

                                                    <div class="form-group">
                                                      <label for="password">Password</label>
                                                      <input type="password" name="password" required="" value="<?php echo $list['password']; ?>" class="form-control" />
                                                    </div>

                                                    <div class="form-group">
                                                      <input type="hidden" class="form-control" name="level" value="<?php echo $list['level']; ?>">
                                                    </div>

                                                    <div class="form-group">
                                                      
                                                      <input type="hidden" name="nama" value="<?php echo $list['nama']; ?>" class="form-control" />
                                                    </div>

                                                    <div class="form-group">
                                                      
                                                      <input type="hidden" name="gender"  value="<?php echo $list['gender']; ?>" class="form-control" />
                                                    </div>

                                                    <div class="form-group">
                                                      
                                                      <input type="hidden" name="usia"  value="<?php echo $list['usia']; ?>" class="form-control" />
                                                    </div>

                                                    <div class="form-group">
                                                     
                                                      <input type="hidden" name="alamat"  value="<?php echo $list['alamat']; ?>" class="form-control" />
                                                    </div>

                                            </div>
                                            <div class="modal-footer">
                                              <button type="submit" class="btn btn-info">Simpan</button>
                                              <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                                            </div>
                                            </form>
                                          </div>
                                          
                                        </div>
                                      </div>
                                    
                                    <?php } ?>
                                    
                                    
                                    
                                    
                                </div>
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