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
  $(document).ready(function(){
	  
	database=firebase.database();
   var ref=database.ref('events');
   database=firebase.database();
   ref.on('value',countData,errData);
   function countData(data)
  {
	  var events=data.val();
	 $keycount= Object.keys(events);
	$("#cnt").html( $keycount.length);
  }  
  });
</script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard
        <small>Control panel</small>
      </h1>
    </section>
    
    <section class="content">
        <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
			  
              <div class="small-box bg-aqua">
                <div class="inner">
                  <a href="<?php echo base_url(); ?>user/listevent"><h3 id='cnt'></h3></a>
                  <p>Events</p>
                </div>
                <div class="icon">
                  <i class="fa fa-tachometer"></i>
                </div>
                <a href="#" class="small-box-footer">&nbsp;</a>
              </div>
			  
            </div><!-- ./col -->
            <div class="row">
			<div class="col-lg-3 col-xs-6">
			<table class="table" id='data-event' border='2'></table>
			</div>
            </div>
          </div>
    </section>
</div>
