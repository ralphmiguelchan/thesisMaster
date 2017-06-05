$(document).ready(function(){
	viewGroup();

	$("#searchProc").keyup(function(event){
	searchProc($("#searchProc").val());
	});
});
function viewGroup(){


	$.get("scripts/getgro.php?id=" + uid,function(data,status){
		$("#main").find(".row").html("");

		var datum = $.parseJSON(data);

		$.each(datum,function(i,item){

			var lmain = $("#res").find(".row");


			lmain.append("<div class='col-sm-3 notpend' style='margin:10px;width:30%;'><center><div id='proc_" + item.group_id + "'></div></center></div>");
			var rmain = $("#proc_" + item.group_id);

			rmain.append("<span>Name: <font style='color:#88d317'>" + item.groupName + "</font></span><br>");
			rmain.append("<span><font style='color:#6E3667'>" + item.groupDetails + "</font></span><br>");
			rmain.append("<br><img src='img/group-icon.png' width='120px'></img><br><br>");
			rmain.append("<a href='groups.php?gid=" + item.group_id + "'><button type='button' class='btn btn-success'>View</button></a>");
			rmain.append("<a href='javascript:delGroup(\"" + item.group_id + "\");'><button type='button' class='btn btn-danger'> Delete</button></a>");
		});
	});
}

function searchProc(q){
	$.get("scripts/getsearchgroupif.php?q=" + q + "&uid=" + uid,function(data){
$("#main").find(".row").html("");

		var datum = $.parseJSON(data);

		$.each(datum,function(i,item){

			var lmain = $("#res").find(".row");



			lmain.append("<div class='col-sm-3 notpend' style='margin:10px;width:30%;'><center><div id='proc_" + item.group_id + "'></div></center></div>");
			var rmain = $("#proc_" + item.group_id);

			rmain.append("<span>Name: <font style='color:#88d317'>" + item.groupName + "</font></span><br>");
			rmain.append("<span><font style='color:#6E3667'>" + item.groupDetails + "</font></span><br>");
			rmain.append("<br><img src='img/group-icon.png' width='120px'></img><br>");
			rmain.append("<a href='groups.php?gid=" + item.group_id + "'><button type='button' class='btn btn-success'>View</button></a>");
			rmain.append("<a href='javascript:delGroup(\"" + item.group_id + "\");'><button type='button' class='btn btn-danger'>Delete</button></a>");
		});
	});
}
