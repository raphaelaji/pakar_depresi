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
                            <li class="breadcrumb-item active">Edit Kategori</li>
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
                                
                                <?php foreach($data_kategori as $list) { ?>

                              <form class="form-horizontal form-material" method="post" action="<?php echo base_url() ?>back/kategori/edit_aksi">

                                <div class="form-group">
                                  <label for="id_kategori" class="col-lg-2">ID Kategori</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="id_kategori" required="" value="<?php echo $list['id_kategori']; ?>" readonly="readonly" class="form-control" />
                                    </div>
                                </div>

                                <div class="form-group">
                                  <label for="id_faktor" class="col-lg-2">Faktor</label>
                                    <div class="col-sm-4">
                                      <select name="id_faktor" id="" class="form-control">
                                      <option >--Pilih Faktor--</option>
                                      <?php foreach($faktor as $f) { ?>
                                      <option value="<?php echo $f['id_faktor']?>"<?php if($list['id_faktor'] == ($f['id_faktor'])){ echo 'selected'; } ?>><?php echo $f['faktor']?></option>
                                      <?php } ?>
                                      </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                  <label for="kategori" class="col-lg-2">Kategori</label>
                                    <div class="col-sm-4">
                                      <textarea class="form-control" rows="2" name="kategori" class="form-control" /><?php echo $list['kategori']; ?></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                  <label for="bobot" class="col-lg-2">Bobot</label>
                                    <div class="col-sm-4">
                                      <input type="number" placeholder="1.00" step="0.01" min="0" max="1" name="bobot_kat" class="form-control" value="<?php echo $list['bobot_kat']; ?>"  />
                                    </div>
                                </div>

                               <?php } ?>
                                
                                 
                                <button type="submit" class="btn btn-info">Submit</button>
                                <a href="<?php echo base_url(); ?>back/kategori" label class="btn btn-info">Kembali</a>
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