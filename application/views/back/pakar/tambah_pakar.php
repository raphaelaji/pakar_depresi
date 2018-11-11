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
                            <li class="breadcrumb-item active">Tambah Aturan pakar</li>
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

                                <form class="form-horizontal form-material" action="<?php echo base_url(). 'back/pakar/tambah_aksi'; ?>" method="POST">

                                <div class="form-group">
                                  <label for="faktor" class="col-lg-2">Faktor</label>
                                    <div class="col-sm-4">
                                       <select name="id_faktor" id="faktor" class="form-control">
                                      <option >--Pilih Faktor--</option>
                                      <?php foreach($faktor as $id_faktor) { ?>
                                      <option value="<?php echo $id_faktor['id_faktor']?>"><?php echo $id_faktor['faktor']?></option>
                                      <?php } ?>
                                      </select>
                                    </div>
                                  </div>

                                  <div class="form-group">
                                  <label for="kategori" class="col-lg-2">Kategori</label>
                                    <div class="col-sm-4">
                                       <select name="id_kategori" id="kategori" class="form-control" disabled="">
                                      <option >--Pilih Kategori--</option>
                                      </select>
                                    </div>
                                  </div>

                                  <div class="form-group">
                                  
                                    <div class="col-sm-4">
                                      <input type="hidden" placeholder="1.00" step="0.01" min="0" max="1" name="bobot_kat" class="form-control" />
                                    </div>
                                  </div>

                                  <div class="form-group">
                                  <label for="id_kategori" class="col-lg-2">Gejala</label>
                                    <div class="col-sm-4">
                                      <select name="id_gejala" id="gejala" class="form-control" disabled="">
                                      <option >--Pilih Gejala--</option>
                                      </select>
                                    </div>
                                  </div>

                                  <div class="form-group">
                                  
                                    <div class="col-sm-4">
                                      <input type="hidden" placeholder="1.00" step="0.01" min="0" max="1" name="bobot_gj" class="form-control" />
                                    </div>
                                  </div>

                                  </br>
                                  
                                  <div  class="col-xs-6 col-xs-offset-5">
                                      <button type="submit" class="btn btn-info">Simpan</button>
                                      <button type="reset" class="btn btn-info">Reset</button>
                                  </div>
                              </form>
                              </center>
                              </div>
                        </div>
                    </div>
                </div>
                <script src="<?php echo base_url('asset/back/material-lite/assets/plugins/jquery/jquery.min.js')?>"></script>
                <script src="<?php echo base_url('asset/back/material-lite/lite/tuupola-jquery_chained-44a7f83/jquery.chained.min.js') ?>"></script>
                
                <script types="text/javascript">
                 $(document).ready(function(){
                    $('#faktor').on('change', function(){
                      var id_faktor = $(this).val();
                      if(id_faktor == '')
                      {
                        $('#kategori').prop('disabled', true);
                      }
                      else
                      {
                        $('#kategori').prop('disabled', false);
                        $.ajax({
                          url: "<?php echo base_url().  'back/pakar/get_kategori';?>",
                          type: "POST",
                          data: {'id_faktor' : id_faktor},
                          dataType: 'json',
                          success: function(data){
                            $('#kategori').html(data);
                          },
                          error: function(){
                            alert('Error Bos!!');
                          }
                        });
                      }
                    });

                    $('#kategori').on('change', function(){
                      var id_kategori = $(this).val();
                      if(id_kategori == '')
                      {
                        $('#gejala').prop('disabled', true);
                      }
                      else
                      {
                        $('#gejala').prop('disabled', false);
                        $.ajax({
                          url: "<?php echo base_url().  'back/pakar/get_gejala';?>",
                          type: "POST",
                          data: {'id_kategori' : id_kategori},
                          dataType: 'json',
                          success: function(data){
                            $('#gejala').html(data);
                          },
                          error: function(){
                            alert('Error Bos!!');
                          }
                        });
                      }
                    });
                 });
                </script>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->