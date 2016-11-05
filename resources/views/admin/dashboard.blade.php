@extends('layouts.adminlayout')

@section('title', 'dashboard')

@section('content')
    
  <div class="row" style="margin-bottom:5px;">
      <div class="col-md-3">
          <div class="sm-st clearfix">
              <span class="sm-st-icon st-red"><i class="fa fa-bell"></i></span>
              <div class="sm-st-info">
                  <span>{{ $serviceCount }}</span>
                  Total Services
              </div>
          </div>
      </div>
      <div class="col-md-3">
          <div class="sm-st clearfix">
              <span class="sm-st-icon st-violet"><i class="fa fa-play"></i></span>
              <div class="sm-st-info">
                  <span>{{$sermonCount}}</span>
                  Total Sermons
              </div>
          </div>
      </div>
      <div class="col-md-3">
          <div class="sm-st clearfix">
              <span class="sm-st-icon st-blue"><i class="fa fa-envelope-o"></i></span>
              <div class="sm-st-info">
                  <span>{{$sermonrequestCount}}</span>
                  Total Requests
              </div>
          </div>
      </div>
      <div class="col-md-3">
          <div class="sm-st clearfix">
              <span class="sm-st-icon st-green"><i class="fa fa-list-alt"></i></span>
              <div class="sm-st-info">
                  <span>{{$categoryCount}}</span>
                  Total Categories
              </div>
          </div>
      </div>
  </div>
          
  <div class="row" style="margin-bottom:5px;">
    <div class="col-md-6">
          <div class="sm-st clearfix">
              <span class="sm-st-icon st-red"><i class="fa fa-users"></i></span>
              <div class="sm-st-info">
                  <span>{{$userCount}}</span>
                  Total Users
              </div>
          </div>
    </div>

    <div class="col-md-6">
          <div class="sm-st clearfix">
              <span class="sm-st-icon st-red"><i class="fa fa-user-plus"></i></span>
              <div class="sm-st-info">
                  <span>{{$adminCount}}</span>
                  Admin
              </div>
          </div>
    </div>
  </div>
@endsection