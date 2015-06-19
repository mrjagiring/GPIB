<?php include('./application/views/content/indonesian_date.php');?>
<div class="col-lg-9">
    <div class="col-lg-8">
        <div class="searchbar">
            <?php echo form_open('home/search', array('role'=>'search')) ;?>    
                <div class="input-group">    
                <input type="text" class="form-control " placeholder="Search" name="srch-term" required/>
                <div class="input-group-btn">
                    <button class="btn btn-danger" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                </div>
                </div>
            <?php echo form_close() ;?>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="page-header">
        <h3>Search<small><?php echo ' term :'.$term ;?></small></h3>
    </div>
    <div class="alert alert-danger" role="alert">Sorry! your search return zero result!</div>
</div>