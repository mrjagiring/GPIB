<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Jemaat Menikah</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-venus-mars"></i> Home</a></li>
            <li class="active">Jemaat Menikah</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <a class="btn btn-success" href="<?php echo base_url(); ?>nikah/form/0"><i class="fa fa-plus"></i> Tambah Jemaat Menikah</a>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="listNikah" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Nama Suami</th>
                        <th>Nama Istri</th>
                        <th>Tempat Nikah</th>
                        <th>Tanggal Menikah</th>                        
                        <th>Tanggal Nikah Sipil</th>
                        <th class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
          					<?php foreach($jn as $data) {
                      $js = $this->jemaat_model->getJemaat($data->suami);
                      $suami = $js['f_name'] . ' ' . $js['m_name'] . ' ' . $js['l_name']; 
                      $ji = $this->jemaat_model->getJemaat($data->istri);
                      $istri = $ji['f_name'] . ' ' . $ji['m_name'] . ' ' . $ji['l_name']; 
                    ?>
          						<tr>
                        <td><?php echo ucwords(strtolower($suami)); ?> </td>
                        <td><?php echo ucwords(strtolower($istri)); ?> </td>
                        <td><?php echo $data->tempat; ?> </td>
                        <td><?php echo $data->tanggal; ?> </td>
                        <td><?php echo $data->sipil; ?> </td>
          							<td class="text-right">
          								<a href="<?php echo base_url().'nikah/view/'.$data->id; ?>" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i></a>
                          <a href="<?php echo base_url().'nikah/form/'.$data->id; ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
          								<a href="<?php echo base_url().'nikah/deleting/'.$data->id; ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
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