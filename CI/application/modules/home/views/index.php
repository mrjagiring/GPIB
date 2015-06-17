<?php include('./application/views/content/indonesian_date.php');?>

            <div class="col-lg-3 paddingless news">
                    <h4>CATATAN DARI MEJA PENDETA</h4>
                        <div class="border-red"></div>
                        <div class="border-grey"></div>
                        <?php foreach($catatan AS $cat) :?>
                        <div class="news-item">
                            <img src="http://placehold.it/120x80" />
                            <div class="news-item-text">
                                <div class="news-item-text date"><?php echo indonesian_date($cat->create_at, "l, j F Y") ;?></div>
                                <div class="news-item-text caption"><?php echo anchor('home/berita/'.$cat->slug, $cat->title) ;?></div>
                            </div>
                        </div>
                        <?php endforeach;?>

              
                    <div class="clearfix"></div>    
                    <h4>BERITA MAJELIS SINODE GPIB</h4>
                        <div class="border-red"></div>
                        <div class="border-grey"></div>
                        
                        <?php foreach($sinodes AS $sinode) :?>
                        <div class="news-item">
                            <img src="http://placehold.it/120x80" />
                            <div class="news-item-text">
                                <div class="news-item-text date"><?php echo indonesian_date($sinode->create_at, "l, j F Y") ;?></div>
                                <div class="news-item-text caption"><?php echo anchor('home/berita/'.$sinode->slug, $sinode->title) ;?></div>
                            </div>
                            
                        </div>
                        <?php endforeach;?>
                        
                        <div class="clearfix"></div>
                        <h4>INFORMASI SEKRETARIAT</h4>
                        <div class="border-red"></div>
                        <div class="border-grey"></div>
                        
                        <?php foreach($sekretariats AS $sekre) :?>
                        
                        <div class="news-item">
                            <img src="http://placehold.it/120x80" />
                            <div class="news-item-text">
                                <div class="news-item-text date"><?php echo indonesian_date($sekre->create_at, "l, j F Y") ;?></div>
                                <div class="news-item-text caption"><a href="#"><?php echo anchor('home/berita/'.$sekre->slug, $sekre->title) ;?></div>
                            </div>
                            
                        </div>
                        
                        <?php endforeach;?>
                       
                </div>


<div class="col-lg-6 main-news">
    <div class="searchbar">
                        <form role="search">
                        <div class="input-group">
                            <input type="text" class="form-control " placeholder="Search" name="srch-term" id="srch-term">
                            <div class="input-group-btn">
                                <button class="btn btn-danger" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                            </div>
                        </div>
                        </form>
                    </div>
    <img src="http://placehold.it/240x320"/>
    <div class="category">Sermon</div>
    <div class="title-div">
        <h3><?php echo $headline->title ;?></h3>
        <div class="clearfix"></div>
        <div class="author">Paul Amstrong / Aug 11, 2013 / Life issues</div>
    </div>
    <div class="headline">
    <p>
        <?php echo html_entity_decode($headline->desk) ;?>
    </p>
    </div>

    Sabda Bina Umat: Renungan SBU Pagi 2015
    <br />
    <?php echo indonesian_date($headline->create_at, "l, j F Y") ;?>
    <div class="clearfix"></div>
    <div class="related-news">
        <?php $relateds = $this->model->get_sermon_after($headline->id);?>
        <?php foreach($relateds AS $related) :?>
        <div class="item">
            <div class="title"><?php echo $related->title ;?></div>
            <div class="perikop">Efesus 4:17-24</div>
            <p><?php echo character_limiter($related->desk, 140) ;?><?php echo anchor('home/berita/'.$related->slug, 'baca selengkapnya');?></p>
        </div>
        <?php endforeach ?>
    </div>
 </div>   