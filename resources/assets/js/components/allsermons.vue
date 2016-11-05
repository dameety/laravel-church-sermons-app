<template>

<!-- the details modal -->
<div class="modal fade oneSermonModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    	<div class="modal-header modalHeading">
            <button type="button" class="close modalHeading" data-dismiss="modal" aria-hidden="true">×</button>
            <h2 class="modal-title">Sermon Details</h2>
        </div>        
        <div class="modal-body">
			<div class="row modalRowTop">
				<div class="col-md-3">
					<strong class="pull-right">Title:</strong>
				</div>
				<div class="col-md-9">
					{{ oneSermon.title }}
				</div>
			</div>
			<div class="row modalRowColored">
				<div class="col-md-3">
					<strong class="pull-right">Preacher:</strong>
				</div>
				<div class="col-md-9">
					{{ oneSermon.preacher }}
				</div>
			</div>
			<div class="row modalRowUncolored">
				<div class="col-md-3">
					<strong class="pull-right">Service:</strong>
				</div>
				<div class="col-md-9">
					{{ oneSermonService.name }}
				</div>
			</div>
			<div class="row modalRowColored">
				<div class="col-md-3">
					<strong class="pull-right">Category:</strong>
				</div>
				<div class="col-md-9">
					{{oneSermonCategory.name}}
				</div>
			</div>
			<div class="row modalRowUncolored">
				<div class="col-md-3">
					<strong class="pull-right">Date Preached:</strong>
				</div>
				<div class="col-md-9">
					{{ oneSermon.datepreached }}
				</div>
			</div>
			<div class="row modalRowColored">
				<div class="col-md-3">
					<strong class="pull-right">Size:</strong>
				</div>
				<div class="col-md-9">
					{{ oneSermon.size }}
				</div>
			</div>
			<div class="row modalRowBottom">
				<div class="col-md-3">
					<strong class="pull-right">Status:</strong>
				</div>
				<div class="col-md-9">
					{{ oneSermon.status }}
				</div>
			</div>
		</div> 
        <div class="modal-footer modalHeading">
            <button class="btn btn-default" type="button"  data-toggle="modal" data-target=".editModal" @click.prevent="editSermon(oneSermon.slug)">Edit</button>
            <button data-dismiss="modal" class="btn btn-danger" type="button">Close</button>            
        </div>
    </div>
  </div>
</div>
<!--  the details modal  -->


<!-- the edit modal -->
<div class="modal fade editModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">    	
        <div class="modal-body">
			<form method="post" @submit.prevent="saveUpdateSermon(updateSermon.slug)">
	            <div class="form-group">
            		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            		<br>
	                <label>Title: </label>                        
	                <input type="text" v-model="updateSermon.title" required="required" name="title" class="form-control input-sm">
	                <span v-if="formErrors['title']" class="inputError">{{ formErrors['title'] }}</span>                        
	            </div>
	            <div class="form-group">
	                <label>Preacher: </label>                        
	                <input type="text" v-model="updateSermon.preacher" required="required" name="preacher" class="form-control input-sm">
	                <span v-if="formErrors['preacher']" class="inputError">{{ formErrors['preacher'] }}</span>                        
	            </div>
	            <div class="form-group">
	                <label>Service: </label>                        
	                <select v-model="updateSermon.service_id" required="required" name="service_id" class="form-control input-sm">
			            <option v-for="service in services" v-bind:value="service.id">
			            	{{ service.name }}
			            </option>
	                	<span v-if="formErrors['category_id']" class="inputError">{{ formErrors['category_id'] }}</span>  
		        	</select>
	            </div>
	            <div class="form-group">
	                <label>Category: </label>                        
	                <select v-model="updateSermon.category_id" required="required" name="category_id" class="form-control input-sm">
			            <option v-for="category in categories" v-bind:value="category.id">
			            	{{ category.name }}
			            </option>
	                	<span v-if="formErrors['category_id']" class="inputError">{{ formErrors['category_id'] }}</span>  
		        	</select>
	            </div>
	            <div class="form-group">
	                <label>Date: </label>                        
	                <input type="text" v-model="updateSermon.datepreached" required="required" name="datepreached" data-provide="datepicker" data-date-autoclose="true" class="form-control input-sm">
	                <span v-if="formErrors['datepreached']" class="inputError">{{ formErrors['datepreached'] }}</span>
	            </div>
				<div class="form-group">
	                <label>Status: </label>                        
	                <select v-model="updateSermon.status" name="status" class="form-control input-sm">
			            <option updateSermon.status>Free</option>
			            <option>Premium</option>	                	
		        	</select>
	            </div>
	            <div class="form-group">                    
                    <button type="submit" class="btn btn-info btn-block btn-lg">Save Changes</button>
                </div>
            </form>	            
		</div>
    </div>
  </div>
