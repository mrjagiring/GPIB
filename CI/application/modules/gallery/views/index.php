<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1></h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-list"></i> Home</a></li>
            <li class="active">Gallery</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        	<div class="row">
	            <!-- Left col -->
	            <div class="col-md-8">
	            	<!-- general form elements disabled -->
                        <div class="box">
                            <div class="box-body">
                                <?php echo form_open('gallery/', array('class'=>'form-horizontal')) ;?>

                                <div class="form-group">

                                    <div class="col-md-2">
                                        <label>Create New Gallery</label>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <input type="text" name="dir" class="form-control" >
                                        <p><?php echo form_error('dir') ;?></p>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="save" />
                                </div>
                                
                            <?php echo form_close() ;?>
                            </div>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Gallery Folder</th>
                                        <th>Images Count</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($map as $item): ?>
                                    <tr>
                                        <td></td>
                                        <td><?php echo anchor('gallery/path/'.$item, $item) ?></td>
                                        <?php $files = glob('./uploads/gallery/'.$item. '*.jpg');  $filecount = count( $files );?>
                                        <td><?php echo $filecount ;?></td>
                                        <td></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            
                            <h3>Slider</h3>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Path</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Caption</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($sliders AS $row) :?>
                                    <tr>
                                        <td><?php echo $row->slider_path ;?></td>
                                        <td><img src="<?php echo base_url() ;?>uploads/gallery/<?php echo $row->slider_path.'/'.$row->slider_img;?>" class="img-thumbnail" width="100px"></td>
                                        <td><?php echo $row->slider_title ;?></td>
                                        <td><?php echo $row->slider_caption ;?></td>
                                        <td><?php echo anchor('gallery/remove_slider/'.$row->slider_id, '<i class="glyphicon glyphicon-trash"></i>') ;?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
	            </div><!-- /.box-body -->
	        </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
