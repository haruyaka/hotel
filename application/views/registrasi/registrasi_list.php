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
        <h2 style="margin-top:10px">Registrasi Data</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('registrasi/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('registrasi/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('registrasi'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Tanggal Daftar</th>
		<th>Lama Menginap</th>
		<th>Tarif</th>
		<th>Total Tarif</th>
		<th>Kode Kamar</th>
		<th>Id Penghuni</th>
		<th>Action</th>
            </tr><?php
            foreach ($registrasi_data as $registrasi)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $registrasi->tanggal_daftar ?></td>
			<td><?php echo $registrasi->lama_menginap ?></td>
			<td><?php echo $registrasi->tarif ?></td>
			<td><?php echo $registrasi->total_tarif?></td>
			<td><?php echo $registrasi->kode_kamar ?></td>
			<td><?php echo $registrasi->id_penghuni ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('registrasi/read/'.$registrasi->no_registrasi),'Read'); 
				echo ' | '; 
				echo anchor(site_url('registrasi/update/'.$registrasi->no_registrasi),'Update'); 
				echo ' | '; 
				echo anchor(site_url('registrasi/delete/'.$registrasi->no_registrasi),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>