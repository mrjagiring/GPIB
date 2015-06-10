<h3>Gallery</h3>
<div class="col-lg-6">
    <?php echo form_open_multipart('gallery', array('class'=>'form-horizontal')) ;?>
    <div class="form-group">
        <div class="col-lg-2">
            <label>Caption</label>
        </div>
        <div class="col-lg-4">
            <input type="text" name="caption" class="form-control">
            <?php echo form_error('caption') ;?>
        </div>
    </div>
    
    <div class="form-group">
        <div class="col-lg-2">
            <label>Image</label>
        </div>
        <div class="col-lg-4">
            <input type="file" name="image" class="form-control">
        </div>
    </div>
    
    <div class="form-group">
        <input type="submit" class="btn btn-success" value="submit"/>
    </div>
    <?php echo form_close();?>
</div>
<div class="col-lg-12">
    <table class="table table-striped table-condensed">
        <thead>
            <tr>
                <th>#</th>
                <th>Caption</th>
                <th>Image</th>
                <th></th>
                <th></th>
            </tr>   
        </thead>
        <tbody>
            <?php foreach($result AS $row) :?>
            <tr>
                <td></td>
                <td><?php echo $row->caption ;?></td>
                <td><img src="<?php echo base_url() ;?>uploads/_thumbs/<?php echo $row->image ;?>" class="img-thumbnail" width="180px"/></td>
                <td><?php echo anchor('gallery/edit/'.$row->id, '<i class="glyphicon glyphicon-edit"></i>') ;?></td>
                <td><?php echo anchor('gallery/delete/'.$row->id, '<i class="glyphicon glyphicon-trash"></i>') ;?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>