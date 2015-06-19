 xa<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Sabda Bina Umat</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-list"></i> Home</a></li>
            <li class="active">SBU</li>
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
						$data = $this->sbu_model->getSbu($id);
						//print_r($data);
						$attForm = array("id" => "addform", "name" => "addform");
						if ($id==0) {echo form_open_multipart("sbu/adding", $attForm);}
						else {echo form_open_multipart("sbu/updating", $attForm);}
					?>
	                    <div class="form-group" id="pickDate">
	                      <label>Tanggal SBU</label>
	                      <div class="input-group date">
	                      	<input type="text" class="form-control" name="tanggal" value="<?php echo @$data['tanggal']; ?>"/>
	                      	<span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
	                      </div>
	                    </div>

	                    <div class="form-group">
	                      <label>Kategori SBU</label>
	                      <select class="form-control" name="kategori">
								<option <?php if (@$data['kategori'] == 'pagi' ) echo 'selected'; ?> value='pagi'>SBU Pagi</option>
								<option <?php if (@$data['kategori'] == 'malam' ) echo 'selected'; ?> value='malam'>SBU Malam</option>
							</select>
	                    </div>

	                    <div class="form-group">
	                      <label>Nats</label>
	                      <input type="text" class="form-control" name="nats" value="<?php echo @$data['nats']; ?>"/>
	                    </div>

	                    <div class="form-group">
	                      <label>Nyanyian</label>
	                      <input type="text" class="form-control" name="nyanyian" value="<?php echo @$data['nyanyian']; ?>"/>
	                    </div>

	                    <div class="form-group">
	                      <label>Judul Sabda</label>
	                      <input type="text" class="form-control" name="judul" value="<?php echo @$data['judul']; ?>"/>
	                    </div>

	                    <div class="form-group">
	                      <label>Isi Sabda</label>
	                      <?php echo $this->ckeditor->editor("desk",@$data['desk']); ?>
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
