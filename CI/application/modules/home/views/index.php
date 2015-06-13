<?php include('./application/views/content/indonesian_date.php');?>
<div class="col-lg-6 main-news">
    <img src="http://placehold.it/240x320" class="text-wrap"/>
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

<div class="col-md-3">
                    
                     <h4>SELAMAT ULANG TAHUN</h4>
                        <div class="border-red"></div>
                        <div class="border-grey"></div>
                        <div class="clearfix"></div>
                        <div class="right-event">
                            <ul>
                                <?php foreach($birthday AS $bd) :?>
                                <li><?php echo anchor('home/jemaat/'.$bd->id, $bd->first_name.' '.$bd->last_name) ;?></li>
                                <?php endforeach ;?>
                            </ul>
                        </div>
                        
                        <h4>SELAMAT ULANG TAHUN PERKAWINAN</h4>
                        <div class="border-red"></div>
                        <div class="border-grey"></div>
                        <div class="clearfix"></div>
                        <div class="right-event">
                            <ul>
                                <?php foreach($annivs AS $anniv) :?>
                                    <li><?php echo anchor('home/jemaat/'.$anniv->id, $anniv->first_name.' '.$anniv->last_name) ;?></li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                        
                        
                        <h4>BERITA GPIB IMMANUEL PEKANBARU</h4>
                        <div class="border-red"></div>
                        <div class="border-grey"></div>
                        <div class="clearfix"></div>
                        
                        <div class="news">
                            <?php foreach($weddings AS $wedding) :?>
                                <div class="news-item">
                                    <img src="http://placehold.it/100x80" />
                                    <div class="news-item-text">
                                        <div class="news-item-text date"><?php echo indonesian_date($wedding->create_at, "l, F j Y") ;?></div>
                                        <div class="news-item-text caption"><?php echo anchor('home/berita/'.$wedding->slug, $wedding->title) ;?></div>
                                    </div>

                                </div>
                            <?php endforeach ?>
                        </div>
                        
                        <div class="clearfix"></div>
                        <?php foreach($jobs AS $job) :?>
                        <div class="right-event">
                            <div class="title"><?php echo indonesian_date($job->create_at, "l, F j Y") ;?></div>
                            <?php echo anchor('home/berita/'.$job->slug, $job->title) ;?>
                        </div>
                        <?php endforeach ?>
                        <div class="clearfix"></div>
                        
                        <h4>JEMAAT SAKIT DAN MOHON DUKUNGAN DOA</h4>
                        <div class="border-red"></div>
                        <div class="border-grey"></div>
                        <div class="clearfix"></div>
                        <?php foreach($jemaatsakit AS $js) :?>
                        <div class="right-event">
                            <div class="title"><?php echo indonesian_date($js->create_at, "l, F j Y") ;?></div>
                            <?php echo anchor('home/berita/'.$js->slug, $js->title) ;?>
                        </div>
                        <?php endforeach ?>
                    
                </div>