
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
                                  <li><?php echo anchor('/', 'Home') ;?></li>
                                   <?php foreach($page AS $pg):?>
                                    <li class="dropdown">
                                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $pg->title ;?></a>
                                     <?php $this->load->model('Home_model');?>
                                     <?php $haschild = $this->Home_model->has_child($pg->id);?>
                                     <?php if($haschild !== 0) {;?>
                                     <ul class="dropdown-menu" role="menu">
                                         <?php $childmenu = $this->Home_model->follow_parent_id($pg->id) ;?>
                                         <?php foreach ($childmenu AS $menu) :?>
											<li><?php echo anchor('home/page/'.$menu->id, $menu->title) ;?></li>
                                         <?php endforeach;?>    
                                     </ul>
                                   </li>
                                     <?php }?>
                                   <?php endforeach;?>
								   <li><?php echo anchor('home/gallery','Gallery') ;?></li>
                                   </ul>
                                 </div><!--/.nav-collapse -->
                             </nav>
                    </div>
                </div>
               
                <?php $this->load->view($content_template) ;?>

                <div class="col-md-3 ">
                    <h4>SELAMAT ULANG TAHUN</h4>
                    <div class="border-red"></div>
                    <div class="border-grey"></div>
                    <div class="clearfix"></div>
                    <div class="right-event">
                        <ul>
                            <?php foreach($birthday AS $bd) :?>
                            <li><?php echo anchor('home/jemaat/'.$bd->id, $bd->f_name.' '.$bd->l_name) ;?></li>
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
                                <li><?php echo anchor('home/jemaat/'.$anniv->id, $anniv->f_name.' '.$anniv->l_name) ;?></li>
                            <?php endforeach;?>
                        </ul>
                    </div>

                    <?php foreach ($rightnews as $parent => $rn){
                    $name = $rn['name'];
                    $limit = $rn['limit'];

                    if ( empty($rn['parent_id']) ){
                        $cat_id = $rn['cat_id'];
                    } else {
                        $cat_id = $this->model->getCatExlude($rn['parent_id'], $rn['cat_id']);
                    }
                    
                    $bKanan = $this->model->getBerita($cat_id, $limit, '0', 'create_at', 'desc');
                    ?>
                    <h4><?php echo $name; ?></h4>
                    <div class="border-red"></div>
                    <div class="border-grey"></div>
                    <?php foreach($bKanan AS $bKanan) :?>
                        <div class="right-event">
                            <div class="title"><?php echo indonesian_date($bKanan->create_at, "l, F j Y") ;?></div>
                            <?php echo anchor('home/berita/'.$bKanan->slug, $bKanan->title) ;?>
                        </div>
                    <?php endforeach ?>
                    <div class="clearfix"></div>
                        
                    <?php } ?>
                </div>
                
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
