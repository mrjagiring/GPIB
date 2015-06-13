
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>GPIB / Pekanbaru</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url() ;?>assets/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url() ;?>assets/css/main.css" rel="stylesheet">
    <link href="<?php echo base_url() ;?>assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
</head>

<body>
    
      <div class="container">
                
                <div id="header">
                    <div class="row">
                            <div class="col-md-1 paddingless">
                                <div class="logo"><img src="<?php echo base_url() ;?>assets/images/Logo_GPIB.png" /></div>
                            </div>
                            <div class="header-text-first">gpib</div>
                            <div class="header-text-second">
                                <div class="top">Immanuel</div>
                                <div class="bottom">Pekanbaru</div>
                            </div>
                            <div class="header-text-red text-right">
                                <p>Dan orang akan datang dari timur dan barat dan dari utara dan selatan, <br /> dan mereka duduk makan di dalam Kerajaan Allah (Lukas 13:29)</p>
                            </div>

                            <!-- Fixed navbar -->
                            <nav class="navbar navdecoration pull-right text-center">
                              <div class="menunav">
                                  <ul class="nav navbar-nav navbar-right">
                                    <li><a href="#">Tentang Kami</a></li>
                                    <li><a href="#">Fungsionaris</a></li>
                                    <li><a href="#">Pelayanan</a></li>
                                    <li><a href="#">Materi/Download</a></li>
                                  </ul>
                                </div><!--/.nav-collapse -->
                            </nav>
                    </div>
                </div>
                
                <!-- Slider Goes Here -->
                <div class="row">
                    <div class="col-lg-12 paddingless">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators hidden">
                          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                          
                          
                          <?php $i=1;?>
                          <?php foreach($slider AS $rwslide) :?>
                          <li data-target="#carousel-example-generic" data-slide-to="<?php echo $i++ ;?>"></li>
                          <?php endforeach ?>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner custom-carousel" role="listbox">
                          <div class="item active">
                            <img src="<?php echo base_url() ;?>uploads/gallery/<?php echo $slider->slider_path.'/'.$slider->slider_img ;?>" alt="slider <?php echo $slider->slider_id ;?>" class="img-responsive">
                            <div class="carousel-caption">
                                <h3><?php echo $slider->slider_title ;?></h3>
                                <p><?php echo $slider->slider_caption ;?></p>
                            </div>
                          </div>
                            
                          <?php foreach($sliders AS $rwslide) :?>  
                          <div class="item">
                             <img src="<?php echo base_url() ;?>uploads/gallery/<?php echo $rwslide->slider_path.'/'.$rwslide->slider_img ;?>" alt="slider <?php echo $rwslide->slider_id ;?>" class="img-responsive">
                            <div class="carousel-caption">
                                <div class="layer-out">
                                    <h3><?php echo $rwslide->slider_title ;?></h3>
                                </div>
                                
                               <p><?php echo $rwslide->slider_caption ;?></p>
                            </div>
                          </div>
                          <?php endforeach;?>  
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
                      </div>
                    </div>    
                </div>
                
                <div class="clearfix"></div>
                
                <div class="row">
                    <div class="col-lg-12 marquee">
                        <?php foreach ($birthday AS $bd) :?>
                            <?php echo 'Selamat Ulang Tahun Kepada: '. $bd->first_name.' '.$bd->last_name ;?> ,-
                            <?php endforeach ;?>
                    </div>
                </div>

                <div class="clearfix"></div>

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

                <div class="col-lg-6">
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
                    <div class="clearfix"></div>  
                </div>
               
                <?php $this->load->view($content_template) ;?>
                
                <div class="clearfix"></div>
                
                <div class="col-lg-12 paddingless">
                    <div class="col-lg-5 bottom-event">
                        <h3>kegiatan penting minggu ini</h3>
                        <div class="col-lg-6">
                            <ul>
                                <?php foreach($events AS $ev) :?>
                                <li><?php echo anchor('home/berita/'.$ev->slug, $ev->title) ;?></li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul>
                                <?php foreach($others AS $other) :?>
                                    <li><?php echo anchor('home/berita/'.$other->slug, $other->title);?></li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 bottom-event">
                        <h3 class="text-center">graph kehadiran jemaat</h3>
                    </div>
                    
                    <div class="col-lg-3 bottom-contact">
                        <div class="header">GPIB Immanuel</div>
                        <div class="subheader">Pekanbaru</div>
                        <div class="address">Jl.Sumatera No. 21-23 Pekanbaru, Riau 2816 <br />Email: gpibimmanuelpekanbaru@gmail.com</div>
                        <div class="phone">Tel: 0761-21178; 0761-47893</div>
                    </div>
                </div>
                
                <div class="clearfix"></div>
                <div class="row">
                        
                    <hr>
                        
                </div>
                
                <div class="social-icon">
                    <i class="fa fa-pinterest-p fa-2x"></i>
                    <i class="fa fa-skype fa-2x"></i>
                    <i class="fa fa-linkedin fa-2x"></i>
                    <i class="fa fa-facebook fa-2x"></i>
                    <i class="fa fa-twitter fa-2x"></i>
                </div>
          
      </div>
      
     
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url() ;?>assets/js/jquery-1.11.2.min.js"></script>
    <script src="<?php echo base_url() ;?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ;?>assets/js/jquery.marquee.js"></script>
    <script src="<?php echo base_url() ;?>assets/js/jquery.pause.js"></script>
    <script>
	$(function(){
		$('.marquee').marquee({
            speed: 10000,
            gap: 50,
            delayBeforeStart: 0,
            direction: 'left',
            pauseOnHover: true
        });		
	});
    </script>

</body>
</html>
