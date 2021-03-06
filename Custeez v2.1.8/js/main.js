$(document).ready(function(){
	try{
		$("#addProc").find("#publicity").bootstrapSwitch();
		$("#addGroup").find("#publicity").bootstrapSwitch();
		$("#editProc").find("#publicity").bootstrapSwitch();
		$("#editGroup").find("#publicity").bootstrapSwitch();
	}catch($e){

	}

	$("#sid").val(sid);
	$("#formOwner").val(uid);
	try{
		$("#formData").sortable();

	}catch(err){

	}
	$("#addGroupBtn").click(function(){
		var serial = ConvertFormToJSON($("#addGroupForm"));
		var json = JSON.stringify(serial);

		$.post("scripts/addgroup.php",{myData:json},function(data,status){
				swal({
					title: "Added!",
					text: "Added Successfully",
					type: "success",
					confirmButtonText: "Thanks" },function(){
						$("#addGroup").modal('hide');
						document.location = "groups.php?gid=" + data;
					});
			});
	});
	$("#addGroupBtn2").click(function(){
		var serial = ConvertFormToJSON($("#addGroupForm"));
		var json = JSON.stringify(serial);

		$.post("scripts/addgroup.php",{myData:json},function(data,status){
				swal({
					title: "Added!",
					text: "Added Successfully",
					type: "success",
					confirmButtonText: "Thanks" },function(){
					});
			});
	});
	$("#addProcBtn").click(function(){
		var serial = ConvertFormToJSON($("#addProcForm"));
		var json = JSON.stringify(serial);

		$.post("scripts/addproc.php",{myData:json},function(data,status){
				swal({
					title: "Added!",
					text: "Added Successfully",
					type: "success",
					confirmButtonText: "Thanks" },function(){
						$("#addProc").modal('hide');
						document.location = "editor.php?pid=" + data;
					});
		});
	});
	$("#addProcBtn2").click(function(){
		var serial = ConvertFormToJSON($("#addProcForm"));
		var json = JSON.stringify(serial);

		$.post("scripts/addproc.php",{myData:json},function(data,status){
				swal({
					title: "Added!",
					text: "Added Successfully",
					type: "success",
					confirmButtonText: "Thanks" },function(){
						$("#addProcForm").find("#procName").val("");
						$("#addProcForm").find("#procDetails").val("");
						$("#addProcForm").find("#publicity").val("");
					});
		});
	});


	$("#addStepBtn").click(function(){
		var serial = ConvertFormToJSON($("#addStepForm"));
		var json = JSON.stringify(serial);

		$.post("scripts/addstep.php",{myData:json},function(data,status){
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


	$("#saveBtn").click(function(){
		var json = $("#frm").serialize();
		if($("#formName").val() == ""){
			swal({
				title: "Error!",
				text: "No form name input.",
				type: "error",
				confirmButtonText: "Try Again" },function(){

				});
		}else{
			if(sid > 0){
				$.post("scripts/addform.php",json,function(data,status){
					swal({
						title: "Saved!",
						text: "Saved Successfully",
						type: "success",
						confirmButtonText: "Thanks" },function(){
							window.location = "editor.php?pid=" + pid;
						});
				});
			}else{
				$.post("scripts/addrealform.php",json,function(data,status){
					swal({
						title: "Saved!",
						text: "Saved Successfully",
						type: "success",
						confirmButtonText: "Thanks" },function(){
							window.location = "listform.php";
						});
				});
			}
		}
	});

	$("#addTextBtn").click(function(){
		var main = $("#addText");

		var title = main.find("#title").val();
		var desc = main.find("#desc").val();
		var req;
		if($(main.find("#req")).prop("checked")){
			req = main.find("#req").val();
		}
		var eval = main.find("#eval").val();
		var rand = Math.floor((Math.random() * 99999) + 1);

		var id = rand;
		var check = $("#li_" + id).val();

		if(check == null){
			addTextField(title,desc,id,req,eval);
		}
	});

	$("#addFileBtn").click(function(){
		var main = $("#addFile");

		var title = main.find("#title").val();
		var desc = main.find("#desc").val();
		var rand = Math.floor((Math.random() * 99999) + 1);

		var id = rand;
		var check = $("#li_" + id).val();
		var req;
		if($(main.find("#req")).prop("checked")){
			req = main.find("#req").val();
		}
		if(check == null){
			addFileField(title,desc,id,req);
		}
	});

	$("#addParaBtn").click(function(){
		var main = $("#addPara");

		var title = main.find("#title").val();
		var desc = main.find("#desc").val();
		var req;
		if($(main.find("#req")).prop("checked")){
			req = main.find("#req").val();
		}
		var rand = Math.floor((Math.random() * 99999) + 1);

		var id = rand;
		var check = $("#li_" + id).val();

		if(check == null){
			addParaField(title,desc,id,req);
		}
	});

	$("#addSelectBtn").click(function(){
		var main = $("#addSelect");

		var title = main.find("#title").val();
		var desc = main.find("#desc").val();

		var rand = Math.floor((Math.random() * 99999) + 1);

		var id = rand;
		var check = $("#li_" + id).val();
		var req;
		if($(main.find("#req")).prop("checked")){
			req = main.find("#req").val();
		}
		if(check == null){
			addSelectField(title,desc,id,req);
		}
	});


	$("#addCheckBtn").click(function(){
		var main = $("#addCheck");

		var title = main.find("#title").val();
		var desc = main.find("#desc").val();

		var rand = Math.floor((Math.random() * 99999) + 1);

		var id = rand;
		var check = $("#li_" + id).val();
		var req;
		if($(main.find("#req")).prop("checked")){
			req = main.find("#req").val();
		}
		if(check == null){
			addCheckField(title,desc,id,req);
		}
	});

	$("#addRadioBtn").click(function(){
		var main = $("#addRadio");

		var title = main.find("#title").val();
		var desc = main.find("#desc").val();

		var rand = Math.floor((Math.random() * 99999) + 1);

		var id = rand;
		var check = $("#li_" + id).val();
		var req;
		if($(main.find("#req")).prop("checked")){
			req = main.find("#req").val();
		}
		if(check == null){
			addRadioField(title,desc,id,req);
		}
	});
	$("#editStepBtn").click(function(){
		var main = $("#editStep");

		var title = $("#stepName").val();

		$.get("scripts/stepedit.php?id=" + sid + "&name=" + title,function(data,status){
			$("#sname").html("Step: " + title);
		});
	});


	$("#editTxtBtn").click(function(){
		var main = $("#editTxt");

		var title = main.find("#title").val();
		var desc = main.find("#desc").val();
		var id = main.find("#id").val();

		var req;
		if($(main.find("#req")).prop("checked")){
			req = main.find("#req").val();
		}
		var eval = main.find("#eval").val();
		var rand = Math.floor((Math.random() * 99999) + 1);

		editField(title,desc,id,req,eval);
	});

	$("#editCheckBtn").click(function(){
		var main = $("#editCheck");

		var title = main.find("#title").val();
		var desc = main.find("#desc").val();
		var id = main.find("#id").val();
		var req;
		if($(main.find("#req")).prop("checked")){
			req = main.find("#req").val();
		}
		editCheckField(title,desc,id,req);
	});

	$("#editFileBtn").click(function(){
		var main = $("#editFile");

		var title = main.find("#title").val();
		var desc = main.find("#desc").val();
		var id = main.find("#id").val();
		var req;
		if($(main.find("#req")).prop("checked")){
			req = main.find("#req").val();
		}
		editFileField(title,desc,id,req);
	});

	$("#editSelectBtn").click(function(){
		var main = $("#editSelect");

		var title = main.find("#title").val();
		var desc = main.find("#desc").val();
		var id = main.find("#id").val();
		var req;
		if($(main.find("#req")).prop("checked")){
			req = main.find("#req").val();
		}
		editSelectField(title,desc,id,req);
	});

	$("#editRadioBtn").click(function(){
		var main = $("#editRadio");

		var title = main.find("#title").val();
		var desc = main.find("#desc").val();
		var id = main.find("#id").val();
		var req;
		if($(main.find("#req")).prop("checked")){
			req = main.find("#req").val();
		}
		editRadioField(title,desc,id,req);
	});

	$("#editParaBtn").click(function(){
		var main = $("#editPara");

		var title = main.find("#title").val();
		var desc = main.find("#desc").val();
		var id = main.find("#id").val();
		var req;
		if($(main.find("#req")).prop("checked")){
			req = main.find("#req").val();
		}
		editParaField(title,desc,id,req);
	});

	$("#searchBar").keyup(function(event){
			$("#proc").find(".row").html("");
			$("#groups").find(".row").html("");
			$("#forms").html("");
			$.get("scripts/getsearchproc.php?q=" + $("#searchBar").val(),function(data){
				var json = $.parseJSON(data);
				if($("#searchBar").val() == ""){

				}else{
					$.each(json,function(i,item){

						$("#proc").find(".row").append('<div class="col-sm-10" style="margin: 10px;background-color:#535353; min-height: 25%;color:#fff;padding: 5%;"><center>' +
								'<a href="viewprocess.php?pid=' + item.process_id + '"><img src="img/process-icon.png" width="120px" style="margin:2%;"></a><br>'+
								'<span>Name: <font style="color:#88d317">' + item.processName + '</font></span><br>'+
								'<span>Process ID: <font style="color:#6E3667">' + item.rgid + '</font></span></center></div>');

					});
				}
			});
			$.get("scripts/getsearchgroups.php?q=" + $("#searchBar").val(),function(data){
				var json = $.parseJSON(data);
				if($("#searchBar").val() == ""){

				}else{
					$.each(json,function(i,item){
						$("#groups").find(".row").append('<div class="col-sm-10" style="margin: 10px;background-color:#535353; min-height: 25%;color:#fff;padding: 5%;"><center>' +
								'<a href="viewgroup.php?gid=' + item.group_id + '"><br><img src="img/group-icon.png" width="120px"></a><br>'+
								'<span>Name: <font style="color:#88d317">' + item.groupName + '</font></span><br>' +
								'<span>Group ID: <font style="color:#6E3667">' + item.rgid + '</font></span></center></div>');
					});
				}
			});

	});
	$("#editProcBtn").click(function(){
		var main = $("#editProc");

		var title = main.find("#procName").val();
		var desc = main.find("#procDetails").val();
		main.find("#procId").val(pid);
		editProc(title,desc);
	});

	$("#addApproverBtn").click(function(){
		$("#formApprover").val($("#app").val());
	});
	fillApprover();
	fillForm();
	getSteps();
	getStepx();
	fillEditProc();
});


function fillEditProc(){
	var main = $("#editProc");

	main.find("#procName").val(pname);
	main.find("#procDetails").val(pdesc);
	main.find("#publicity").val(ppub);
}
function subBtn(){
	var textcheck = false;
	var paracheck = false;
	var filecheck = false;
	var $val=0;
	$("input.required").each(function(){
        if (($(this).val())== ""){
              $(this).addClass("error");
              $val = 1
        }
        else{
            $(this).removeClass("error");
        }

    });

	 $("select.required").each(function(){
	        if (($(this).val())== ""){
	              $(this).addClass("error");
	              $val = 1
	        }
	        else{
	            $(this).removeClass("error");
	        }

	    });

	 $("textarea.required").each(function(){
	        if (($(this).val())== ""){
	              $(this).addClass("error");
	              $val = 1
	        }
	        else{
	            $(this).removeClass("error");
	        }

	    });
	 $("file.required").each(function(){
	        if (($(this).val())== ""){
	              $(this).addClass("error");
	              $val = 1
	        }
	        else{
	            $(this).removeClass("error");
	        }

	    });
	 if ($val > 0) {
	        alert('Please enter the hightlighted values');
	        return false;
	    }else{
	    	var json = $("#frm").serialize();
	    	$.post("scripts/submitdata.php", json, function(data){
	    		$.get("scripts/getproid.php?sid=" + sid,function(datas,status){
	    			swal({
	    				title: "Submitted!",
	    				text: "Submitted Successfully",
	    				type: "success",
	    				confirmButtonText: "Thanks" },function(){
	    					document.location = "viewprocess.php?pid=" + datas;
	    				});
	    		});
	    	})
	    }
}
function editProc(title,desc){
	$.post("scripts/updateproc.php",$("#editProcForm").serialize(),function(data,status){
		$("#pname").html("Process: " + title);
		$("#pdesc").html("Description: " + desc);
	});
}
function editBtn(){
	$.get("scripts/getprocs.php?id=" + pid,function(data){
		var json = $.parseJSON(data);
		$.each(json,function(i,item){
			$("#editProc").find("#procName").val(item.processName);
			$("#editProc").find("#procDetails").val(item.processDetails);

			if(item.pubType_id == 2){
				$("#editProc").find("#publicity").bootstrapSwitch('state', true); // true || false
			}
		});
		$("#editProc").modal("show");
	});
}
function fillForm(){
	if(sid > 0){
		$.get("scripts/getstep.php?sid=" + sid,function(data,status){
			var datum = $.parseJSON(data);
			$.each(datum,function(i,item){
				$("#formName").val(item.formName);
				$("#formOwner").val(item.owner_id);
				$("#formApprover").val(item.approver_id);
				var innerdatum = $.parseJSON(item.formData);
				$.each(innerdatum,function(ii,itemm){

					$.each(itemm,function(j,elem){
						var rand = Math.floor((Math.random() * 99999) + 1);
						if(elem.type == "text"){
							addTextField(elem.title,elem.desc,rand,elem.req,elem.eval);
						}else if(elem.type == "para"){
							addParaField(elem.title,elem.desc,rand,elem.req);
						}else if(elem.type == "check"){
							addCheckField2(elem.title,elem.desc,rand,elem,elem.req);
						}else if(elem.type == "radio"){
							addRadioField2(elem.title,elem.desc,rand,elem,elem.req);
						}else if(elem.type == "select"){
							addSelectField2(elem.title,elem.desc,rand,elem,elem.req);
						}else if(elem.type == "file"){
							addFileField(elem.title,elem.desc,rand,elem.req);
						}
					});
				});
			});
		});
	}else{
		$.get("scripts/getform.php?fid=" + fid,function(data,status){
			var datum = $.parseJSON(data);
			$.each(datum,function(i,item){
				$("#formName").val(item.formName);
				$("#formOwner").val(item.owner_id);
				$("#formApprover").val(item.approver_id);
				$("#fid").val(item.form_id);

				var innerdatum = $.parseJSON(item.formData);
				$.each(innerdatum,function(ii,itemm){

					$.each(itemm,function(j,elem){
						var rand = Math.floor((Math.random() * 99999) + 1);
						if(elem.type == "text"){
							addTextField(elem.title,elem.desc,rand,elem.req,elem.eval);
						}else if(elem.type == "para"){
							addParaField(elem.title,elem.desc,rand,elem.req);
						}else if(elem.type == "check"){
							addCheckField2(elem.title,elem.desc,rand,elem,elem.req);
						}else if(elem.type == "radio"){
							addRadioField2(elem.title,elem.desc,rand,elem,elem.req);
						}else if(elem.type == "select"){
							addSelectField2(elem.title,elem.desc,rand,elem,elem.req);
						}else if(elem.type == "file"){
							addFileField(elem.title,elem.desc,rand,elem.req);
						}
					});
				});
			});
		});
	}
}
function delProc(id){
	swal({
	    title: "Are you sure?",
	    text: "You will not be able to recover this process.",
	    type: "warning",
	    showCancelButton: true,
	    confirmButtonColor: '#DD6B55',
	    confirmButtonText: 'Yes, I am sure!',
	    cancelButtonText: "No, cancel it!",
	    closeOnConfirm: false,
	    closeOnCancel: false
	 },
	 function(isConfirm){

	   if (isConfirm){
		   swal("Deleted!", "successfully deleted!", "success");
	     $.get("scripts/delproc.php?id=" + id,function(data,status){
	 		viewProc();
	 	});

	    } else {
	      swal("Cancelled", "Your process is safe.", "error");
	         e.preventDefault();
	    }
	 });
}


function delForm(id){
	swal({
	    title: "Are you sure?",
	    text: "You will not be able to recover this form.",
	    type: "warning",
	    showCancelButton: true,
	    confirmButtonColor: '#DD6B55',
	    confirmButtonText: 'Yes, I am sure!',
	    cancelButtonText: "No, cancel it!",
	    closeOnConfirm: false,
	    closeOnCancel: false
	 },
	 function(isConfirm){

	   if (isConfirm){
	     swal("Deleted!", "successfully deleted!", "success");
	     $.get("scripts/delform.php?id=" + id,function(data,status){
	 		viewForm();
	 	});

	    } else {
	      swal("Cancelled", "Your form is safe.", "error");
	         e.preventDefault();
	    }
	 });
}

function delGroup(id){
	swal({
	    title: "Are you sure?",
	    text: "You will not be able to recover this group.",
	    type: "warning",
	    showCancelButton: true,
	    confirmButtonColor: '#DD6B55',
	    confirmButtonText: 'Yes, I am sure!',
	    cancelButtonText: "No, cancel it!",
	    closeOnConfirm: false,
	    closeOnCancel: false
	 },
	 function(isConfirm){

	   if (isConfirm){
	     swal("Deleted!", "successfully deleted!", "success");
	     $.get("scripts/delGroup.php?id=" + id,function(data,status){
	 		viewGroup();
	 	});

	    } else {
	      swal("Cancelled", "Your group is safe.", "error");
	         e.preventDefault();
	    }
	 });
}

function delSteps(id){
	swal({
	    title: "Are you sure?",
	    text: "You will not be able to recover this process.",
	    type: "warning",
	    showCancelButton: true,
	    confirmButtonColor: '#DD6B55',
	    confirmButtonText: 'Yes, I am sure!',
	    cancelButtonText: "No, cancel it!",
	    closeOnConfirm: false,
	    closeOnCancel: false
	 },
	 function(isConfirm){

	   if (isConfirm){
	     swal("Deleted!", "successfully deleted!", "success");
	     $.get("scripts/delsteps.php?id=" + id,function(data,status){
	 		getSteps();
	 	});

	    } else {
	      swal("Cancelled", "Your step is safe.", "error");
	         e.preventDefault();
	    }
	 });
}


function fillApprover(){
	var main = $("#app");
	$.get("scripts/checkgroup.php?pid=" + pid,function(data,status){
		if(data == 0){
			$.get("scripts/getapp.php",function(data,status){
				var datum = jQuery.parseJSON(data);

				$.each(datum,function(i,item){
					main.append("<option value='" + item.user_id + "'>" + item.username + "</option>");
				});
			});
		}else{
			$.get("scripts/getmembers.php?id=" + pid,function(dataa){
				var json = $.parseJSON(dataa);

				$.each(json,function(i,item){
					main.append("<option value='" + item.user_id + "'>" + item.username + "</option>");

				});
			});
		}
	});

}



function getStepx(){
$.get("scripts/track.php?uid=" + uid + "&pid=" + pid,function(dataa,statuss){
	var dats = $.parseJSON(dataa);
	$.get("scripts/getsteps.php?pid=" + pid,function(data,status){
		var datum = $.parseJSON(data);
		var main = $("#stepup");
		main.html("");
		$.each(datum,function(i,item){

			main.append("<li><div class='step' id='vstep_" + item.step_id + "'></div><br></li>");

			var rmain = $("#vstep_" + item.step_id);
			var stepn = 0;
			$.get("scripts/getrack.php?uid=" + uid + "&pid=" + pid,function(tom){
				if(tom == "0"){
					if(item.stepNum == 1){
						rmain.append("<span>Step " + item.stepNum + ": " + item.stepName + " </span>");
						rmain.append("<a href='viewform.php?sid=" + item.step_id + "'>view</a>");
						rmain.append("<br><img src='img/forms.png'>");
					}else{
						rmain.append("<span>Step " + item.stepNum + ": " + item.stepName + " </span>");
						rmain.append("<br>not yet available.");
						rmain.append("<br><img src='img/forms.png'>");
					}
				}else{
					$.each(dats,function(ii,itemm){
						$.get("scripts/getstepnum.php?sid=" + itemm.step_id,function(s){
							if(s == item.stepNum){

									rmain.append("<span>Step " + item.stepNum + ": " + item.stepName + " </span>");
									rmain.append("<a href='viewform.php?sid=" + item.step_id + "'>view</a>");
									rmain.append("<br><img src='img/forms.png'>");
									rmain.append("<b>Next Step</b>");

							}else{

									rmain.append("<span>Step " + item.stepNum + ": " + item.stepName + " </span>");
									rmain.append("<br><img src='img/forms.png'>");


							}
						});

					});
				}
			});
		});

		/*
		 <li>

		<div id="step">
		<span>Step 1: Ralph Chan</span>
		<a href=''>Edit</button></a>|<a href=''>Delete</button></a>
		<img src="img/forms.png">
		</div>

		</li>
		 */
	});
});
}


function getSteps(){
	$.get("scripts/getsteps.php?pid=" + pid,function(data,status){
		var datum = $.parseJSON(data);
		var main = $("#stepul");
		main.html("");
		$.each(datum,function(i,item){

			main.append("<li><div class='step' id='step_" + item.step_id + "'></div><br></li>");

			var rmain = $("#step_" + item.step_id);

			rmain.append("<span>Step " + item.stepNum + ": <font style='color:#88d317'>" + item.stepName + " </font></span>");
			rmain.append("<br><img src='img/form-icon.png' width='120px'><br>");
			rmain.append("<br><a href='editor.php?sid=" + item.step_id + "'><button type='button' class='btn btn-success'>Edit</button> </a><a href='javascript:delSteps(\"" + item.step_id + "\");'><button type='button' class='btn btn-danger'>Delete</button></a>");
		});

		/*
		 <li>

		<div id="step">
		<span>Step 1: Ralph Chan</span>
		<a href=''>Edit</button></a>|<a href=''>Delete</button></a>
		<img src="img/forms.png">
		</div>

		</li>
		 */
	});
}
function setWidth(){
	var sidewidth = $("#sideBar").width();

	$("#main").width($("body").width() - sidewidth - 100);
	$("#main").height(1000);
}
function addRadioField2(title,desc,id,elem,req){
	if(typeof req === 'undefined'){
		req = 0;
	}
	var main = $("#formData");

	main.append("<li id=\"li_" + id + "\"></li>");

	var limain = main.find("#li_" + id);

	limain.append('<div id="frmgroup" class="frmstyle"></div>');

	var formain = limain.find("#frmgroup");

	formain.append("<label for='txt_" + id + "' id='lbl_" + id + "'>" + title + ": </label>");
	formain.append('<span><a href="javascript:editRadio(\'' + id + '\');">Edit</a>|<span><a href="javascript:deleteField(\'' + id + '\');">Delete</a></span><br>');
	formain.append('<span id="desclabel_' + id + '">' + desc + '</span>');
	formain.append('<input type="hidden" class="form-control" id="txt_' + id + '" value="' + title + '" name="radio[' + id + '][title]" />');
	formain.append('<input type="hidden" class="form-control" id="req_' + id + '" value="' + req + '" name="radio[' + id + '][req]" />');

	formain.append('<input type="hidden" class="form-control" id="desc_' + id + '" value="' + desc + '" name="radio[' + id + '][desc]" />');
	formain.append('<input type="hidden" class="form-control" id="type_' + id + '" value="radio" name="radio[' + id + '][type]" />');
	formain.append('<br><b>Items: </b>');
	formain.append("<div id='ritems_" + id + "'></div>")

	var realmain = $("#ritems_" + id);
	var child = $("#addCheck").find("#items");
	var c = 0;
	$.each(elem.items,function(i,item){
		realmain.append("<input type='radio' id='radio' name='radio[" + id + "][items][" + c + "]' value='" + item + "' checked>" + item + "</input><br>");
		c++;
	});
	limain.append("<br>");

}
function addCheckField2(title,desc,id,elem,req){
	if(typeof req === 'undefined'){
		req = 0;
	}
	var main = $("#formData");

	main.append("<li id=\"li_" + id + "\"></li>");

	var limain = main.find("#li_" + id);

	limain.append('<div id="frmgroup" class="frmstyle"></div>');

	var formain = limain.find("#frmgroup");

	formain.append("<label for='txt_" + id + "' id='lbl_" + id + "'>" + title + ": </label>");
	formain.append('<span><a href="javascript:editCheck(\'' + id + '\');">Edit</a>|<span><a href="javascript:deleteField(\'' + id + '\');">Delete</a></span><br>');
	formain.append('<span id="desclabel_' + id + '">' + desc + '</span>');
	formain.append('<input type="hidden" class="form-control" id="txt_' + id + '" value="' + title + '" name="check[' + id + '][title]" />');
	formain.append('<input type="hidden" class="form-control" id="desc_' + id + '" value="' + desc + '" name="check[' + id + '][desc]" />');
	formain.append('<input type="hidden" class="form-control" id="type_' + id + '" value="check" name="check[' + id + '][type]" />');
	formain.append('<input type="hidden" class="form-control" id="req_' + id + '" value="' + req + '" name="check[' + id + '][req]" />');

	formain.append('<br><b>Items: </b>');
	formain.append("<div id='citems_" + id + "'></div>")

	var realmain = $("#citems_" + id);
	var child = $("#addCheck").find("#items");
	var c = 0;
	$.each(elem.items,function(i,item){
		realmain.append("<input type='checkbox' id='check' name='check[" + id + "][items][" + c + "]' value='" + item + "' checked>" + item + "</input><br>");
		c++;
	});
	limain.append("<br>");

}

function addCheckField(title,desc,id,req){
	if(typeof req === 'undefined'){
		req = 0;
	}

	var main = $("#formData");

	main.append("<li id=\"li_" + id + "\"></li>");

	var limain = main.find("#li_" + id);

	limain.append('<div id="frmgroup" class="frmstyle"></div>');

	var formain = limain.find("#frmgroup");

	formain.append("<label for='txt_" + id + "' id='lbl_" + id + "'>" + title + ": </label>");
	formain.append('<span><a href="javascript:editCheck(\'' + id + '\');">Edit</a>|<span><a href="javascript:deleteField(\'' + id + '\');">Delete</a></span><br>');
	formain.append('<span id="desclabel_' + id + '">' + desc + '</span>');
	formain.append('<input type="hidden" class="form-control" id="txt_' + id + '" value="' + title + '" name="check[' + id + '][title]" />');
	formain.append('<input type="hidden" class="form-control" id="desc_' + id + '" value="' + desc + '" name="check[' + id + '][desc]" />');
	formain.append('<input type="hidden" class="form-control" id="type_' + id + '" value="check" name="check[' + id + '][type]" />');
	formain.append('<input type="hidden" class="form-control" id="req_' + id + '" value="' + req + '" name="check[' + id + '][req]" />');

	formain.append('<br><b>Items: </b>');
	formain.append("<div id='citems_" + id + "'></div>")

	var realmain = $("#citems_" + id);
	var child = $("#addCheck").find("#items");
	var c = 0;
	child.find('input[type=checkbox]').each(function(){
		realmain.append("<input type='checkbox' id='check' name='check[" + id + "][items][" + c + "]' value='" + $(this).val() + "' checked>" + $(this).val() + "</input><br>");
		c++;
	});
	limain.append("<br>");

}

function addRadioField(title,desc,id,req){
	if(typeof req === 'undefined'){
		req = 0;
	}
	var main = $("#formData");

	main.append("<li id=\"li_" + id + "\"></li>");

	var limain = main.find("#li_" + id);

	limain.append('<div id="frmgroup" class="frmstyle"></div>');

	var formain = limain.find("#frmgroup");

	formain.append("<label for='txt_" + id + "' id='lbl_" + id + "'>" + title + ": </label>");
	formain.append('<span><a href="javascript:editRadio(\'' + id + '\');">Edit</a>|<span><a href="javascript:deleteField(\'' + id + '\');">Delete</a></span><br>');
	formain.append('<span id="desclabel_' + id + '">' + desc + '</span>');
	formain.append('<input type="hidden" class="form-control" id="txt_' + id + '" value="' + title + '" name="radio[' + id + '][title]" />');
	formain.append('<input type="hidden" class="form-control" id="desc_' + id + '" value="' + desc + '" name="radio[' + id + '][desc]" />');
	formain.append('<input type="hidden" class="form-control" id="type_' + id + '" value="radio" name="radio[' + id + '][type]" />');
	formain.append('<input type="hidden" class="form-control" id="req_' + id + '" value="' + req + '" name="radio[' + id + '][req]" />');
	formain.append('<br><b>Items: </b>');
	formain.append("<div id='ritems_" + id + "'></div>")

	var realmain = $("#ritems_" + id);
	var child = $("#addRadio").find("#items");
	var c = 0;
	child.find('input[type=radio]').each(function(){
		realmain.append("<input type='radio' id='radio' name='radio[" + id + "][items][" + c + "]' value='" + $(this).val() + "' checked>" + $(this).val() + "</input><br>");
		c++;
	});
	limain.append("<br>");

}

function addSelectField2(title,desc,id,elem,req){
	if(typeof req === 'undefined'){
		req = 0;
	}
	var main = $("#formData");

	main.append("<li id=\"li_" + id + "\"></li>");

	var limain = main.find("#li_" + id);

	limain.append('<div id="frmgroup" class="frmstyle"></div>');

	var formain = limain.find("#frmgroup");

	formain.append("<label for='txt_" + id + "' id='lbl_" + id + "'>" + title + ": </label>");
	formain.append('<span><a href="javascript:editSelect(\'' + id + '\');">Edit</a>|<span><a href="javascript:deleteField(\'' + id + '\');">Delete</a></span><br>');
	formain.append('<span id="desclabel_' + id + '">' + desc + '</span>');
	formain.append('<input type="hidden" class="form-control" id="txt_' + id + '" value="' + title + '" name="select[' + id + '][title]" />');
	formain.append('<input type="hidden" class="form-control" id="req_' + id + '" value="' + req + '" name="select[' + id + '][req]" />');

	formain.append('<input type="hidden" class="form-control" id="desc_' + id + '" value="' + desc + '" name="select[' + id + '][desc]" />');
	formain.append('<input type="hidden" class="form-control" id="type_' + id + '" value="select" name="select[' + id + '][type]" />');
	formain.append('<br><b>Items: </b>');
	formain.append("<select id='sitems_" + id + "'></select>");

	var realmain = $("#sitems_" + id);
	var child = $("#addSelect").find("#items");
	var c = 0;
	$.each(elem.items,function(i,item){
		realmain.append("<option id='select' value='" + item + "'>" + item + "</option>");
		realmain.append("<input type='hidden' name='select[" + id + "][items][" + c + "]' value='" + item + "'/>");
		c++;
	});
	limain.append("<br>");

}

function addSelectField(title,desc,id,req){
	if(typeof req === 'undefined'){
		req = 0;
	}
	var main = $("#formData");

	main.append("<li id=\"li_" + id + "\"></li>");

	var limain = main.find("#li_" + id);

	limain.append('<div id="frmgroup" class="frmstyle"></div>');

	var formain = limain.find("#frmgroup");

	formain.append("<label for='txt_" + id + "' id='lbl_" + id + "'>" + title + ": </label>");
	formain.append('<span><a href="javascript:editSelect(\'' + id + '\');">Edit</a>|<span><a href="javascript:deleteField(\'' + id + '\');">Delete</a></span><br>');
	formain.append('<span id="desclabel_' + id + '">' + desc + '</span>');
	formain.append('<input type="hidden" class="form-control" id="txt_' + id + '" value="' + title + '" name="select[' + id + '][title]" />');
	formain.append('<input type="hidden" class="form-control" id="desc_' + id + '" value="' + desc + '" name="select[' + id + '][desc]" />');
	formain.append('<input type="hidden" class="form-control" id="req_' + id + '" value="' + req + '" name="select[' + id + '][req]" />');
	formain.append('<input type="hidden" class="form-control" id="type_' + id + '" value="select" name="select[' + id + '][type]" />');
	formain.append('<br><b>Items: </b>');
	formain.append("<select id='sitems_" + id + "'></select>");

	var realmain = $("#sitems_" + id);
	var child = $("#addSelect").find("#items");
	var c = 0;
	child.find('option').each(function(){
		realmain.append("<option id='select' value='" + $(this).val() + "'>" + $(this).val() + "</option>");
		realmain.append("<input type='hidden' name='select[" + id + "][items][" + c + "]' value='" + $(this).val() + "'/>");
		c++;
	});
	limain.append("<br>");

}


function editField(title,desc,id,req,eval){
	$("#lbl_" + id).html(title + ": ");
	$("#desclabel_" + id).html(desc);
	$("#txt_" + id).val(title);
	$("#desc_" + id).val(desc);
	$("#req_" + id).val(req);
	$("#eval_" + id).val(eval);
}
function editFileField(title,desc,id,req){
	$("#lbl_" + id).html(title + ": ");
	$("#desclabel_" + id).html(desc);
	$("#txt_" + id).val(title);
	$("#desc_" + id).val(desc);
	$("#req_" + id).val(req);
}
function editParaField(title,desc,id){
	$("#lbl_" + id).html(title + ": ");
	$("#desclabel_" + id).html(desc);
	$("#txt_" + id).val(title);
	$("#desc_" + id).val(desc);
}
function editCheckField(title,desc,id,req){
	$("#lbl_" + id).html(title + ": ");
	$("#desclabel_" + id).html(desc);
	$("#txt_" + id).val(title);
	$("#desc_" + id).val(desc);
	$("#req_" + id).val(req);

	var main = $("#editCheck");

	var mainitems = $("#citems_" + id);
	mainitems.html("");

	var c = 0;
	main.find('input[type=checkbox]').each(function(){
		mainitems.append("<input type='checkbox' id='check' name='check[" + id + "][items][" + c + "]' value='" + $(this).val() + "' checked>" + $(this).val() + "</input><br>");
		c++;
	});
}


function editSelectField(title,desc,id,req){
	$("#lbl_" + id).html(title + ": ");
	$("#desclabel_" + id).html(desc);
	$("#txt_" + id).val(title);
	$("#desc_" + id).val(desc);
	$("#req_" + id).val(req);
	var main = $("#editSelect");

	var mainitems = $("#sitems_" + id);
	mainitems.html("");

	var c = 0;
	main.find('option').each(function(){
		mainitems.append("<option id='select' value='" + $(this).val() + "'>" + $(this).val() + "</option>");
		mainitems.append("<input type='hidden' name='select[" + id + "][items][" + c + "]' value='" + $(this).val() + "'/>");

		c++;
	});
}

//delete fields
function deleteField(id){
	$("#li_" + id).remove();
}
//end delete fields
function editRadioField(title,desc,id,req){
	$("#lbl_" + id).html(title + ": ");
	$("#desclabel_" + id).html(desc);
	$("#txt_" + id).val(title);
	$("#desc_" + id).val(desc);
	$("#req_" + id).val(req);
	var main = $("#editRadio");

	var mainitems = $("#ritems_" + id);
	mainitems.html("");

	var c = 0;
	main.find('input[type=radio]').each(function(){
		mainitems.append("<input type='radio' id='radio' name='radio[" + id + "][items][" + c + "]' value='" + $(this).val() + "' checked>" + $(this).val() + "</input><br>");
		c++;
	});
}

function addFileField(title,desc,id,req){
	if(typeof req === 'undefined'){
		req = 0;
	}

	var main = $("#formData");
	main.append("<li id=\"li_" + id + "\"></li>");
	var limain = main.find("#li_" + id);
	limain.append('<div id="frmgroup" class="frmstyle"></div>');
	var formain = limain.find("#frmgroup");

	formain.append("<label for='txt_" + id + "' id='lbl_" + id + "'>" + title + ": </label>");
	formain.append('<span><a href="javascript:editFile(\'' + id + '\');">Edit</a>|<span><a href="javascript:deleteField(\'' + id + '\');">Delete</a></span><br>');
	formain.append('<span id="desclabel_' + id + '">' + desc + '</span>');
	formain.append('<input type="file" disabled/>');
	formain.append('<input type="hidden" class="form-control" id="txt_' + id + '" value="' + title + '" name="file[' + id + '][title]" />');
	formain.append('<input type="hidden" class="form-control" id="desc_' + id + '" value="' + desc + '" name="file[' + id + '][desc]" />');
	formain.append('<input type="hidden" class="form-control" id="type_' + id + '" value="file" name="file[' + id + '][type]" />');
	formain.append('<input type="hidden" class="form-control" id="req_' + id + '" value="' + req + '" name="file[' + id + '][req]" />');

	limain.append("<br>");
}
function addTextField(title,desc,id,req,eval){

	if(typeof req === 'undefined'){
		req = 0;
	}
	if(typeof eval === 'undefined'){
		eval = "text";
	}

	var main = $("#formData");

	main.append("<li id=\"li_" + id + "\"></li>");

	var limain = main.find("#li_" + id);

	limain.append('<div id="frmgroup" class="frmstyle"></div>');

	var formain = limain.find("#frmgroup");

	formain.append("<label for='txt_" + id + "' id='lbl_" + id + "'>" + title + ": </label>");
	formain.append('<span><a href="javascript:editTxt(\'' + id + '\');">Edit</a>|<span><a href="javascript:deleteField(\'' + id + '\');">Delete</a></span><br>');
	formain.append('<span id="desclabel_' + id + '">' + desc + '</span>');
	formain.append('<input type="text" class="form-control" />');
	formain.append('<input type="hidden" class="form-control" id="txt_' + id + '" value="' + title + '" name="txt[' + id + '][title]" />');
	formain.append('<input type="hidden" class="form-control" id="desc_' + id + '" value="' + desc + '" name="txt[' + id + '][desc]" />');
	formain.append('<input type="hidden" class="form-control" id="type_' + id + '" value="text" name="txt[' + id + '][type]" />');
	formain.append('<input type="hidden" class="form-control" id="eval_' + id + '" value="' + eval + '" name="txt[' + id + '][eval]" />');
	formain.append('<input type="hidden" class="form-control" id="req_' + id + '" value="' + req + '" name="txt[' + id + '][req]" />');
	limain.append("<br>");

	clearAddText();
}

function clearAddText(){
	$("#addText").find("#title").val("");
	$("#addText").find("#desc").val("");
}

function addParaField(title,desc,id,req){

	if(typeof req === 'undefined'){
		req = 0;
	}

	var main = $("#formData");

	main.append("<li id=\"li_" + id + "\"></li>");

	var limain = main.find("#li_" + id);

	limain.append('<div id="frmgroup" class="frmstyle"></div>');

	var formain = limain.find("#frmgroup");

	formain.append("<label for='txt_" + id + "' id='lbl_" + id + "'>" + title + ": </label>");
	formain.append('<span><a href="javascript:editPara(\'' + id + '\');">Edit</a>|<span><a href="javascript:deleteField(\'' + id + '\');">Delete</a></span><br>');
	formain.append('<span id="desclabel_' + id + '">' + desc + '</span>');
	formain.append('<textarea class="form-control"></textarea>');
	formain.append('<input type="hidden" class="form-control" id="txt_' + id + '" value="' + title + '" name="para[' + id + '][title]" />');
	formain.append('<input type="hidden" class="form-control" id="desc_' + id + '" value="' + desc + '" name="para[' + id + '][desc]" />');
	formain.append('<input type="hidden" class="form-control" id="type_' + id + '" value="para" name="para[' + id + '][type]" />');
	formain.append('<input type="hidden" class="form-control" id="req_' + id + '" value="' + req + '" name="para[' + id + '][req]" />');

	limain.append("<br>");

}
function showControl(){
	var main = $("#addCheck");
	main.find("#control").toggleClass("hidecontrol");
}
function showControl2(){
	var main = $("#editCheck");
	main.find("#control").toggleClass("hidecontrol");
}
function showControl3(){
	var main = $("#addRadio");
	main.find("#control").toggleClass("hidecontrol");
}
function showControl4(){
	var main = $("#editRadio");
	main.find("#control").toggleClass("hidecontrol");
}
function showControl5(){
	var main = $("#addSelect");
	main.find("#control").toggleClass("hidecontrol");
}
function showControl6(){
	var main = $("#editSelect");
	main.find("#control").toggleClass("hidecontrol");
}
function addRadioItem(){
	var main = $("#addRadio");
	var title = main.find("#controlData").val();
	var imain = main.find("#items");

	var rand = Math.floor((Math.random() * 99999) + 1);

	imain.append("<div id='c_" + rand + "'><input type='radio' name='item[]' value='" + title + "'>" + title + "<button type='button' class='btn btn-primary' onClick='removeItem(\"c_" + rand + "\");'>(X)</button></input></div>");
	main.find("#control").toggleClass("hidecontrol");
}
function hideRadioItem(){
	var main = $("#addRadio");
	main.find("#control").toggleClass("hidecontrol");
}
function addRadioItem2(){
	var main = $("#editRadio");
	var title = main.find("#controlData").val();
	var imain = main.find("#items");

	var rand = Math.floor((Math.random() * 99999) + 1);

	imain.append("<div id='c_" + rand + "'><input type='radio' name='item[]' value='" + title + "'>" + title + "<button type='button' class='btn btn-primary' onClick='removeItem(\"c_" + rand + "\");'>(X)</button></input></div>");
	main.find("#control").toggleClass("hidecontrol");
}
function hideRadioItem2(){
	var main = $("#editRadio");
	main.find("#control").toggleClass("hidecontrol");
}
function removeSelectItem(){
	var main = $("#addSelect").find("#items");
	main.find('option:selected', this).remove();
}
function removeSelectItem2(){
	var main = $("#editSelect").find("#items");
	main.find('option:selected', this).remove();
}
function addCheckItem(){
	var main = $("#addCheck");
	var title = main.find("#controlData").val();
	var imain = main.find("#items");

	var rand = Math.floor((Math.random() * 99999) + 1);

	imain.append("<div id='c_" + rand + "'><input type='checkbox' name='item[]' value='" + title + "'>" + title + "<button type='button' class='btn btn-primary' onClick='removeItem(\"c_" + rand + "\");'>(X)</button></input></div>");
	main.find("#control").toggleClass("hidecontrol");
}
function hideCheckItem(){
	var main = $("#addCheck");
	main.find("#control").toggleClass("hidecontrol");
}
function addSelectItem(){
	var main = $("#addSelect");
	var title = main.find("#controlData").val();
	var imain = main.find("#items");

	var rand = Math.floor((Math.random() * 99999) + 1);

	imain.append("<option id='c_" + rand + "' value='" + title + "'>" + title + "</option>");
	main.find("#control").toggleClass("hidecontrol");
}
function hideSelectItem(){
	var main = $("#addSelect");
	main.find("#control").toggleClass("hidecontrol");
}
function addSelectItem2(){
	var main = $("#editSelect");
	var title = main.find("#controlData").val();
	var imain = main.find("#items");

	var rand = Math.floor((Math.random() * 99999) + 1);

	imain.append("<option id='c_" + rand + "' value='" + title + "'>" + title + "</option>");
	main.find("#control").toggleClass("hidecontrol");
}
function hideSelectItem2(){
	var main = $("#editSelect");
	main.find("#control").toggleClass("hidecontrol");
}
function addCheckItem2(){
	var main = $("#editCheck");
	var title = main.find("#controlData").val();
	var imain = main.find("#items");

	var rand = Math.floor((Math.random() * 99999) + 1);

	imain.append("<div id='c_" + rand + "'><input type='checkbox' name='item[]' value='" + title + "'>" + title + "<button type='button' class='btn btn-primary' onClick='removeItem(\"c_" + rand + "\");'>(X)</button></input></div>");

	main.find("#control").toggleClass("hidecontrol");
}
function hideCheckItem2(){
	var main = $("#editCheck");
	main.find("#control").toggleClass("hidecontrol");
}
function removeItem(obj){
	$("#" + obj).remove();
}
function editPara(id){
	var title = $("#txt_" + id).val();
	var desc = $("#desc_" + id).val();

	var eval = $("#eval_" + id).val();
	var req = $("#req_" + id).val();

	var main = $("#editPara");
	if(req == "2"){
		$(main.find("#req")).prop("checked",true);
		}else{
			$(main.find("#req")).prop("checked",false);
		}
	main.find("#eval").val(eval);	main.find("#id").val(id);
	main.find("#title").val(title);
	main.find("#desc").val(desc);

	main.modal('show');
}

function editTxt(id){
	var title = $("#txt_" + id).val();
	var desc = $("#desc_" + id).val();
	var eval = $("#eval_" + id).val();
	var req = $("#req_" + id).val();

	var main = $("#editTxt");
	if(req == "2"){
		$(main.find("#req")).prop("checked",true);
		}else{
			$(main.find("#req")).prop("checked",false);
		}
	main.find("#eval").val(eval);
	main.find("#id").val(id);
	main.find("#title").val(title);
	main.find("#desc").val(desc);
	main.modal('show');
}

function editFile(id){
	var title = $("#txt_" + id).val();
	var desc = $("#desc_" + id).val();
	var req = $("#req_" + id).val();

	var main = $("#editFile");
	if(req == "2"){
		$(main.find("#req")).prop("checked",true);
		}else{
			$(main.find("#req")).prop("checked",false);
		}
	main.find("#id").val(id);
	main.find("#title").val(title);
	main.find("#desc").val(desc);
	main.modal('show');
}

function editCheck(id){
	var title = $("#txt_" + id).val();
	var desc = $("#desc_" + id).val();
	var eval = $("#eval_" + id).val();
	var req = $("#req_" + id).val();

	var main = $("#editCheck");
	if(req == "2"){
		$(main.find("#req")).prop("checked",true);
		}else{
			$(main.find("#req")).prop("checked",false);
		}
	main.find("#eval").val(eval);
	main.find("#id").val(id);
	main.find("#title").val(title);
	main.find("#desc").val(desc);

	var rand = Math.floor((Math.random() * 99999) + 1);

	var items = $("#citems_" + id);
	var mainitems = main.find("#items");
	mainitems.html("");
	items.find('input[type=checkbox]').each(function(){
		mainitems.append("<div id='c_" + rand + "'><input type='checkbox' name='item[]' value='" + $(this).val() + "'>" + $(this).val() + "<button type='button' class='btn btn-primary' onClick='removeItem(\"c_" + rand + "\");'>(X)</button></input></div>");
	});

	main.modal('show');
}

function editSelect(id){
	var title = $("#txt_" + id).val();
	var desc = $("#desc_" + id).val();

	var eval = $("#eval_" + id).val();
	var req = $("#req_" + id).val();

	var main = $("#editSelect");
	if(req == "2"){
		$(main.find("#req")).prop("checked",true);
		}else{
			$(main.find("#req")).prop("checked",false);
		}
	main.find("#eval").val(eval);
	main.find("#id").val(id);
	main.find("#title").val(title);
	main.find("#desc").val(desc);

	var rand = Math.floor((Math.random() * 99999) + 1);

	var items = $("#sitems_" + id);
	var mainitems = main.find("#items");
	mainitems.html("");
	items.find('option').each(function(){
		mainitems.append("<option id='c_" + rand + "' value='" + $(this).val() + "'>" + $(this).val() + "</option>");
	});

	main.modal('show');
}


function editRadio(id){
	var title = $("#txt_" + id).val();
	var desc = $("#desc_" + id).val();

	var eval = $("#eval_" + id).val();
	var req = $("#req_" + id).val();

	var main = $("#editRadio");
	if(req == "2"){
		$(main.find("#req")).prop("checked",true);
		}else{
			$(main.find("#req")).prop("checked",false);
		}
	main.find("#eval").val(eval);
	main.find("#id").val(id);
	main.find("#title").val(title);
	main.find("#desc").val(desc);



	var items = $("#ritems_" + id);
	var mainitems = main.find("#items");

	mainitems.html('');
	items.find('input[type=radio]').each(function(){
		var rand = Math.floor((Math.random() * 99999) + 1);
		mainitems.append("<div id='r_" + rand + "'><input type='radio' name='item[]' value='" + $(this).val() + "'>" + $(this).val() + "<button type='button' class='btn btn-primary' onClick='removeItem(\"r_" + rand + "\");'>(X)</button></input></div>");
	});

	main.modal('show');
}

function ConvertFormToJSON(form){
    var array = jQuery(form).serializeArray();
    var json = {};

    jQuery.each(array, function() {
        json[this.name] = this.value || '';
    });

    return json;
}
