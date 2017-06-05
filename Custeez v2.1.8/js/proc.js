$(document).ready(function(){
	viewProc();

	$("#searchProc").keyup(function(event){
	searchProc($("#searchProc").val());
	});
});
function viewProc(){

	$.get("scripts/getproc.php?id=" + uid,function(data,status){
		$("#main").find(".row").html("");

		var datum = $.parseJSON(data);

		$.each(datum,function(i,item){

			var lmain = $("#res").find(".row");


			lmain.append("<div class='col-sm-3 notpend' style='margin:10px;width: 30%;'><center><div class='easytree-draggable' id='" + item.process_id + "'></div></center></div>");
			var rmain = $("#" + item.process_id);

			rmain.append("<span>Name: <font style='color:#88d317'>" + item.processName + "</font></span><br>");
			rmain.append("<span><font style='color:#6E3667'><i>" + item.processDetails + "</i></font></span><br>");
			rmain.append("<span><font style='color:#6E3667'><i>ID: " + item.rgid + "</span><br><br>");
			rmain.append("<img src='img/process-icon.png' width='120px'></img><br><br>");
			rmain.append("<a href='editor.php?pid=" + item.process_id + "'><button type='button' class='btn btn-success'>View</button></a>");
			rmain.append("<a href='javascript:delProc(\"" + item.process_id + "\");'><button type='button' class='btn btn-danger'> Delete</button></a>");
		});
	});
}

function searchProc(q){
	$.get("scripts/getsearchprocid2.php?q=" + q + "&uid=" + uid,function(data){
$("#main").find(".row").html("");

		var datum = $.parseJSON(data);

		$.each(datum,function(i,item){

var lmain = $("#res").find(".row");


lmain.append("<div class='col-sm-3 notpend' style='margin:10px;width: 30%;'><center><div class='easytree-draggable' id='" + item.process_id + "'></div></center></div>");
var rmain = $("#" + item.process_id);

rmain.append("<span>Name: <font style='color:#88d317'>" + item.processName + "</font></span><br>");
rmain.append("<span><font style='color:#6E3667'><i>" + item.processDetails + "</i></font></span><br>");
rmain.append("<span><font style='color:#6E3667'><i>ID: " + item.rgid + "</span><br><br>");
rmain.append("<img src='img/process-icon.png' width='120px'></img><br><br>");
rmain.append("<a style='color: #000;' href='editor.php?pid=" + item.process_id + "'><button type='button' class='btn btn-success'>View</button></a>");
rmain.append("<a style='color: #000;' href='javascript:delProc(\"" + item.process_id + "\");'><button type='button' class='btn btn-danger'>Delete</button></a>");
		});
	});
}
