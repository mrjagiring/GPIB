<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Post Berita</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-list"></i> Home</a></li>
            <li class="active">Berita</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">List Post Berita</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="listPost" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Judul Berita</th>
                        <th>Kategori Berita</th>
                        <th>Author</th>
                        <th>Diupdate</th>
                        <th>Last Update</th>
                        <th class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php $i=1;
					foreach($allPost->result_array() as $data) { ?>
						<tr>
							<td><?php echo $data['title']; ?> </td>
							<td><?php echo $data['cat_id']; ?> </td>
              <td><?php echo $data['author']; ?> </td>
              <td><?php echo $data['update_by']; ?> </td>
              <td><?php echo $data['update_at']; ?> </td>
							<td class="text-right">
								<a href="<?php echo base_url().'berita/form/'.$data['id']; ?>" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
								<a href="<?php echo base_url().'berita/deleting/'.$data['id']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
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