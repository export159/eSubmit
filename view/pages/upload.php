<div class='container'>

	<form id="upload-form" class='form form-horizontal' role='form' action="../controller/upload.php?action=submit" method="POST" enctype="multipart/form-data">
		<legend>
			Submit File
		</legend>
		<p class="text-info">Note: You can only upload 1(one) file at a time!</p>
		<div class="form-group" id="schedule">
    		<label for="s-schedule" class="col-sm-2 control-label">Schedule</label>
    		<div class="col-sm-10">
    			<select class="form-control" name="schedule" id="s-schedule">
            <option value="0"> -- Select Schedule -- </option>
            <option>MTh 7:30 - 9:00</option>
            <option>MTh 9:00 - 10:30</option>
            <option>MTh 10:30 - 12:00</option>
            <option>MTh 1:00 - 2:30</option>
            <option>TFri 7:30 - 9:00</option>
            <option>TFri 9:00 - 10:30</option>
            <option>TFri 10:30 - 12:00</option>
            <option>TFri 1:00 - 2:30</option>
            <option>Wed 1:00 - 4:00</option>

          </select>
    		</div>
  		</div>

  		<div class="form-group" id="document">
    		<label for="f-file" class="col-sm-2 control-label">File</label>
    		<div class="col-sm-10">
    			<input type="file" name="document" class="form-control" id="f-file" placeholder="File" />
    		</div>
  		</div>

      <div class="form-group">
        <label for="f-desc" class="col-sm-2 control-label">Description</label>
        <div class="col-sm-10">
          <textarea id="f-desc" name="description" class="form-control" ></textarea>
        </div>
      </div>

  		<div class="form-group">
    		<div class="col-sm-offset-2 col-sm-10">
      			
            <button type="submit" class="btn btn-default" data-loading-text="Uploading ....">Upload</button>
    		</div>
  		</div>


	</form>
</div>