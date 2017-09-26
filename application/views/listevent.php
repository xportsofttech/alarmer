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
	  
	 showdata();
	  
  });
</script><style>#loader {  position: absolute;  left: 50%;  top: 50%;  z-index: 1;  width: 150px;  height: 150px;  margin: -75px 0 0 -75px;  border: 16px solid #f3f3f3;  border-radius: 50%;  border-top: 16px solid #3498db;  width: 120px;  height: 120px;  -webkit-animation: spin 2s linear infinite;  animation: spin 2s linear infinite;}@-webkit-keyframes spin {  0% { -webkit-transform: rotate(0deg); }  100% { -webkit-transform: rotate(360deg); }}@keyframes spin {  0% { transform: rotate(0deg); }  100% { transform: rotate(360deg); }}/* Add animation to "page content" */.animate-bottom {  position: relative;  -webkit-animation-name: animatebottom;  -webkit-animation-duration: 1s;  animation-name: animatebottom;  animation-duration: 1s}@-webkit-keyframes animatebottom {  from { bottom:-100px; opacity:0 }   to { bottom:0px; opacity:1 }}@keyframes animatebottom {   from{ bottom:-100px; opacity:0 }   to{ bottom:0; opacity:1 }}</style> <div id="loader"></div> 

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-tachometer" aria-hidden="true"></i> Events
        <small>Control panel</small>
      </h1>
    </section>
    
    <section class="content">
        <div class="row">
           
            <div class="row" style="margin: 0 auto;width: 800px;">
			
			<div class="col-lg-12 col-xs-6">
			
			<table class="table table-striped table-hover table-bordered" style="border:2px solid #dedede;" id='data-event' border='2' style="" ></table>
			</div>
			
            </div>
          </div>
    </section>
</div>
