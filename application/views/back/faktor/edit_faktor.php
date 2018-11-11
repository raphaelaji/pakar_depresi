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
                            <li class="breadcrumb-item active">Edit faktor</li>
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
                                
                                <?php foreach($data_faktor as $list) { ?>

                              <form class="form-horizontal form-material" method="post" action="<?php echo base_url() ?>back/faktor/edit_aksi">

                                <div class="form-group">
                                  <label for="id_faktor" class="col-lg-2">ID faktor</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="id_faktor" required="" value="<?php echo $list['id_faktor']; ?>" readonly="readonly" class="form-control" />
                                    </div>
                                </div>

                                <div class="form-group">
                                  <label for="id_faktor" class="col-lg-2">Faktor</label>
                                    <div class="col-sm-4">
                                      <input type="text" name="faktor" required="" class="form-control" value="<?php echo $list['faktor']; ?>"/>
                                    </div>
                                </div>

                               <?php } ?>
                                
                                 
                                <button type="submit" class="btn btn-info">Submit</button>
                                <a href="<?php echo base_url(); ?>back/faktor" label class="btn btn-info">Kembali</a>
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