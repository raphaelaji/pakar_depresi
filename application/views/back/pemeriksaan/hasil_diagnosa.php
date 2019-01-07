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
				<h3 class="text-themecolor">Hasil Diagnosa</h3>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="javascript:void(0)">Data diagnosa</a></li>
					<!-- <li class="breadcrumb-item active">Semua Data Pemeriksaan</li> -->
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
						<div class="table-responsive">
                                    <table class="table" width="100%">
                                    
                                        <thead>
                                        <tr class="p-3 mb-2 bg-primary text-white">
                                          <th>Nama</th>
                                          <th>Alamat</th>
                                          <th>Usia</th>
                                          <th>Gender</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                          
                                        <tr class="odd gradeX">
                                          <?php
                                          
                                          foreach($diagnosa as $list) { 
                                          	$id_pemeriksaan = $list['id_pemeriksaan'];?>

                                        <tr>
                                          
                                          <td><?php echo $list['nama']; ?></td>
                                          <td><?php echo $list['alamat']; ?></td>
                                          <td><?php echo $list['usia']; ?></td>
                                          <td><?php echo $list['gender']; ?></td>
                                      </tr>
                                      <!-- <tr>
                                      	<td><?php echo $list['creation_date'];?></td>
                                      </tr>
                                      <tr>
                                      	<?php if ($list['id_klass_dep'] == 1){ ?>
											<td bgcolor="green"><?php echo $list['nama_klasifikasi'];?></td>
										<?php
                                      	}
                                      else if ($list['id_klass_dep'] == 2){ ?>
                                      		<td bgcolor="yellow"><?php echo $list['nama_klasifikasi'];?></td>
                                      <?php	}
                                      else if ($list['id_klass_dep'] == 3){ ?>
                                      		<td bgcolor="pink"><?php echo $list['nama_klasifikasi'];?></td>
                                      <?php	}
                                      else if ($list['id_klass_dep'] == 4){?>
                                      		<td bgcolor="red"><?php echo $list['nama_klasifikasi'];?></td>
                                      	<?php } ?>
                                      	
                                      </tr> -->
                                      <?php } ?>

                                      <?php echo $this->session->flashdata('pesan'); ?>
                                          
                                        </tr>
                                       
                                      </tbody>
                                      
                                    </table>
                                <div align="center">
                                <table class="" width="30%">
                                    
                                        <thead>
                                        <?php
                                          
                                          foreach($diagnosa as $list) { ?>
                                        <tr>
                                        	<th align="center"><font color="green">Tanggal Pemeriksaan : <?php echo $list['creation_date'];?> </font></th>
                                        </tr>
                                        <?php } ?>
                                        <!-- <tr>
                                        	<th> Diagnosa </th>
                                        </tr> -->
                                      </thead>
                                      
                                        </tr>
                                       
                                      </tbody>
                                      
                                    </table>
                                </div>
                                <font color="orange"><b>Gejala inputan</b></font></br>
                                <ol>
                                <?php $gejala= $this->M_pemeriksaan->get_gejaladiagnosa($id_pemeriksaan); 
                                foreach ($gejala as $key => $value) { 
                                	echo '<li>';
                                 	echo $value['gejala'];
                                 	echo '</li>';
                                 } ?>
                             	</ol>
                             	</br>
                                <table class="" width="100%">
                                    
                                        <thead>
                                        <?php
                                          
                                          foreach($diagnosa as $list) { ?>
                                        <tr>
                                        	<th align="center">Hasil Diagnosa</th>
                                        	
                                        </tr>
                                        <?php } ?>
                                        <!-- <tr>
                                        	<th> Diagnosa </th>
                                        </tr> -->
                                      </thead>
                                      
                                     <tr>
                                      	<?php if ($list['id_klass_dep'] == 1){ ?>
											<td><p class="p-3 mb-2 bg-success text-white"><?php echo $list['nama_klasifikasi'];?></p></td>
										<?php
                                      	}
                                      else if ($list['id_klass_dep'] == 2){ ?>
                                      		<td><p class="p-3 mb-2 bg-info text-white"><?php echo $list['nama_klasifikasi'];?></p></td>
                                      <?php	}
                                      else if ($list['id_klass_dep'] == 3){ ?>
                                      		<td><p class="p-3 mb-2 bg-warning text-dark"><?php echo $list['nama_klasifikasi'];?></p></td>
                                      <?php	}
                                      else if ($list['id_klass_dep'] == 4){?>
                                      		<td><p class="p-3 mb-2 bg-danger text-white"><?php echo $list['nama_klasifikasi'];?></p></td>
                                      	<?php } ?>
                                      	
                                      	
                                      </tr> 
                                   

                                      
                                          
                                        </tr>
                                       
                                      </tbody>
                                      
                                    </table>

                                    
                                    
                                    
                                    
                                    
                                    
                                </div>
                            </div>
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
	<!-- ==============================================================