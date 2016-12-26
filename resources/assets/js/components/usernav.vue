<template>

    <div class="modal fade editModal" tabindex="-1" role="dialog">    <!-- request modal starts here -->
        <div class="modal-dialog" role="document">
            <div class="modal-content">     
                <div class="modal-body">
                    <form method="post" @submit.prevent="sendRequest()">
                        <div class="form-group">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <br>
                              <label>Sermon Title: </label>                        
                              <input type="text" maxlength="75" required="required" name="sermontitle" class="form-control input-sm" v-model="updateCategory.name">
                              <span v-if="formErrors['name']" class="inputError">{{ formErrors['name'] }}</span>                        
                        </div>
                        <div class="form-group">
                              <label>More Info: </label> (optional)                        
                              <textarea type="text"  maxlength="300" required="required" name="info" class="form-control input-lg" rows="4" v-model="updateCategory.info"></textarea>
                              <span v-if="formErrors['info']" class="inputError">{{ formErrors['info'] }}</span>
                        </div>
                        <div class="form-group">                    
                            <button type="submit" class="btn btn-info btn-block btn-lg">Send Request</button>
                        </div>
                    </form>                                  
                </div>
            </div>
        </div>
    </div>  <!-- request modal ends here -->

    <!-- navigation starts here -->
    <div class="navigation-bar">
        <nav role="navigation" class="navbar navbar-default">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="container">
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
                        <li><button class="btn btn-primary" data-toggle="modal" data-target=".editModal" @click.prevent="sermonRequest()">Request A Sermon</button></li>
                        <li><button class="btn btn-primary" data-toggle="modal" data-target=".editModal" @click.prevent="userProfile()">Profile</button></li>
                        <li><button class="btn btn-danger" @click.prevent="logout()">Logout</button></li>
                        <!-- <li><a href="{{ url('/logout') }}"> <button type="button" class="btn btn-danger">Logout</button></a></li> -->
                    </ul>   
                </div>
            </div>
        </nav>
    </div>
    <!-- navigation ends here -->
</template>

<script>

	const swal = require('sweetalert2');

	export default {
		
		data: function() {
			return {
				searchWord: "",
                formErrors: {},

			};
		},


		created: function() {
			this.test();
		},

		methods: {
            test: function () {
                // console.log("hello from nav");
            },

            sermonRequest: function () {
                // console.log("hello from nav");
            }
        }
    };
    
</script>