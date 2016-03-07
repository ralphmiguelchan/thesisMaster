$(function(){
	if(pid == 0){
		viewFormTree();
	}
	$("#search").keyup(function(event){
		searchForm($("#search").val());
		});
});

function searchForm(q){
	$.get("scripts/getsearchform.php?q=" + q + "&fid=" + fid,function(data){
		var json = $.parseJSON(data);
		var header = $("#header");
		header.html("");
		$.each(json,function(i,item){
			var datum = $.parseJSON(item.subFormData);
			header.html("");
			$.each(datum,function(ii,itemm){
				$.each(itemm,function(iii,itemmm){
					header.append("<th>" + itemmm.title + "</th>");
				});
			});
		});
		
		var dat = $("#datum");
		dat.html("");
		$.each(json,function(i,item){
			dat.append("<tr id='" + i + "'></tr>");
			var mix = $("#" + i);
			var datum = $.parseJSON(item.subFormData);
			$.each(datum,function(ii,itemm){
				$.each(itemm,function(iii,itemmm){
					mix.append("<td>" + itemmm.val + "</td>");
				});
			});
		});
		
		$.get("scripts/countsearchform.php?q=" + q + "&fid=" + fid,function(data){
			$("#cn").html(data);
		});
	});
}

function viewGroupTree(){
	$.get("scripts/getgro.php?id=" + uid,function(data,status){
		
		var datum = $.parseJSON(data);

		$.each(datum,function(i,item){
			$("#group").append("<li class='jstree-drop' id='g_" + item.group_id + "'><a href='groups.php?gid=" + item.group_id + "'>" + item.groupName + "</a></li>");
		});
	});
	
}

function canDrop(event, nodes, isSourceNode, source, isTargetNode, target) {
    if (!isTargetNode && target.id == 'divAcceptHref' && isSourceNode){
        return source.href ? true : false;
    }
    if (isTargetNode) {
        return true;
    }
}
function dropping(event, nodes, isSourceNode, source, isTargetNode, target, canDrop) {
    if (isSourceNode && !canDrop && target && (!isTargetNode && (target.id == 'divRejectAll' || target.id == 'divAcceptHref'))) {
        alertMessage("Dropping node rejected '" + source.text + "'");
    }
}

function addToGroup(id,gid){
	gid = gid.replace("g_","");
	$.get("scripts/addtogroup.php?id=" + id + "&gid=" + gid,function(data){
		document.location = "groups.php?gid=" + gid;
	});
}

function dropped(event, nodes, isSourceNode, source, isTargetNode, target) {
    // internal to external drop
    if (isSourceNode && target && (!isTargetNode && (target.id == 'divAcceptAll' || target.id == 'divAcceptHref'))) {
        alertMessage("Dropped node accepted '" + source.text + "'");
    }
    if (isTargetNode && !isSourceNode) { 
        var node = {};
        node.text = source.text;
        addToGroup(source.id,target.id);
        easyTree.addNode(node, target.id);
    }
}
var easyTree;
function viewFormTree(){

	$.get("scripts/getforms.php?id=" + uid,function(data,status){
		
		var datum = $.parseJSON(data);
		
		$.each(datum,function(i,item){
			$("#forms").append("<li><a href='javascript:getSummary(" + item.form_id + ");'>" + item.formName + "</a></li>");
		});
		 easyTree = $('#jstree').easytree();
	});
}
function getSummary(id){
	fid = id;
	$.get("scripts/getform.php?fid=" + id,function(data){
		var js = $.parseJSON(data);
		
		$.each(js,function(i,item){
			$("#formt").html(item.formName);
		});
	});
	$.get("scripts/getsubform2.php?id=" + id,function(data){
		var json = $.parseJSON(data);
		var header = $("#header");
		header.html("");
		$.each(json,function(i,item){
			var datum = $.parseJSON(item.subFormData);
			header.html("");
			$.each(datum,function(ii,itemm){
				$.each(itemm,function(iii,itemmm){
					header.append("<th>" + itemmm.title + "</th>");
				});
			});
		});
		
		var dat = $("#datum");
		dat.html("");
		$.each(json,function(i,item){
			dat.append("<tr id='" + i + "'></tr>");
			var mix = $("#" + i);
			var datum = $.parseJSON(item.subFormData);
			$.each(datum,function(ii,itemm){
				$.each(itemm,function(iii,itemmm){
					mix.append("<td>" + itemmm.val + "</td>");
				});
			});
		});
	});
}
function viewProcTree(){
	
	$.get("scripts/getproc.php?id=" + uid,function(data,status){

		
		var datum = $.parseJSON(data);
		
		$.each(datum,function(i,item){
			$("#process").append("<li><a href='editor.php?pid=" + item.process_id + "'>" + item.processName + "</a></li>");
		});
		
	});
}