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
                            <li class="breadcrumb-item active">Semua Data user</li>
                        </ol>
                    </div>
                    <div class="container text-right">
                    <a href="<?php echo base_url(); ?>back/user/tambah" label class="btn btn-success waves-effect waves-light m-r-10">Tambah</a>
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
                                    <table class="table" width="100%">
                                        <thead>
                                        <tr>
                                          <th width="2%" scope="col">No</th>
                                          <th width="3%" scope="col">Username</th>
                                          <th width="1%" scope="col">Password</th>
                                          <th width="1%" scope="col">Nama</th>
                                          <th width="5%" scope="col">Alamat</th>
                                          <th width="1%" scope="col">Usia</th>
                                          <th width="1%" scope="col">Gender</th>
                                          <th width="1%" scope="col">Level</th>
                                          <th width="1%" scope="col">Aksi</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr class="odd gradeX">
                                          <?php
                                          $no=1;
                                          foreach($data_user as $list) { ?>
                                        <tr>
                                          <td><?php echo $no++; ?></td>
                                          <td><?php echo $list['username']; ?></td>
                                          <td><?php echo $list['password']; ?></td>
                                          <td><?php echo $list['nama']; ?></td>
                                          <td><?php echo $list['alamat']; ?></td>
                                          <td><?php echo $list['usia']; ?></td>
                                          <td><?php echo $list['gender']; ?></td>
                                          <td><?php echo $list['level']; ?></td>
                                          <td>
                                        
                                          <a href="<?php echo base_url() ?>back/user/edit/<?php echo $list['id_user'] ?>"> <label class="btn btn-info" >EDIT</a> &nbsp 
                                          <?php
                                    //$level=$this->session->userdata('level');
                                    // if($level == 1){?>
                                          <a href="<?php echo base_url() ?>back/user/delete/<?php echo $list['id_user'] ?>"onclick="return confirm ('Apakah Anda yakin akan menghapus data ini ?')"><label class="btn btn-danger" >DELETE</a><?php } ?></td></label></a></label></a></td></tr>
                                      </tr>

                                      <?php echo $this->session->flashdata('pesan'); ?>
                                          
                                        </tr>
                                       
                                      </tbody>
                                    </table>
                                    
                                    
                                    
                                    
                                    
                                    
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    
                <?php echo $halaman ?> <!--Memanggil variable pagination-->
                </div>
                
                
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->