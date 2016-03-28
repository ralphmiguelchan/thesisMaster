$(document).ready(function(){
	setInterval("checkPendingProc()",2000);
	setInterval("checkPendingForms()",2000);
	setInterval("checkAccDec()",2000);
});
var pendproc = 0;
var pendform = 0;
var pendacc = 0;
function checkPendingProc(){
	$.get("scripts/counttrack.php?uid=" + uid,function(data,status){
		if(pendproc < data){
			pendproc = data;
			FillPendingProc();
		}
	});
}
function checkPendingForms(){
	$.get("scripts/countforms.php?uid=" + uid,function(data,status){
		if(pendform < data){
			pendform = data;
			FillPendingForm();
		}
	});
}

function checkAccDec(){
	$.get("scripts/countaccdec.php?uid=" + uid,function(data,status){
		if(pendacc < data){
			pendacc = data;
			FillAccDec();
		}
	});
}

function FillPendingForm(){

	$.get("scripts/getpendingform.php?uid=" + uid,function(data){
		var json = $.parseJSON(data);
		$("#notif").find(".row").html("");
		$.each(json,function(i,item){
			$("#notif").find(".row").append('<div class="col-sm-2">' +
					'<div class="notpend">'+
					'<center>'+
					'<span style="font-size:10px;">Name:' + item.formName + '</span><br>' +
					'<span style="font-size:10px;">Process:' + item.processName + '</span><br>' +
					'<span style="font-size:10px; color:red;">Submitted By: ' + item.username + '</span><br>'+
					'<img src="img/forms.png" width="60"><br>' +
					'<button type="text" class="btn btn-primary" onClick="ViewForm(' + item.sub_id + ');">View</button>' +
					'</center></div></div>');
		});
	});
}

function FillAccDec(){

	
	$.get("scripts/accdecform.php?uid=" + uid,function(data){
		var json = $.parseJSON(data);
		$("#appdecform").find(".row").html("");
		$.each(json,function(i,item){
			if(item.substatus == 1){
				$("#appdecform").find(".row").append('<div class="col-sm-2">' +
						'<div class="notpend">'+
						'<center>'+
						'<span style="font-size:10px;">' + item.formName + '</span><br>' +
						'<span style="font-size:10px; color:green;">Accepted!</span><br>'+
						'<img src="img/forms.png" width="80"><br>' +
						'<button type="text" class="btn btn-primary" onClick="ViewForm2(' + item.sub_id + ');">View</button>' +
						'</center></div></div>');
			}else if(item.substatus == 2){
				$("#appdecform").find(".row").append('<div class="col-sm-2">' +
						'<div class="notpend">'+
						'<center>'+
						'<span style="font-size:10px;">' + item.formName + '</span><br>' +
						'<span style="font-size:10px; color:red;">Declined!</span><br>'+
						'<img src="img/forms.png" width="80"><br>' +
						'<button type="text" class="btn btn-primary" onClick="ViewForm2(' + item.sub_id + ');">View</button>' +
						'</center></div></div>');
			}else{
				$("#appdecform").find(".row").append('<div class="col-sm-2">' +
						'<div class="notpend">'+
						'<center>'+
						'<span style="font-size:10px;">' + item.formName + '</span><br>' +
						'<span style="font-size:10px; color:green;">Accepted!</span><br>'+
						'<img src="img/forms.png" width="80"><br>' +
						'<button type="text" class="btn btn-primary" onClick="ViewForm2(' + item.sub_id + ');">View</button>' +
						'</center></div></div>');
			}
		});
	});
}

function FillPendingProc(){
	$.get("scripts/getpendingprocess.php?uid=" + uid,function(data){
		var json = $.parseJSON(data);
		$("#pendproc").find(".row").html("");
		$.each(json,function(i,item){
			$.get("scripts/countproc.php?pid=" + item.process_id,function(datax){
				$("#pendproc").find(".row").append('<div class="col-sm-2">' +
				'<div class="notpend">'+
				'<center>'+
				'<span style="font-size:10px;">Name:' + item.processName + '</span><br>' +
				'<span style="font-size:10px;">Owned:' + item.username + '</span><br>' +

				'<span style="font-size:10px; color:red;">ID:' + item.rgid + '</span><br>'+
				'<img src="img/proc.png"><br>' +
				'<div id="p_' + item.rgid + '"></div>' +
				'<a href="viewprocess.php?pid=' + item.process_id + '"><button type="button" class="btn btn-primary">View</button></a>' + 
				'</center>' +
				'</div>' +
				'</div>');
				
				
				if(item.tstatus == 0){
					$("#p_" + item.rgid).append('<span>Progress: ' + item.stepNum + '/' + datax + '</span>');
				}else if(item.tstatus == 1){
					$("#p_" + item.rgid).append('<span>Finished!</span>');

				}
			});
		});
	});
}

