@extends('layouts.default')

@section('css')
<link href="{{URL::asset('css/dropzone.min.css')}}" rel="stylesheet">	
@stop

@section('content')
<div class="clearfix"></div>
<div class="row">
  <div class="col-md-offset-2 col-md-8 col-sm-offset-2 col-sm-8 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>New Package</h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />
        <form action="{{ url('sendPackageinfo') }}" id="" class="form-horizontal form-label-left">
          <div class="form-group">
            <label class="control-label col-md-12 col-sm-12 col-xs-12" for="Intended-recipient">Intended Recipient <span class="required red">*</span>
            </label>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-12 col-sm-12 col-xs-12" for="Shipping-company">Shipping Company <span class="required red">*</span>
            </label>
            <div class="col-md-12 col-sm-12 col-xs-12">
            	<div class="radio">
	                <label>
	                  <input type="radio" checked="" value="option1" id="" name="optionsRadios"> Option one. only select one option
	                </label>
              	</div>
				<div class="radio">
				<label>
				  <input type="radio" value="" id="" name="optionsRadios"> Option two. only select one option
				</label>
				</div>  
			</div>
          </div>
          <div class="form-group">
          	<label class="control-label col-md-12 col-sm-12 col-xs-12" for="Intended-recipient">Upload Photos<span class="required red">*</span>
            </label>
            <div id="uploadTrigger" class="col-md-12 col-sm-12 col-xs-12">
            	<div class="pictureblock">
            		<div class="block-content">
            			<div class="table">
	            			<div class="table-cell">
		            			<i class="fas fa-camera"></i>
		            			<p>Upload Image</p>	
	            			</div>
	            		</div>	
            		</div>
            	</div>
            	<div class="pictureblock">
            		<div class="block-content">
            			<div class="table">
	            			<div class="table-cell">
		            			<i class="fas fa-camera"></i>
		            			<p>Upload Image</p>	
	            			</div>
	            		</div>	
            		</div>
            	</div>
            	<div class="pictureblock">
            		<div class="block-content">
            			<div class="table">
	            			<div class="table-cell">
		            			<i class="fas fa-camera"></i>
		            			<p>Upload Image</p>	
	            			</div>
	            		</div>	
            		</div>
            	</div>
            	<div class="pictureblock">
            		<div class="block-content">
            			<div class="table">
	            			<div class="table-cell">
		            			<i class="fas fa-camera"></i>
		            			<p>Upload Image</p>	
	            			</div>
	            		</div>	
            		</div>
            	</div>
            </div>
            <div id="packagePicture" class="col-md-12 col-sm-12 col-xs-12 dropzone">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-12 col-sm-12 col-xs-12" for="Intended-recipient">Note:
            </label>
            <textarea id="message" class="form-control col-md-12 col-sm-12 col-xs-12" name="message"></textarea>
          </div>
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <button class="btn btn-primary" type="button">Cancel</button>
			  <button class="btn btn-primary" type="reset">Reset</button>
              <button id="submit-all" type="submit" class="btn btn-success">Submit</button>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
@stop

@section('js')
<script src="{{URL::asset('js/dropzone.min.js')}}"></script>
<script type="text/javascript">

Dropzone.options.packagePicture = {
	url: "{{ url('uploadImage') }}",
    autoProcessQueue: false,
    uploadMultiple: true,
    parallelUploads: 5,
    maxFiles: 5,
    maxFilesize: 1,
    acceptedFiles: 'image/*',
    addRemoveLinks: true,
    clickable: '#uploadTrigger',
    init: function() {
        dzClosure = this; // Makes sure that 'this' is understood inside the functions below.

        // for Dropzone to process the queue (instead of default form behavior):
        document.getElementById("submit-all").addEventListener("click", function(e) {
            // Make sure that the form isn't actually being sent.
            e.preventDefault();
            e.stopPropagation();
            dzClosure.processQueue();
        });

        //send all the form data along with the files:
        this.on("sendingmultiple", function(data, xhr, formData) {
            // formData.append("firstname", jQuery("#firstname").val());
            // formData.append("lastname", jQuery("#lastname").val());
        });
    }
}
</script>
@stop