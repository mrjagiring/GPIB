<?php include('./application/views/content/indonesian_date.php');?>

<div class="col-lg-9">
    
    <div class="page-header">
        <h2>Kegiatan <small> <?php echo $detail->kegiatan ;?></small></h2>
    </div>
    
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo indonesian_date($detail->tanggal, "l, j F Y") ;?></h3>
        </div>
        <div class="panel-body">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td>Tanggal</td>
                        <td><?php echo indonesian_date($detail->tanggal, "l, j F Y") ;?></td>
                    </tr>
                     <tr>
                        <td>Pukul</td>
                        <td><?php echo $detail->pukul ;?></td>
                    </tr>
                    
                    <tr>
                        <td>Kegiatan</td>
                        <td><?php echo $detail->kegiatan ;?></td>
                    </tr>
                    
                    <tr>
                        <td>Tempat</td>
                        <td><?php echo $detail->tempat ;?></td>
                    </tr>
                    
                    <tr>
                        <td>Pemimpin</td>
                        <td><?php echo $detail->pemimpin ;?></td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>
    <h4>Kegiatan Sepekan</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Kegiatan</th>
                <th>Pukul</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($kegiatans AS $key => $value) :?>
            <tr>
                <td><?php echo indonesian_date($value[0]->tanggal, "l, j F Y") ;?></td>
                <td><?php echo $value[0]->kegiatan ;?></td>
                <td><?php echo $value[0]->pukul ;?></td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>