<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Gallery /<?php echo $path ;?></h1>
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
                                
                                <?php echo form_open_multipart('gallery/do_upload/', array('class'=>'form-horizontal')) ;?>
                                
                                <div class="form-group">
                                    
                                    <div class="col-md-2">
                                        <label>Path</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="path" value="<?php echo $path; ?>"  class="form-control" readonly />
                                    </div>
                                    
                                </div>
                                
                                <div class="form-group">
                                    <div class="col-md-2">
                                        <label><?php echo 'Upload Image' ;?></label>
                                    </div>
                                     <div class="col-md-4">
                                        <input type="file" name="image" class="form-control">
                                        <p><?php echo form_error('image') ;?></p>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="col-md-2">
                                        <label>is Slider</label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="checkbox" name="slider" id="slider">
                                    </div>
                                </div>
                                
                                <div class="formslider">
                                    <div class="form-group">
                                        <div class="col-md-2">
                                            <label>Title</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" name="title" class="form-control">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="col-md-2">
                                            <label>Caption</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" name="caption" class="form-control">
                                        </div>    
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Save" >
                                </div>
                                <?php echo form_close() ;?>
                                
                            </div>
                            
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($mapdata AS $image) :?>
                                    <tr>
                                        <td></td>
                                        <td><img src="<?php echo base_url() ;?>uploads/gallery/<?php echo $path.'/'.$image;?>" class="img-thumbnail" width="180px"/></td>
                                        <td><?php echo anchor('gallery/remove_files/'.$path.'/'.$image, '<i class="glyphicon glyphicon-trash"></i>') ;?></td>
                                    </tr>
                                    <?php endforeach ;?>
                                </tbody>
                            </table>
                            
                            
                        </div>
	            </div><!-- /.box-body -->
	        </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
