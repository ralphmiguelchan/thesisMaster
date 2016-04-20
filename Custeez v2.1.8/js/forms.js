$(document).ready(function(){
		fillExistingForm();
		
		$("#addStepBtn2").click(function(){
			var serial = ConvertFormToJSON($("#addStepForm2"));
			var json = JSON.stringify(serial);
			alert(json);
			$.post("scripts/addstepf.php",{myData:json},function(data,status){
				$("#addStep").modal('hide');
				swal({   
					title: "Added!",   
					text: "Added Successfully",   
					type: "success",   
					confirmButtonText: "Thanks" },function(){
						document.location = "editor.php?sid=" + data;
					});
			});
		});
});

function fillExistingForm(){
	$.get("scripts/getforms.php?id=" + uid,function(data){
		var json = $.parseJSON(data);
		$("#formLists").find(".row").html("");
		$.each(json,function(i,item){
			$("#formLists").find(".row").append("<div class='col-sm-3 notpend' style='margin:10px;width:28%;'>" +
      "<center>" + 
      "<span>Name: <font style='color:#88d317'>" + item.formName + "</font></span>" +
      "<br><span>From Details</span>"+
      "<img src='img/form-icon.png' width='50%' /><br>" +
      '<a href="viewformagain.php?fid=' + item.form_id + '">View</a> | <a href="javascript:useForm(' + item.form_id + ');">Use</a>' +
      "</div>");
		});
	});
}

function useForm(id){
	$("#addStep2").find("#fid").val(id);
	$("#addStep2").modal('show');
}