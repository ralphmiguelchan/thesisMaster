$(document).ready(function(){
	fillUserForm();
})
function fillUserForm(){
	$.get("scripts/getform.php?fid=" + fid,function(data,status){
		var datum = $.parseJSON(data);
		$.each(datum,function(i,item){
			var innerdatum = $.parseJSON(item.formData);
			var main = $("#form");
			$.each(innerdatum,function(ii,itemm){
				var rand = Math.floor((Math.random() * 99999) + 1);
				$.each(itemm,function(j,elem){
					if(elem.type == "text"){
						main.append("<li><br><div>" +
								"<span><b>" + elem.title + ":</b></span><br>" + 
								"<span><i>" + elem.desc + "</span><br>" + 
								"<input type='text' class='form-control' name='text[" + rand + "][val]' />" +
								"<input type='hidden' name='text[" + rand + "][title]' value='" + elem.title + "' />" + 
								"<input type='hidden' name='text[" + rand + "][desc]' value='" + elem.desc + "' /></li>" +
								"<input type='hidden' name='text[" + rand + "][type]' value='text' /></li>");

					}else if(elem.type == "para"){
						main.append("<li><br><div>" +
								"<span><b>" + elem.title + ":</b></span><br>" + 
								"<span><i>" + elem.desc + "</span><br>" + 
								"<textarea class='form-control' name='textarea[" + rand + "][val]'></textarea>" + 
								"<input type='hidden' name='textarea[" + rand + "][title]' value='" + elem.title + "' />" + 
								"<input type='hidden' name='textarea[" + rand + "][desc]' value='" + elem.desc + "' /></li>" +
								"<input type='hidden' name='textarea[" + rand + "][type]' value='textarea' /></li>");
					}else if(elem.type == "check"){
						main.append("<li><br><div id='ch_" + rand + "'>" +
								"<span><b>" + elem.title + ":</b></span><br>" + 
								"<span><i>" + elem.desc + "</span><br>" + 
								"<input type='hidden' name='check[" + rand + "][title]' value='" + elem.title + "' />" + 
								"<input type='hidden' name='check[" + rand + "][desc]' value='" + elem.desc + "' /></li>" + 
								"<input type='hidden' name='check[" + rand + "][type]' value='check' /></li>");
						
						$.each(elem.items,function(i,item){
							$("#ch_" + rand).append("<input type='checkbox' name='check[" + rand + "][val][" + i + "]' value='" + item + "'>" + item + "</input><br>");
						});
					}else if(elem.type == "radio"){
						main.append("<li><br><div id='ra_" + rand + "'>" +
								"<span><b>" + elem.title + ":</b></span><br>" + 
								"<span><i>" + elem.desc + "</span><br>" + 
								"<input type='hidden' name='radio[" + rand + "][title]' value='" + elem.title + "' />" + 
								"<input type='hidden' name='radio[" + rand + "][desc]' value='" + elem.desc + "' /></li>" + 
								"<input type='hidden' name='radio[" + rand + "][type]' value='radio' /></li>");
						
						$.each(elem.items,function(i,item){
							$("#ra_" + rand).append("<input type='radio' name='radio[" + rand + "][val]' value='" + item + "'>" + item + "</input><br>");
						});
					}else if(elem.type == "select"){
						main.append("<li><br><div id='ra_" + rand + "'>" +
								"<span><b>" + elem.title + ":</b></span><br>" + 
								"<span><i>" + elem.desc + "</span><br>" + 
								"<select id='se_" + rand + "' name='select[" + rand + "][val]'></select>" + 
								"<input type='hidden' name='select[" + rand + "][title]' value='" + elem.title + "' />" + 
								"<input type='hidden' name='select[" + rand + "][desc]' value='" + elem.desc + "' /></li>" + 
								"<input type='hidden' name='select[" + rand + "][type]' value='select' /></li>");
						
						$.each(elem.items,function(i,item){
							$("#se_" + rand).append("<option value='" + item + "'>" + item + "</option>");
						});					
						}
				});
				
			});
		});
	});
}