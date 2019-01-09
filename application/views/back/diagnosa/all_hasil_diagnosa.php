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
                        <h3 class="text-themecolor">Diagnosa</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Data Diagnosa</a></li>
                        </ol>
                    </div>
                    <div class="container text-right">
                    <!-- <a href="<?php echo base_url(); ?>back/gejala/tambah" label class="btn btn-success waves-effect waves-light m-r-10">Tambah</a> -->
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
                                          <th width="2%" scope="col">Nama</th>
                                          <th width="10%" scope="col">Alamat</th>
                                          <th width="1%" scope="col">Usia</th>
                                          <th width="10%" scope="col">Tanggal periksa</th>
                                          <th width="10%" scope="col">Hasil</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr class="odd gradeX">
                                          <?php
                                          $no = $offset;
                                          foreach($diagnosa as $key => $list) { ?>
                                        <tr>
                                          <td><?php echo ++$no; ?></td>
                                          <td><?php echo $list['nama']; ?></td>
                                          <td><?php echo $list['alamat']; ?></td>
                                          <td><?php echo $list['usia']; ?></td>
                                          <td><?php echo $list['creation_date']; ?></td>
                                          <td>
                                              <a href="" class="modal-title" data-target="#myModal<?php echo $key; ?>" data-toggle="modal"><?php echo $list['nama_klasifikasi']; ?></a></td>
                                               <div class="modal fade" id="myModal<?php echo $key; ?>" role="dialog">
                                        <div class="modal-dialog">
                          
                                          <!-- Modal content-->
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                              <h4 align="center" class="modal-title"> <font color="blue"><b>Detail diagnosa</b></font></h4>
                                            </div>
                                            <div class="modal-body">
                                              <div class="" style="background-color:#ffffb3;">
                                              Nama : <b><?php echo $list['nama']; ?></b><br>
                                              Alamat : <?php echo $list['alamat']; ?><br>
                                              Usia : <?php echo $list['usia']; ?><br>
                                              Gender : <?php echo $list['gender']; ?><br>
                                            </div>
                                              <div align="center">
                                                <font color="green">tanggal pemeriksaan : <?php echo $list['creation_date'];?></font>
                                              </div>
                                              <div align="center">
                                                <font color="orange"><b>Gejala inputan</b></font></br>
                                              </div>
                                                  <ol>
                                                  <?php 
                                                  $id_pemeriksaan = $list['id_pemeriksaan'];
                                                  $gejala= $this->M_pemeriksaan->get_gejaladiagnosa($id_pemeriksaan); 
                                                  foreach ($gejala as $key => $value) { 
                                                    echo '<li>';
                                                    echo $value['gejala'];
                                                    echo '</li>';
                                                   } ?>
                                                </ol>
                                              <div align="center"><h3>Hasil Diagnosa</h3></div>
                                              <?php if ($list['id_klass_dep'] == 1){ ?>
                                                <p class="p-3 mb-2 bg-success text-white" align="center"><?php echo $list['nama_klasifikasi'];?></p>
                                              <?php
                                              }
                                            else if ($list['id_klass_dep'] == 2){ ?>
                                              <p class="p-3 mb-2 bg-info text-white" align="center"><?php echo $list['nama_klasifikasi'];?></p>
                                            <?php }
                                            else if ($list['id_klass_dep'] == 3){ ?>
                                              <p class="p-3 mb-2 bg-warning text-dark" align="center"><?php echo $list['nama_klasifikasi'];?></p>
                                            <?php }
                                            else if ($list['id_klass_dep'] == 4){?>
                                              <p class="p-3 mb-2 bg-danger text-white" align="center"><?php echo $list['nama_klasifikasi'];?></p>
                                            <?php } ?>
                                            </div>
                                          
                                            </div>
                                          </div>
                                        </div>
                                          </tr>
                                          <?php } ?>
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