<!doctype html>
<html>
    <head>
        <title>Registrasi Kamar</title>
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
        <h2 style="margin-top:0px">Registrasi Read</h2>
        <table class="table">
	    <tr><td>Tanggal Daftar</td><td><?php echo $tanggal_daftar; ?></td></tr>
	    <tr><td>Lama Menginap</td><td><?php echo $lama_menginap; ?></td></tr>
	    <tr><td>Tarif</td><td><?php echo $tarif; ?></td></tr>
	    <tr><td>Total Tarif</td><td><?php echo $total_tarif; ?></td></tr>
	    <tr><td>Kode Kamar</td><td><?php echo $kode_kamar; ?></td></tr>
	    <tr><td>Id Penghuni</td><td><?php echo $id_penghuni; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('registrasi') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>