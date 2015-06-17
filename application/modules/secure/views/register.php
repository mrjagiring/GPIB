<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>User</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-list"></i> Home</a></li>
            <li class="active">User</li>
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
	                  <h3 class="box-title">Tambah User</h3>
	                </div><!-- /.box-header -->
	                <div class="box-body">
	                  <?= form_open() ?>
	                    <div class="form-group has-feedback">
	                      <label>Nama Lengkap</label>
	                      <input type="text" class="form-control" name="fullname" placeholder="Full name"/>
	                      <span class="glyphicon glyphicon-user form-control-feedback"></span>
	                    </div>

	                    <div class="form-group has-feedback">
	                      <label>Email</label>
	                      <input type="email" name="email" class="form-control" placeholder="Email"/>
	                      <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
	                    </div>

	                    <div class="form-group has-feedback">
	                      <label>Nama User</label>
	                      <input type="text" name="username" class="form-control" placeholder="Username"/>
	                      <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
	                    </div>

	                    <div class="form-group has-feedback">
	                      <label>Password</label>
	                      <input type="password" name="password" class="form-control" placeholder="Password"/>
	                      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
	                    </div>

	                    <div class="form-group has-feedback">
	                      <label>Ulangi Password</label>
	                      <input type="password" name="password_confirm" class="form-control" placeholder="Retype password"/>
	                      <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
	                    </div>

	                    <div class="row">
	                      <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
	                    </div>

	                  </form>
	                </div><!-- /.box-body -->
	              </div><!-- /.box -->
	            </div><!-- /.box-body -->
	        </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
