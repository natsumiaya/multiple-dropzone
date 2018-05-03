@extends('layouts.default')

@section('css')
<link href="{{URL::asset('css/dropzone.css')}}" rel="stylesheet">	
@stop

@section('content')
<div class="clearfix"></div>
<div class="row list-container">
  <div class="col-md-offset-2 col-md-8 col-sm-offset-2 col-sm-8 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Package Received</h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />
        <form action="{{ url('sendPackageinfo') }}" id="" class="form-horizontal form-label-left">
          <div class="form-group">
            <label class="control-label col-md-12 col-sm-12 col-xs-12" for="Intended-recipient">Received at:
            </label>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <input type="text" id="received-time" name="received-time"class="form-control col-md-7 col-xs-12" disabled="disabled" value="{{ !empty($model->received_date) ? date('d-m-Y H:i:s', strtotime($model->received_date)) : date('d-m-Y H:i:s') }}">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-12 col-sm-12 col-xs-12" for="Intended-recipient">Receiver:
            </label>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <input type="text" id="receiver" name="receiver" class="form-control col-md-7 col-xs-12" value="" disabled="disabled">
            </div>
          </div>
          <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
          <!-- Multiple Start -->
	          <div id="Package0" class="panel">
	            <a class="panel-heading firstpanel" role="tab" id="heading0" data-toggle="collapse" data-parent="#accordion" href="#collapse0" aria-expanded="true" aria-controls="collapse0">
	              <div class="panel-title" data-last-index="1">
	              	Package <span class="esum"></span>
	              	<span class="pull-right"><i class="fas fa-times remove-item hidden red data-toggle="tooltip" title="Remove Package" data-position="0""></i></span>
	              </div>
	            </a>
	            <div id="collapse0" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading0">
	              <div class="panel-body">
		  	          <div class="form-group">
			            <label class="control-label col-md-12 col-sm-12 col-xs-12" for="Intended-recipient">Intended Recipient: <span class="required red">*</span>
			            </label>
			            <div class="col-md-12 col-sm-12 col-xs-12">
			              <input type="text" id="intended0" name="intended0" required="required" class="form-control col-md-7 col-xs-12">
			            </div>
			          </div>
		  	          <div class="form-group">
			            <label class="control-label col-md-12 col-sm-12 col-xs-12" for="Shipping-company">Shipping Company: <span class="required red">*</span>
			            </label>
			            <div class="col-md-12 col-sm-12 col-xs-12">
			            	<div class="col-md-6 col-sm-6 col-xs-6">
				            	<div class="radio">
					                <label> 
					                  <input type="radio" checked="" value=""  name="shippingcompany0" data-counter="0"> UPS
					                </label>
				              	</div>
								<div class="radio">
								<label>
								  <input type="radio" value="" name="shippingcompany0" data-counter="0"> FedEx
								</label>
								</div>	
			            	</div>
			            	<div class="col-md-6 col-sm-6 col-xs-6">
								<div class="radio">
								<label>
								  <input type="radio" value="" name="shippingcompany0" data-counter="0"> USPS
								</label>
								</div>
								<div class="radio">
								<label>
								  <input type="radio" value="" name="shippingcompany0" data-counter="0" class="otherradio"><span id="otherlabel0" class="otherlabel">Other</span> 
								  <input type="text" id="othershipping0" name="shippingcompany0" class="form-control othershipping">
								</label>
								</div>
							</div>    
						</div>
			          </div>
			          <div class="form-group">
			          	<label class="control-label col-md-12 col-sm-12 col-xs-12" for="Intended-recipient">Upload Photos:<span class="required red">*</span>
			            </label>
			            <div id="dropzoneForm0" class="dropzone">      		
			            </div>
			          </div>
			          <div class="form-group hidden">
			          	<div id="itemkey0" class="items-key"></div>
			          	<div id="itemvalue0" class="items-value"></div>
			          </div>
			          <div class="form-group">
			            <label class="control-label col-md-12 col-sm-12 col-xs-12" for="Intended-recipient">Note:
			            </label>
			            <textarea id="message0" class="form-control col-md-12 col-sm-12 col-xs-12" name="message0"></textarea>
			          </div>
	              </div>          	
	          	</div>
	          </div>
	          <!-- Multiple end -->
	          <div id="endform-pckg" class="ln_solid"></div>
          </div>
          <div class="form-group">
          	<div class="float-right addmore-btn">
          		@if (empty($model->id))
				<a id="more-package" href="javascript:;" class="btn btn-primary" type="reset">Add More Package</a>
	          	@endif
          	</div>
          </div>
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="float-right">
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
var myDropzone = [];
var dzCounter = [];
var dzCounterrmv = [];
var counter;
var defaultmsg = ' <div class="dzmsg"><div class="pictureblock pictureblock1"> <div class="block-content"> <div class="table"> <div class="table-cell"> <i class="fas fa-camera"></i> <p>Upload Images<br> or<br> Drop files</p> </div> </div> </div> </div> <div class="pictureblock pictureblock2"> <div class="block-content"> <div class="table"> <div class="table-cell"> <i class="fas fa-camera"></i> <p>Upload Images<br> or<br> Drop files</p> </div> </div> </div> </div> <div class="pictureblock pictureblock3"> <div class="block-content"> <div class="table"> <div class="table-cell"> <i class="fas fa-camera"></i> <p>Upload Images<br> or<br> Drop files</p> </div> </div> </div> </div> <div class="pictureblock pictureblock4"> <div class="block-content"> <div class="table"> <div class="table-cell"> <i class="fas fa-camera"></i> <p>Upload Images<br> or<br> Drop files</p> </div> </div> </div> </div></div><div class="dz-preview dz-image-preview uploadmore"> <div class="dz-image"> <div class="block-content"> <div class="table"> <div class="table-cell"> <i class="fas fa-camera"></i> <p>Upload more</p> </div> </div> </div> </div> </div> ';

