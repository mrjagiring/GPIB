
	<!-- PAGE CONTENT --> 
	<div class="container">
		<div class="text-center">
			<img src="<?php echo base_url(); ?>assets/admin/img/logo.png" id="logoimg" alt=" Logo" />
		</div>
		<div class="tab-content">
			<div id="login" class="tab-pane active">
				<?php 
				$attlogin = array("id"=>"loginform", "name"=>"loginform", "class"=>"form-signin");
				echo form_open("panel/login", $attlogin);?>
					<p class="text-muted text-center btn-block btn btn-primary btn-rect">
						Enter your username and password
					</p>
					<input type="text" name="username" id="username" placeholder="Username" class="form-control" />
					<input type="password" name="password" id="password" placeholder="Password" class="form-control" />
					<input class="btn text-center btn-success large" type="submit" id="btn_login" name="btn_login" value="Sign into your account">
				<?php echo form_close(); ?>
				<?php echo $this->session->flashdata('msg'); ?>	
			</div>
			<div id="forgot" class="tab-pane">
				<?php 
				$attforgot = array("id"=>"forgotform", "name"=>"forgotform", "class"=>"form-signin");
				echo form_open("panel/forgot", $attforgot);?>
					<p class="text-muted text-center btn-block btn btn-primary btn-rect">Enter your valid e-mail</p>
					<input type="email"  required="required" placeholder="Your E-mail"  class="form-control" />
					<br />
					<button class="btn text-muted text-center btn-success" type="submit">Recover Password</button>
				<?php echo form_close(); ?>
				<?php echo $this->session->flashdata('msg'); ?>	
			</div>
		</div>
		<div class="text-center">
			<ul class="list-inline">
				<li><a class="text-muted" href="#login" data-toggle="tab">Login</a></li>
				<li><a class="text-muted" href="#forgot" data-toggle="tab">Forgot Password</a></li>
			</ul>
		</div>
	</div>
	<!--END PAGE CONTENT --> 