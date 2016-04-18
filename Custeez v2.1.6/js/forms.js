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
			$("#formLists").find(".row").append("<div class='col-sm-3 heh'>" +
      "<center>" + 
      "<span>" + item.formName + "</span>" +
      "<br><span>From Details</span>"+
      "<img src='img/forms.png' width='70' /><br>" +
      '<a href="viewformagain.php?fid=' + item.form_id + '">View</a> | <a href="javascript:useForm(' + item.form_id + ');">Use</a>' +
      "</div>");
		});
	});
}

function useForm(id){
	$("#addStep2").find("#fid").val(id);
	$("#addStep2").modal('show');
}