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
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <a class="btn btn-success" href="<?php echo base_url(); ?>jemaat/form/0"><i class="fa fa-plus"></i> Tambah Anggota Jemaat</a>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="listJemaat" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Nama Jemaat</th>
                        <th>Jenis Kelamin</th>
                        <th>Tgl. Lahir</th>
                        <th>Menikah</th>                        
                        <th>Alamat</th>
                        <th class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
          					<?php foreach($allJemaat as $data) {
                    $fullname = $data->f_name . ' ' . $data->m_name . ' ' . $data->l_name; 
                    ?>
          						<tr>
                        <td><?php echo ucwords(strtolower($fullname)); ?> </td>
                        <td><?php echo $data->gender; ?> </td>
                        <td><?php echo $data->dob; ?> </td>
                        <td><?php //echo $data->status_nikah = ($data->status_nikah==1) ? 'Sudah' : 'Belum'; ?> </td>
                        <td><?php echo ucwords(strtolower($data->alamat)); ?> </td>
          							<td class="text-right">
          								<a href="<?php echo base_url().'jemaat/view/'.$data->id; ?>" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i></a>
                          <a href="<?php echo base_url().'jemaat/form/'.$data->id; ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
          								<a href="<?php echo base_url().'jemaat/deleting/'.$data->id; ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
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