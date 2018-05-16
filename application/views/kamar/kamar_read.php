<!doctype html>
<html>
    <head>
        <title>Kamar</title>
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
        <h2 style="margin-top:0px">Kamar Read</h2>
        <table class="table">
	    <tr><td>Jenis Kamar</td><td><?php echo $jenis_kamar; ?></td></tr>
	    <tr><td>Tarif</td><td><?php echo $tarif; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('kamar') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>