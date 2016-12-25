<template>
	<div class="navigation-bar">
        <nav role="navigation" class="navbar navbar-default">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="{{ route('userhome_path') }}" class="navbar-brand">ChurchSermons</a>
            </div>
            <div id="navbarCollapse" class="collapse navbar-collapse">
                <ul class="nav navbar-nav"></ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ url('/user/sermon/request') }}"> <button type="button" class="btn btn-primary">Request A Sermon</button></a></li>
                    <li @click.prevent="sermonRequest()">Request A Sermon</li>
                    <li><a href="{{ url('/user/profile') }}"> <button type="button" class="btn btn-primary">Profile</button></a></li>
                    <li><a href="{{ url('/logout') }}"> <button type="button" class="btn btn-danger">Logout</button></a></li>
                </ul>   
            </div>
        </nav>
    </div>
</template>

<script>
	// const swal = require('sweetalert2');

	export default {
		
		data: function() {
			return {
				searchWord: "",
			};
		},


		created: function() {
			this.test();
		},

		methods: {
            test: function () {
            	alert("hello from nav");
            }
        }
    };
</script>