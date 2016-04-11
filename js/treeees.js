$(function(){
	if(pid == 0){
		viewFormTree();
	}
	$("#search").keyup(function(event){
		searchForm($("#search").val());
		});
});

function searchForm(q){	
	$("#cn").html("");
	var ty = $("#heads").val();
	if(q == ""){
		$.get("scripts/getsearchform.php?q=" + q + "&fid=" + fid,function(data){
			
			var json = $.parseJSON(data);
			var header = $("#header");
			header.html("");
			$.each(json,function(i,item){
				var datum = $.parseJSON(item.subFormData);
				header.html("");
				header.append("<th>Respondent</th>");
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
				mix.append("<td>" + item.username + "</td>");
				$.each(datum,function(ii,itemm){
					$.each(itemm,function(iii,itemmm){
						
								if(itemmm.type == "file"){
									mix.append("<td><a href='http://localhost/" + itemmm.val + "'><button type='button' class='btn btn-primary'>Open</button></a></td>");
								}else{
									mix.append("<td>" + itemmm.val + "</td>");
								}
						
					});
				});
			});
			$("#cn").html($('#datum tr').length);
		});
	}else{
		$.get("scripts/getsearchform.php?q=" + q + "&fid=" + fid,function(data){
			
			var json = $.parseJSON(data);
			var header = $("#header");
			header.html("");
			$.each(json,function(i,item){
				var datum = $.parseJSON(item.subFormData);
				header.html("");
				$.each(datum,function(ii,itemm){
					$.each(itemm,function(iii,itemmm){
						if(itemmm.title == ty){
							if((itemmm.val).constructor === Array){
								$.each(itemmm.val,function(t,e){
									if(e == q){
										header.append("<th>Respondent</th>");
										header.append("<th>" + itemmm.title + "</th>");
									}
								});
							}else{
								if(((itemmm.val).toLowerCase().indexOf(q) >= 0)){
									header.append("<th>Respondent</th>");
									header.append("<th>" + itemmm.title + "</th>");
								}
							}
						}
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
						if(itemmm.title == ty){
							if((itemmm.val).constructor === Array){
								$.each(itemmm.val,function(t,e){
									if(e == q){
										mix.append("<td>" + item.username + "</td>");
										mix.append("<td>" + q + "</td>");
										$("#cn").html($('#datum tr').length);
									}
								});
							}else{
								if(((itemmm.val).toLowerCase().indexOf(q) >= 0)){
									mix.append("<td>" + item.username + "</td>");
									if(itemmm.type == "file"){
										mix.append("<td><a href='http://localhost/" + itemmm.val + "'><button type='button' class='btn btn-primary'>Open</button></a></td>");
									}else{
										mix.append("<td>" + itemmm.val + "</td>");
									}
									$("#cn").html($('#datum tr').length);
								}
							}
						}
					});
				});
			});
		});
	}
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

	$.get("scripts/getp.php?id=" + uid,function(data,status){
		
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
			if(i == 0){
				var datum = $.parseJSON(item.subFormData);
				header.html("");
				$("#heads").html("");
				header.append("<th>Respondent</th>");
				$.each(datum,function(ii,itemm){
					$.each(itemm,function(iii,itemmm){
						header.append("<th>" + itemmm.title + "</th>");
						$("#heads").append("<option value='" + itemmm.title + "'>" + itemmm.title + "</option>");
					});
				});
			}
		});
		
		var dat = $("#datum");
		dat.html("");
		$.each(json,function(i,item){
			dat.append("<tr id='" + i + "'></tr>");
			var mix = $("#" + i);
			var datum = $.parseJSON(item.subFormData);
			mix.append("<td>" + item.username + "</td>");
			$.each(datum,function(ii,itemm){
				$.each(itemm,function(iii,itemmm){
					if((itemmm.val).constructor === Array){
						
						mix.append("<td>" + (itemmm.val).join(",") + "</td>");
					}else if(itemmm.type == "file"){
						mix.append("<td><a href='http://localhost/" + itemmm.val + "'><button type='button' class='btn btn-primary'>Open</button></a></td>");
					}else{
						mix.append("<td>" + itemmm.val + "</td>");
					}
				});
			});
		});
		$("#cn").html($('#datum tr').length);
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