<h3>Edit</h3>
<div class="col-lg-6" style="border-right: 1px #d0d0d0 solid;">
        
        <?php echo form_open('gallery/edit/'.$row->id, array('class'=>'form-horizontal')) ;?>
        <div class="row">
            <div class="form-group">
                <div class="col-lg-2">
                    <label>Caption</label>
                </div>
                <div class="col-lg-4">
                    <input type="text" name="caption" value="<?php echo $row->caption ;?>" class="form-control"/>
                    <?php echo form_error('caption') ;?>
                </div>
            </div>    
        </div>
    
        <div class="row">
            
            <div class="form-group">
                <input type="submit" class="btn btn-success" value="update" />
            </div>
            
        </div>
        
        <?php echo form_close() ;?>
        <div class="row">
                <div class="col-lg-2">
                    <label>Current Image</label>
                </div>
                <div class="col-lg-4">
                    <img src="<?php echo base_url() ;?>uploads/_thumbs/<?php echo $row->image ;?>" class="img-thumbnail" width="240px"/>
                </div>
        </div>
        <?php echo form_open_multipart('gallery/changimage/'.$row->id, array('form-horizontal')) ;?>
        <div class="row">
            <div class="form-group">
                <div class="col-lg-2">
                    <label>Upload Image</label>
                </div>
                <div class="col-lg-4">
                    <input type="file" name="image" class="form-control">
                </div>
            </div>
        </div>    
            <div class="form-group">
                <input type="submit" class="btn btn-success" value="Change Image" />
            </div>
            
        <?php echo form_close() ;?>
    </div>
</div>