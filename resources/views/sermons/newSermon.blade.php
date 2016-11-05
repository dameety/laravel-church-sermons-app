@extends('layouts.adminlayout')

@section('title', 'New Sermon')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="row page-headings">
            <h2>Add New Sermon</h2>
        </div>
      	
        <section class="panel">

        <header class="panel-heading">
         Fill the form below.
        </header>

        <div class="panel-body">
	      	<form class="form-horizontal tasi-form" method="POST" enctype="multipart/form-data" action="{{ route('sermonstore_path') }}">
            {!! csrf_field() !!}

	      		<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
	                  <label class="col-sm-2 col-sm-2 control-label">Title:*</label>
	                  <div class="col-sm-8">
	                      <input type="text" maxlength="30" required="required" name="title" class="form-control" value="{{ old('title') }}" placeholder="Enter the title of the sermon here.">

	                      @if ($errors->has('title'))
	                      	<span class="help-block">
	                        	<strong>{{ $errors->first('title') }}</strong>
	                        </span>
		                  @endif
	                  </div>
	            </div>      
	            <div class="form-group{{ $errors->has('preacher') ? ' has-error' : '' }}">
	                  <label class="col-sm-2 col-sm-2 control-label">Preacher:*</label>
	                  <div class="col-sm-8">
	                      <input type="text" maxlength="50" required="required" name="preacher" class="form-control" value="{{ old('preacher') }}" placeholder="Enter the name of the minister here.">
	                      @if ($errors->has('preacher'))
	                      	<span class="help-block">
	                        	<strong>{{ $errors->first('preacher') }}</strong>
	                        </span>
		                  @endif
	                  </div>
	            </div>    
	            <div class="form-group{{ $errors->has('service_id') ? ' has-error' : '' }}">
	                  <label class="col-sm-2 col-sm-2  control-label">Service:*</label>
	                  <div class="col-lg-8">	                  	  
	                      <select required="required" name="service_id" class="form-control m-b-10" value="{{ old('service_id') }}">
	                      		@foreach($service as $service)
	                          		<option value="{{ $service->id }}">{{ $service->name }}</option>
	                      		@endforeach
	                      </select>
	                  </div>
	            </div>
	            <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
	                  <label class="col-sm-2 col-sm-2  control-label">Category: </label>
	                  <div class="col-lg-8">	                  	  
	                      <select name="category_id" class="form-control m-b-10" value="{{ old('category_id') }}">
	                      		@foreach($categories as $category)
	                          		<option value="{{ $category->id }}">{{ $category->name }}</option>
	                      		@endforeach
	                      </select>
	                  </div>
	            </div>

	            <br>
	              
	            <div class="form-group">
	                  <label class="col-sm-2 col-sm-2 control-label"></label>
	                  <div class="col-sm-8">
	                      <p> Please fill the date inputs below as much as you remember</p>
	                  </div>
	            </div>
	            <div class="form-group{{ $errors->has('datepreached') ? ' has-error' : '' }}">
	                  <label class="col-sm-2 col-sm-2 control-label">Date:*</label>
	                  <div class="col-sm-8">
	                      <input type="text" required="required" data-provide="datepicker" data-date-autoclose="true" name="datepreached" class="form-control" value="{{ old('datepreached') }}">
	                      @if ($errors->has('datepreached'))
	                      	<span class="help-block">
	                        	<strong>{{ $errors->first('datepreached') }}</strong>
	                        </span>
		                  @endif
	                  </div>
	            </div>             
	            <div class="form-group{{ $errors->has('month') ? ' has-error' : '' }}">
	                  <label class="col-sm-2 col-sm-2 control-label">Month: </label>
	                  <div class="col-lg-8">
	                      <select name="month" class="form-control m-b-10" value="{{ old('month') }}">
	                          <option value="january">January</option>
	                          <option value="february">February</option>
	                          <option value="march">March</option>
	                          <option value="april">April</option>
	                          <option value="may">May</option>
	                          <option value="june">June</option>
	                          <option value="july">July</option>
	                          <option value="august">August</option>
	                          <option value="september">September</option>
	                          <option value="october">October</option>
	                          <option value="november">November</option>
	                          <option value="december">December</option>
	                      </select>
	                  </div>
	            </div>
	            <div class="form-group{{ $errors->has('year') ? ' has-error' : '' }}">
	                  <label class="col-sm-2 col-sm-2 control-label">Year: </label>
	                  <div class="col-sm-8">
	                      <input name="year" type="text" maxlength="4" class="form-control" value="{{ old('year') }}">
	                      @if ($errors->has('year'))
	                      	<span class="help-block">
	                        	<strong>{{ $errors->first('year') }}</strong>
	                        </span>
		                  @endif
	                  </div>
	            </div>
	              
	            <br>
	              
	            <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
	                <label class="col-sm-2 col-sm-2 control-label">Status: </label>
	                <div class="col-lg-8">
	                    <select name="status" class="form-control m-b-10" value="{{ old('status') }}">
	                        <option value="free">Free</option>
	                        <option value="premium">Premium</option>	                        
	                    </select>
	                </div>
	            </div>        
	            <div class="form-group{{ $errors->has('sermonFile') ? ' has-error' : '' }}">
	                <label class="col-sm-2 col-sm-2 control-label">File:*</label>
	                <div class="col-sm-8">
	                    <input required="required" type="file" name="sermonFile" accept="audio/*" class="form-control" value="{{ old('sermonFile') }}">
	                    @if ($errors->has('sermonFile'))
	                      	<span class="help-block">
	                        	<strong>{{ $errors->first('sermonFile') }}</strong>
	                        </span>
		                @endif
	                </div>
	            </div>
	            <div class="form-group">
	                <label class="col-sm-2 col-sm-2 control-label"></label>
	                <div class="col-sm-8">
	                    <button type="submit" class="btn btn-success">Save Sermon</button>
	                </div>
	            </div>

	        </form>
        </div>
        </section>

        {{-- component --}}
        {{-- <newsermon> </newsermon> --}}
    </div>
</div>

@endsection