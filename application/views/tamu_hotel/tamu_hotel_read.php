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
        <h2 style="margin-top:0px">Tamu Hotel Read</h2>
        <table class="table">
	    <tr><td>Nama Penghuni</td><td><?php echo $nama_penghuni; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('tamu_hotel') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>