 xa<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Kegiatan Sepekan</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-list"></i> Home</a></li>
            <li class="active">Kegiatan Sepekan</li>
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
	                  <h3 class="box-title">Form Kegiatan</h3>
	                </div><!-- /.box-header -->
	                <div class="box-body">
	                <?php 
						$data = $this->kegiatan_model->getKgtn($id);
						//print_r($data);
						$attForm = array("id" => "addform", "name" => "addform");
						if ($id==0) {echo form_open_multipart("kegiatan/adding", $attForm);}
						else {echo form_open_multipart("kegiatan/updating", $attForm);}
					?>
	                    <div class="form-group" id="pickDate">
	                      <label>Tanggal Kegiatan</label>
	                      <div class="input-group date">
	                      	<input type="text" class="form-control" name="tanggal" value="<?php echo @$data['tanggal']; ?>"/>
	                      	<span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
	                      </div>
	                    </div>

	                    <div class="form-group">
	                      <label>Waktu Kegiatan</label>
	                      <input type="text" class="form-control" name="pukul" value="<?php echo @$data['pukul']; ?>"/>
	                    </div>

	                    <div class="form-group">
	                      <label>Nama Kegiatan</label>
	                      <input type="text" class="form-control" name="kegiatan" value="<?php echo @$data['kegiatan']; ?>"/>
	                    </div>

	                    <div class="form-group">
	                      <label>Tempat Kegiatan</label>
	                      <input type="text" class="form-control" name="tempat" value="<?php echo @$data['tempat']; ?>"/>
	                    </div>

	                    <div class="form-group">
	                      <label>Pemimpin Kegiatan</label>
	                      <input type="text" class="form-control" name="pemimpin" value="<?php echo @$data['pemimpin']; ?>"/>
	                    </div>

	                    <div class="form-group">
	                      <input id="id" name="id" type="hidden" value="<?php echo @$data['id']; ?>" />
						  <input class="btn btn-primary" type="submit" id="btnKat" name="btnPost" value="Save changes">
	                    </div>

	                  </form>
	                </div><!-- /.box-body -->
	              </div><!-- /.box -->
	            </div><!-- /.box-body -->
	        </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
