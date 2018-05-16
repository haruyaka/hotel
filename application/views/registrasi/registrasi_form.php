<!doctype html>
<html>
    <head>
        <title>Registrasi</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
	<nav class="navbar navbar-default">
		  <div class="container-fluid">
			<div class="navbar-header">
			  <a class="navbar-brand" href="#">WebSiteName</a>
			</div>
			<ul class="nav navbar-nav">
			  <li><a href="<?= base_url('kamar/') ?>">Kamar</a></li>
			  <li class="active"><a href="<?= base_url('registrasi/') ?>">Registrasi</a></li>
			  <li><a href="<?= base_url('tamu_hotel/') ?>">Tamu Hotel</a></li>
			</ul>
		  </div>
		</nav>
        <h2 style="margin-top:0px">Registrasi <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="date">Tanggal Daftar <?php echo form_error('tanggal_daftar') ?></label>
            <input type="date" class="form-control" name="tanggal_daftar" id="tanggal_daftar" placeholder="Tanggal Daftar" value="<?php echo $tanggal_daftar; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Lama Menginap <?php echo form_error('lama_menginap') ?></label>
            <input type="text" class="form-control" name="lama_menginap" id="lama_menginap" placeholder="Lama Menginap" value="<?php echo $lama_menginap; ?>" />
        </div>
	    <div class="form-group">
            <label for="decimal">Tarif <?php echo form_error('tarif') ?></label>
            <input type="text" class="form-control" name="tarif" id="tarif" placeholder="Tarif" value="<?php echo $tarif; ?>" />
        </div>
	    <div class="form-group">
            <label for="decimal">Total Tarif <?php echo form_error('total_tarif') ?></label>
            <input type="text" class="form-control" name="total_tarif" id="total_tarif" placeholder="Total Tarif" value="<?php echo $total_tarif; ?>" />
        </div>
	  

	  <div class="form-group">
            <label for="varchar">Kode Kamar <?php echo form_error('kode_kamar') ?></label>
            <input type="text" class="form-control" name="kode_kamar" id="kode_kamar" placeholder="Kode Kamar" value="<?php echo $kode_kamar; ?>" />
	  </div>

	    <div class="form-group">
            <label for="int">Id Penghuni ( 1 - 10 ) <?php echo form_error('id_penghuni') ?></label>
            <input type="text" class="form-control" name="id_penghuni" id="id_penghuni" placeholder="Id Penghuni" value="<?php echo $id_penghuni; ?>" />
        </div>
		 
	    <input type="hidden" name="no_registrasi" value="<?php echo $no_registrasi; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('registrasi') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>