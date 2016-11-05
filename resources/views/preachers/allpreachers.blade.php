@extends('layouts.adminlayout')

@section('title', 'Preachers')

@section('content')

<div class="row">
    <div class="col-xs-12">
        <div class="row page-headings">
          <h2>Preachers</h2>
        </div>

        
        <allpreachers> </allpreachers>
        
    </div>
</div>

@endsection