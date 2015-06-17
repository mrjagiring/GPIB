<?php include('./application/views/content/indonesian_date.php');?>
<div class="col-lg-9">
    <div class="page-header">
        <h4>Gallery<small></small></h4>
    </div>
    <?php foreach ($map as $folder): ?>
    <div class="col-lg-4">
        
        <div class="list-group">
            <a href="<?php echo base_url() ;?>home/item_gallery/<?php echo $folder ;?>" class="list-group-item">
            <img src="<?php echo base_url();?>assets/images/folder.jpg" width="180px" class="img-responsive"/>
              <h3 class="list-group-item-heading"><?php echo $folder ;?></h3>
              <p class="list-group-item-text"></p>
            </a>
        </div>
    </div>
    <?php endforeach;?>

</div>