<html>
<head>
	<!-- Bootstrap -->
	<link href="<?php echo base_url() ?>plugins/Bootstrap-3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>assets/css/style_login.css" rel="stylesheet" type="text/css" />
	<title>Login - PT.PAL Medical check up</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-offset-5 col-md-3">
				<div class="form-login">
					<h4>Selamat Datang.</h4>
					
					<?php $msg = $this->session->flashdata('error');?>
					<?php if ($msg):?>
						<div class="alert alert-error" style="text-align:center">
							Maaf, Username atau password salah!
						</div>
					<?php endif?>
					<form method="post" action="<?php echo base_url(); ?>authuser/validate" class="form-horizontal">
						<input type="text" id="userName" name="username" class="form-control input-sm chat-input" placeholder="username" />
						</br>
						<input type="password" id="userPassword" name="password" class="form-control input-sm chat-input" placeholder="password" />
						</br>
						<div class="wrapper">
						<span class="group-btn">     
							<input type="submit" value="Sign in" class="btn btn-primary"/>
						</span>
						</div>
					</form>
					
					<div class="footer-login">&copy; copyright Politeknik Perkapalan Negeri Surabaya | PT. PAL Indonesia</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>