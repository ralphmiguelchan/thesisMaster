$(function(){
	if(pid == 0){
		viewGroupTree();
		viewProcTree();
		viewFormTree();
	}
});

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
			$("#forms").append("<li><a href='editor.php?fid=" + item.form_id + "'>" + item.formName + "</a></li>");
		});
		 easyTree = $('#jstree').easytree({
             enableDnd: true,
             canDrop: canDrop,
             dropped: dropped,
             dropping: dropping
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