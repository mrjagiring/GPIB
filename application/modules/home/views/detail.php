<?php include('./application/views/content/indonesian_date.php');?>
<?php $this->load->model('category/category_model','kategori'); $result = $this->kategori->getCat($post->cat_id);?>
<div class="col-lg-9">
    <div class="page-header">
        <h4><?php echo $post->title ;?>&nbsp;<small><?php echo '" '.$result['title'].' "' ;?></small></h4>
    </div>
    
    <div class="col-md-4">
        <span class="fa fa-calendar-o">&nbsp;<?php echo indonesian_date($post->create_at);?></span>
    </div>
    <div class="col-md-3">
        <?php echo '  Oleh : '.$post->author ;?>
    </div>    

    <div class="detail-home">
        <?php echo $post->desk ;?>
    </div>    
    <div class="clearfix"></div>
 
</div>