</div>

<!--  the edit modal  -->


	<div class="panel">
	    <header class="panel-heading">
	      <div class="row">
	        <div class="col-sm-3">
	           <span class="badge badge-info count">Total : {{sermonsCount.length}} </span>
	        </div>
	        <div class="col-sm-3 pull-right">
	          <button class="btn btn-sm btn-primary btn-block" type="button">Add New</button>
	        </div>
	      </div>
	    </header>

	    <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
		  Tooltip on top
		</button>	    
	    <br>
		<div class="panel-body table-responsive"> 
			<div class="row m-b-10">
		      <div class="col-md-3">
		        <select class="form-control input-sm" v-model="categorySelected" @change="getCategorySermons(categorySelected)">
		            <option v-for="category in categories">
		            	{{ category.name }}
		            </option>
		        </select>
		      </div>
              <div class="col-md-6">
                    <input type="text" v-model="searchWord" class="form-control input-sm" placeholder="start searching here">
              </div>
		      <div class="col-md-3 pull-right">
		        <div class="pagination pull-right">
				    <button class="btn btn-default btn-sm" @click="getAllSermons(pagination.prev_page_url)"
				            :disabled="!pagination.prev_page_url">
				        Previous
				    </button> &nbsp; 
				    <span>Page {{pagination.current_page}} of {{pagination.last_page}}</span> &nbsp; 
				    <button class="btn btn-default btn-sm" @click="getAllSermons(pagination.next_page_url)"
				            :disabled="!pagination.next_page_url">Next
				    </button>
				</div>
		      </div>
		    </div>
		    <table class="table table-hover">
		    	<tr>
		            <th>Preacher</th>
		            <th>Date</th>
		            <th>Title</th>
		            <th>&nbsp;</th>
		        </tr>		        
		       	<tr v-for="sermon in sermons | filterBy searchWord">
		            <td> {{ sermon.preacher }} </td>
		            <td> {{ sermon.datepreached }} </td>
		            <td> {{ sermon.title }} </td>
		            <td>
		            	<div class="pull-right">
		              		<button class="btn btn-default" type="button"  data-toggle="modal" data-target=".editModal" @click.prevent="editSermon(sermon.slug)">Edit</button>
		              		<button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target=".oneSermonModal" @click.prevent="detailsSermon(sermon)">Details</button>
		              		<button type="button" class="btn btn-sm btn-danger" @click.prevent="deleteSermon(sermon)">Delete</button>
		              	</div>
		            </td>
		        </tr>
		    </table> <br>
	    </div> <!-- from categroy filter to table ends here -->
	    <header class="panel-heading">
	      	<div class="row">
		        <div class="col-sm-3">		           
		        </div>
		        <div class="col-sm-3 pull-right">
		        	<div class="pagination pull-right">
					    <button class="btn btn-default btn-sm" @click="getAllSermons(pagination.prev_page_url)"
					            :disabled="!pagination.prev_page_url">
					        Previous
					    </button> &nbsp; 
					    <span>Page {{pagination.current_page}} of {{pagination.last_page}}</span> &nbsp; 
					    <button class="btn btn-default btn-sm" @click="getAllSermons(pagination.next_page_url)"
					            :disabled="!pagination.next_page_url">Next
					    </button>
					</div>
		        </div>
	    	</div>
	    </header>
	</div>


</template>

