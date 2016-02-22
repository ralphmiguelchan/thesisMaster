$(document).ready(function(){
	viewProc();
	
	$("#searchProc").keyup(function(event){
	searchProc($("#searchProc").val());
	});
});
function viewProc(){
	setWidth();
	$.get("scripts/getproc.php?id=" + uid,function(data,status){
		$("#main").find(".row").html("");
		
		var datum = $.parseJSON(data);
		
		$.each(datum,function(i,item){
		
			var lmain = $("#res").find(".row");
			
			
			lmain.append("<div class='col-sm-4 heh'><center><div id='proc_" + item.process_id + "'></div></center></div>");
			var rmain = $("#proc_" + item.process_id);
			
			rmain.append("<span>" + item.processName + "</span><br>");
			rmain.append("<span style='color:red;'><i>" + item.processDetails + "</i></span><br>");
			rmain.append("<span style='color:red;'>ID: " + item.rgid + "</span><br>");
			rmain.append("<img src='img/proc.png' width='50'></img><br>");
			rmain.append("<a href='editor.php?pid=" + item.process_id + "'>Edit</a>");
			rmain.append("|<a href='javascript:delProc(\"" + item.process_id + "\");'>Delete</a>");
		});
	});
}

function searchProc(q){
	$.get("scripts/getsearchprocid.php?q=" + q + "&uid=" + uid,function(data){
$("#main").find(".row").html("");
		
		var datum = $.parseJSON(data);
		
		$.each(datum,function(i,item){
		
var lmain = $("#res").find(".row");
			
			
			lmain.append("<div class='col-sm-4 heh'><center><div id='proc_" + item.process_id + "'></div></center></div>");
			var rmain = $("#proc_" + item.process_id);
			
			rmain.append("<span>" + item.processName + "</span><br>");
			rmain.append("<span style='color:red;'>" + item.processDetails + "</span><br>");
			rmain.append("<img src='img/proc.png' width='50'></img><br>");
			rmain.append("<a href='editor.php?pid=" + item.process_id + "'>Edit</a>");
			rmain.append("|<a href='javascript:delProc(\"" + item.process_id + "\");'>Delete</a>");
		});
	});
}