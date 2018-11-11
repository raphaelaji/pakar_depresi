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
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Data Aturan pakar</a></li>
                            <li class="breadcrumb-item active">Edit Aturan Pakar</li>
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
                                
                                <?php foreach($data_pakar as $list) { ?>

                              <form class="form-horizontal form-material" method="post" action="<?php echo base_url() ?>back/pakar/edit_aksi">

                                <div class="form-group">
                                  <label for="id_pakar" class="col-lg-2">ID pakar</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="id_pakar" required="" value="<?php echo $list['id_pakar']; ?>" readonly="readonly" class="form-control" />
                                    </div>
                                </div>

                                <div class="form-group">
                                  <label for="id_faktor" class="col-lg-2">Faktor</label>
                                    <div class="col-sm-4">
                                      <select name="id_faktor" id="" class="form-control">
                                      <option >--Pilih Soal--</option>
                                      <?php foreach($faktor as $fak) { ?>
                                      <option value="<?php echo $fak['id_faktor']?>"<?php if($list['id_faktor'] == ($fak['id_faktor'])){ echo 'selected'; } ?>><?php echo $fak['faktor']?></option>
                                      <?php } ?>
                                      </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                  <label for="" class="col-lg-2">Kategori</label>
                                    <div class="col-sm-4">
                                      <select name="id_kategori" id="" class="form-control">
                                      <option >--Pilih Kategori--</option>
                                      <?php foreach($kategori as $kat) { ?>
                                      <option value="<?php echo $kat['id_kategori']?>"<?php if($list['id_kategori'] == ($kat['id_kategori'])){ echo 'selected'; } ?>><?php echo $kat['id_kategori']?> - <?php echo $kat['kategori']?></option>
                                      <?php } ?>
                                      </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                  
                                    <div class="col-sm-4">
                                      <input type="hidden" placeholder="1.00" step="0.01" min="0" max="1" name="bobot_kat" class="form-control" value="<?php echo $list['bobot_kat']; ?>"  />
                                    </div>
                                </div>


                                <div class="form-group">
                                  <label for="" class="col-lg-2">Gejala</label>
                                    <div class="col-sm-4">
                                      <select name="id_gejala" id="" class="form-control">
                                      <option >--Pilih Gejala--</option>
                                      <?php foreach($gejala as $gej) { ?>
                                      <option value="<?php echo $gej['id_gejala']?>"<?php if($list['id_gejala'] == ($gej['id_gejala'])){ echo 'selected'; } ?>><?php echo $gej['id_gejala']?> - <?php echo $gej['gejala']?></option>
                                      <?php } ?>
                                      </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                  
                                    <div class="col-sm-4">
                                      <input type="hidden" placeholder="1.00" step="0.01" min="0" max="1" name="bobot_gj" class="form-control" value="<?php echo $list['bobot_gj']; ?>"  />
                                    </div>
                                </div>

                               <?php } ?>
                                
                                 
                                <button type="submit" class="btn btn-info">Submit</button>
                                <a href="<?php echo base_url(); ?>back/pakar" label class="btn btn-info">Kembali</a>
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