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
                                        <td></td>
                                        <th></th>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            
                           
                        </div>
	            </div><!-- /.box-body -->
	        </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
