<?php include('./application/views/content/indonesian_date.php');?>

<div class="col-lg-9">
    
    <div class="page-header">
        <h2><?php echo $detail->judul ;?><small><?php echo ' SBU '.$detail->kategori ;?></small></h2>
    </div>
    <p><span class="fa fa-calendar-o">&nbsp;<?php echo indonesian_date($detail->tanggal, "l, j F Y");?></span></p>
    <img src="http://placehold.it/260x300" style="float: left; margin-right: 20px; margin-bottom: 20px;"/>
    <?php echo $detail->desk ;?>
   
</div>