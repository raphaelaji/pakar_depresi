<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<script src="<?php echo base_url(); ?>asset/back/js/jquery-2.2.3.min.js"></script>
<script type="text/javascript">
$(document).on('click', '#tess',function(e){
		alert();
});
</script>
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
						<a href="#cat" id="tess" class="d-flex justify-content-between align-items-start py-2 px-3 text-dark" cat_id ="" user_id="">
								<span>tess</span>
								<span class="badge badge-danger"></span>
							</a>
						<form class="form-material" action="<?php echo base_url(). 'back/kategori/tambah_aksi'; ?>" method="POST">
							<table width="70%" border="0" cellspacing="0" cellpadding="0" class="table table-striped">
								<?php $no=1;
								foreach($pertanyaan as $pr) {?>
								<div class="form-group">
									<label for="" class="col-lg-6">
										<input type="hidden" name="id_kategori<?php echo $pr['id_kategori']; ?>" id="id_kategori<?php echo $pr['id_kategori']; ?>" class="form-control" value="<?php echo $pr['id_kategori']; ?>" />
										<?php echo $no++; ?>.&nbsp <?php echo $pr['kategori'];?>
										
									</label>
									<?php
									$kategori = $pr['id_kategori'];//print_r($kategori);exit;
									$list_gejala=$this->M_gejala->get_gejalaByCat($kategori);
									foreach ($list_gejala as $key => $value) { ?>
									<div class="custom-radio">
										<input type="radio" class="custom-control-input" id="<?php echo $value['id_gejala'];?>" name="<?php echo $value['id_kategori']; ?>" value="<?php echo $value['id_gejala'];?>">
										<label class="custom-control-label" for="<?php echo $value['id_gejala'];?>"><?php echo $value['gejala']; ?></label>
									</div>
									<?php } ?>
									
								</div>
								<!-- Group of default radios - option 1 -->
								
								<?php }?>
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