<div id="side">
<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#menu1">Actions</a></li>

  </ul>

  <div class="tab-content">

  <div id="menu1" class="tab-pane fade in active">
    <button type="button" class="btn btn-primary btn-resized" data-toggle="modal" data-target="#addText">Add Text</button><br><br>
      <button type="button" class="btn btn-primary btn-resized" data-toggle="modal" data-target="#addPara">Add Paragraph</button><br><br>
  <button type="button" class="btn btn-primary btn-resized" data-toggle="modal" data-target="#addCheck">Add Checkbox</button><br><br>
  <button type="button" class="btn btn-primary btn-resized" data-toggle="modal" data-target="#addRadio">Add Radio</button><br><br>
  <button type="button" class="btn btn-primary btn-resized" data-toggle="modal" data-target="#addSelect">Add List</button><br><br>
    <button type="button" class="btn btn-primary btn-resized" data-toggle="modal" data-target="#addFile">Add File</button><br><br>
     <button type="button" class="btn btn-primary btn-resized" data-toggle="modal" data-target="#addApprover">Add Approver</button>

  </div>

</div>
</div>

<div id="form">

<form name="frm" id="frm" method="POST">
<label for="formName">Form Name:</label>
<input type="text" id="formName" name="formName" class="form-control" />
<input type="hidden" id="formOwner" name="formOwner" class="form-control" />
<input type="hidden" id="formApprover" name="formApprover" class="form-control" />
<input type="hidden" id="sid" name="sid" class="form-control" />
<input type="hidden" id="fid" name="fid" class="form-control" />
<fieldset><legend>Fields</legend>
<ul id="formData">
</ul>
</fieldset>

</form>
<button type="button" class="btn btn-success" id="saveBtn">Save</button><br><br>
</div>



<!--  MODALS FOR FORM  -->

<div id="addText" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Text</h4>
      </div>
      <div class="modal-body">
       <form name="datas" id="datas" method="POST">
        <label for="title">Question Title:</label>
        <input type="text" class="form-control" name="txt[1][title]" id="title" />
        <label for="desc">Question Description:</label>
        <input type="text" class="form-control" name="txt[1][desc]" id="desc" /><br>
        <label for="eval">Type:</label>
        <select class="form-control" name="txt[1][eval]" id="eval">
        <option value="email">Email</option>
        <option value="number">Number</option>
        <option value="text">Text</option>
        </select>

       </form>
      </div>
      <div class="modal-footer">
        Required: <input type="checkbox" id="req" name="txt[1][req]" value="2" />
      	<button type="button" class="btn btn-primary" data-dismiss="modal" id="addTextBtn">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<div id="addFile" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add File</h4>
      </div>
      <div class="modal-body">
       <form name="datas" id="datas" method="POST">
        <label for="title">Question Title:</label>
        <input type="text" class="form-control" name="file[1][title]" id="title" />
         <label for="desc">Question Description:</label>
        <input type="text" class="form-control" name="file[1][desc]" id="desc" />
       </form>
      </div>
      <div class="modal-footer">
             <button type="button" class="btn btn-primary" data-dismiss="modal" id="addFileBtn">Save</button>

        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div id="editFile" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit File</h4>
      </div>
      <div class="modal-body">
       <form name="datas" id="datas" method="POST">
        <label for="title">Question Title:</label>
        <input type="text" class="form-control" name="file[1][title]" id="title" />
         <label for="desc">Question Description:</label>
        <input type="text" class="form-control" name="file[1][desc]" id="desc" />
        <input type="hidden" name="file[1][id]" id="id" />
       </form>
      </div>
      <div class="modal-footer">
             <button type="button" class="btn btn-primary" data-dismiss="modal" id="editFileBtn">Save</button>

        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div id="addApprover" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Approver</h4>
      </div>
      <div class="modal-body">
       <form name="datas" id="datas" method="POST">
        <label for="title">Approver:</label>
        <select id='app'>

        </select>
       </form>
       <button type="button" class="btn btn-primary" data-dismiss="modal" id="addApproverBtn">Save</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>



