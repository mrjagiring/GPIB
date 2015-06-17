<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Jemaat</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-users"></i> Home</a></li>
            <li class="active">Jemaat</li>
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
	                  <h3 class="box-title">Form Anggota Jemaat</h3>
	                </div><!-- /.box-header -->
	                <div class="box-body">
	                <?php $data = $this->jemaat_model->getJemaat($id);
						$attMenu = array("id" => "addform", "name" => "addform");
						if ($id==0) {echo form_open("jemaat/adding", $attMenu);}
						else {echo form_open("jemaat/updating", $attMenu);}
					?>
						<div class="form-group">
							<label>Nama Depan</label>
							<input type="text" class="form-control" name="f_name" value="<?php echo @$data['f_name']; ?>"/>
						</div>

						<div class="form-group">
							<label>Nama Tengah</label>
							<input type="text" class="form-control" name="m_name" value="<?php echo @$data['m_name']; ?>"/>
						</div>

						<div class="form-group">
							<label>Nama Akhir</label>
							<input type="text" class="form-control" name="l_name" value="<?php echo @$data['l_name']; ?>"/>
						</div>

						<div class="form-group">
							<label>Jenis Kelamin</label>
							<select class="form-control" name="gender">
								<option <?php if (@$data['gender'] == 'LK' ) echo 'selected'; ?> value='LK'>Laki-laki</option>
								<option <?php if (@$data['gender'] == 'PR' ) echo 'selected'; ?> value='PR'>Perempuan</option>
							</select>
						</div>

						<div class="form-group">
							<label>Tanggal Lahir</label>
							<input type="text" class="form-control" name="dob" value="<?php echo @$data['dob']; ?>"/>
						</div>

						<div class="form-group">
							<label>Telpon Rumah</label>
							<input type="text" class="form-control" name="telp" value="<?php echo @$data['telp']; ?>"/>
						</div>

						<div class="form-group">
							<label>Alamat</label>
							<textarea class="form-control" rows="3" name="alamat" /><?php echo @$data['alamat']; ?></textarea>
						</div>

	                    <div class="form-group">
	                      <input id="id" name="id" type="hidden" value="<?php echo @$data['id']; ?>" />
						  <input class="btn btn-primary" type="submit" id="btnKat" name="btnKat" value="Save changes">
	                    </div>
	                  </form>
	                </div><!-- /.box-body -->
	              </div><!-- /.box -->
	            </div><!-- /.box-body -->
	        </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
