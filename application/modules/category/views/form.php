<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Kategori</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-list"></i> Home</a></li>
            <li class="active">Kategori</li>
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
	                  <h3 class="box-title">Form Kategori</h3>
	                </div><!-- /.box-header -->
	                <div class="box-body">
	                <?php 
						$data = $this->category_model->getCat($id);
						//print_r($data);
						$attCate = array("id" => "addform", "name" => "addform");
						if ($id==0) {echo form_open("category/adding", $attCate);}
						else {echo form_open("category/updating", $attCate);}
					?>
	                    <!-- text input -->
	                    <div class="form-group">
	                      <label>Nama Kategori</label>
	                      <input type="text" class="form-control" id="title" name="title" value="<?php echo @$data['title']; ?>"/>
	                    </div>

	                    <div class="form-group">
	                      <label>Deskripsi Kategori</label>
	                      <textarea class="form-control" rows="3" id="desk" name="desk" /><?php echo @$data['desk']; ?></textarea>
	                    </div>

	                    <div class="form-group">
	                      <label>Parent Kategori</label>
	                      <select class="form-control" id="parent_id" name="parent_id">
	                        <option <?php if (@$data['parent_id'] == 0 ) echo 'selected'; ?> value='0'>Kategori Utama</option>
	                        <?php foreach($allCategory->result_array() as $dp) { ?>
							<option <?php if ($dp['id'] == @$data['parent_id'] ) echo 'selected'; ?> value="<?php echo $dp['id']; ?>"><?php echo $dp['title']; ?></option>
							<?php }  ?>
	                      </select>
	                    </div>

	                    <div class="form-group">
	                      <input id="id" name="id" type="hidden" value="<?php echo @$data['id']; ?>" />
						  <input class="btn btn-primary" type="submit" id="btnKat" name="btnKat" value="Save changes">
						  <input class="btn btn-primary" type="reset">
	                    </div>

	                  </form>
	                </div><!-- /.box-body -->
	              </div><!-- /.box -->
	            </div><!-- /.box-body -->
	        </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
