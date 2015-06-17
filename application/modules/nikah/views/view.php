<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Jemaat</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-users"></i> Home</a></li>
            <li class="active">Jemaat</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        	<div class="row">
				<div class="col-md-12">
					<div class="box">
						<div class="box-header">
							<h3 class="box-title">Detail Data Jemaat</h3>
							<div class="box-tools"></div>	
						</div><!-- /.box-header -->
						<div class="box-body no-padding">
							<table class="table">
								<tr>
									<td class='text-right' style='width:20%'>Nama Lengkap</td>
									<?php $fullname = $dj['f_name'] . ' ' . $dj['m_name'] . ' ' . $dj['l_name'];?>
									<td><?php echo ucwords(strtolower($fullname)); ?></td>
								</tr>
								<tr>
									<td class='text-right' style='width:20%'>Jenis Kelamin</td>
									<td><?php echo $dj['gender']; ?></td>
								</tr>
								<tr>
									<td class='text-right' style='width:20%'>Tanggal Lahir</td>
									<td><?php echo $dj['dob']; ?></td>
								</tr>
								<tr>
									<td class='text-right' style='width:20%'>Status Nikah</td>
									<td><?php //echo $dj['status_nikah']; ?></td>
								</tr>
								<tr>
									<td class='text-right' style='width:20%'>Tanggal Nikah</td>
									<td><?php //echo $dj['tanggal_nikah']; ?></td>
								</tr>
								<tr>
									<td class='text-right' style='width:20%'>Tanggal Nikah Sipil</td>
									<td><?php //echo $dj['nikah_sipil']; ?></td>
								</tr>
								<tr>
									<td class='text-right' style='width:20%'>Alamat</td>
									<td><?php echo $dj['alamat']; ?></td>
								</tr>
							</table>
							<a class="btn" href="<?php echo base_url(); ?>jemaat/listing"><i class="fa fa-reply"></i> Kembali</a>
						</div><!-- /.box-body -->
					</div><!-- /.box -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</section><!-- /.content -->
	</div><!-- /.content-wrapper -->