<script>
	const swal = require('sweetalert2');

	export default {
		
		data: function() {


			return {

				searchWord: "", 		/*used by the global filter*/
				sermons: [], 			/*using the getAllSermons()*/
				categories: [], 		/*using the getAllCategories() and select input*/
				services: [],			/*used in the select input*/
				categorySelected: [], 	/*using the sermons filter*/
				/*categorySermon: []*/ 	/*coming in from the category selected filter*/
				pagination: {},
				sermonsCount: {},			/*used to just get the number of sermons*/
				oneSermon: {},
				oneSermonCategory: {},
				oneSermonService: {},
				updateSermon: {},
    			formErrors: {}

			};
		},


		created: function() {
			this.getAllSermons();
			this.getAllCategories();
			this.getAllServices();
			this.getSermonsCount();
		},

		methods: {

			getSermonsCount: function () {
                this.$http.get('/api/sermons')
                	.then(function (response) {
                        this.sermonsCount = response.body;
                    });
            },

			getAllSermons: function (page_url) {
                let vm = this;
                page_url = page_url || '/api/sermons/paginated'
                this.$http.get(page_url)
                    .then(function (response) {
                        vm.makePagination(response.data)
                        vm.$set('sermons', response.data.data)
                    });
            },

            makePagination: function(data){
                let pagination = {
                    current_page: data.current_page,
                    last_page: data.last_page,
                    next_page_url: data.next_page_url,
                    prev_page_url: data.prev_page_url,
                    total: data.total
                }
                this.$set('pagination', pagination)
            },


			/*swal({
			  title: 'Are you sure?',
			  text: "You won't be able to revert this!",
			  type: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Yes, delete it!'
			}).then(function() {
			  swal(
			    'Deleted!',
			    'Your file has been deleted.',
			    'success'
			  );
			})*/

            deleteSermon: function(sermon) {
            	var vm = this;
            	swal({
                    title: 'Are you sure?',
                    text: 'This will delete the sermon',
                    type: 'warning',
                    showCancelButton: true
                }).then(function(){
                	vm.$http.delete('/api/sermon/delete/' + sermon.slug)
						.then(function () {
							this.getSermonsCount()
							this.sermons.$remove(sermon);
						});
					});			
			},



            /*deleteSermon: function(sermon) {
				var  ConfirmBox = confirm('Are you sure you want to delete this sermon?')
				if (ConfirmBox) {
					this.$http.delete('/api/sermon/delete/' + sermon.slug)
						.then(function () {
							this.getSermonsCount()
							this.sermons.$remove(sermon)
					});
				}
			},*/



            detailsSermon: function (sermon) {
            	this.$set('oneSermon', sermon);

                this.$http.get('/api/sermoncategory/' + sermon.slug)
                    .then(function (response) {                        
                        this.$set('oneSermonCategory', response.body)
                    });
                this.$http.get('/api/sermonservice/' + sermon.slug)
                    .then(function (response) {                        
                        this.$set('oneSermonService', response.body)
                    });               
            },

            editSermon: function (slug) {
            	this.$http.get('/api/sermon/edit/' + slug)
            		.then(function (response) {
            			this.$set('updateSermon', response.body);
            			/*this.updateSermon.title = response.body.title
            			this.updateSermon.preacher = response.body.preacher
            			this.updateSermon.service_id = response.body.service_id
            			this.updateSermon.category_id = response.body.category_id
            			this.updateSermon.datepreached = response.body.datepreached
            			this.updateSermon.status = response.body.status
            			this.updateSermon.slug = response.body.slug*/
            		});           	
            },

            saveUpdateSermon: function (slug) {
			var sermon = this.updateSermon
            	this.$http.patch('/api/sermon/' + slug, sermon)
            		.then(function (response) {
            			this.detailsSermon(sermon);
            			this.getAllSermons();
            		});
            },

            getAllCategories: function () {
                this.$http.get('/api/category')
                	.then(function (response) {
                        this.categories = response.body;
                    });
            },

            getAllServices: function () {
                this.$http.get('/api/services')
                	.then(function (response) {
                        this.services = response.body;
                    });
            },

            getCategorySermons: function(categorySelected) {
            	this.$http.get('/api/' + categorySelected + '/sermons')
            		.then((response) => {
            		this.$set('sermons', response.body);
            	});
            },

		} /*methods end here*/


	}; /*compoent ends here */
</script>