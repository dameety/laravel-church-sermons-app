@extends('layouts.adminlayout')

@section('title', 'Requests')

@section('content')

	<div class="row page-headings">
      <h2>All Sermon Requests</h2>
    </div>
	<section class="panel tasks-widget">
    	<header class="panel-heading">
            Total: <strong> 7 </strong>
        </header>
        	<div class="panel-body">
            	<div class="task-content">
                	<ul class="task-list">
	                	<li>
	                      <div class="task-checkbox">
	                          <input type="checkbox" class="flat-grey list-child"/>
	                      </div>
	                      <div class="task-title">
	                          <span class="task-title-sp">Director is Modern Dashboard</span>
	                          <span class="label label-success">2 Days</span>
	                          <div class="pull-right hidden-phone">
	                              <button class="btn btn-default btn-xs"><i class="fa fa-check"></i></button>
	                              <button class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></button>
	                              <button class="btn btn-default btn-xs"><i class="fa fa-times"></i></button>
	                          </div>
	                      </div>
	                  	</li>
                      	<li>
                          <div class="task-checkbox">
                              <input type="checkbox" class="list-child" value=""  />
                          </div>
                          <div class="task-title">
                              <span class="task-title-sp">Tell your friends about this admin template</span>
                              <span class="label label-danger">Now</span>
                              <div class="pull-right hidden-phone">
                                  <button class="btn btn-default btn-xs"><i class="fa fa-check"></i></button>
                                  <button class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></button>
                                  <button class="btn btn-default btn-xs"><i class="fa fa-times"></i></button>
                              </div>
                          </div>
                      	</li>
                    </ul>
                </div>

              	<div class=" add-task-row">
                  <a class="btn btn-success btn-sm pull-left" href="#">Add New Tasks</a>
                  <a class="btn btn-default btn-sm pull-right" href="#">See All Tasks</a>
              	</div>
            </div>
    </section>	

@endsection