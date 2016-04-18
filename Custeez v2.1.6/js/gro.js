$(document).ready(function(){
	getGroupProcesses();
});


function getGroupProcesses(){
	$.get("scripts/getrealgroup.php?id=" + gid,function(data){
		var json = $.parseJSON(data);
		$("#res").find(".row").html("");
		$.each(json,function(i,item){
			var lmain = $("#res").find(".row");
			
			
			lmain.append("<div class='col-sm-4 heh'><center><div id='proc_" + item.process_id + "'></div></center></div>");
			var rmain = $("#proc_" + item.process_id);
			
			rmain.append("<span>" + item.processName + "</span><br>");
			rmain.append("<span style='color:red;'><i>" + item.processDetails + "</i></span><br>");
			rmain.append("<span style='color:red;'>ID: " + item.rgid + "</span><br>");
			rmain.append("<img src='img/proc.png' width='50'></img><br>");
			rmain.append("<a href='viewprocess.php?pid=" + item.process_id + "'>View</a>");
		});
	});
}