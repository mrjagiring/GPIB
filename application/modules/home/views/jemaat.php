<?php include('./application/views/content/indonesian_date.php');?>
<?php $thisyear = new DateTime('today'); $jemaatyear = new DateTime($jemaat->dob); $age = $jemaatyear->diff($thisyear)->y?>
<div class="col-lg-9">
    <div class="page-header">
        <h4>Selamat Ulang Tahun Yang Ke - <?php echo $age ;?></h4>
    </div>
    <img src="http://placehold.it/260x300" style="float: left; margin-right: 20px; margin-bottom: 20px;"/>
    <p>Nama: <?php echo $jemaat->f_name.' '.$jemaat->m_name.' '.$jemaat->l_name;?></p>
    <p>Tanggal Lahir : <?php echo indonesian_date($jemaat->dob, "j F Y") ;?></p>
    <p>Telp : <?php echo $jemaat->telp ;?></p>
    <p>Alamat : <?php echo $jemaat->alamat ;?></p>
</div>