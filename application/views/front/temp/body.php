<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
  <!--banner-->
  <section id="banner" class="banner">
    <div class="bg-color">
      <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
          <div class="col-md-12">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="myNavbar">
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>
              <a class="navbar-brand" href="#"><img src="asset/front/Medilab/img/logo.png" class="img-responsive" style="width: 140px; margin-top: -16px;"></a>
            </div>
            <div class="collapse navbar-collapse navbar-right" id="myNavbar">
              <ul class="nav navbar-nav">
                <li class="active"><a href="#banner">Home</a></li>
                <li class=""><a href="#login">Login</a></li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
      <div class="container">
        <div class="row">
          <div class="banner-info">
            <div class="banner-logo text-center">
              <img src="asset/front/Medilab/img/logo.png" class="img-responsive">
            </div>
            <div class="banner-text text-center">
              <h1 class="white">Healthcare at your desk!!</h1>
              <h3 class="white">Sistem Pakar Untuk Mendeteksi Tingkat Depresi Seseorang Dengan Metode Fuzzy Tsukamoto</h3>
            </div>
            <div class="overlay-detail text-center">   
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ banner-->
  <!--service-->
  <section id="login" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-4">
          <h2 class="ser-title">Login</h2>
          <hr class="botm-line">
          <p>Silahkan login untuk masuk ke dalam sistem, jika anda belum memiliki account silahkan registrasi terlebih dahulu.</p>
        </div>
        <div class="col-md-4 col-sm-4">
          <div class="service-info">
            
            <div class="icon-info">
            <h4>Form Login</h4>
              <?php echo $this->session->flashdata('pesan'); ?>

              <form action="<?php echo site_url('home/cek_login'); ?>" method="POST">
              <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Enter Username">
              </div>

              <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Enter Password">
              </div>

                <button type="submit" class="btn btn-info btn-md btn-block" value="Login">Submit</button><hr>
            </form>
            </div>
          </div>
          
        </div>
        <div class="col-md-4 col-sm-4">
          <div class="service-info">
            <div class="icon">
              
            </div>
            <div class="icon-info">
              <h4>Registrasi</h4>
              <p>Jika anda belum memiliki account silahkan registrasi disini.</p>
              <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal">Register</button>

                <div class="modal fade" id="myModal" role="dialog">
                  <div class="modal-dialog">
    
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 align="center" class="modal-title">Form Registrasi</h4>
                      </div>
                      <div class="modal-body">
                        <?php echo $this->session->flashdata('pesan'); ?>

                         <form action="<?php echo site_url('home/proses_regis'); ?>" method="POST">

                              <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username">
                              </div>

                              <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password">
                              </div>

                              <div class="form-group">
                                <input type="hidden" class="form-control" name="level" value="user">
                              </div>

                              <div class="form-group">
                                <label for="username">Nama</label>
                                <input type="text" class="form-control" name="nama">
                              </div>

                              <div class="form-group">
                                <label for="password">Gender</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option>--Pilih Gender--</option>
                                    <option value="L">Laki-Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                              </div>

                              <div class="form-group">
                                <label for="username">Usia</label>
                                <input type="number" class="form-control" name="usia">
                              </div>

                              <div class="form-group">
                                <label for="username">Alamat</label>
                                <textarea class="form-control" rows="4" name="alamat" class="form-control" /></textarea>
                              </div>

                        

                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      </div>
                      </form>
                    </div>
                    
                  </div>
                </div>

            </div>
          </div>
          
        </div>
      </div>
    </div>
  </section>
  <!--/ service-->
  <!--cta-->
  
  <!--cta-->
  <!--about-->
  
  <!--/ about-->
  <!--doctor team-->
  <!--/ doctor team-->
  <!--testimonial-->
  <!--/ testimonial-->
  <!--cta 2-->
  <!--cta-->
  <!--contact-->
  
  <!--/ contact-->