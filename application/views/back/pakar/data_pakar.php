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
                        <h3 class="text-themecolor">Aturan Pakar</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Data Aturan Pakar</a></li>
                            <li class="breadcrumb-item active">Semua Data Aturan Pakar</li>
                        </ol>
                    </div>
                    <div class="container text-right">
                    <a href="<?php echo base_url(); ?>back/pakar/tambah" label class="btn btn-success waves-effect waves-light m-r-10">Tambah</a>
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
                                          <th>No</th>
                                          <th>Faktor</th>
                                          <th>Kategori</th>
                                          <th>Bobot Kategori</th>
                                          <th>Gejala</th>
                                          <th>Bobot Gejala</th>
                                          <th>Aksi</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                          
                                        <tr class="odd gradeX">
                                          <?php
                                          
                                          foreach($data_pakar as $list) { ?>

                                        <tr>
                                          
                                          <td><?php echo $list['id_pakar']; ?></td>
                                          <td><?php echo $list['faktor']; ?></td>
                                          <td><?php echo $list['kategori']; ?></td>
                                          <td><?php echo $list['bobot_kat']; ?></td>
                                          <td><?php echo $list['gejala']; ?></td>
                                          <td><?php echo $list['bobot_gj']; ?></td>
                                          
                                          <td>
                                         <a href="<?php echo base_url() ?>back/pakar/edit/<?php echo $list['id_pakar'] ?>"> <label class="btn btn-info" >EDIT</a> &nbsp 
                                          
                                          <a href="<?php echo base_url() ?>back/pakar/delete/<?php echo $list['id_pakar'] ?>"onclick="return confirm ('Apakah Anda yakin akan menghapus data ini ?')"><label class="btn btn-danger" >DELETE</a></td></label></a></label></a></td></tr>

                                      </tr>
                                      <?php } ?>

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