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
                        <h3 class="text-themecolor">Faktor</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Data faktor</a></li>
                            <li class="breadcrumb-item active">Semua Data faktor</li>
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
                                    <table class="table">
                                        <thead>
                                        <tr>
                                          <th >ID Faktor</th>
                                          <th >Faktor</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr class="odd gradeX">
                                          <?php $id_faktor = $offset;
                                          foreach($data_faktor as $list) { ?>
                                        <tr>
                                          
                                          <td><?php echo $list['id_faktor']; ?></td>
                                          <td><?php echo $list['faktor']; ?></td>
                                          <td>
                                        
                                          <?php } ?></td></label></a></label></a></td></tr>
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