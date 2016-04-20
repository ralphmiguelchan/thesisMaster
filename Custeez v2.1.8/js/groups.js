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
			
			
			lmain.append("<div class='col-sm-4 notpend' style='margin:10px;width:30%;'><center><div id='proc_" + item.group_id + "'></div></center></div>");
			var rmain = $("#proc_" + item.group_id);
			
			rmain.append("<span>Name: <font style='color:#88d317'>" + item.groupName + "</font></span><br>");
			rmain.append("<span><font style='color:#bc76b2'>" + item.groupDetails + "</font></span><br>");
			rmain.append("<img src='img/group-icon.png' width='50%'></img><br>");
			rmain.append("<a href='groups.php?gid=" + item.group_id + "'>View</a>");
			rmain.append("|<a href='javascript:delGroup(\"" + item.group_id + "\");'>Delete</a>");
		});
	});
}

function searchProc(q){
	$.get("scripts/getsearchgroupif.php?q=" + q + "&uid=" + uid,function(data){
$("#main").find(".row").html("");
		
		var datum = $.parseJSON(data);
		
		$.each(datum,function(i,item){
		
			var lmain = $("#res").find(".row");
			
			

			lmain.append("<div class='col-sm-4 notpend' style='margin:10px;width:30%;'><center><div id='proc_" + item.group_id + "'></div></center></div>");
			var rmain = $("#proc_" + item.group_id);
			
			rmain.append("<span>Name: <font style='color:#88d317'>" + item.groupName + "</font></span><br>");
			rmain.append("<span><font style='color:#bc76b2'>" + item.groupDetails + "</font></span><br>");
			rmain.append("<img src='img/group-icon.png' width='50%'></img><br>");
			rmain.append("<a href='groups.php?gid=" + item.group_id + "'>View</a>");
			rmain.append("|<a href='javascript:delGroup(\"" + item.group_id + "\");'>Delete</a>");
		});
	});
}