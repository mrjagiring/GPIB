<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Jemaat Menikah</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-venus-mars"></i> Home</a></li>
            <li class="active">Jemaat Menikah</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        	<div class="row">
	            <!-- Left col -->
	            <div class="col-md-8">
	            	<!-- general form elements disabled -->
	              <div class="box box-warning">
	                <div class="box-header">
	                  <h3 class="box-title">Form Jemaat Menikah</h3>
	                </div><!-- /.box-header -->
	                <div class="box-body">
	                <?php $data = $this->nikah_model->getNikah($id);
	                	$pLK = $this->jemaat_model->getJemaat(@$data['suami']);
	                	$pPR = $this->jemaat_model->getJemaat(@$data['istri']);
						$attForm = array("id" => "addform", "name" => "addform");
						if ($id==0) {echo form_open("nikah/adding", $attForm);}
						else {echo form_open("nikah/updating", $attForm);}
					?>
						<div class="form-group">
							<label>Nama Suami</label>
							<select class="form-control" id="suami" name="suami">
								<option <?php if ($pLK['id'] == @$data['suami'] ) echo 'selected'; ?> value="<?php echo $pLK['id']; ?>"><?php echo $pLK['f_name'] . ' ' . $pLK['m_name'] . ' ' . $pLK['l_name']; ?></option>
								<?php $lajang = $this->nikah_model->getPengantin('LK'); ?>
								<?php foreach($lajang as $pLK) { ?>
								<option value="<?php echo $pLK->id; ?>"><?php echo $pLK->f_name .' '. $pLK->m_name .' '. $pLK->l_name; ?></option>
								<?php }  ?>
							</select>
							<a class="btn btn-success" href="<?php echo base_url(); ?>jemaat/form/0"><i class="fa fa-plus"></i> Tambah Anggota Jemaat</a>
						</div>

						<div class="form-group">
							<label>Nama Istri</label>
							<select class="form-control" id="istri" name="istri">
								<option <?php if ($pPR['id'] == @$data['istri'] ) echo 'selected'; ?> value="<?php echo $pPR['id']; ?>"><?php echo $pPR['f_name'] . ' ' . $pPR['m_name'] . ' ' . $pPR['l_name']; ?></option>
								<?php //$lajang = $this->nikah_model->getPengantin('PR'); ?>
								<?php foreach($this->nikah_model->getPengantin('PR') as $pPR) { ?>
								<option value="<?php echo $pPR->id; ?>"><?php echo $pPR->f_name .' '. $pPR->m_name .' '. $pPR->l_name; ?></option>
								<?php }  ?>
							</select>
							<a class="btn btn-success" href="<?php echo base_url(); ?>jemaat/form/0"><i class="fa fa-plus"></i> Tambah Anggota Jemaat</a>
						</div>

						<div class="form-group">
							<label>Tempat Menikah</label>
							<input type="text" class="form-control" name="tempat" value="<?php echo @$data['tempat']; ?>"/>
						</div>

						<div class="form-group col-xs-6">
							<label>Tanggal Menikah</label>
							<input type="text" class="form-control" id="dpNikah" name="tanggal" value="<?php echo @$data['tanggal']; ?>"/>
						</div>

						<div class="form-group col-xs-6">
							<label>Tanggal Nikah Sipil</label>
							<input type="text" class="form-control" id="dpSipil" name="sipil" value="<?php echo @$data['sipil']; ?>"/>
						</div>

	                    <div class="form-group">
	                      <input id="id" name="id" type="hidden" value="<?php echo @$data['id']; ?>" />
						  <input class="btn btn-primary" type="submit" name="btnForm" value="Save changes">
	                    </div>
	                  </form>
	                </div><!-- /.box-body -->
	              </div><!-- /.box -->
	            </div><!-- /.box-body -->
	        </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
