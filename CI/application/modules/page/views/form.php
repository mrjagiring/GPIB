<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Menu Page</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-list"></i> Home</a></li>
            <li class="active">Menu</li>
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
	                  <h3 class="box-title">Form Menu</h3>
	                </div><!-- /.box-header -->
	                <div class="box-body">
	                <?php 
						$data = $this->page_model->getPage($id);
						//print_r($data);
						$attMenu = array("id" => "addform", "name" => "addform");
						if ($id==0) {echo form_open("page/adding", $attMenu);}
						else {echo form_open("page/updating", $attMenu);}
					?>
						<div class="form-group">
							<label>Parent Menu</label>
							<select class="form-control" id="parent_id" name="parent_id">
								<option <?php if (@$data['parent_id'] == 0 ) echo 'selected'; ?> value='0'>Menu Utama</option>
								<?php $allMenu = $this->page_model->rootPage(); ?>
								<?php foreach($allMenu as $dm) { ?>
								<option <?php if ($dm->id == @$data['parent_id'] ) echo 'selected'; ?> value="<?php echo $dm->id; ?>"><?php echo $dm->title; ?></option>
								<?php }  ?>
							</select>
						</div>

	                    <div class="form-group">
	                    	<label>Nama Menu</label>
	                    	<input type="text" class="form-control" id="title" name="title" value="<?php echo @$data['title']; ?>"/>
	                    </div>

	                    <div class="form-group">
							<label>Target Link</label>
							<select class="form-control" id="mySelect" name="mySelect">
								<option <?php if (@$data['target'] == '#' ) echo 'selected'; ?> value='0'>Root Menu</option>
								<option <?php if (@$data['target'] == 'page' ) echo 'selected'; ?> value='1'>Link to Page</option>
								<option <?php if (@$data['target'] == 'category' ) echo 'selected'; ?> value='2'>Link to Category</option>
							</select> <br />
							<ul class="nav nav-tabs" id="myTab" data-tab data-options="deep_linking: true">
								<li class="active"><a href="#root">Root Menu</a></li>
								<li><a href="#page">Page Content</a></li>
								<li><a href="#category">Kategori</a></li>
							</ul>
							<div class="tab-content">
								<div id="root" class="tab-pane active form-group">Target akan link ke #</div>

								<div id="page" class="tab-pane form-group">
									<textarea class="form-control" rows="3" id="editor1" name="editor1" /><?php echo @$data['content']; ?></textarea>
								</div>

								<div id="category" class="tab-pane form-group">
									<select class="form-control" id="slug" name="slug">
										<option <?php if (@$data['slug'] == 0 ) echo 'selected'; ?> value='0'>Kategori Utama</option>
										<?php foreach($allCategory->result_array() as $dp) { ?>
										<option <?php if ($dp['id'] == @$data['menu_title'] ) echo 'selected'; ?> value="<?php echo $dp['id']; ?>"><?php echo $dp['title']; ?></option>
										<?php }  ?>
									</select>
								</div>
							</div>
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
