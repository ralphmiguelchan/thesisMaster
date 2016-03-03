$(document).ready(function(){
	
	$("#editGroupBtn").click(function(){
		$.post("scripts/updategroup.php",$("#editGroupForm").serialize(),function(data){
			$("#tit").html("Group Name: " + $("#procName").val());
			$("#desc").html("Description: " + $("#procDetails").val());
		});
	});
	
	
	getGroups();
	
	$("#memberSearch").keyup(function(event){
		getMembers($("#memberSearch").val());
	});

	getGroupMembers();
	getOwnedProcess();
});

function getMembers(q){
	$.get("scripts/getsearchmember.php?q=" + q,function(data){
		$("#memberadd").html("");
		var json = $.parseJSON(data);
		
		if(q == ""){
			
		}else{
			$.each(json,function(i,item){
				$("#memberadd").append("<div style='width:230px; background:white;'>" + 
	     	"<span>" + item.username + "</span><a href='javascript:addMember(" + item.user_id + ");'>" +
	     	"<img style='float:right;' src='img/ok.png' width='20'></img></a>" + 	
	     	 "</div>");
			});
		}
	});
}
function getGroupMembers(){
	$("#memberlist").html("");
	$.get("scripts/getgroupmem.php?id=" + gid,function(data){
		var json = $.parseJSON(data);
		
		$.each(json,function(i,item){
			$("#memberlist").append("<div><span>" + (i + 1) + "." + item.username + "<span><a href='javascript:remMember(" + item.groupdata_id + ");'><img style='float:right;' src='img/del.png' width='20'></img></a></div>");
		});
	});
}
function addMember(id){
	$.get("scripts/addmember.php?gid=" + gid + "&uid=" + id,function(data){
		getGroupMembers();
	});
	
}
function getOwnedProcess(){
	$("#processlist").html("");
	$.get("scripts/getproc2.php?id=" + uid + "&gid=" + gid,function(data){
		var json = $.parseJSON(data);
		
		$.each(json,function(i,item){
			$("#processlist").append("<div style='background:#cccccc;'><span>Name: " + item.processName + "</span>" +
					"<a href='javascript:addToGroup(" + item.process_id + ");'><img style='float:right;' src='img/ok.png' width='40'></img></a>" +
					"<br><span>ID: " + item.rgid + "</span></div>");
		});
	});
}
function remMember(id){
	$.get("scripts/remember.php?id=" + id,function(data){
		getGroupMembers();
	});
}
function addToGroup(id){
	$.get("scripts/addtogroup.php?id=" + id + "&gid=" + gid,function(data){
		
		getOwnedProcess();
		getGroups();
	});
}

function remFromGroup(id){
	$.get("scripts/addtogroup.php?id=" + id + "&gid=" + 0,function(data){
		
		getOwnedProcess();
		getGroups();
	});
}

function getGroups(){
	$.get("scripts/getgroups.php?gid=" + gid,function(data){
		$("#main").find(".row").html("");
		var datum = $.parseJSON(data);
		
		$.each(datum,function(i,item){
		
			var lmain = $("#main").find(".row");
			
			lmain.append("<div class='col-sm-4 heh'><center><div id='proc_" + item.process_id + "'></div></center></div>");
			
			var rmain = $("#proc_" + item.process_id);
			
			rmain.append("<center><span>" + item.processName + "</span><br>");
			rmain.append("<span style='color:red;'>" + item.processDetails + "</span><br>");

			rmain.append("<img src='img/proc.png' width='50'></img><br>");
			rmain.append("<a href='editor.php?pid=" + item.process_id + "'>View</a>");
			rmain.append("|<a href='javascript:delProc(\"" + item.process_id + "\");'>Delete</a></center>" + 
					"<a href='javascript:remFromGroup(" + item.process_id + ");'><button type='text' class='btn btn-primary'>Remove Process </button></a>");
	});
});
}