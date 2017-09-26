<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>CodeInsect | Admin System Log in</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-page">
  
  <form style="display:none;" name="after_session"  action="<?php echo  base_url('loginMe')?>" method="post">
  <input type="text" name="check_session_val" id="check_session_val" class="check_session_val" value="">
	<input type="text" name="base_url" id="base_url" class="base_url" value="<?php echo base_url();?>">
	<input type="submit" name="submit" value="submit" id="after_login_btn" class="after_login_btn">
  
  </form>   
   <div class="login-box">
      <div class="login-logo">
        <a href="#"><br>Admin System</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign In</p>
        <?php $this->load->helper('form'); ?>
        <div class="row">
            <div class="col-md-12">
                <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
            </div>
        </div>
        <?php
        $this->load->helper('form');
        $error = $this->session->flashdata('error');
        if($error)
        {
            ?>
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $error; ?>                    
            </div>
        <?php }
        $success = $this->session->flashdata('success');
        if($success)
        {
            ?>
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $success; ?>                    
            </div>
        <?php } ?>
        
        <div id='login_form'>
          <div class="form-group has-feedback">
            <input type="email" class="form-control" id='em' placeholder="Email" name="email" required />
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			<span id='email-error' style='color:red'></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password"  id='pass' class="form-control" placeholder="Password" name="password" required />
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
				<span id='pwd-error' style='color:red'></span>
			
          </div>
          <div class="row">
            <div class="col-xs-8">    
              <!-- <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Remember Me
                </label>
              </div>  -->                       
            </div><!-- /.col -->
            <div class="col-xs-4">
              <input type="submit" class="btn btn-primary btn-block btn-flat" value="Sign In" onclick="gologin()" />
            </div><!-- /.col -->
          </div>
        </div>
        <div id='error' style='color:red;font-weight:bold'>
		
		</div>
     
        
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

<script src="https://www.gstatic.com/firebasejs/4.4.0/firebase.js"></script>
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyAW8ifeuH86H774ebOh5Z0LfcA_DdKacqs",
    authDomain: "alarmer-20d6e.firebaseapp.com",
    databaseURL: "https://alarmer-20d6e.firebaseio.com/",
    projectId: "alarmer-20d6e",
    storageBucket: "alarmer-20d6e.appspot.com",
    messagingSenderId: "111972433672"
  };
  firebase.initializeApp(config);
</script>
   
    <script src="<?php echo base_url(); ?>assets/js/jQuery-2.1.4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
 <script src="<?php echo base_url(); ?>assets/js/app.js" type="text/javascript"></script>
    
 </body>
</html>