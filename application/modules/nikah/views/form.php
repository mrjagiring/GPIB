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
						$attForm = array("id" => "addform", "name" => "addform");
						if ($id==0) {echo form_open("jemaat/adding", $attForm);}
						else {echo form_open("jemaat/updating", $attForm);}
					?>
						<div class="form-group">
							<label>Nama Suami</label>
							<input type="text" class="form-control" name="suami" value="<?php echo @$data['suami']; ?>"/>
							<a class="btn btn-success" href="<?php echo base_url(); ?>jemaat/form/0"><i class="fa fa-plus"></i> Tambah Anggota Jemaat</a>
						</div>

						<div class="form-group">
							<label>Nama Istri</label>
							<input type="text" class="form-control" name="istri" value="<?php echo @$data['istri']; ?>"/>
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
