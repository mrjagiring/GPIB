<?php include('./application/views/content/indonesian_date.php');?>
<?php $this->load->model('home_model');?>
<?php $suami = $this->home_model->get_jemaat_detail($anniv->suami);?>
<?php $istri = $this->home_model->get_jemaat_detail($anniv->istri);?>
<?php $thisyear = new DateTime('today'); $weddingdate = new DateTime($anniv->tanggal); $age = $weddingdate->diff($thisyear)->y?>
<div class="col-lg-9">
    <div class="page-header">
        <h4>Selamat Ulang Tahun Perkawinan <?php echo $suami->f_name.' '.$suami->l_name.' & '.$istri->f_name.' '.$istri->l_name.' Yang Ke - '.$age;?></h4>
    </div>
    <img src="http://placehold.it/260x300" style="float: left; margin-right: 20px; margin-bottom: 20px;"/>
    <p>Nama Suami: <?php echo $suami->f_name.' '.$suami->m_name.' '.$suami->l_name ;?></p>
    <p>Nama Istri: <?php echo $istri->f_name.' '.$istri->m_name.' '.$istri->l_name ;?></p>
    <p>Tanggal Perkawinan: <?php echo indonesian_date($anniv->tanggal, "j F Y") ;?></p>
    <p>Alamat: <?php echo $suami->alamat ;?></p>

</div>