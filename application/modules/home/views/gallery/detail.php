<?php include('./application/views/content/indonesian_date.php');?>
<div class="col-lg-9">
    <div class="page-header">
        <h4>Gallery Foto<small> <?php echo '/'.$path ;?></small></h4>
    </div>
    <?php foreach ($mapdata as $image): ?>
    <div class="col-lg-6">
        <div class="list-group">
            <a href="#" class="list-group-item">
            <img src="<?php echo base_url() ;?>uploads/gallery/<?php echo $path.'/'.$image;?>" width='420px' class="img-responsive" />

            </a>
        </div>
    </div>
    <?php endforeach;?>
    <div class="clearfix"></div>
    <div class="row">
        <hr>
        
    </div>
    <?php echo anchor('home/gallery','Kembali Ke Gallery') ;?>
    
    

</div>