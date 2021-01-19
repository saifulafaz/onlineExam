$(function(){
	//For user Registration
	$("#registration").click(function(){
		var name     = $('#name').val();
		var username = $('#username').val();
		var password = $('#password').val();
		var email    = $('#email').val();

		var dataString = 'name='+name+'&username='+username+'&password='+password+'&email='+email;
	alert('dataString');
		$.ajax({
			type:'POST',
			url:'getregister.php',
			data:dataString,

			success:function(data){
				$('#state').html(data);
			}
		});
		return false;
	});


	//for user login

	$('#loginsubmit').click(function(){

		var email = $('#email').val();
		var password = $('#password').val();
		var dataString = 'email='+email+'&password='+password;
		
		$.ajax({
			type:"POST",
			url:"getlogin.php",
			data:dataString,
			success:function(data){
				if ($.trim(data)=="empty") {
					$('.empty').show();
					//$('.disable').hide();
					//$('.error').hide();
					setTimeout(function(){
						$(".empty").fadeOut();
					},3000);
				} else if($.trim(data)=="disabled"){
					$('.disable').show();
					//$('.error').hide();
					//$('.empty').hide();
					setTimeout(function(){
						$(".disable").fadeOut();
					},3000);
				}else if($.trim(data)=="error"){
					$('.error').show();
					//$('.empty').hide();
					//$('.disable').hide();
					setTimeout(function(){
						$(".error").fadeOut();
					},3000);
				}else{
					window.location ="exam.php";
				}
			}
		});
		return false;
	});


//user profile update(examinee)

	 $('#update_profile').click(function(){
		var name = $('#name').val();
		var username = $('#username').val();
		var email = $('#email').val();

		var dataString = 'n='+name+'&un='+username+'&m='+email;
  //alert('ok');
		$.ajax({
			type:"POST",
			url:"updateProfile.php",
			data:dataString,

			success:function(data){
				$('#updateMsg').html(data);
			}
		});
		return false;
	 });
});