function toggleOther(radioitem){
	var name = $(radioitem).attr("name");
	var radiocounter= $(radioitem).attr("data-counter");
	var radioid = $(radioitem).attr("class");
	if (radioid == "otherradio"){
		$("#otherlabel"+radiocounter).hide();
		$("#othershipping"+radiocounter).show();
	}
	else {
		$("#otherlabel"+radiocounter).show();
		console.log($("#otherlabel"+radiocounter));
		$("#othershipping"+radiocounter).hide();	
	}
};

$(document).on('click', '.remove-item', function(){
	var position = $(this).attr("data-position");
	if (position == 0){
		alert("You cannot delete first item");
	}
	else {
		$("#Package"+position).slideUp("slow", function(){
			$("#Package"+position).remove();
		}
	)}
});

function createDropzone(id, cntradd, cntrrmv, counter){
	Dropzone.autoDiscover = false;
	myDropzone[counter] = new Dropzone(id,{
		url: "{{ url('uploadImage') }}",
	    autoProcessQueue: false,
	    uploadMultiple: true,
	    acceptedFiles: 'image/*',
	    addRemoveLinks: true,
	    previewsContainer: id,
	    dictDefaultMessage : defaultmsg,
	    thumbnailWidth: 160,
    	thumbnailHeight: 160,
	    clickable : id,
	    previewcounter: counter,
	    init: function() {
	    	cntradd = 0;
			cntrrmv = 0;
			$(id+" .uploadmore").hide();
			if (counter == 0){
					$(".dz-default").attr("id", "preview"+counter);	
			}
			else {
				$(id+" .dz-default").attr("id", "preview"+counter);
			}
	        dzClosure = this; // Makes sure that 'this' is understood inside the functions below.

		        dzClosure.on("addedfile", function(file){
		    	cntradd = this.files.length;
		    	console.log(cntradd);
		    	if(cntradd <4){
		    		var targetrmv = id+" .pictureblock"+cntradd;
		    		$(targetrmv).hide();
		    	}
		    	else if (cntradd > 4 ){
		    		$(id+" .uploadmore").show();
		    	}
		    	else if (cntradd == 4){
		    		$(id+" .uploadmore").show();
		    		$(id+" .pictureblock4").hide();	
		    	}
		    });

		    dzClosure.on("removedfile", function(file){
		    	cntrrmv = this.files.length;
		    	cntrrmv += 1;
		    	if(cntrrmv <=4){
		    		$(id +' .uploadmore').hide();
		    		var restorermv = id+" .pictureblock"+cntrrmv;
		    		$(restorermv).show();
		    	}
		    });
	    }
	});
};

