<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Sabda Bina Umat</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-list"></i> Home</a></li>
            <li class="active">SBU</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <a class="btn btn-success" href="<?php echo base_url(); ?>sbu/form/0"><i class="fa fa-plus"></i> Tambah SBU</a>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="listSbu" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Tanggal</th>
                        <th>Kategori</th>
                        <th>Judul</th>
                        <th>Nats</th>
                        <th>Nyanyian</th>
                        <th class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
          					<?php foreach($allSbu as $data) { ?>
          						<tr>
          							<td><?php echo $data->tanggal; ?> </td>
          							<td><?php echo $retVal = ($data->kategori == 'pagi') ? 'SBU Pagi' : 'SBU Malam' ; ?> </td>
                        <td><?php echo $data->judul; ?> </td>
                        <td><?php echo $data->nats; ?> </td>
                        <td><?php echo $data->nyanyian; ?> </td>
          							<td class="text-right">
          								<a href="<?php echo base_url().'sbu/form/'.$data->id; ?>" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
          								<a href="<?php echo base_url().'sbu/deleting/'.$data->id; ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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