<!doctype html>
<html>
    <head>
        <title>Create Kamar</title>
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
			  <li class="active"><a href="<?= base_url('kamar/') ?>">Kamar</a></li>
			  <li><a href="<?= base_url('registrasi/') ?>">Registrasi</a></li>
			  <li><a href="<?= base_url('tamu_hotel/') ?>">Tamu Hotel</a></li>
			</ul>
		  </div>
		</nav>
		<h2 style="margin-top:0px">Kamar <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Jenis Kamar <?php echo form_error('jenis_kamar') ?></label>
            <input type="text" class="form-control" name="jenis_kamar" id="jenis_kamar" placeholder="Jenis Kamar" value="<?php echo $jenis_kamar; ?>" />
        </div>
	    <div class="form-group">
            <label for="decimal">Tarif <?php echo form_error('tarif') ?></label>
            <input type="text" class="form-control" name="tarif" id="tarif" placeholder="Tarif" value="<?php echo $tarif; ?>" />
        </div>
	    <input type="hidden" name="kode_kamar" value="<?php echo $kode_kamar; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('kamar') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>