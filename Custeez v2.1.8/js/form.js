$(document).ready(function(){
	viewForm();

	$("#searchForm").keyup(function(event){
			searchProc($("#searchForm").val());

	});
});
function viewForm(){

	$.get("scripts/getforms.php?id=" + uid,function(data,status){
		$("#main").find(".row").html("");

		var datum = $.parseJSON(data);

		$.each(datum,function(i,item){

			var lmain = $("#res").find(".row");


			lmain.append("<div class='col-sm-3 notpend' style='margin:10px;width:30%;'><center><div id='proc_" + item.form_id + "'></div></center></div>");
			var rmain = $("#proc_" + item.form_id);

			rmain.append("<span>Name: <font style='color:#88d317'>" + item.formName + "</font></span><br>");
			rmain.append("<br><img src='img/form-icon.png' width='120px'></img><br><br>");
			rmain.append("<a href='editor.php?fid=" + item.form_id + "'><button type='button' class='btn btn-success'>Edit</button></a>");
			rmain.append("<a href='javascript:delForm(\"" + item.form_id + "\");'> <button type='button' class='btn btn-danger'>Delete</button></a>");
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


						lmain.append("<div class='col-sm-3 notpend' style='margin:10px;width:30%;'><center><div id='proc_" + item.form_id + "'></div></center></div>");
						var rmain = $("#proc_" + item.form_id);

						rmain.append("<span>Name: <font style='color:#88d317'>" + item.formName + "</font></span><br>");
						rmain.append("<br><img src='img/form-icon.png' width='120px'></img><br><br>");
						rmain.append("<a href='editor.php?fid=" + item.form_id + "'><button type='button' class='btn btn-success'>Edit</button></a>");
						rmain.append("<a href='javascript:delForm(\"" + item.form_id + "\");'><button type='button' class='btn btn-danger'>Delete</button></a>");
					});
				});
	}
}
