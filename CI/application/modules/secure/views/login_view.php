<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<title>Login to Dashboard</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css" />	
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/login.css" />
</head>

<body id="login">
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">Sign in to continue to Dashboard</h1>
            <div class="account-wall">
                <img class="profile-img" href="<?php echo base_url(); ?>assets/images/Logo_GPIB.png" />
                <div class="row">
                    <?php if (validation_errors()) : ?>
                        <div class="col-md-12">
                            <div class="alert alert-danger" role="alert">
                                <?= validation_errors() ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if (isset($error)) : ?>
                        <div class="col-md-12">
                            <div class="alert alert-danger" role="alert">
                                <?= $error ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="col-md-12">
                        <?= form_open() ?>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Your username">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Your password">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-default" value="Login">
                            </div>
                        </form>
                    </div>
                </div><!-- .row -->
            </div>
            <a href="#" class="text-center new-account">Forgot Password </a>
        </div>
    </div>
</div>
</body>
</html>