<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Menu Page</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-list"></i> Home</a></li>
            <li class="active">Menu</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <a class="btn btn-success" href="<?php echo base_url(); ?>page/form/0"><i class="fa fa-plus"></i> Tambah Data Menu</a>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="listMenu" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Nama Menu</th>
                        <th>Parent Menu</th>
                        <th>Target Link</th>
                        <th>Posisi</th>
                        <th>URL</th>
                        <th class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php foreach($allMenu as $data) { ?>
          <?php $menu = $this->page_model->getPage($data->parent_id); ?>
						<tr>
							<td><?php echo $data->title; ?> </td>
							<td><?php echo @$menu['title']; ?> </td>
              <td><?php echo $data->target; ?> </td>
              <td><?php echo $data->sequence; ?> </td>
              <td><?php echo $data->url; ?> </td>
							<td class="text-right">
								<a href="<?php echo base_url().'page/form/'.$data->id; ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
								<a href="<?php echo base_url().'page/deleting/'.$data->id; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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