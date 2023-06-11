
// URL

$(document).ready(function(){


// set site url for php backend
//var site_url='';
//url:site_url+'/check_url.php'

$('#url_btn').click(function(){
//$(document).on( 'click', '.url_btn', function(){ 
		
var url  = $('#url').val();

if(url==""){
alert('Please Enter URL to Check');
//return false;
}

else{
$('#loader_url').fadeIn(400).html('<br><div style="color:black;background:#ddd;padding:10px;"><img src="ajax-loader.gif"> Please Wait! .Processing URL Link...</div>')



var datasend = {url:url};	
		$.ajax({
			
			type:'POST',
			url:'http://localhost/online_bodyguard/check_url.php',
			data:datasend,
                        crossDomain: true,
			cache:false,
			success:function(msg){
 		
$('#loader_url').hide();
$('#result_url').html(msg);
//setTimeout(function(){ $('#result_url').html(''); }, 9000);




//strip all html elemnts using jquery
var html_stripped = jQuery(msg).text();
//check occurrence of word (successful) from backend output already html stripped.
var Frombackend = html_stripped;
var bcount = (Frombackend.match(/successful/g) || []).length;
if(bcount > 0){
$('#url').val('');

}





			}
			
		});
		
		}
	
	})
					
});



$(document).ready(function(){
$('#myModal_url').on('hidden.bs.modal', function() {
  $('.myform_clean_url').empty();
 //alert("modal closed and content cleared");
});

$('#myModal_email').on('hidden.bs.modal', function() {
  $('.myform_clean_email').empty();
 //alert("modal closed and content cleared");
});


$('#myModal_phoneno').on('hidden.bs.modal', function() {
  $('.myform_clean_phoneno').empty();
 //alert("modal closed and content cleared");
});


$('#myModal_password').on('hidden.bs.modal', function() {
  $('.myform_clean_password').empty();
 //alert("modal closed and content cleared");
});


});






// Email

$(document).ready(function(){
$('#email_btn').click(function(){
//$(document).on( 'click', '.email_btn', function(){ 
		
var email  = $('#email').val();

if(email==""){
alert('Please Enter Email to Check');
//return false;
}


else{
$('#loader_email').fadeIn(400).html('<br><div style="color:black;background:#ddd;padding:10px;"><img src="ajax-loader.gif"> Please Wait! .Processing Email...</div>')



var datasend = {email:email};	
		$.ajax({
			
			type:'POST',
			url:'http://localhost/online_bodyguard/check_email.php',
			data:datasend,
                        crossDomain: true,
			cache:false,
			success:function(msg){
 		
$('#loader_email').hide();
$('#result_email').html(msg);
//setTimeout(function(){ $('#result_email').html(''); }, 9000);

setTimeout(function(){ $('#err').html(''); }, 5000);




//strip all html elemnts using jquery
var html_stripped = jQuery(msg).text();
//check occurrence of word (successful) from backend output already html stripped.
var Frombackend = html_stripped;
var bcount = (Frombackend.match(/successful/g) || []).length;
if(bcount > 0){
$('#email').val('');

}





			}
			
		});
		
		}
	
	})
					
});









// Phone Number

$(document).ready(function(){
$('#phoneno_btn').click(function(){
//$(document).on( 'click', '.phoneno_btn', function(){ 
		
var phoneno  = $('#phoneno').val();

if(phoneno==""){
alert('Please Enter phoneno to Check');
//return false;
}


else{
$('#loader_phoneno').fadeIn(400).html('<br><div style="color:black;background:#ddd;padding:10px;"><img src="ajax-loader.gif"> Please Wait! .Processing Phone Number...</div>')



var datasend = {phoneno:phoneno};	
		$.ajax({
			
			type:'POST',
			url:'http://localhost/online_bodyguard/check_phoneno.php',
			data:datasend,
                        crossDomain: true,
			cache:false,
			success:function(msg){
 		
$('#loader_phoneno').hide();
$('#result_phoneno').html(msg);
//setTimeout(function(){ $('#result_phoneno').html(''); }, 9000);


//strip all html elemnts using jquery
var html_stripped = jQuery(msg).text();
//check occurrence of word (successful) from backend output already html stripped.
var Frombackend = html_stripped;
var bcount = (Frombackend.match(/successful/g) || []).length;
if(bcount > 0){
$('#phoneno').val('');

}





			}
			
		});
		
		}
	
	})
					
});








// Password

$(document).ready(function(){
$('#password_btn').click(function(){
//$(document).on( 'click', '.password_btn', function(){ 
		
var password  = $('#pass').val();
var password_confirm  = $('#pass_confirm').val();
var hash_type  = $(".hash_type:checked").val();



if(password==""){
alert('Please Enter Password to Check');
//return false;   
}

else if(password_confirm==""){
alert('Please Confirm Password');
//return false;
}



else if(password != password_confirm){
alert('Password Does not Match');
//return false;
}

else if(hash_type==""){
alert('Please Select Password Hash Type to Check');
//return false;
}


else{
$('#loader_password').fadeIn(400).html('<br><div style="color:black;background:#ddd;padding:10px;"><img src="ajax-loader.gif"> Please Wait! .Processing Password...</div>')



var datasend = {password:password, hash_type:hash_type};	
		$.ajax({
			
			type:'POST',
			url:'http://localhost/online_bodyguard/check_password.php',
			data:datasend,
                        crossDomain: true,
			cache:false,
			success:function(msg){
 		
$('#loader_password').hide();
$('#result_password').html(msg);
//setTimeout(function(){ $('#result_password').html(''); }, 9000);


//strip all html elemnts using jquery
var html_stripped = jQuery(msg).text();
//check occurrence of word (successful) from backend output already html stripped.
var Frombackend = html_stripped;
var bcount = (Frombackend.match(/successful/g) || []).length;
if(bcount > 0){
$('#pass').val('');
$('#pass_confirm').val('');
$('.hash_type').val('');

}





			}
			
		});
		
		}
	
	})
					
});
