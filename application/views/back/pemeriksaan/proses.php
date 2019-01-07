
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
				<h3 class="text-themecolor">Proses Perhitungan</h3>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="javascript:void(0)">Detail Proses</a></li>
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
						<head>
							<style type='text/css'>
								* {font-family:verdana,arial,sans-serif;font-size:10pt;}
								h1{font-size:18pt;}
								h2{font-size:14pt;line-height:16pt;}
								fieldset{margin:5px;padding:5px;background-color:#eee;}
								legend {font-weight:bold;padding:5px;background-color:#ee9;}
								.inptxt{text-align:right;}
							</style>
						</head>
							<body>
								<div id='container'>
									<h1>Metode Tsukamoto</h1>
									<fieldset style='display:none'>
									<legend>Kasus</legend>
										<!-- reserved //-->
									</fieldset>
									<form method='post'>
									<fieldset>
									  <legend>Batasan</legend>
									  <table>
										<tr><th>Variabel</th><th>Minimum</th><th>Ringan</th><th>Sedang</th><th>Maximal</th></tr>
										<?php 
										$i = 0;
										$depmin = 0;
										$depmax = 0;
										$char = 'a';
										foreach ($batas as $key => $value) { 
											$mn[$char] = $value['bts_ats'];
											$rin[$char] = $value['bts_ats']/3;
											$sed[$char] = $value['bts_ats']/2;
										?>
										<tr>
										  	<td><?php echo $value['faktor'] ?></td>
										  	<td><input type='text' class='inptxt' name="min<?php echo $i; ?>" value='<?php echo $value['bts_bwh']; ?>' disabled="disabled"/></td>
										  	<td><input type='text' class='inptxt' name="rin<?php echo $i; ?>" value='<?php echo $rin[$char]; ?>' disabled="disabled"/></td>
										  	<td><input type='text' class='inptxt' name="rin<?php echo $i; ?>" value='<?php echo $sed[$char]; ?>' disabled="disabled"/></td>
										  	<td><input type='text' class='inptxt' name="max<?php echo $i; ?>" value='<?php echo $value['bts_ats']; ?>' disabled="disabled"/></td>
										</tr>
										<?php
										$depmin = $depmin+$value['bts_bwh'];
										$depmax = $depmax+$value['bts_ats'];
										
										$char++;
										$i++;
										// print_r($mn);
										// print_r($rin);
										// print_r($sed);
										 } //print_r($rin);?>

										<!-- <tr>
										  	<td>Depresi</td>
										  	<td><input type='text' class='inptxt' name='dep_min' value='<?php echo $depmin; ?>' disabled="disabled"/></td>
										  	<td><input type='text' class='inptxt' name='dep_max' value='<?php echo $depmax; ?>' disabled="disabled"/></td>
										</tr> -->
									  </table>
									</fieldset>
									<fieldset>
										<legend>Klasifikasi Depresi</legend>
										<table>
										<tr><th>nama</th><th>Batas bawah</th><th>Batas atas</th></tr>
										<?php foreach ($classdep as $key => $value) { ?>
										<tr>
										  	<td><?php echo $value['nama'] ?></td>
										  	<td><input type='text' class='inptxt' name="min<?php echo $i; ?>" value='<?php echo $value['nilai_klasifikasi_bawah']; ?>' disabled="disabled"/></td>
										  	<td><input type='text' class='inptxt' name="max<?php echo $i; ?>" value='<?php echo $value['nilai_klasifikasi_atas']; ?>' disabled="disabled"/></td>
										</tr>
										<?php } ?>
										</table>
									</fieldset>
									<fieldset>
									  <legend>Inputan</legend>
									  <table>
									  	<?php foreach ($input as $key => $value) { ?>
									  	<tr>
										  <td><?php echo $value['faktor']; ?></td>
										  <td><input type='text' class='inptxt' name='x' value='<?php echo $value['total'];?>' disabled="disabled" /></td>
										</tr>
										<?php
									  	} ?>
										
										<!-- <tr>
										  <td>kelistrikan (y)</td>
										  <td><input type='text' class='inptxt' name='y' value='<?=$y?>' /></td>
										</tr> -->
									  </table>
									</fieldset>
									<!-- <input type='submit' name='proses' value='proses' /> -->
									</form>
									<?php
									//if(isset($_POST['proses'])){
//================================================= fuzikasi ========================================================
									?>        
									<fieldset>
									<legend>[1] Pembentukan Himpunan Fuzzy (Fuzzyfication)</legend>
									<table border='1'>
										<?php 
										$i=1;
										$char ='a';
										foreach ($batas as $key => $value) { ?>
										<?php
											$bts_ats = $value['bts_ats'];
											$bts_bwh = $value['bts_bwh'];
											$kr = $bts_ats - $bts_bwh;
											$rin = number_format($value['bts_ats']/3, 2);
											$sed = number_format($value['bts_ats']/2, 2); ?>
										  <tr>
											<th colspan='8'><?php echo $value['faktor']; ?></th>
										  </tr>
										  <tr>
											<td rowspan='3'>&micro;<sub><?php echo $value['faktor']; ?> minimal</sub>(<?php echo $char; ?>)</td>
											<td></td>
											<td rowspan='3'>&micro;<sub><?php echo $value['faktor']; ?> ringan</sub>(<?php echo $char; ?>)</td>
											<td>0 , <?php echo $char; ?> < <?php echo $value['bts_bwh'];?> atau <?php echo $char; ?>><?php echo $sed;?></td>
											<td rowspan='3'>&micro;<sub><?php echo $value['faktor']; ?> sedang</sub>(<?php echo $char; ?>)</td>
											<td>0 , <?php echo $char; ?> < <?php echo $value['bts_bwh'];?> atau <?php echo $char; ?>><?php echo $sed;?></td>
											<td rowspan='3'>&micro;<sub><?php echo $value['faktor']; ?> berat</sub>(<?php echo $char; ?>)</td>
											<td>0 , <?php echo $char; ?><<?php echo $sed;?></td>
										  </tr>
										  <tr>
											<td>(<?php echo $rin;?>-<?php echo $char; ?>)/<?php echo $rin;?> , <?php echo $value['bts_bwh'];?> &le; <?php echo $char; ?> &le;<?php echo $rin;?></td>
											<td>(<?php echo $char;?>-<?php echo $value['bts_bwh'];?>)/<?php echo $rin;?> , <?php echo $value['bts_bwh'];?> &le; <?php echo $char;?> &le;<?php echo $rin;?></td>
											<td>(<?php echo $char;?>-<?php echo $rin; ?>)/<?php echo $rin;?> , <?php echo $rin;?> &le; <?php echo $char; ?> &le;<?php echo $value['bts_ats'];?></td>
											<td>(<?php echo $char;?>-<?php echo $sed;?>)/<?php echo $rin;?> , <?php echo $sed;?> &le; <?php echo $char;?> &le;<?php echo $value['bts_ats'];?></td>
										  </tr>
										  <tr>
											<td>0 , <?php echo $char;?>><?php echo $rin;?></td>
											<td>(<?php echo $rin;?>-<?php echo $char;?>)/<?php echo $rin;?> , <?php echo $rin;?> &le; <?php echo $char;?> &le;<?php echo $sed;?></td>
											<td>(<?php echo $value['bts_ats'];?>-<?php echo $char;?>)/<?php echo $rin;?> , <?php echo $sed;?> &le; <?php echo $char;?> &le;<?php echo $value['bts_ats'];?></td>
											<td>1 , <?php echo $char;?>><?php echo $value['bts_ats'];?></td>
										  </tr>

										  <tr>
										  	<?php 
										  	$i =0;
										  	$data_s=[];
										  	foreach ($input as $key => $values) { 
										  		if( $values['id_faktor'] == $value['id_faktor']){
										  		?>
											<td colspan='10'>
											  <?php echo $value['faktor'];?> : <?php echo $char;?>=<?php echo $values['total']?>;<br />
											  <?php 

											  if(($values['total'] <= $value['bts_bwh']) || ($values['total'] <= $rin)){
											  	 $ux_minimal[$char] =($rin-$values['total'])/$rin;
											  	 $name = 'minimal';
											  	 $name_min[$char]= $value['faktor'].' '.$name;
											  	 $a=0;
											  	 $c='a';
											  	 foreach ($name_min as $key => $val) {
											  	 		$ar[$val]=$ux_minimal[$c];
											  	 		$a++;
											  	 		$c++;
											  	 }
											  	 $faktor[$value['faktor']] =$value['faktor'].' '.$name;
											  	 // $ar= array(
											  	 // 	$name_min[$char]=>$ux_minimal[$char]);
											  	 $data_s=array_merge($data_s,$ar); ?>
											  	  &micro;<sub>  <?php echo $value['faktor'];?> minimal</sub>(<?php echo $values['total']; ?>)=(<?php echo $rin;?>-<?php echo $values['total']; ?>)/<?php echo $rin;?>=<?=$ux_minimal[$char]?>;<br />
											  <?php }
											  if($values['total'] > $rin)
											  {
											  	$ux_minimal[$char] = 0;
											  	?>
											  	 &micro;<sub>  <?php echo $value['faktor'];?> minimal</sub>(<?php echo $values['total']; ?>)=<?=$ux_minimal[$char]?>;<br />
											  <?php 
											 	if($ux_minimal[$char]!= 0){
											  	$name = 'minimal';
											  	$name_min[$char]= $value['faktor'].' '.$name;
											  }}
											  // ==============================================================
											  if(($values['total'] < $value['bts_bwh']) or ($values['total'] > $sed)){
											  	$ux_ringan[$char] = 0;
											  	?>
											  	&micro;<sub>  <?php echo $value['faktor'];?> ringan</sub>(<?php echo $values['total']; ?>)=<?=$ux_ringan[$char]?>;<br />
											  <?php 
											  	$name = 'ringan';
											  	$name_rin[$char]= $value['faktor'].' '.$name;
											  }
											  else if(($value['bts_bwh'] <= $values['total']) && ($values['total'] <= $rin))
											  {
											  	$ux_ringan[$char] = ($values['total']-$value['bts_bwh'])/$rin;
											  	?>
											  	&micro;<sub>  <?php echo $value['faktor'];?> ringan</sub>(<?php echo $values['total']; ?>)=(<?php echo $values['total'];?>-<?php echo $value['bts_bwh']; ?>)/<?php echo $rin;?>=<?=$ux_ringan[$char]?>;<br />
											  <?php 
											  if($ux_ringan[$char] != 0){
											  $name = 'ringan';
											  $name_rin[$char]= $value['faktor'].' '.$name;
												 $a=0;
											  	 $c='a';
											  	 foreach ($name_rin as $key => $val) {
											  	 		$ar[$val]=$ux_ringan[$c];
											  	 		$a++;
											  	 		$c++;
											  	 }
											  	 // $ar= array(
											  	 // 	$name_min[$char]=>$ux_minimal[$char]);
											  	 $data_s=array_merge($data_s,$ar);

											  	//  if(array_key_exists($value['faktor'],$faktor)){
											  	//  	$data=array($value['faktor']=>$value['faktor'].' '.$name);
											  	//  	//$faktor=array_push($faktor, "a");
											  	//  	$faktor = array_merge_recursive($faktor,$data);

											  	//  	//$faktor += [$value['faktor'] => $value['faktor'].' '.$name];
											  	//  //$faktor[$value['faktor']]=$value['faktor'].' '.$name;
											  	//  }
											  	// else{
											  	// 	 $faktor[$value['faktor']] =$value['faktor'].' '.$name;
											  	// }
											  }}

											  else if(($values['total'] > $rin) && ($values['total'] <= $sed)){
											  	$ux_ringan[$char] = ($rin-$values['total'])/$rin;
											  	$name = 'ringan';
											  	$name_rin[$char]= $value['faktor'].' '.$name;?>
											  	&micro;<sub>  <?php echo $value['faktor'];?> ringan</sub>(<?php echo $values['total']; ?>)=(<?php echo $rin;?>-<?php echo $values['total']; ?>)/<?php echo $rin;?>=<?=$ux_ringan[$char]?>;<br />

											  <?php 
											   if($ux_ringan[$char] != 0){
											  $name = 'ringan';
											  $name_rin[$char]= $value['faktor'].' '.$name;
											     $a=0;
											  	 $c='a';
											  	 foreach ($name_rin as $key => $val) {
											  	 		$ar[$val]=$ux_ringan[$c];
											  	 		$a++;
											  	 		$c++;
											  	 }
											  	 // $ar= array(
											  	 // 	$name_min[$char]=>$ux_minimal[$char]);
											  	 $data_s=array_merge($data_s,$ar);
											  	//  if(array_key_exists($value['faktor'],$faktor)){
											  	//  	$data=array($value['faktor']=>$value['faktor'].' '.$name);

											  	//  	$faktor = array_merge_recursive($faktor,$data);

											  	//  	//$faktor += [$value['faktor'] => $value['faktor'].' '.$name];
											  	//  //$faktor[$value['faktor']]=$value['faktor'].' '.$name;
											  	//  }
											  	// else{
											  	// 	 $faktor[$value['faktor']] =$value['faktor'].' '.$name;
											  	// }
											  }}

											  // ==============================================================
											  if(($values['total'] >= $value['bts_bwh']) or ($values['total'] > $sed)){
											  	$ux_sedang[$char] = 0;
											  	?>
											  	&micro;<sub>  <?php echo $value['faktor'];?> sedang</sub>(<?php echo $values['total']; ?>)=<?=$ux_sedang[$char]?>;<br />
											  <?php if($ux_sedang[$char] != 0){
											  	$name = 'sedang';
											  	$name_sed[$char]= $value['faktor'].' '.$name;
											  }}
											  else if(($rin <= $values['total'] ) && ($values['total'] <= $value['bts_ats']))
											  {
											  	$ux_sedang[$char] = ($values['total']-$rin)/$rin;
											  	?>
											  	&micro;<sub>  <?php echo $value['faktor'];?> sedang</sub>(<?php echo $values['total']; ?>)=(<?php echo $values['total'];?>-<?php echo $rin; ?>)/<?php echo $rin;?>=<?=$ux_sedang[$char]?>;<br />
											  <?php 
											  if($ux_sedang[$char] != 0){
											  $name = 'sedang';
											  $name_sed[$char]= $value['faktor'].' '.$name;
											     $a=0;
											  	 $c='a';
											  	 foreach ($name_sed as $key => $val) {
											  	 		$ar[$val]=$ux_sedang[$c];
											  	 		$a++;
											  	 		$c++;
											  	 }
											  	 // $ar= array(
											  	 // 	$name_min[$char]=>$ux_minimal[$char]);
											  	 $data_s=array_merge($data_s,$ar);
											  	//  if(array_key_exists($value['faktor'],$faktor)){
											  	//  	$data=array($value['faktor']=>$value['faktor'].' '.$name);

											  	//  	$faktor = array_merge_recursive($faktor,$data);

											  	//  	//$faktor += [$value['faktor'] => $value['faktor'].' '.$name];
											  	//  //$faktor[$value['faktor']]=$value['faktor'].' '.$name;
											  	//  }
											  	// else{
											  	// 	 $faktor[$value['faktor']] =$value['faktor'].' '.$name;
											  	// }
											  }}

											  else if(($sed <= $values['total']) && ($values['total'] <= $value['bts_ats'])){
											  	$ux_sedang[$char] = ($value['bts_ats']-$values['total'])/$rin;
											  	$name = 'sedang';
											  	$name_sed[$char]= $value['faktor'].' '.$name;?>
											  	&micro;<sub>  <?php echo $value['faktor'];?> sedang</sub>(<?php echo $values['total']; ?>)=(<?php echo $value['bts_ats'];?>-<?php echo $values['total']; ?>)/<?php echo $rin;?>=<?=$ux_sedang[$char]?>;<br />
											  <?php
											  if($ux_sedang[$char] != 0){
											  $name = 'sedang';
											  $name_sed[$char]= $value['faktor'].' '.$name;
											     $a=0;
											  	 $c='a';
											  	 foreach ($name_sed as $key => $val) {
											  	 		$ar[$val]=$ux_sedang[$c];
											  	 		$a++;
											  	 		$c++;
											  	 }
											  	 // $ar= array(
											  	 // 	$name_min[$char]=>$ux_minimal[$char]);
											  	 $data_s=array_merge($data_s,$ar);
											  	// if(array_key_exists($value['faktor'],$faktor)){
											  	//  	$data=array($value['faktor']=>$value['faktor'].' '.$name);

											  	//  	$faktor = array_merge_recursive($faktor,$data);

											  	//  	//$faktor += [$value['faktor'] => $value['faktor'].' '.$name];
											  	//  //$faktor[$value['faktor']]=$value['faktor'].' '.$name;
											  	//  }
											  	// else{
											  	// 	 $faktor[$value['faktor']] =$value['faktor'].' '.$name;
											  	// }
											  }}
											  // ======================================================================
											  
											  if(( $values['total'] >= $sed ) && ($values['total'] <= $value['bts_ats']))
											  {

											  	$ux_berat[$char] = ($values['total']-$sed)/$rin;
											  	?>
											  	&micro;<sub>  <?php echo $value['faktor'];?> berat</sub>(<?php echo $values['total']; ?>)=(<?php echo $values['total'];?>-<?php echo $sed; ?>)/<?php echo $rin;?>=<?=$ux_berat[$char]?>;<br />
											  <?php  if($ux_berat[$char] != 0){
											  $name = 'berat';
											  $name_brt[$char]= $value['faktor'].' '.$name;
											     $a=0;
											  	 $c='a';
											  	 foreach ($name_brt as $key => $val) {
											  	 		$ar[$val]=$ux_berat[$c];
											  	 		$a++;
											  	 		$c++;
											  	 }
											  	 // $ar= array(
											  	 // 	$name_min[$char]=>$ux_minimal[$char]);
											  	 $data_s=array_merge($data_s,$ar);
											  	// if(array_key_exists($value['faktor'],$faktor)){
											  	//  	$data=array($value['faktor']=>$value['faktor'].' '.$name);

											  	//  	$faktor = array_merge_recursive($faktor,$data);

											  	//  	//$faktor += [$value['faktor'] => $value['faktor'].' '.$name];
											  	//  //$faktor[$value['faktor']]=$value['faktor'].' '.$name;
											  	//  }
											  	// else{
											  	// 	 $faktor[$value['faktor']] =$value['faktor'].' '.$name;
											  	// }
											  }}

											  else if($values['total'] < $sed){
											 	$ux_berat[$char] = 0;?>
											  	&micro;<sub>  <?php echo $value['faktor'];?> berat</sub>(<?php echo $values['total']; ?>)=<?=$ux_berat[$char]?>;<br />
											  <?php if($ux_berat[$char]!= 0 ){
											  	$name = 'berat';
											  	$name_brt[$char]= $value['faktor'].' '.$name;
											  }}

											  else if($values['total'] > $value['bts_ats']){
											  	$ux_berat[$char] = 1;
											  	$name = 'berat';
											  	$name_brt[$char]= $value['faktor'].' '.$name;
											  	$a=0;
											  	$c='a';
											  	 foreach ($name_brt as $key => $val) {
											  	 		$ar[$val]=$ux_berat[$c];
											  	 		$a++;
											  	 		$c++;
											  	 }
											  	 if(array_key_exists($value['faktor'],$faktor)){
											  	 	$data=array($value['faktor']=>$value['faktor'].' '.$name);

											  	 	$faktor = array_merge_recursive($faktor,$data);

											  	 	//$faktor += [$value['faktor'] => $value['faktor'].' '.$name];
											  	 //$faktor[$value['faktor']]=$value['faktor'].' '.$name;
											  	 }
											  	else{
											  		 $faktor[$value['faktor']] =$value['faktor'].' '.$name;
											  	}
											  	 // $ar= array(
											  	 // 	$name_min[$char]=>$ux_minimal[$char]);
											  	 $data_s=array_merge($data_s,$ar);?>
											  	&micro;<sub>  <?php echo $value['faktor'];?> berat</sub>(<?php echo $values['total']; ?>)=<?=$ux_berat[$char]?>;<br />
											  <?php }

											  // ======================================================================

											  // $ux_sedikit[$char]=($value['bts_ats']-$values['total'])/($value['bts_ats']-$value['bts_bwh']);
											  // //print_r($ux_sedikit);exit;
											  // $ux_besar[$char]=($values['total']-$value['bts_bwh'])/($value['bts_ats']-$value['bts_bwh']);
											  ?>
											  
											  
												
											  <!-- &micro;<sub>  <?php echo $value['faktor'];?> sedikit</sub>(<?php echo $values['total']; ?>)=(<?php echo $value['bts_ats'];?>-<?php echo $values['total']; ?>)/<?php echo $kr;?>=<?=$ux_sedikit[$char]?>;<br />
											  &micro;<sub>  <?php echo $value['faktor'];?> besar</sub>(<?php echo $values['total']; ?>)=(<?php echo $values['total']; ?>-<?php echo $value['bts_bwh']; ?>)/<?php echo $kr;?>=<?=$ux_besar[$char]?>;<br /> -->
											</td>
											<?php
											}}?>
										  </tr>
										  <?php 
										  $char++;
										} //print_r($ux_ringan);
										$str_klas=[];
										if(isset($name_min)){
											$i=0;
											
											foreach ($name_min as $key => $value) {
												$datas[$i] = $value;
												$i++;
												
											}
										$str_klas=array_merge($str_klas, $datas);
										//print_r($name_min);
										}
										if(isset($name_rin)){
											$i=0;
											
											foreach ($name_rin as $key => $value) {
												$datas[$i] = $value;
												$i++;
												
											}
										$str_klas=array_merge($str_klas, $datas);
										//print_r($name_rin);
										}
										if(isset($name_sed)){
											$i=0;
											
											foreach ($name_sed as $key => $value) {
												$datas[$i] = $value;
												$i++;
												
											}
										$str_klas=array_merge($str_klas, $datas);
										//print_r($name_sed);
										}
										if(isset($name_brt)){
											$i=0;
											
											foreach ($name_brt as $key => $value) {
												$datas[$i] = $value;
												$i++;
												
											}
										$str_klas=array_merge($str_klas, $datas);
										//print_r($name_brt);
										}
										//print_r($data);
										//seleksi per faktor
										//print_r($faktor);
//==================================================== kombinasi ====================================================
										function allSubsets($set, $size) {     
										    $subsets = [];
										    if ($size == 1) {
										        return array_map(function ($v) { return [$v]; },$set);
										    }
										    foreach (allSubsets($set,$size-1) as $subset) {
										        foreach ($set as $element) {
										            if (!in_array($element,$subset)) {
										                $newSet = array_merge($subset,[$element]);
										                sort($newSet);
										                if (!in_array($newSet,$subsets)) {
										                    $subsets[] = array_merge($subset,[$element]);
										                }
										            }
										        }
										    }
										    return $subsets;

										}

										 //$myset = [ "A","B","C", "D", "E" ];   
										 $combine=allSubsets($str_klas,3);
										 //cegah redudant
										 $combine = array_unique($combine, SORT_REGULAR);
										 //print_r($data);exit;
										 $totalcomb=count($combine);
//=================================================== end kombinasi ===================================================
										 //print_r($totalcomb);
										 
										// example
										// $chars = array('a', 'b', 'c','d','e','f');
										// $output = sampling($str_klas, 3);
										// var_dump($output);
										//hasil seleksi semua kelas
										//print_r($str_klas);
										//array hasil yang lebih dari 0
										print_r($data_s);
										?>
									</table>
								  </fieldset>
<!-- ============================================== end fuzzyfikasi ===================================================-->
								  <fieldset>
									<legend>[2] Penerapan Fungsi Implikasi</legend>
									<p>Nilai &alpha;-predikat dan Z dari setiap aturan</p>
									<?php
									
										 foreach ($combine as $dt) {
										 	$data_cari=$dt;
										 	$get_aturan=$this->M_pemeriksaan->findaturan($data_cari);
										 	if(!empty($get_aturan)){
										 		$noaturan=1;
										 		foreach ($get_aturan as $atr) {
										 			$da=explode(" AND ", $atr['conditions']);
										 			//print_r($da);
										 	
												 	foreach ($da as $valperdt) {
												 		//print_r($valperdt);
												 		$result[]=isset($data_s[$valperdt]) ? $data_s[$valperdt] : null;
												 	}?>
												 	<p><strong>Rule <?php echo $noaturan;?> :</strong><em> IF <?php echo $atr['conditions']; ?> THEN <?php echo $atr['hasil']; ?> </em><br />
												 	<?php
												 	//print_r($result);
												 	
												 	//print_r($datamin);?>
												 	&alpha;-predikat<sub><?php echo $noaturan; ?></sub>=
												 		<?php
												 		$totarr = count($da);
												 		$nom = 1;
												 		foreach ($da as $valperdt) {?>
														 	&micro;<sub><?php echo $valperdt; ?></sub>
														 	<?php if($nom !== $totarr){?>
														 	 <big>&cap;</big>
												 		<?php $nom++;}
												 		}?> <br />

													  = min(&micro;
													  <?php  
												 		$nom = 1;
													  foreach ($da as $valperdt) {?>
														 	&micro;<sub><?php echo $valperdt; ?></sub>
														 	(<?php echo $data_s[$valperdt]; ?>) 
														 	<?php if($nom !== $totarr){?>
														 	 <big>&cap;</big>
												 		<?php $nom++;}}?>
													  <br />
													  = min(
													  <?php 
													  $nom = 1;
													  foreach ($da as $valperdt) {?>
														 	<?php echo $data_s[$valperdt]; ?> 
														 	<?php if($nom !== $totarr){?>
														 	 ,
												 		<?php $nom++;}}?>)
													  <br />
													  <?php $datamin = min($result);
													  $a_predikat[]=$datamin;?>
													  = <?php echo $datamin; ?>
													  <br />
													<!-- cari himpunan z dari hasil then --> 
													<?php 
													$con = $atr['hasil'];
													$classdep = $this->M_pemeriksaan->get_classdepBycon($con); 
													foreach ($classdep as $ke) {
														$z_max = $ke->nilai_klasifikasi_atas;
														$z_min = $ke->nilai_klasifikasi_bawah;
													}
													//print_r($z_max);exit;
													$z=$z_max-$datamin*($z_max-$z_min);
													$data_z[]=$z;
													?>
													Dari himpunan <?php echo $atr['hasil']; ?> : (<?=$z_max?>-z<sub><?php echo $noaturan ; ?></sub>)/<?=($z_max-$z_min)?>= <?=$datamin?><br/>
													diperoleh <strong>z<sub><?php echo $noaturan ; ?></sub></strong>= <?=$z?>
												 	<?php $noaturan++;
										 		}
											}
										 	//echo '</br>';
										 	// if (in_array($dt,$data_s)){
										 	// 	print_r('bener');
										 	// }
										 	
										 	//$a++;
										 }
									?>
								  </fieldset>
								  <!-- ====================== defuzification ============================== -->
								  <fieldset>
									<legend>Defuzzyfication</legend>
									<?php
									$totalarray = count($a_predikat);
									//$n=array_sum($data_z);
									foreach ($a_predikat as $keyz=> $pre) { 
								  		$totals[]= $pre*$data_z[$keyz];
								  	}
								  	$n=array_sum($totals);
									$d=array_sum($a_predikat);
									$z=$n/$d;
									?>
									<p>Menghitung z akhir dengan merata-rata semua z berbobot</p>
								  <p>z= (
								  	<?php
								  	$num = 1; 
								  	foreach ($a_predikat as $keys) { ?>
								  		&alpha;-predikat<sub><?php echo $num; ?></sub>*z<sub>1</sub>
								  		<?php if ($num != $totalarray){?>
											+
								  		<?php }
								  	} ?>
								  	)
								  /(<?php
								  	$num=1;
								  foreach ($a_predikat as $keys) { ?>
								  		&alpha;-predikat<sub><?php echo $num; ?></sub>
								  		<?php if ($num != $totalarray){?>
											+
								  		<?php }
								  	} ?> )<br/>
									= (
									<?php
									$num=1;
									foreach ($a_predikat as $keyz=> $pre) { ?>
								  		<?php echo $pre; ?>*<?php echo $data_z[$keyz]; ?>
								  		<?php if ($num != $totalarray){?>
											+
								  		<?php }
								  	} ?>
									)/(
									<?php
									$num=1;
									foreach ($a_predikat as $keyz=> $pre) { ?>
								  		<?php echo $pre; ?>
								  		<?php if ($num != $totalarray){?>
											+
								  		<?php }
								  	} ?>)<br/>
									= <?=$n?>/<?=$d?><br/>
									= <?=$z?></p>
									<p>Jadi total nilai depresi (<strong>z</strong>) = <strong><?=$z?></strong></p>
								  </fieldset>
								  <!-- cek klas depresi -->
								  <?php 
								  $data_batas = $z;
								  $cekklas= $this->M_pemeriksaan->cek_klas_depresi($data_batas);
								  foreach ($cekklas as $class) {
								   	$hasil_class = $class->id_klass;
								   } ?>
								  <!-- input ke diagnosa -->
								  <?php
								  $datadiagnosa = array(
								  	'id_pemeriksaan'=> $id_pemeriksaan,
								  	'total_akhir'=> $z,
								  	'id_klass_dep'=> $hasil_class,
								  	'user_id'=> $user_id
								  );?> </br>
								  <?php
								  //print_r($datadiagnosa);exit;
								  $id= $this->M_pemeriksaan->tambah_diagnosa($datadiagnosa);
								  $level= $this->session->userdata('level'); 
                                	if($level != 'admin'){
                                		redirect('back/pemeriksaan/hasil_diagnosa/'.$id);
                                	}
                                ?>
                                  <center>
                                  <td><a href="<?php echo site_url('back/pemeriksaan/hasil_diagnosa/'.$id);?>" class="btn btn-success btn-lg">Cetak Hasil</a></td>
                                  </center>
								  

							<?php
							//}
							?>      
							</div>
						</body>
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