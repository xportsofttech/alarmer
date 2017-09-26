<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <style>
    	.error{
    		color:red;
    		font-weight: normal;
    	}
    </style>
    <!-- jQuery 2.1.4 -->
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
    <script type="text/javascript">
        var baseURL = "<?php echo base_url(); ?>";
		function out()
		{
		firebase.auth().signOut();
		window.location.href =baseURL+'logout'; 
		}
		function showdata()
		{
			//alert('list');
			
			database=firebase.database();
			var ref=database.ref('events');
			ref.on('value',gotData,errData);
			
		}
		function gotData(data)
		{
			//alert('data');
			$("#loader").hide();
			console.log(data.val());
			var events=data.val();
			var keys=Object.keys(events);
			var heading="<thead class='thead-inverse'><tr><th>Date</th><th>Quote</th><th>Context</th><th>Edit</th><th>Update</th></tr></thead>";
			$("#data-event").html(heading);	
			for(i=0;i<keys.length;i++)
			 {
				var k=keys[i];
				
				var tt="<tr id='"+keys[i] +"'><td><input class='form-control' type='text' id='date' value='"+keys[i] +"'></td><td><input class='form-control' type='text' id='title' value='"+events[k].title +"'></td><td><input class='form-control' type='text' id='content' value='"+events[k].content +"'></td><td><button class='btn btn-primary' onclick='enable("+ '"'+keys[i] +'"'+")'>Edit</button></td><td><button class='btn btn-primary update' onclick='updatedata("+ '"'+keys[i] +'"'+")'>Update</button></td></tr>";
			
				
				$("#data-event").append(tt);
				$(".form-control").prop("disabled",true);
				$(".update").prop("disabled",true);
			    $('.bg-aqua').hide();
			}
		}
		function errData(err)
		{
			console.log('Error');
			console.log(err);
		}
		function enable(id)
		{
        $("#"+id+" .form-control").prop("disabled",false);
		 $("#"+id+" .update").prop("disabled",false);
		  $("#"+id+" #date").prop("disabled",true);
		}
		function updatedata(id)
		{
			//alert(id);
			var title=$("#"+id+" #title").val();
			
			var content=$("#"+id+" #content").val();
			var firebaseRef=firebase.database().ref('events/'+id);
		firebaseRef.update({title:title,content:content});
		console.log('sucess');
		}
		
    </script>
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url(); ?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>admin</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Admin</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url(); ?>assets/dist/img/avatar.png" class="user-image" alt="User Image"/>
                  <span class="hidden-xs"></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo base_url(); ?>assets/dist/img/avatar.png" class="img-circle" alt="User Image" />
                    <p>
                     
                      <small></small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                     
                    </div>
                    <div class="pull-right">
                      <a onclick="out()" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i> Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>
            <li class="treeview">
              <a href="<?php echo base_url(); ?>dashboard">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span></i>
              </a>
            </li>
            <li class="treeview">
              <a href="<?php echo base_url(); ?>user/addevent" >
                <i class="fa fa-tachometer"></i>
                <span>Add Event</span>
              </a>
            </li>
            <li class="treeview">
              <a href="<?php echo base_url(); ?>user/listevent">
                <i class="fa fa-list"></i>
                <span>List Events</span>
              </a>
            </li>
          
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>