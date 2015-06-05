<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Kategori</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-list"></i> Home</a></li>
            <li class="active">Kategori</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">List Data Kategori</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="listKat" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Nama Kategori</th>
                        <th>Deskripsi</th>
                        <th>Parent Kategori</th>
                        <th class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php $i=1;
					foreach($allCategory->result_array() as $data) { ?>
						<tr>
							<td><?php echo $data['title']; ?> </td>
							<td><?php echo $data['desk']; ?> </td>
							<td><?php echo $data['parent_id']; ?> </td>
							<td class="text-right">
								<a href="<?php echo base_url().'category/form/'.$data['id']; ?>" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
								<a href="<?php echo base_url().'category/deleting/'.$data['id']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
							</td>
						</tr>
					<?php $i++; }  ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->