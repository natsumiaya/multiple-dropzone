@extends('layouts.default')

@section('css')
<link href="{{URL::asset('css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('css/buttons.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('css/scroller.bootstrap.min.css')}}" rel="stylesheet">	
@stop

@section('content')
<div class="clearfix"></div>
<div class="row list-container">
  <div class="content col-md-offset-2 col-md-8 col-sm-offset-2 col-sm-8 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Package List</h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
      	@if (session('error'))
	        <div class="alert alert-danger">
	            <button type="button" class="close" data-dismiss="alert">&times;</button>
	            {{ session('error') }}
	        </div>
	    @endif
	    @if (session('success'))
	        <div class="alert alert-success">
	            <button type="button" class="close" data-dismiss="alert">&times;</button>
	            {{ session('success') }}
	        </div>
	    @endif
        <table id="package-table" class="table table-striped table-bordered" data-source-route="{{ url('package/populateData') }}">
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
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- View Modal -->
<div class="modal fade modal-detail" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
	  <div class="modal-content">
	    <div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
	      </button>
	      <h4 class="modal-title" id="myModalLabel"></h4>
	    </div>
	    <div class="modal-body">
	      <form action="{{ url('sendPackageinfo') }}" id="" class="form-horizontal form-label-left">
	      	  <div class ="form-group">
	      	  	<p>Date Added: dd MM yy <span class="pull-right">Last Update: dd MM yy</span></p>
	      	  	<p>Added By: Username <span class="pull-right">Updated By: Username</span></p>
	      	  </div>
	          <div class="form-group">
	            <div class="col-md-12 col-sm-12 col-xs-12">
	              Received : dd Month yyyy, hh:mm AM
	            </div>
	          </div>
	          <div class="form-group">
	            <div class="col-md-12 col-sm-12 col-xs-12">
	              Received : User Name
	            </div>
	          </div>
	          <div class="form-group">
	            <div class="col-md-12 col-sm-12 col-xs-12">
	              Intended Recipient : Intended Recipient
	            </div>
	          </div>
	          <div class="form-group">
	            <div class="col-md-12 col-sm-12 col-xs-12">
	            	Shipping Company: Name of Shipping Company
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
	            <div class="col-md-12 col-sm-12 col-xs-12">
	            	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
	            </div>
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
<script type="text/javascript" src="{{ asset('js/application/package.js') }}"></script>
@stop