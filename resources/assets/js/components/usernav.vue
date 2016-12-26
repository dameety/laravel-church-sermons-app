<template>

    <div class="modal fade editModal" tabindex="-1" role="dialog">    <!-- request modal starts here -->
        <div class="modal-dialog" role="document">
            <div class="modal-content">     
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <br>
                    <form method="POST" @submit.prevent="sendSermonRequest">
                        <div class="form-group">
                            <label>Sermon Title:</label> 
                            <input type="text" v-model="sermonRequest.sermontitle" required="required" name="sermontitle" class="form-control" placeholder="e.g Grace, Success, Forgiveness, etc">
                            <span v-if="formErrors['sermontitle']" class="inputError">{{ formErrors['sermontitle'] }}</span>                  
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Preacher:</label> 
                            <input type="text" v-model="sermonRequest.preacher" name="preacher" class="form-control">
                            <span v-if="formErrors['preacher']" class="inputError">{{ formErrors['preacher'] }}</span>                  
                        </div>
                        <br>
                        <div class="form-group">
                            <label>More Info:</label> (optional)                        
                            <textarea type="text" v-model="sermonRequest.moreinfo" name="moreinfo" class="form-control" rows="5"> </textarea>
                            <span v-if="formErrors['moreinfo']" class="inputError">{{ formErrors['moreinfo'] }}</span>
                        </div>
                        <br>
                        <div class="form-group">                    
                            <button type="submit" class="btn btn-success btn-block">Send Request</button>
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
                    <a href="#" class="navbar-brand">ChurchSermons</a>
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
                sermonRequest: {
                    sermontitle: "",
                    preacher: "",
                    moreinfo: ""
                },
			};

		},

		created: function() {
			
		},

		methods: {

            sendSermonRequest: function () {
                var sermonRequestData = this.sermonRequest;
                this.newCategory = { sermontitle: "", preacher: "", moreinfo: ""}
                this.$http.post('/sermon/request/new', sermonRequestData)
                .then((response) => {
                    // this.fetchCategories()
                    // this.getCategoriesCount()
                }, (response) => {
                    var errors = response.body;
                    this.formErrors = errors;
                });
            },


        }
    };
    
</script>