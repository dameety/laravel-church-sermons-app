<template>

<!-- the details modal -->
<div class="modal fade oneDetailsModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header modalHeading">
            <button type="button" class="close modalHeading" data-dismiss="modal" aria-hidden="true">×</button>
            <h2 class="modal-title">User Details</h2>
        </div>        
        <div class="modal-body">
            <div class="row modalRowTop">
                <div class="col-md-3">
                    <strong class="pull-right">Name:</strong>
                </div>
                <div class="col-md-9">
                    {{ oneUser.name }}
                </div>
            </div>
            <div class="row modalRowColored">
                <div class="col-md-3">
                    <strong class="pull-right">Username:</strong>
                </div>
                <div class="col-md-9">
                    {{ oneUser.username }}
                </div>
            </div>
            <div class="row modalRowUncolored">
                <div class="col-md-3">
                    <strong class="pull-right">Email:</strong>
                </div>
                <div class="col-md-9">
                    {{ oneUser.email }}
                </div>
            </div>
            <div class="row modalRowUncolored">
                <div class="col-md-3">
                    <strong class="pull-right">Date Joined:</strong>
                </div>
                <div class="col-md-9">
                    {{ oneUser.created_at }}
                </div>
            </div>
            <div class="row modalRowColored">
                <div class="col-md-3">
                    <strong class="pull-right">Status:</strong>
                </div>
                <div class="col-md-9">
                    {{ oneUser.status }}
                </div>
            </div>
        </div> 
        <div class="modal-footer modalHeading">
            <button class="btn btn-default" type="button"  data-toggle="modal" data-target=".editModal" @click.prevent="">Edit</button>
            <button data-dismiss="modal" class="btn btn-danger" type="button">Close</button>            
        </div>
    </div>
  </div>
</div>
<!--  the details modal  -->


    <div class="panel">
        <header class="panel-heading">
          <div class="row">
            <div class="col-sm-3">
              <span class="badge badge-info count">Total : {{ usersCount.length }}</span>
            </div>
            <div class="col-sm-3 pull-right">

            </div>
          </div>
        </header>
        <br>

        <div class="panel-body table-responsive"> 
            <div class="row m-b-10">
              <div class="col-md-3">
                <select class="form-control input-sm">
                    <option>Filter</option>
                    <option>Premium</option>
                    <option>Free</option>
                </select>
              </div>
              <div class="col-md-6">
                    <input type="text" v-model="searchWord" class="form-control input-sm" placeholder="start searching here">
              </div>
              <div class="col-md-3 pull-right">
                <div class="pagination pull-right">
                    <button class="btn btn-default btn-sm" @click="fetchUsers(pagination.prev_page_url)"
                            :disabled="!pagination.prev_page_url">
                        Previous
                    </button> &nbsp; 
                    <span>Page {{pagination.current_page}} of {{pagination.last_page}}</span> &nbsp; 
                    <button class="btn btn-default btn-sm" @click="fetchUsers(pagination.next_page_url)"
                            :disabled="!pagination.next_page_url">Next
                    </button>
                </div>
              </div>
            </div>

            <table class="table table-hover">
                <tr>
                    <th>Date</th>
                    <th>Name</th>
<!--                     <th>avatar</th> -->
                    <th>Email</th>
                    <th>Status</th>
                    <th>&nbsp;</th>
                </tr>
                <tr v-for="user in users | filterBy searchWord">
                    <td>{{ user.created_at }}</td>
                    <td>{{ user.name }}</td>
<!--                     <td> <img class="useravatar" src="{{ URL::asset('/img/26115.jpg') }}" width="55" height="55"/> </td> -->
                    <td>{{ user.email }}</td>
                    <td>{{ user.status }}</td>
                    <td>
                      <div class="pull-right">
                        <button type="button" class="btn btn-sm btn-success">Edit</button>
                        <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target=".oneDetailsModal" @click.prevent="detailsUser(user)">Details</button>
                        <button type="button" class="btn btn-sm btn-danger" @click.prevent="deleteUser(user)">Delete</button>
                      </div>
                    </td>
                </tr>                   
            </table>
        </div><!-- /.box-body -->
        <header class="panel-heading">
            <div class="row">
                <div class="col-sm-3">
                   
                </div>
                <div class="col-sm-3 pull-right">
                    <div class="pagination pull-right">
                        <button class="btn btn-default btn-sm" @click="fetchUsers(pagination.prev_page_url)"
                                :disabled="!pagination.prev_page_url">
                            Previous
                        </button> &nbsp; 
                        <span>Page {{pagination.current_page}} of {{pagination.last_page}}</span> &nbsp; 
                        <button class="btn btn-default btn-sm" @click="fetchUsers(pagination.next_page_url)"
                                :disabled="!pagination.next_page_url">Next
                        </button>
                    </div>
                </div>
            </div>
        </header>
    </div><!-- /.box -->

</template>

<script>

    const swal = require('sweetalert2');

	export default {

		data: function() {
			return {

				searchWord: "", /*used by the global filter*/
				users: [], /*using the fetchUsers()*/
				statuses: [], /*using the getAllCategories()*/
				statusSelected: [], /*using the sermons filter*/
                pagination: {},
                usersCount: {},
                oneUser: {}

			};
		},


		created: function() {
			this.fetchUsers();
            this.getUsersCount();
            /* this.getAllStatuses();*/
		},

		methods: {

            getUsersCount: function () {
                this.$http.get('/api/users')
                    .then(function (response) {
                        this.usersCount = response.body;
                    });
            },


			fetchUsers: function(page_url) {
                let vm = this;
                page_url = page_url || '/api/users/paginated'
				this.$http.get(page_url)
                    .then(function (response) {
                        vm.makePagination(response.data)
                        vm.$set('users', response.data.data)
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

            detailsUser: function(user) {
                this.$set('oneUser', user);

            },

            deleteUser: function(user) {
                  var vm = this;
                  swal({
                        title: 'Are you sure?',
                        text: 'This user will be deleted if you continue',
                        type: 'warning',
                        showCancelButton: true
                    }).then(function(){
                        vm.$http.delete('/api/user/delete/' + user.slug)
                          .then(function () {
                            this.getUsersCount()
                            this.users.$remove(user)
                          });
                    }).done();  
            },
       		

		} /*methods end here*/


	}; /*compoent ends here */
</script>