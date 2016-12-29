<template>

    <!-- request modal starts here -->
    <div class="modal fade profileModal" tabindex="-1" role="dialog">
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
                        <div class="form-group">
                            <label>Preacher:</label> 
                            <input type="text" v-model="sermonRequest.preacher" name="preacher" class="form-control">
                            <span v-if="formErrors['preacher']" class="inputError">{{ formErrors['preacher'] }}</span>                  
                        </div>
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
                        <li><button id="spacing" class="btn btn-primary spacing" data-toggle="modal" data-target=".profileModal">Request A Sermon</button></li>
                        <li><button id="spacing" class="btn btn-primary spacing" data-toggle="modal" data-target=".editModal" @click.prevent="userProfile()">Profile</button></li>
                        <li><button id="spacing" class="btn btn-danger spacing" @click.prevent="logout">Logout</button></li>
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

        http: {
            emulateJSON: true,
            emulateHTTP: true
        },
		
		data: function() {
			
            return {
                formErrors: {},
                sermonRequest: {
                    sermontitle: "",
                    preacher: "",
                    moreinfo: ""
                },
			}

		},

		created: function() {
			
		},  

		methods: {

            sendSermonRequest: function () {
                var sermonRequestTemp = this.sermonRequest
                this.sermonRequest = {sermontitle: "", preacher: "", moreinfo: ""}
                this.$http.post('/sermon/request/new', sermonRequestTemp)
                .then((response) => {
                    console.log(response);
                    var vm = this;
                    swal({
                        title: 'Sermon Request Sent',
                        text: 'You will get a reply soon from our admin. Thanks.',
                        type: 'success',
                    }).then(function(){
                        // perform any action you want here.
                        // happens when the ok button is clicked
                    }).done();
                }, (response) => {
                    var errors = response.body;
                    this.formErrors = errors;
                });
            },

        }
    };
    
</script>