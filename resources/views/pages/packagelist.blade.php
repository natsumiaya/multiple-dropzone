@extends('layouts.default')

@section('css')
<link href="{{URL::asset('css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('css/buttons.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('css/scroller.bootstrap.min.css')}}" rel="stylesheet">	
@stop

@section('content')
<div class="clearfix"></div>
<div class="row">
  <div class="content col-md-offset-2 col-md-8 col-sm-offset-2 col-sm-8 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Package List</h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <table id="datatable-buttons" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Date</th>
              <th>Receiver</th>
              <th>Intended Recipient</th>
              <th>Tracking ID</th>
              <th>Action</th>
             </tr>          
         </thead>
          <tbody>
          	@for ($j=0 ; $j < 50 ; $j++)
            <tr>
              <td>Tiger Nixon</td>
              <td>System Architect</td>
              <td>Edinburgh</td>
              <td>61</td>
              <td class="text-center">
              	<span data-toggle="tooltip" title data-original-title="View"><button class="btn btn-info" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fas fa-eye"></i></button></span>
              	<a href="" class="btn btn-danger" data-toggle="tooltip" title data-original-title="View"><i class="fas fa-trash-alt"></i></a>
              </td>
             </tr>
             @endfor
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- View Modal -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
	  <div class="modal-content">
	    <div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
	      </button>
	      <h4 class="modal-title" id="myModalLabel">Received Package Detail</h4>
	    </div>
	    <div class="modal-body">
	      <form action="{{ url('sendPackageinfo') }}" id="" class="form-horizontal form-label-left">
	      	  <div class ="form-group">
	      	  	<p>Date Added: dd MM yy <span class="pull-right">Last Update: dd MM yy</span></p>
	      	  	<p>Added By: Username <span class="pull-right">Updated By: Username</span></p>
	      	  </div>
	          <div class="form-group">
	            <label class="control-label col-md-12 col-sm-12 col-xs-12" for="Intended-recipient">Received 
	            </label>
	            <div class="col-md-12 col-sm-12 col-xs-12">
	              dd Month yyyy, hh:mm AM
	            </div>
	          </div>
	          <div class="form-group">
	            <label class="control-label col-md-12 col-sm-12 col-xs-12" for="Intended-recipient">Receiver 
	            </label>
	            <div class="col-md-12 col-sm-12 col-xs-12">
	              User Name
	            </div>
	          </div>
	          <div class="form-group">
	            <label class="control-label col-md-12 col-sm-12 col-xs-12" for="Intended-recipient">Intended Recipient 
	            </label>
	            <div class="col-md-12 col-sm-12 col-xs-12">
	              <input type="text" id="first-name" class="form-control col-md-7 col-xs-12" readonly="readonly" >
	            </div>
	          </div>
	          <div class="form-group">
	            <label class="control-label col-md-12 col-sm-12 col-xs-12" for="Shipping-company">Shipping Company 
	            </label>
	            <div class="col-md-12 col-sm-12 col-xs-12">
	            	<div class="radio">
		                <label>
		                  <input type="radio" readonly="readonly" checked="" value="option1" id="" name="optionsRadios"> Option one. only select one option
		                </label>
	              	</div>
					<div class="radio">
					<label>
					  <input type="radio" readonly="readonly" value="" id="" name="optionsRadios" disabled="disabled"> Option two. only select one option
					</label>
					</div>  
				</div>
	          </div>
	          <div class="form-group">
	          	<label class="control-label col-md-12 col-sm-12 col-xs-12" for="Intended-recipient">Uploaded Photos
	            </label>
	            <div class="col-md-12 col-sm-12 col-xs-12 picturepreview">
	            	@for ($i = 1; $i <= 4; $i++) 
	            	<div class="pictureview"> 
	            		<div class="block-content"> 
	            			<div class="table"> 
	            				<div class="table-cell">
	            					<img class="rs" src="{{asset("img/{$i}.png")}}" />
	            				</div> 
	            			</div> 
	            		</div> 
	            	</div>
	            	@endfor 
	            </div>
	          </div>
	          <div class="form-group">
	            <label class="control-label col-md-12 col-sm-12 col-xs-12" for="Intended-recipient">Note:
	            </label>
	            <textarea id="message" class="form-control col-md-7 col-sm-7 col-xs-12" readonly="readonly" name="message"></textarea>
	          </div>
	        </form>
	    </div>
	    <div class="modal-footer">
	      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	   </div>
	  </div>
	</div>
</div>
@stop

@section('js')
<script src="{{URL::asset('js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('js/dataTables.bootstrap.js')}}"></script>
<script src="{{URL::asset('js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('js/buttons.bootstrap.min.js')}}"></script>
<script src="{{URL::asset('js/buttons.flash.min.js')}}"></script>
<script src="{{URL::asset('js/jszip.min.js')}}"></script>
<script src="{{URL::asset('js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('js/buttons.print.min.js')}}"></script>
@stop