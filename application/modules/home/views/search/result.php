<?php include('./application/views/content/indonesian_date.php');?>
<?php function highlight_word( $content, $word, $color ) {
    $replace = '<span style="background-color: ' . $color . ';">' . $word . '</span>'; // create replacement
    $content = str_replace( $word, $replace, $content ); // replace content

    return $content; // return highlighted data
}

function highlight_words( $content, $words, $colors ) {
    $color_index = 0; // index of color (assuming it's an array)

    // loop through words
    foreach( $words as $word ) {
        $content = highlight_word( $content, $word, $colors[$color_index] ); // highlight word
        $color_index = ( $color_index + 1 ) % count( $colors ); // get next color index
    }

    return $content; // return highlighted data
}

// words to find
$words = array(
    'normal',
    html_escape($term),
);

// colors to use
$colors = array(
    '#88ccff',
    '#f9f735'
);
?>
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
    
    <?php foreach($sberita AS $sb) :?>
    <div class="title">
        <?php $str = strtolower($sb->title) ;?>   
        <h4><a href="<?php echo base_url() ;?>home/berita/<?php echo $sb->slug ;?>"><?php echo highlight_words($str, $words, $colors) ;?></a></h4>
    </div>
    <hr>
    <?php endforeach ;?>
    
    <?php foreach($spage AS $sp) :?>
    <div class="title">
         <?php $str = strtolower($sp->title) ;?>   
        <h4><a href="<?php echo base_url() ;?>home/page/<?php echo $sp->id ;?>"><?php echo highlight_words($str, $words, $colors) ;?></a></h4>
    </div>
    <hr>
    <?php endforeach ;?>
</div>