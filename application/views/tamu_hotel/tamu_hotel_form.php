<!doctype html>
<html>
    <head>
        <title>Tamu Hotel</title>
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
			  <li><a href="<?= base_url('registrasi/') ?>">Registrasi</a></li>
			  <li class="active"><a href="<?= base_url('tamu_hotel/') ?>">Tamu Hotel</a></li>
			</ul>
		  </div>
		</nav>
        <h2 style="margin-top:0px">Tamu Hotel <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Penghuni <?php echo form_error('nama_penghuni') ?></label>
            <input type="text" class="form-control" name="nama_penghuni" id="nama_penghuni" placeholder="Nama Penghuni" value="<?php echo $nama_penghuni; ?>" />
        </div>
	    <input type="hidden" name="id_penghuni" value="<?php echo $id_penghuni; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('tamu_hotel') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>