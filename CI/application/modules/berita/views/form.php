<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Post Berita</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-list"></i> Home</a></li>
            <li class="active">Post</li>
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
	                  <h3 class="box-title">Form Post Berita</h3>
	                </div><!-- /.box-header -->
	                <div class="box-body">
	                <?php 
						$data = $this->berita_model->getBerita($id);
						//print_r($data);
						$attPost = array("id" => "addform", "name" => "addform");
						if ($id==0) {echo form_open_multipart("berita/adding", $attPost);}
						else {echo form_open_multipart("berita/updating", $attPost);}
					?>
	                    <div class="form-group">
	                      <label>Kategori Berita</label>
	                      <select class="form-control" id="cat_id" name="cat_id">
	                        <?php foreach($allCategory->result_array() as $dc) { ?>
							<option <?php if ($dc['id'] == @$data['cat_id'] ) echo 'selected'; ?> value="<?php echo $dc['id']; ?>"><?php echo $dc['title']; ?></option>
							<?php }  ?>
	                      </select>
	                    </div>

	                    <div class="form-group">
	                      <label>Judul Berita</label>
	                      <input type="text" class="form-control" id="title" name="title" value="<?php echo @$data['title']; ?>"/>
	                    </div>

	                    <div class="form-group">
	                      <label>Isi Berita</label>
	                      <textarea class="form-control" rows="3" id="editor1" name="editor1" /><?php echo @$data['desk']; ?></textarea>
	                    </div>

	                    <div class="form-group">
	                      <label>File / Gambar</label>
	                      <input type="text" class="form-control" id="file" name="file" value="<?php echo @$data['file']; ?>"/>
	                    </div>

	                    <div class="form-group">
	                      <input id="id" name="id" type="hidden" value="<?php echo @$data['id']; ?>" />
						  <input class="btn btn-primary" type="submit" id="btnKat" name="btnPost" value="Save changes">
						  <input class="btn btn-primary" type="reset">
	                    </div>

	                  </form>
	                </div><!-- /.box-body -->
	              </div><!-- /.box -->
	            </div><!-- /.box-body -->
	        </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
