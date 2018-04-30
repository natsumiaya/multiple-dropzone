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
        <h2>{{ $form_title }}</h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />
        <form action="{{ url('sendPackageinfo') }}" id="" class="form-horizontal form-label-left">
          <div class="form-group">
            <label class="control-label col-md-12 col-sm-12 col-xs-12" for="Intended-recipient">Received at:
            </label>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <input type="text" id="received-time" class="form-control col-md-7 col-xs-12" disabled="disabled" value="{{ !empty($model->received_date) ? date('d-m-Y H:i:s', strtotime($model->received_date)) : date('d-m-Y H:i:s') }}">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-12 col-sm-12 col-xs-12" for="Intended-recipient">Receiver:
            </label>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <input type="text" id="first-name" class="form-control col-md-7 col-xs-12" value="{{ !empty($model->receiver_id) ? $model->receiver->display_name : Auth::user()->display_name }}" disabled="disabled">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-12 col-sm-12 col-xs-12" for="Intended-recipient">Intended Recipient: <span class="required red">*</span>
            </label>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" autofocus="">
            </div>
          </div>
          <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
          <!-- Multiple Start -->
	          <div id="Package0" class="panel">
	            <a class="panel-heading firstpanel" role="tab" id="heading0" data-toggle="collapse" data-parent="#accordion" href="#collapse0" aria-expanded="true" aria-controls="collapse0">
	              <h4 class="panel-title" data-last-index="1">Package #1</h4>
	            </a>
	            <div id="collapse0" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading0">
	              <div class="panel-body">
		  	          <div class="form-group">
			            <label class="control-label col-md-12 col-sm-12 col-xs-12" for="Intended-recipient">Intended Recipient: <span class="required red">*</span>
			            </label>
			            <div class="col-md-12 col-sm-12 col-xs-12">
			              <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
			            </div>
			          </div>
		  	          <div class="form-group">
			            <label class="control-label col-md-12 col-sm-12 col-xs-12" for="Shipping-company">Shipping Company: <span class="required red">*</span>
			            </label>
			            <div class="col-md-12 col-sm-12 col-xs-12">
			            	<div class="col-md-6 col-sm-6 col-xs-6">
				            	<div class="radio">
					                <label> 
					                  <input type="radio" checked="" value=""  name="shippingcompany" data-counter="0"> UPS
					                </label>
				              	</div>
								<div class="radio">
								<label>
								  <input type="radio" value="" name="shippingcompany" data-counter="0"> FedEx
								</label>
								</div>	
			            	</div>
			            	<div class="col-md-6 col-sm-6 col-xs-6">
								<div class="radio">
								<label>
								  <input type="radio" value="" name="shippingcompany" data-counter="0"> USPS
								</label>
								</div>
								<div class="radio">
								<label>
								  <input type="radio" value="" name="shippingcompany" data-counter="0" class="otherradio"><span class="Otherlabel0">Other</span> 
								  <input type="text" name="shippingcompany" class="form-control Othershipping0">
								</label>
								</div>
							</div>    
						</div>
			          </div>
			          <div class="form-group">
			          	<label class="control-label col-md-12 col-sm-12 col-xs-12" for="Intended-recipient">Upload Photos:<span class="required red">*</span>
			            </label>
			            <div id="dropzoneForm" class="dropzone">      		
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
          	</div>
          </div>
          <div class="form-group">
            <div class="float-right">
              @if (empty($model->id))
				<a id="more-package" href="javascript:;" class="btn btn-primary" type="reset">Add More Package</a>
	          @endif
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
	var myDropzone = [];
	var dzCounter = [];
	var dzCounterrmv = [];
	var defaultmsg = ' <div class="pictureblock pictureblock1"> <div class="block-content"> <div class="table"> <div class="table-cell"> <i class="fas fa-camera"></i> <p>Upload Image<br> or<br> Drop files</p> </div> </div> </div> </div> <div class="pictureblock pictureblock2"> <div class="block-content"> <div class="table"> <div class="table-cell"> <i class="fas fa-camera"></i> <p>Upload Image<br> or<br> Drop files</p> </div> </div> </div> </div> <div class="pictureblock pictureblock3"> <div class="block-content"> <div class="table"> <div class="table-cell"> <i class="fas fa-camera"></i> <p>Upload Image<br> or<br> Drop files</p> </div> </div> </div> </div> <div class="pictureblock pictureblock4"> <div class="block-content"> <div class="table"> <div class="table-cell"> <i class="fas fa-camera"></i> <p>Upload Image<br> or<br> Drop files</p> </div> </div> </div> </div> <div class="dz-preview dz-image-preview uploadmore"> <div class="dz-image"> <div class="block-content"> <div class="table"> <div class="table-cell"> <i class="fas fa-camera"></i> <p>Upload more</p> </div> </div> </div> </div> </div> ';

	// JS for radio
	$(".Othershipping0").hide();	 
	$("input[type='radio']").change(function(){
		var name = $(this).attr("name");
		var radiocounter= $(this).attr("data-counter");
		var radioid = $(this).attr("class");
		console.log(this);
		if (radioid == "otherradio"){
			console.log("fire!");
			$(".Otherlabel"+radiocounter).hide();
			$(".Othershipping"+radiocounter).show();
		}
		else {
			$(".Otherlabel"+radiocounter).show();
			console.log($(".Otherlabel"+radiocounter));
			$(".Othershipping"+radiocounter).hide();	
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
		previewsContainer: '#dropzoneForm',
		dictDefaultMessage : defaultmsg,
		clickable : '#dropzoneForm',
		init: function() {
			dzCounter[0] = 0;
			dzCounterrmv[0] = 0;
			$("#dropzoneForm .uploadmore").hide();
		    dzClosure = this; // Makes sure that 'this' is understood inside the functions below.

		    dzClosure.on("addedfile", function(file){
		    	dzCounter[0] = this.files.length;
		    	console.log(dzCounter[0]);
		    	if(dzCounter[0] <4){
		    		var targetrmv = "#dropzoneForm .pictureblock"+dzCounter[0];
		    		$(targetrmv).hide();
		    	}
		    	else if (dzCounter[0] > 4 ){
		    		$("#dropzoneForm .uploadmore").show();
		    	}
		    	else if (dzCounter[0] == 4){
		    		$("#dropzoneForm .uploadmore").show();
		    		$("#dropzoneForm .pictureblock4").hide();	
		    	}
		    });

		    dzClosure.on("removedfile", function(file){
		    	dzCounterrmv[0] = this.files.length;
		    	dzCounterrmv[0] += 1;
		    	if(dzCounterrmv[0] <=4){
		    		$('#dropzoneForm .uploadmore').hide();
		    		var restorermv = "#dropzoneForm .pictureblock"+dzCounterrmv[0];
		    		$(restorermv).show();
		    	}
		    });

		    // for Dropzone to process the queue (instead of default form behavior):
		    document.getElementById("submit-all").addEventListener("click", function(e) {
		        // Make sure that the form isn't actually being sent.
		        e.preventDefault();
		        e.stopPropagation();
		        dzClosure.processQueue();
		    });

		    //send all the form data along with the files:
		    dzClosure.on("sendingmultiple", function(data, xhr, formData) {
		        // formData.append("firstname", jQuery("#firstname").val());
		        // formData.append("lastname", jQuery("#lastname").val());
		    });
		}
	});

	$(document).on('click', '#more-package', function(e){
		e.preventDefault();
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
		cloned.find(".heading-link").attr({
			'id': 'heading'+counter,
			'href': '#collapse'+counter,
			'aria-controls': 'collapse'+counter
		});
		cloned.find(".panel-collapse").attr({
			'id': 'collapse'+counter,
			'aria-labelledby': 'heading'+counter
		});
		cloned.find("input[name='shippingcompany']").attr('data-counter',counter);
		cloned.find(".Othershipping"+closeTab).addClass("Othershipping"+counter);
		cloned.find(".Othershipping"+counter).removeClass("Othershipping"+closeTab);
		cloned.find(".Otherlabel"+closeTab).addClass("Otherlabel"+counter);
		cloned.find(".Otherlabel"+counter).removeClass("Otherlabel"+closeTab);
		cloned.find(".pictureblock").show();
		cloned.find(".dropzone").attr('id', 'dropzoneForm'+counter);
		cloned.find("#dropzoneForm"+counter).empty();		
		$("#endform-pckg").before(cloned);

		$(".Othershipping"+counter).hide();	
		$("input[type='radio']").change(function(){
		var name = $(this).attr("name");
		var radiocounter= $(this).attr("data-counter");
		var radioid = $(this).attr("class");
		console.log(this);
		if (radioid == "otherradio"){
			console.log("fire!");
			$(".Otherlabel"+radiocounter).hide();
			$(".Othershipping"+radiocounter).show();
		}
		else {
			$(".Otherlabel"+radiocounter).show();
			console.log($(".Otherlabel"+radiocounter));
			$(".Othershipping"+radiocounter).hide();	
		}
	});

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
		    previewsContainer: '#dropzoneForm'+counter,
		    dictDefaultMessage : defaultmsg,
		    clickable : '#dropzoneForm'+counter,
		    init: function() {
		    	dzCounter[counter] = 0;
				dzCounterrmv[counter] = 0;
				$("#dropzoneForm"+counter+" .uploadmore").hide();
		        dzClosure = this; // Makes sure that 'this' is understood inside the functions below.

			        dzClosure.on("addedfile", function(file){
			    	dzCounter[counter] = this.files.length;
			    	console.log(dzCounter[counter]);
			    	if(dzCounter[counter] <4){
			    		var targetrmv = "#dropzoneForm"+counter+" .pictureblock"+dzCounter[counter];
			    		$(targetrmv).hide();
			    	}
			    	else if (dzCounter[counter] > 4 ){
			    		$("#dropzoneForm"+counter+" .uploadmore").show();
			    	}
			    	else if (dzCounter[counter] == 4){
			    		$("#dropzoneForm"+counter+" .uploadmore").show();
			    		$("#dropzoneForm"+counter+" .pictureblock4").hide();	
			    	}
			    });

			    dzClosure.on("removedfile", function(file){
			    	dzCounterrmv[counter] = this.files.length;
			    	dzCounterrmv[counter] += 1;
			    	if(dzCounterrmv[counter] <=4){
			    		$('#dropzoneForm'+counter+' .uploadmore').hide();
			    		var restorermv = "#dropzoneForm"+counter+" .pictureblock"+dzCounterrmv[counter];
			    		$(restorermv).show();
			    	}
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