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
<script type="text/javascript">
      initApp = function() {
        firebase.auth().onAuthStateChanged(function(user) {
          if (user) {
            // User is signed in.
            var displayName = user.displayName;
            var email = user.email;
            var emailVerified = user.emailVerified;
            var photoURL = user.photoURL;
            var uid = user.uid;
            var phoneNumber = user.phoneNumber;
            var providerData = user.providerData;
            user.getIdToken().then(function(accessToken) {
              document.getElementById('sign-in-status').textContent = 'Signed in';
              document.getElementById('sign-in').textContent = 'Sign out';
              document.getElementById('account-details').textContent = JSON.stringify({
                displayName: displayName,
                email: email,
                emailVerified: emailVerified,
                phoneNumber: phoneNumber,
                photoURL: photoURL,
                uid: uid,
                accessToken: accessToken,
                providerData: providerData
              }, null, '  ');
            });
          } else {
            // User is signed out.
            document.getElementById('sign-in-status').textContent = 'Signed out';
            document.getElementById('sign-in').textContent = 'Sign in';
            document.getElementById('account-details').textContent = 'null';
          }
        }, function(error) {
          console.log(error);
        });
      };

      window.addEventListener('load', function() {
        initApp()
      });
	  function store()
	  {
		if($("#date").val()=="")
		{
		$('#error_date').html("please enter date");
		$('#suceess').html("");  
		$('#date').focus();
        return false;
		}
      else
	  {
		$('#error_date').html("");
	  }  
		if($("#title").val()=="")
		{
		$('#error_title').html("please enter title");
		$('#suceess').html(""); 
		$('#title').focus();
        return false;
		}	
		else
		  {
		$('#error_title').html("");
		  } 
		if($("#content").val()=="")
		{
		$('#error_content').html("please enter content");
		$('#suceess').html("");
		$('#content').focus();		
        return false;
		}	
		else
		  {
		$('#error_content').html("");
		  } 
		$('#suceess').html("event added sucessfully");  
		
		$date=$("#date").val();
		$title=$("#title").val();
		$content=$("#content").val();
		firebase.database().ref('events/'+$date+''	).set({
		
	 title: $title,
	 content : $content
  });
    $("#date").val("");$("#title").val("");$("#content").val("");
	  }
    </script>
	  <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap-datepicker.css" rel="stylesheet">
     
     
     <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap-datepicker.min.css" rel="stylesheet">

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-tachometer" aria-hidden="true"></i> ADD EVENT 
        <small>Control panel</small>
      </h1>
    </section>
    
    <section class="content">
        <div class="row">
           <div class="col-lg-6 col-xs-6" style="margin:0 auto;">
			   <div id='event_form' style="color:green">
			   <span id="suceess"></span>
		  <div class="form-group has-feedback">
            <input type="text" data-provide="datepicker"  id='date' class="form-control datepicker" placeholder="date" name="date" required readonly />
            <span class="glyphicon 	glyphicon glyphicon-pencil form-control-feedback"></span>
			<span id="error_date" style='color:red;'></span>
          </div>	   
          <div class="form-group has-feedback">
            <input type="text" class="form-control" id='title' placeholder="title" name="title" required />
            <span class="glyphicon 	glyphicon glyphicon-pencil form-control-feedback"></span>
				<span id="error_title" style='color:red;'></span>
          </div>
		   <div class="form-group has-feedback">
            <textarea class="form-control" id='content' placeholder="content" name="content" required /></textarea>
            <span class="glyphicon 	glyphicon glyphicon-pencil form-control-feedback"></span>
			<span id="error_content" style='color:red;'></span>
          </div>
       
          <div class="row" style='color:red;'>
            <div class="col-xs-8">    
              <!-- <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Remember Me
                </label>
              </div>  -->                       
            </div><!-- /.col -->
            <div class="col-xs-4">
              <input type="submit" class="btn btn-primary btn-block btn-flat" value="Add Event" onclick="store()" />
            </div><!-- /.col -->
          </div>
        </div>
           
          </div>
    </section>
	</div>
</div>
 <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap-datepicker.js"></script>
      
        <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap-datepicker.min.js"></script>
		  <script>
		$('.datepicker').datepicker({
     format: 'yyyy-mm-dd',
    startDate: '-3d'
});
	</script>	
    