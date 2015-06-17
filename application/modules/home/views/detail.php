<?php include('./application/views/content/indonesian_date.php');?>
<div class="col-lg-9">
    <div class="page-header">
        <h4><?php echo $post->title ;?>&nbsp;<small><?php echo '" '.$post->category.' "' ;?></small></h4>
    </div>
    
    <div class="col-md-4">
        <span class="fa fa-calendar-o">&nbsp;<?php echo indonesian_date($post->create_at);?></span>
    </div>
    <div class="col-md-3">
        <?php echo '  posted by : '.$post->username ;?>
    </div>    

    <div class="detail-home">
         
    
    <img src="http://placehold.it/340x420"/>

    
        <p> <?php echo $post->desk ;?></p>
        
    </div>    
    <div class="clearfix"></div>
    <h4>Related Post :</h4>
    <?php $this->load->model('Home_model','mod'); $result = $this->mod->get_related_detail($post->cat_id, $post->postid);?>
    
   
    <div class="related">
        <?php foreach ($result AS $row) :?>
        <div class="item">
            <span class="fa fa-calendar-o">&nbsp;<?php echo indonesian_date($post->create_at);?></span>
            <img src="http://placehold.it/160x120" style="float: left; margin-right: 20px; margin-bottom: 25px;"/>
            <div class="title"><?php echo $row->title ;?></div>
            <p><?php echo character_limiter($row->desk, 120, '...');?></p>
            <p><?php echo anchor('home/berita/'.$row->slug, 'baca selengkapnya') ;?></p>
            <div class="clearfix"></div>
        </div>
        
        <?php endforeach;?>
    </div>
   
 
</div>