function ViewForm2(id){
	$.get("scripts/getsubform.php?id=" + id,function(data){
		$("#f2").html("");
		$.each($.parseJSON(data),function(i,item){
			$("#f2").append("<fieldset><legend>" + item.formName + "</legend><div id='fields2'></div></fieldset>");
			
			var json = $.parseJSON(item.subFormData);
			
			$.each(json,function(ii,itemm){
				$.each(itemm,function(iii,itemmm){
					if(itemmm.type == "text"){
						$("#fields2").append("<div class='form-group'>" +
								"<span>" + itemmm.title + ":</span><br>" + 
								"<span style='color:red;'>" + itemmm.desc + "</span><br>" +
								"<input type='text' class='form-control' value='" + itemmm.val + "' disabled/><hr>");
					}else if(itemmm.type == "textarea"){
						$("#fields2").append("<div class='form-group'>" +
								"<span>" + itemmm.title + ":</span><br>" + 
								"<span style='color:red;'>" + itemmm.desc + "</span><br>" +
								"<textarea class='form-control' disabled>" + itemmm.val + "</textarea><hr>");
					}else if(itemmm.type == "check"){
						var rands = Math.floor((Math.random() * 99999) + 1);
						$("#fields2").append("<div id='c_" + rands + "' class='form-group'>" +
								"<span>" + itemmm.title + ":</span><br>" + 
								"<span style='color:red;'>" + itemmm.desc + "</span><br>");
						
						$.each(itemmm.val,function(g,s){
							$("#c_" + rands).append("<input type='checkbox' class='form-control' checked disabled>" + s + "</input><br>");
						});
						$("#c_" + rands).append("<hr>");
					}else if(itemmm.type == "radio"){
						var rands = Math.floor((Math.random() * 99999) + 1);
						$("#fields2").append("<div id='c_" + rands + "' class='form-group'>" +
								"<span>" + itemmm.title + ":</span><br>" + 
								"<span style='color:red;'>" + itemmm.desc + "</span><br>" + 
								"<input type='radio' value='" + itemmm.val + "' disabled checked/>" + itemmm.val + "</input><hr>");
					}else if(itemmm.type == "select"){
						var rands = Math.floor((Math.random() * 99999) + 1);
						$("#fields2").append("<div id='c_" + rands + "' class='form-group'>" +
								"<span>" + itemmm.title + ":</span><br>" + 
								"<span style='color:red;'>" + itemmm.desc + "</span><br>" + 
								"<select class='form-control' disabled>" +
								"<option value='" + itemmm.val + "'>" + itemmm.val + "</option>" + 
								"</select>");
					}
				});
			});
		});
		
		$("#viewform2").modal('show');
	});
}
function ViewForm(id){
	$.get("scripts/getsubform.php?id=" + id,function(data){
		$("#f").html("");
		$.each($.parseJSON(data),function(i,item){
		
			$("#f").append("<fieldset><legend>" + item.formName + "</legend><div id='fields'></div></fieldset>");
			
			var json = $.parseJSON(item.subFormData);
			
			$.each(json,function(ii,itemm){
				$.each(itemm,function(iii,itemmm){
					if(itemmm.type == "text"){
						$("#fields").append("<div class='form-group'>" +
								"<span>" + itemmm.title + ":</span><br>" + 
								"<span style='color:red;'>" + itemmm.desc + "</span><br>" +
								"<input type='text' class='form-control' value='" + itemmm.val + "' disabled/><hr>");
					}else if(itemmm.type == "textarea"){
						$("#fields").append("<div class='form-group'>" +
								"<span>" + itemmm.title + ":</span><br>" + 
								"<span style='color:red;'>" + itemmm.desc + "</span><br>" +
								"<textarea class='form-control' disabled>" + itemmm.val + "</textarea><hr>");
					}else if(itemmm.type == "file"){
						$("#fields").append("<div class='form-group'>" +
								"<span>" + itemmm.title + ":</span><br>" + 
								"<span style='color:red;'>" + itemmm.desc + "</span><br>" +
								"<a href='http://localhost/" + itemmm.val + "' target='_blank'><button type='button' class='btn btn-primary'>Open File</button></a><hr>");
					}else if(itemmm.type == "check"){
						var rands = Math.floor((Math.random() * 99999) + 1);
						$("#fields").append("<div id='c_" + rands + "' class='form-group'>" +
								"<span>" + itemmm.title + ":</span><br>" + 
								"<span style='color:red;'>" + itemmm.desc + "</span><br>");
						
						$.each(itemmm.val,function(g,s){
							$("#c_" + rands).append("<input type='checkbox' class='form-control' checked disabled>" + s + "</input><br>");
						});
						$("#c_" + rands).append("<hr>");
					}else if(itemmm.type == "radio"){
						var rands = Math.floor((Math.random() * 99999) + 1);
						$("#fields").append("<div id='c_" + rands + "' class='form-group'>" +
								"<span>" + itemmm.title + ":</span><br>" + 
								"<span style='color:red;'>" + itemmm.desc + "</span><br>" + 
								"<input type='radio' value='" + itemmm.val + "' disabled checked/>" + itemmm.val + "</input><hr>");
					}else if(itemmm.type == "select"){
						var rands = Math.floor((Math.random() * 99999) + 1);
						$("#fields").append("<div id='c_" + rands + "' class='form-group'>" +
								"<span>" + itemmm.title + ":</span><br>" + 
								"<span style='color:red;'>" + itemmm.desc + "</span><br>" + 
								"<select class='form-control' disabled>" +
								"<option value='" + itemmm.val + "'>" + itemmm.val + "</option>" + 
								"</select>");
					}
				});
			});
		});
		
		$("#ap").attr("href","javascript:accept(" + id + ");")
		$("#de").attr("href","javascript:decline(" + id + ");")

		$("#viewform").modal('show');
	});
}

function accept(id){
	$.get("scripts/accept.php?sid=" + id + "&uid=" + uid,function(data){
		swal({   
			title: "Accepted!",   
			text: "Accepted Successfully",   
			type: "success",   
			confirmButtonText: "Thanks" },function(){
				$("#viewform").modal('hide');
			});
	});
}
function decline(id){
	$.get("scripts/decline.php?sid=" + id + "&uid=" + uid,function(data){
		swal({   
			title: "Declined!",   
			text: "Declined Successfully",   
			type: "success",   
			confirmButtonText: "Thanks" },function(){
				$("#viewform").modal('hide');
			});
	});
}