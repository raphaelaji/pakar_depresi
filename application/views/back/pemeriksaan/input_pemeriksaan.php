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
                        <h3 class="text-themecolor">Pemeriksaan</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Data Pemeriksaan</a></li>
                            <li class="breadcrumb-item active">Semua Data Pemeriksaan</li>
                        </ol>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-block">
                                    
                                  <form class="form-material" action="<?php echo base_url(). 'back/kategori/tambah_aksi'; ?>" method="POST">

                                  <table width="70%" border="0" cellspacing="0" cellpadding="0" class="table table-striped">

                                  <?php $no=1; 
                                  foreach($pertanyaan as $pr) { ?>

                                  <div class="form-group">
                                      <label for="" class="col-lg-6"><?php echo $no++; ?>.&nbsp <?php echo $pr['kategori'];?></label>
                                        
                                      <div class=" custom-radio">
                                          <input type="radio" class="custom-control-input" id="<?php echo $pr['id_gejala'];?>" name="<?php echo $pr['gejala'];?>" value="<?php echo $pr['bobot_gj'];?>">
                                          <label class="custom-control-label" for="<?php echo $pr['gejala'];?>"><?php echo $pr['gejala']; ?></label>
                                        </div>

                                        <!-- Group of default radios - option 2 -->
                                        <div class=" custom-radio">
                                          <input type="radio" class="custom-control-input" id="<?php echo $pr['gejala'];?>" name="<?php echo $pr['gejala'];?>" value="<?php echo $pr['bobot_gj'];?>">
                                          <label class="custom-control-label" for="<?php echo $pr['gejala'];?>"><?php echo $pr['gejala']; ?></label>
                                        </div>

                                        <!-- Group of default radios - option 3 -->
                                        <div class=" custom-radio">
                                          <input type="radio" class="custom-control-input" id="<?php echo $pr['gejala'];?>" name="<?php echo $pr['gejala'];?>" value="<?php echo $pr['bobot_gj'];?>">
                                          <label class="custom-control-label" for="<?php echo $pr['gejala'];?>"><?php echo $pr['gejala']; ?></label>
                                        </div>

                                        <div class=" custom-radio">
                                          <input type="radio" class="custom-control-input" id="<?php echo $pr['gejala'];?>" name="<?php echo $pr['gejala'];?>" value="<?php echo $pr['bobot_gj'];?>">
                                          <label class="custom-control-label" for="<?php echo $pr['gejala'];?>"><?php echo $pr['gejala']; ?></label>
                                        </div>

                                       

  
                                  </div>

                                      <!-- Group of default radios - option 1 -->
                                        

                                  <?php } ?>

                                  </table>
                                  </br>


                                  
                                  <div  class="col-xs-6 col-xs-offset-5">
                                      <button type="submit" class="btn btn-info">Simpan</button>
                                      <button type="reset" class="btn btn-info">Reset</button>
                                  </div>
                              </form>
                                
                            
                                    
                                    
                                    
                                    
                                
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