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
                        <h3 class="text-themecolor">Kategori</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Data Kategori</a></li>
                            <li class="breadcrumb-item active">Semua Data Kategori</li>
                        </ol>
                    </div>
                    <div class="container text-right">
                    <a href="<?php echo base_url(); ?>back/kategori/tambah" label class="btn btn-success waves-effect waves-light m-r-10">Tambah</a>
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
                                    <table class="table">
                                        <thead>
                                        <tr>
                                          <th >ID Kategori</th>
                                          <th >Faktor</th>
                                          <th >Kategori</th>
                                          <th >Bobot</th>
                                          <th >Aksi</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr class="odd gradeX">
                                          <?php $no = $offset;
                                          foreach($data_kategori as $list) { ?>
                                        <tr>
                                          <td><?php echo $list['id_kategori']; ?></td>
                                          <td><?php echo $list['faktor']; ?></td>
                                          <td><?php echo $list['kategori']; ?></td>
                                          <td><?php echo $list['bobot_kat']; ?></td>
                                          <td>
                                        
                                          <a href="<?php echo base_url() ?>back/kategori/edit/<?php echo $list['id_kategori'] ?>"> <label class="btn btn-info" >EDIT</a> &nbsp 
                                          <?php
                                    //$level=$this->session->userdata('level');
                                    // if($level == 1){?>
                                          <a href="<?php echo base_url() ?>back/kategori/delete/<?php echo $list['id_kategori'] ?>"onclick="return confirm ('Apakah Anda yakin akan menghapus data ini ?')"><label class="btn btn-danger" >DELETE</a><?php } ?></td></label></a></label></a></td></tr>
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