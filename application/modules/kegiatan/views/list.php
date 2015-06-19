<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Kegiatan Sepekan</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-list"></i> Home</a></li>
            <li class="active">Kegiatan Sepekan</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <a class="btn btn-success" href="<?php echo base_url(); ?>kegiatan/form/0"><i class="fa fa-plus"></i> Tambah Kegiatan</a>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="listKgtn" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Tanggal</th>
                        <th>Pukul</th>
                        <th>Kegiatan</th>
                        <th>Tempat</th>
                        <th>Pemimpin</th>
                        <th class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
          					<?php foreach($allKgtn as $data) { ?>
          						<tr>
          							<td><?php echo $data->tanggal; ?> </td>
          							<td><?php echo $data->pukul; ?> </td>
                        <td><?php echo $data->kegiatan; ?> </td>
                        <td><?php echo $data->tempat; ?> </td>
                        <td><?php echo $data->pemimpin; ?> </td>
          							<td class="text-right">
          								<a href="<?php echo base_url().'kegiatan/form/'.$data->id; ?>" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
          								<a href="<?php echo base_url().'kegiatan/deleting/'.$data->id; ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
          							</td>
          						</tr>
          					<?php }  ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->