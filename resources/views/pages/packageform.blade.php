@extends('layouts.default')

@section('css')
<link href="{{URL::asset('css/dropzone.css')}}" rel="stylesheet">	
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
            <label class="control-label col-md-12 col-sm-12 col-xs-12" for="Intended-recipient">Received at:
            </label>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <input type="text" id="received-time" class="form-control col-md-7 col-xs-12" disabled="disabled" value= "{{ date('d-m-Y H:i:s') }}" >
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-12 col-sm-12 col-xs-12" for="Intended-recipient">Receiver:
            </label>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" value="Username" disabled="disabled">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-12 col-sm-12 col-xs-12" for="Intended-recipient">Intended Recipient: <span class="required red">*</span>
            </label>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
          <!-- Multiple Start -->
	          <div id="Package0" class="panel">
	            <a class="panel-heading firstpanel" role="tab" id="heading0" data-toggle="collapse" data-parent="#accordion" href="#collapse0" aria-expanded="true" aria-controls="collapse0">
	              <h4 class="panel-title">Package #1</h4>
	            </a>
	            <div id="collapse0" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading0">
	              <div class="panel-body">
		  	          <div class="form-group">
			            <label class="control-label col-md-12 col-sm-12 col-xs-12" for="Shipping-company">Shipping Company: <span class="required red">*</span>
			            </label>
			            <div class="col-md-12 col-sm-12 col-xs-12">
			            	<div class="col-md-6 col-sm-6 col-xs-6">
				            	<div class="radio">
					                <label>
					                  <input type="radio" checked="" value="" id="ShippingUPS" name="shippingcompany"> UPS
					                </label>
				              	</div>
								<div class="radio">
								<label>
								  <input type="radio" value="" id="ShippingFedEx" name="shippingcompany"> FedEx
								</label>
								</div>	
			            	</div>
			            	<div class="col-md-6 col-sm-6 col-xs-6">
								<div class="radio">
								<label>
								  <input type="radio" value="" id="ShippingUSPS" name="shippingcompany"> USPS
								</label>
								</div>
								<div class="radio">
								<label>
								  <input type="radio" value="" id="otherradio" name="shippingcompany"><span id="Otherlabel">Other</span> 
								  <input type="text" id="Othershipping" class="form-control">
								</label>
								</div>
							</div>    
						</div>
			          </div>
			          <div class="form-group">
			          	<label class="control-label col-md-12 col-sm-12 col-xs-12" for="Intended-recipient">Upload Photos:<span class="required red">*</span>
			            </label>
			            <div id="dropzoneForm" class="dropzone">
			            	<div class="dz-default dz-message">
			            		<span>
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
			            		</span>
			            	</div>        		
			            </div>
			          </div>
			          <div class="form-group">
			            <label class="control-label col-md-12 col-sm-12 col-xs-12" for="Intended-recipient">Note:
			            </label>
			            <textarea id="message" class="form-control col-md-12 col-sm-12 col-xs-12" name="message"></textarea>
			          </div>
	              </div>          	
	          	</div>
	          </div>
	          <!-- Multiple end -->
	          <div id="endform-pckg" class="ln_solid"></div>
          </div>
          <div class="form-group">
            <div class="float-right">
			  <a id="more-package" href="javascript:;" class="btn btn-primary" type="reset">Add More Package</a>
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
<script src="{{URL::asset('js/dropzone.js')}}"></script>

<script type="text/javascript">
$(document).ready(function () {
	// JS for page
	var counter = 1;
	$('.firstpanel').hide();
	var myDropzone = [];


	// JS for radio
	$("#Othershipping").hide();	 
	$("input[name='shippingcompany']").change(function(){
		var radioid= this.getAttribute('id');
		if (radioid == "otherradio"){
			$("#Otherlabel").hide();
			$("#Othershipping").show();
		}
		else {
			$("#Otherlabel").show();
			$("#Othershipping").hide();	
		}
	});

	
	// JS for Dropzone
	Dropzone.autoDiscover = false;
	myDropzone[0] = new Dropzone("#dropzoneForm",{
		url: "{{ url('uploadImage') }}",
		autoProcessQueue: false,
		uploadMultiple: true,
		acceptedFiles: 'image/*',
		addRemoveLinks: true,
		init: function() {
			var dzCounter = 0;
		    dzClosure = this; // Makes sure that 'this' is understood inside the functions below.

		    dzClosure.on("addedfile", function(file){
		    	dzCounter++;
		    	
		    });

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
	});

	$(document).on('click', '#more-package', function(e){
		e.preventDefault();
		$('.firstpanel').show();
		closeTab = counter - 1;	
		package = counter + 1;
		var target = $("#Package0");
		var cloned = target.clone();
		cloned.attr('id', 'Package'+counter);
		cloned.find(".panel-heading").attr({
			'id': 'heading'+counter,
			'href': '#collapse'+counter,
			'aria-controls': 'collapse'+counter	
		});
		cloned.find("h4.panel-title").text("Package #"+package);
		cloned.find(".panel-collapse").attr({
			'id': 'collapse'+counter,
			'aria-labelledby': 'heading'+counter
		});
		cloned.find(".dropzone").attr('id', 'dropzoneForm'+counter);		
		console.log(cloned);
		$("#endform-pckg").before(cloned);

		// $('#collapse' + closeTab).slideUp("slow", function(){
		// 	console.log($(this));
		// 	$(this).toggleClass("in");	
		// });
		myDropzone[counter] = new Dropzone('#dropzoneForm'+counter,{
			url: "{{ url('uploadImage') }}",
		    autoProcessQueue: false,
		    uploadMultiple: true,
		    acceptedFiles: 'image/*',
		    addRemoveLinks: true,
		    dictDefaultMessage: DefaultMessage,
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
		});
		counter++;
	});

	
	
});
// function previewPlace(){
// 	var count = myDropzone.files.length;
// 	console.log(count);
// 	for (i = 0; i < count; i++){
// 		if (i < 4){
// 			console.log(i);
// 			var place = i+1;
// 			e.previewTemplate = $(".dzpreview")+place;
// 		} 
// 		else {
// 			console.log(i);
// 			e.previewTemplate = $(".dzpreview");
// 		}
// 	} 
// 	file.previewTemplate = $(this.option.previewTemplate);
// }
</script>
@stop