function cloneThisForm(counter, target, dest){
	minusone = counter - 1;
	if (minusone <= 0 ) minusone = 0;
	var cloned = $(target).clone();
	cloned.attr('id', 'Package'+counter);
	cloned.find(".panel-heading").attr({
		'id': 'heading'+counter,
		'href': '#collapse'+counter,
		'aria-controls': 'collapse'+counter	
	});
	cloned.find(".heading-link").attr({
		'id': 'heading'+counter,
		'href': '#collapse'+counter,
		'aria-controls': 'collapse'+counter
	});
	cloned.find(".panel-collapse").attr({
		'id': 'collapse'+counter,
		'aria-labelledby': 'heading'+counter
	});
	cloned.find(".remove-item").attr("data-position", counter);
	cloned.find(".remove-item").removeClass("hidden");
	cloned.find("#intended"+minusone).attr({
		'name' : "intended"+counter,
		'id' : "intended"+counter
	});
	cloned.find("#message"+minusone).attr({
		'name' : "message"+counter,
		'id' : "message"+counter
	});
	cloned.find("input[type='radio']").attr({
		'data-counter':counter,
		'name' : "shippingcompany"+counter
	});
	cloned.find(".otherlabel").attr("id", "otherlabel"+counter);
	cloned.find(".othershipping").attr("id", "othershipping"+counter);
	cloned.find(".items-value").attr("id", "itemvalue"+counter);
	cloned.find(".items-key").attr("id", "itemkey"+counter);
	cloned.find("#othershipping"+counter).hide();
	cloned.find(".pictureblock").show();
	cloned.find("input[type='radio']").attr('checked', false);
	cloned.find("input").val("").end();
	cloned.find("textarea").val("").end();
	cloned.find(".dropzone").attr('id', 'dropzoneForm'+counter);
	cloned.find("#dropzoneForm"+counter).empty();		
	$(dest).before(cloned);
}

$(document).on('change', "input[type='radio']", function(e){
	toggleOther(this);
});


$(document).ready(function () {
	// JS for page
	myDropzone = [];
	dzCounter = [];
	dzCounterrmv = [];
	counter = 0;
	
	// JS for radio
	$("#othershipping"+counter).hide()
	// JS for Dropzone
	Dropzone.autoDiscover = false;
	createDropzone('#dropzoneForm'+counter, dzCounter[counter], dzCounterrmv[counter], counter);
	

	$(document).on('click', '#more-package', function(e){
		e.preventDefault();
		$.each(myDropzone, function(index){
			console.log(myDropzone[index]);
			// myDropzone[index].processQueue();
		});
		counter++;
		// minusone = counter - 1;
		cloneThisForm(counter, "#Package0", "#endform-pckg");
		createDropzone('#dropzoneForm'+counter, dzCounter[counter], dzCounterrmv[counter], counter);
	});

	$(document).on('click', "#submit-all", function(e){
		e.preventDefault();
		for (i = 0; i <= counter; i++){
			$.each($('#dropzoneForm'+counter+' img[data-dz-thumbnail]'), function(index,value){
				$('<input>').attr({
	                type: 'hidden',
	                name: 'images[' + index + '].Key',
	                value: $(value).attr("alt")
	            }).appendTo('#itemkey'+i);

	            $('<input>').attr({
	                type: 'hidden',
	                name: 'images[' + index + '].Value',
	                value: $(value).attr("src")
	            }).appendTo('#itemvalue'+i);
			});
		}
	});
});


</script>
@stop