<template>

    <div class="panel">
        <header class="panel-heading">
          <div class="row">
            <div class="col-sm-3">
              <span class="badge badge-info count">Total : {{adminsCount.length}} </span>
            </div>
            <div class="col-sm-3 pull-right">

            </div>
          </div>
        </header>
        <br>

        <div class="panel-body table-responsive"> 
            <div class="row m-b-10">
              <div class="col-md-3">
                
              </div>
              <div class="col-md-6">
                    <input type="text" v-model="searchWord" class="form-control input-sm" placeholder="start searching here">
              </div>
              <div class="col-md-3 pull-right">
                <div class="pagination pull-right">
                    <button class="btn btn-default btn-sm" @click="fetchAdmins(pagination.prev_page_url)"
                            :disabled="!pagination.prev_page_url">
                        Previous
                    </button> &nbsp; 
                    <span>Page {{pagination.current_page}} of {{pagination.last_page}}</span> &nbsp; 
                    <button class="btn btn-default btn-sm" @click="fetchAdmins(pagination.next_page_url)"
                            :disabled="!pagination.next_page_url">Next
                    </button>
                </div>
              </div>
            </div>

            <table class="table table-hover">
                <tr>
                    <th>Date</th>
                    <th>Name</th>
                    <!--  <th>avatar</th> -->
                    <th>Email</th>
                    <th>Status</th>
                    <th>&nbsp;</th>
                </tr>
                <tr v-for="admin in admins | filterBy searchWord">
                    <td>{{ admin.created_at }}</td>
                    <td>{{ admin.name }}</td>
                    <!-- <td> <img class="adminavatar" src="{{ URL::asset('/img/26115.jpg') }}" width="55" height="55"/> </td> -->
                    <td>{{ admin.email }}</td>
                    <td>{{ admin.status }}</td>
                    <td>
                      <div class="pull-right">
                        <button type="button" class="btn btn-sm btn-success">Edit</button>
                        <button type="button" class="btn btn-sm btn-info">Details</button>
                        <button type="button" class="btn btn-sm btn-danger" @click.prevent="deleteAdmin(admin)">Delete</button>
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
                        <button class="btn btn-default btn-sm" @click="fetchAdmins(pagination.prev_page_url)"
                                :disabled="!pagination.prev_page_url">
                            Previous
                        </button> &nbsp; 
                        <span>Page {{pagination.current_page}} of {{pagination.last_page}}</span> &nbsp; 
                        <button class="btn btn-default btn-sm" @click="fetchAdmins(pagination.next_page_url)"
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
				admins: [], /*using the fetchsermons()*/
				statuses: [], /*using the getAllCategories()*/
				statusSelected: [], /*using the sermons filter*/
                pagination: {},
                adminsCount: {}

			};
		},


		created: function() {
			this.fetchAdmins();
            this.getAdminsCount();
            /* this.getAllStatuses();*/
		},

		methods: {

            getAdminsCount: function () {
                this.$http.get('/api/admins')
                    .then(function (response) {
                        this.adminsCount = response.body;
                    });
            },


			fetchAdmins: function(page_url) {
                let vm = this;
                page_url = page_url || '/api/admins/paginated'
				this.$http.get(page_url)
                    .then(function (response) {
                        vm.makePagination(response.data)
                        vm.$set('admins', response.data.data)
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


            deleteAdmin: function(admin) {
                  var vm = this;
                  swal({
                        title: 'Are you sure?',
                        text: 'This admin will be deleted if you continue',
                        type: 'warning',
                        showCancelButton: true
                    }).then(function(){
                        vm.$http.delete('/api/admin/delete/' + admin.slug)
                          .then(function () {
                            this.getAdminsCount()
                            this.admins.$remove(admin)
                          });
                    }).done();  
            },


		} /*methods end here*/
	}; /*compoent ends here */
</script>