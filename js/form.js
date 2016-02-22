$(document).ready(function(){
	viewForm();
	
	$("#searchForm").keyup(function(event){
			searchProc($("#searchForm").val());
		
	});
});
function viewForm(){
	setWidth();
	$.get("scripts/getforms.php?id=" + uid,function(data,status){
		$("#main").find(".row").html("");
		
		var datum = $.parseJSON(data);
		
		$.each(datum,function(i,item){
		
			var lmain = $("#res").find(".row");
			
			
			lmain.append("<div class='col-sm-4 heh'><center><div id='proc_" + item.form_id + "'></div></center></div>");
			var rmain = $("#proc_" + item.form_id);
			
			rmain.append("<span>" + item.formName + "</span><br>");
			rmain.append("<img src='img/forms.png' width='50'></img><br>");
			rmain.append("<a href='editor.php?fid=" + item.form_id + "'>Edit</a>");
			rmain.append("|<a href='javascript:delForm(\"" + item.form_id + "\");'>Delete</a>");
		});
	});
}

function searchProc(q){
	if(q == ""){
		viewForm();
	}else{
		$.get("scripts/getsearchprocform.php?q=" + q + "&uid=" + uid,function(data){
			$("#main").find(".row").html("");
					
					var datum = $.parseJSON(data);
					
					$.each(datum,function(i,item){
					
						var lmain = $("#res").find(".row");
						
						
						lmain.append("<div class='col-sm-4 heh'><center><div id='proc_" + item.form_id + "'></div></center></div>");
						var rmain = $("#proc_" + item.form_id);
						
						rmain.append("<span>" + item.formName + "</span><br>");
						rmain.append("<img src='img/forms.png' width='50'></img><br>");
						rmain.append("<a href='editor.php?fid=" + item.form_id + "'>Edit</a>");
						rmain.append("|<a href='javascript:delForm(\"" + item.form_id + "\");'>Delete</a>");
					});
				});
	}
}