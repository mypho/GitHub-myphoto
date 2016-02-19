
function yzm(){
	var val=document.getElementById('yzm_code').value;
	if(val.length=='4'){
		$.post("dealLogin.php",{yzm_code:val},function(data){
			if(data=='1'){
				$("#yzmok").html("<img src='ok.png'><span style='color:#0a0;size:12px'>正确</span>");
			}
			else
				$("#yzmok").html("<img src='er.png'><span style='color:#f00;size:12px'>错误</span>");
		});
	}
}

function Isuserlg(){	
		var user=$("#user").val();
		var Regx = /^[A-Za-z0-9]*$/;
		if (!Regx.test(user)){$("#userle").html("<span style='color:#f00;size:12px'>账号只能包含英文和数字</span>");}
		else if(user.length<6){$("#userle").html("<span style='color:#f00;size:12px'>账号至少6位</span>");}
		else{
			$.post("userle.php",{user:$("#user").val()},function(r){
				if(r=='1'){$("#userle").html("<img src='er.png'><span style='color:#f00;size:12px'>账号已被使用，请更改后再尝试</span>");}
				else if(r=='2'){$("#userle").html("<img src='ok.png'><span style='color:#0a0;size:12px'>账号未被使用</span>");}
				else {$("#userle").html("<img src='er.png'><span style='color:#a00;size:12px'>连接失败</span>");}
			});
		}
}
function passwordck(){
	if($("#password").val()!=$("#passwordc").val()){
		$("#passwordck").html("<img src='er.png'><span style='color:#f00;size:12px'>两次输入的密码不一样</span>");
	}else{
		$("#passwordck").html("<img src='ok.png'><span style='color:#0c0;size:12px'>两次输入的密码一致</span>");
	}
}
$(document).ready(function(){

	$("#yzm_code").keyup(function(){yzm();});
	$("#user").change(function(){Isuserlg();});
	$("#user").keyup(function(){Isuserlg();});
	$("#changepic").click(function(){
		document.getElementById('code').src ='verification.php?n='+Math.random()*10000;
		document.getElementById('yzm_code').value="";
		$("#yzmok").html("");
	});
	$("#password").change(function(){
		if($("#passwordc").val())
			passwordck();
	});
	$("#passwordc").change(function(){
		if($("#password").val())
			passwordck();
		else
			$("#passwordck").html("<img src='er.png'><span style='color:#f00;size:12px'>请先输入密码！</span>");
	});
	
});



function Judge(form){
	var Regx = /^[A-Za-z0-9]*$/;
			
		if(form.user.value==""){
			form.user.focus();
			return (false);
		}
		else if(form.user.value.length<6){
			form.user.focus();
			return (false);
		}
		else if (!Regx.test(form.user.value)){
			form.user.focus();
			return (false);
		}
		else if(form.uname.value==""){
			form.uname.focus();
			return (false);
		}
		else if(form.password.value.length<8){
			alert("密码至少要8位!");
			form.password.value="";
			form.passwordc.value="";
			form.password.focus();
			return (false);
		}		
		else if(form.password.value!=form.passwordc.value){
			form.passwordc.value="";
			form.passwordc.focus();
			return (false);
		}
		else if($('input:radio[name="sex"]:checked').val()==null){
			$('#sexm').focus();
			return (false);
		}
		if(form.email.value==""){
			form.email.focus();
			return (false);
		}
		
	
}// JavaScript Document