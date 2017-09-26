function gologin()
{
	if($("#em").val()=="")
	{
		$("#email-error").html('please enter valid email address');
		return false;
	}
	else
	{
		$("#email-error").html('');
	}
	if (($("#em").val().indexOf('@') < 0) || (($("#em").val().charAt($("#em").val().length-4) != '.') && ($("#em").val().charAt($("#em").val().length-3) != '.'))) 
	{
		$("#email-error").html('please enter valid email address');
		return false;
	}
	else
	{
		$("#email-error").html('');
	}
  if($("#pass").val()=="")
	{
		$("#pwd-error").html('please enter valid password');
		return false;
	}
	else
	{
		$("#pwd-error").html('');
	}
	var base_url = $("#base_url").val();
	//alert(url);
	var email= document.getElementById("em").value;
	var pass= document.getElementById("pass").value;
	//alert(pass);
	//alert(firebase.auth().signInWithEmailAndPassword(email, pass));
	const promise=firebase.auth().signInWithEmailAndPassword(email, pass);
   
	console.log(promise);

   firebase.auth().onAuthStateChanged(user=> {
	if(user)
	  {
	 // alert('if');
	  document.getElementById("error").innerHTML="";
  var user_email=user.email;
  $(".check_session_val").val(user_email);
  $(".after_login_btn").click();
  //window.location.href = base_url+'login/loginMe/'+user_email+'';
  //console.log('user',user);
	  }
	 firebase.auth().signInWithEmailAndPassword(email, pass).catch(function(error){
		// alert('error');
		 var errorcode=error.code;
		  var errorMessage=error.message;
		document.getElementById("error").innerHTML="wrong detail or invalid format";	
			return false;
  
	 }) ;
	  
	  
 
   });
   
}