<div id="editTxt" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Text</h4>
      </div>
      <div class="modal-body">
       <form name="datas" id="datas" method="POST">
        <label for="title">Question Title:</label>
        <input type="text" class="form-control" name="txt[1][title]" id="title" />
        <label for="desc">Question Description:</label>
        <input type="text" class="form-control" name="txt[1][desc]" id="desc" />
        <input type="hidden" class="form-control" id="id" /><br>
         <label for="eval">Type:</label>
        <select class="form-control" name="txt[1][eval]" id="eval">
        <option value="email">Email</option>
        <option value="number">Number</option>
                <option value="text">Text</option>

        </select>
       </form>

      </div>
      <div class="modal-footer">
              Required: <input type="checkbox" id="req" name="txt[1][req]" value="2" />

      <button type="button" class="btn btn-primary" data-dismiss="modal" id="editTxtBtn">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div id="addPara" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Paragraph</h4>
      </div>
      <div class="modal-body">
       <form name="datas" id="datas" method="POST">
        <label for="title">Question Title:</label>
        <input type="text" class="form-control" name="txt[1][title]" id="title" />
        <label for="desc">Question Description:</label>
        <input type="text" class="form-control" name="txt[1][desc]" id="desc" />
       </form>
      </div>
      <div class="modal-footer">
             Required: <input type="checkbox" value="2" id="req" name="txt[1][req]" />

             <button type="button" class="btn btn-primary" data-dismiss="modal" id="addParaBtn">Save</button>

        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div id="editPara" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Paragraph</h4>
      </div>
      <div class="modal-body">
       <form name="datas" id="datas" method="POST">
        <label for="title">Question Title:</label>
        <input type="text" class="form-control" name="txt[1][title]" id="title" />
        <label for="desc">Question Description:</label>
        <input type="text" class="form-control" name="txt[1][desc]" id="desc" />
        <input type="hidden" class="form-control" id="id" /><br>
       </form>
      </div>
      <div class="modal-footer">
              Required: <input type="checkbox" value="2" id="req" name="txt[1][req]" />
             <button type="button" class="btn btn-primary" data-dismiss="modal" id="editParaBtn">Save</button>

        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<div id="addCheck" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Checkbox</h4>
      </div>
      <div class="modal-body">
       <form name="datas" id="datas" method="POST">
        <label for="title">Question Title:</label>
        <input type="text" class="form-control" name="txt[1][title]" id="title" />
        <label for="desc">Question Description:</label>
        <input type="text" class="form-control" name="txt[1][desc]" id="desc" />
        <fieldset><legend>Items</legend>
        <div id="items">

        </div>
        </fieldset>
        <fieldset><legend>Add</legend>
        <div id="control" class="hidecontrol">
        <label for="controlData">Title:</label>
        <input type="text" class="form-control" id="controlData" /><br>
                <button type="button" style="float:right;" class="btn btn-primary" onClick="hideCheckItem();">Close</button>

        <button type="button" style="float:right;" class="btn btn-primary" onClick="addCheckItem();">Add</button>
        </div>
        </fieldset>
        <br>
        <button type="button" class="btn btn-primary" onClick="showControl();">(+)</button>
       </form>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-primary" data-dismiss="modal" id="addCheckBtn">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div id="editCheck" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Checkbox</h4>
      </div>
      <div class="modal-body">
       <form name="datas" id="datas" method="POST">
        <label for="title">Question Title:</label>
        <input type="text" class="form-control" name="txt[1][title]" id="title" />
        <label for="desc">Question Description:</label>
        <input type="text" class="form-control" name="txt[1][desc]" id="desc" />
                <input type="hidden" class="form-control" name="txt[1][desc]" id="id" />

        <fieldset><legend>Items</legend>
        <div id="items">

        </div>
        </fieldset>
        <fieldset><legend>Add</legend>
        <div id="control" class="hidecontrol">
        <label for="controlData">Title:</label>
        <input type="text" class="form-control" id="controlData" /><br>
        <button type="button" style="float:right;" class="btn btn-primary" onClick="hideCheckItem2();">Close</button>
        <button type="button" style="float:right;" class="btn btn-primary" onClick="addCheckItem2();">Add</button>&nbsp;

        </div>
        </fieldset>
        <br>
        <button type="button" class="btn btn-primary" onClick="showControl2();">(+)</button>
       </form>
      </div>
      <div class="modal-footer">

      <button type="button" class="btn btn-primary" data-dismiss="modal" id="editCheckBtn">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<div id="addRadio" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Radio</h4>
      </div>
      <div class="modal-body">
       <form name="datas" id="datas" method="POST">
        <label for="title">Question Title:</label>
        <input type="text" class="form-control" name="txt[1][title]" id="title" />
        <label for="desc">Question Description:</label>
        <input type="text" class="form-control" name="txt[1][desc]" id="desc" />
        <fieldset><legend>Items</legend>
        <div id="items">

        </div>
        </fieldset>
        <fieldset><legend>Add</legend>
        <div id="control" class="hidecontrol">
        <label for="controlData">Title:</label>
        <input type="text" class="form-control" id="controlData" /><br>
        <button type="button" style="float:right;" class="btn btn-primary" onClick="hideRadioItem();">Close</button>
        <button type="button" style="float:right;" class="btn btn-primary" onClick="addRadioItem();">Add</button>
        </div>
        </fieldset>
        <br>
        <button type="button" class="btn btn-primary" onClick="showControl3();">(+)</button>
       </form>
      </div>
      <div class="modal-footer">

      <button type="button" class="btn btn-primary" data-dismiss="modal" id="addRadioBtn">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div id="editRadio" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Radio</h4>
      </div>
      <div class="modal-body">
       <form name="datas" id="datas" method="POST">
        <label for="title">Question Title:</label>
        <input type="text" class="form-control" name="txt[1][title]" id="title" />
        <label for="desc">Question Description:</label>
        <input type="text" class="form-control" name="txt[1][desc]" id="desc" />
        <input type="hidden" class="form-control" name="txt[1][desc]" id="id" />

        <fieldset><legend>Items</legend>
        <div id="items">

        </div>
        </fieldset>
        <fieldset><legend>Add</legend>
        <div id="control" class="hidecontrol">
        <label for="controlData">Title:</label>
        <input type="text" class="form-control" id="controlData" /><br>
                <button type="button" style="float:right;" class="btn btn-primary" onClick="hideRadioItem2();">Close</button>

        <button type="button" style="float:right;" class="btn btn-primary" onClick="addRadioItem2();">Add</button>
        </div>
        </fieldset>
        <br>
        <button type="button" class="btn btn-primary" onClick="showControl4();">(+)</button>
       </form>
      </div>
      <div class="modal-footer">

      <button type="button" class="btn btn-primary" data-dismiss="modal" id="editRadioBtn">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div id="addSelect" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add List</h4>
      </div>
      <div class="modal-body">
       <form name="datas" id="datas" method="POST">
        <label for="title">Question Title:</label>
        <input type="text" class="form-control" name="txt[1][title]" id="title" />
        <label for="desc">Question Description:</label>
        <input type="text" class="form-control" name="txt[1][desc]" id="desc" />
        <fieldset><legend>Items</legend>
        <select class="form-control" id="items">

        </select><br>
        <button type="button" style="float:right;" class="btn btn-primary" onClick="removeSelectItem();">Remove Item</button>
        </fieldset>
        <fieldset><legend>Add</legend>
        <div id="control" class="hidecontrol">
        <label for="controlData">Title:</label>
        <input type="text" class="form-control" id="controlData" /><br>
         <button type="button" style="float:right;" class="btn btn-primary" onClick="hideSelectItem();">Close</button>
        <button type="button" style="float:right;" class="btn btn-primary" onClick="addSelectItem();">Add</button>
        </div>
        </fieldset>
        <br>
        <button type="button" class="btn btn-primary" onClick="showControl5();">(+)</button>
       </form>
      </div>
      <div class="modal-footer">
                  Required: <input type="checkbox" value="2" id="req" name="txt[1][req]" />

      <button type="button" class="btn btn-primary" data-dismiss="modal" id="addSelectBtn">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div id="editSelect" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add List</h4>
      </div>
      <div class="modal-body">
       <form name="datas" id="datas" method="POST">
        <label for="title">Question Title:</label>
        <input type="text" class="form-control" name="txt[1][title]" id="title" />
        <label for="desc">Question Description:</label>
        <input type="text" class="form-control" name="txt[1][desc]" id="desc" />
        <input type="hidden" class="form-control" id="id" />
        <fieldset><legend>Items</legend>
        <select class="form-control" id="items">

        </select><br>
        <button type="button" style="float:right;" class="btn btn-primary" onClick="removeSelectItem2();">Remove Item</button>
        </fieldset>
        <fieldset><legend>Add</legend>
        <div id="control" class="hidecontrol">
        <label for="controlData">Title:</label>
        <input type="text" class="form-control" id="controlData" /><br>
         <button type="button" style="float:right;" class="btn btn-primary" onClick="hideSelectItem2();">Close</button>
        <button type="button" style="float:right;" class="btn btn-primary" onClick="addSelectItem2();">Add</button>
        </div>
        </fieldset>
        <br>
        <button type="button" class="btn btn-primary" onClick="showControl6();">(+)</button>
       </form>
      </div>
      <div class="modal-footer">
                  Required: <input type="checkbox" value="2" id="req" name="txt[1][req]" />

      <button type="button" class="btn btn-primary" data-dismiss="modal" id="editSelectBtn">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!--  END MODALS FOR FORM  -->

<script src="js/jq.js"></script>
<script src="js/b.js"></script>
<script src="js/jqu-min.js"></script>
