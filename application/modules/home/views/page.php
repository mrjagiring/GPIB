<?php include('./application/views/content/indonesian_date.php');?>
<div class="col-lg-9">
    <div class="page-header">
        <h4><?php echo $detail->title ;?></h4>
    </div>
  

    <div class="detail-home">

        <p> <?php echo $detail->content ;?></p>
        
    </div>    
    <div class="clearfix"></div>
    <h4>Related Post :</h4>
    <?php $this->load->model('Home_model'); $related = $this->Home_model->get_related_page($detail->id, $detail->parent_id);?>
    <?php foreach($related AS $rel) :?>
    <div class="item">
        <div class="title"><?php echo $rel->title ;?></div>
        <p><?php echo character_limiter($rel->content, 120, '...');?></p>
        <p><?php echo anchor('home/page/'.$rel->id, 'baca selengkapnya') ;?></p>
        <div class="clearfix"></div>
    </div>
    
    <?php endforeach;?>
   
    <div class="related">

    </div>
   
 
</div>