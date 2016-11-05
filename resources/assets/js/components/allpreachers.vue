<template>
	<div class="row">
        <div class="col-md-4">
            <div class="panel">
                <header class="panel-heading">
                    Add New Preachers
                </header>
                <div class="panel-body">
                  <form role="form" @submit.prevent="addNewPreacher">
                    <br>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" v-model="newPreacher.name" class="form-control" placeholder="e.g Grace, Success, Forgiveness, etc">
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea type="text" v-model="newPreacher.info" class="form-control" rows="4"> </textarea>
                    </div>
                    <br>
                    <br>
                    <div class="row">
                      <div class="col-sm-6">
                        <button type="submit" class="btn btn-success btn-block">Submit</button>
                      </div>
                      <div class="col-sm-6">
                        <button type="cancel" class="btn btn-default btn-block"  @click.prevent="cancelPreacherInput">Cancel</button>
                      </div>
                    </div>
                  </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <section class="panel tasks-widget">
            	  <header class="panel-heading">
                  <div class="row">
                    <div class="col-sm-9">
                      All Preachers
                    </div>
                    <div class="col-sm-3 pull-right">
                      Total: <strong> {{preachersCount.length}} </strong>
                    </div>
                  </div>
                </header>
                
                <div class="panel-body">
                    <div class="panel-body table-responsive">
                        <div class="row">
                          <div class="col-md-6">
                              <div class="input-group m-b-5">
                                  <input type="text" v-model="searchWord" class="form-control input-sm" placeholder="start searching here">
                                  <span class="input-group-btn">
                                    <button class="btn btn-sm btn-white" type="button">Go!</button>
                                  </span>
                              </div>
                          </div>
                          <div class="col-md-5 pull-right">
                            <div class="pagination pull-right">
                              <button class="btn btn-default btn-sm" @click="fetchPreachers(pagination.prev_page_url)"
                                      :disabled="!pagination.prev_page_url">
                                  Previous
                              </button> &nbsp; 
                              <span>Page {{pagination.current_page}} of {{pagination.last_page}}</span> &nbsp; 
                              <button class="btn btn-default btn-sm" @click="fetchPreachers(pagination.next_page_url)"
                                      :disabled="!pagination.next_page_url">Next
                              </button>
                            </div>
                          </div>
                        </div>

                        <hr> 
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th>Name</th>
                              <th>Description</th>
                              <th>&nbsp;</th>
                            </tr>
                          </thead>
                          <tbody>                             
                            <tr v-for="preacher in preachers | filterBy searchWord">
                              <td>{{preacher.name}}</td>
                              <td>
                                <div class="pull-left">
                                    {{preacher.info}}
                                </div>
                              </td>
                              <td>
                                <div class="pull-right">
                                  <button type="button" class="btn btn-sm btn-success">I</button>
                                  <button type="button"  id="categoryBtnAdj" class="btn btn-sm btn-info">D</button>
                                  <button type="button" class="btn btn-sm btn-danger" @click.prevent="deletePreacher(preacher)">X</button>
                                </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                    </div>                	
                </div> <!-- table body ends here -->

                <header class="panel-heading"> <!-- bottom panel -->
                  <div class="row">

                    <div class="col-sm-5 pull-right">
                      <div class="pagination pull-right">
                      <button class="btn btn-default btn-sm" @click="fetchPreachers(pagination.prev_page_url)"
                              :disabled="!pagination.prev_page_url">
                          Previous
                      </button> 
                      <span>Page {{pagination.current_page}} of {{pagination.last_page}}</span> 
                      <button class="btn btn-default btn-sm" @click="fetchPreachers(pagination.next_page_url)"
                              :disabled="!pagination.next_page_url">Next
                      </button>
                      </div>
                    </div>
                  </div>
                </header>
            </section>
        </div>
    </div>
</template>


<script>
  	export default {

    		data: function() {
    			return {

    				preachers: [], /*using the fetchCategories()*/
            searchWord: "",     /*used by the global filter*/
    				newPreacher: {
    					name: "",
    					info: ""
    				},
            pagination: {},
            preachersCount: {}


    			};
    		}, /*data ends here*/

    		created: function() {
    			this.fetchPreachers();
          this.getPreachersCount();
    		},

    		methods: {

          getPreachersCount: function () {
            this.$http.get('/api/preachers')
              .then(function (response) {
                  this.preachersCount = response.body;
              });
          },

    			fetchPreachers: function(page_url) {
            let vm = this;
            page_url = page_url || '/api/preacher/paginated'
            this.$http.get(page_url)
              .then(function (response) {
                vm.makePagination(response.data)
                vm.$set('preachers', response.data.data)
              });
          },

          makePagination: function(data) {
            let pagination = {
                current_page: data.current_page,
                last_page: data.last_page,
                next_page_url: data.next_page_url,
                prev_page_url: data.prev_page_url,
                total: data.total
            }
            this.$set('pagination', pagination)
          },

    			addNewPreacher: function() {
            var preacher = this.newPreacher
    				this.newPreacher = { name: "", info: ""}
    				this.$http.post('/api/preacher/new', preacher)
              .then((response) => {
      					this.fetchPreachers()
                this.getPreachersCount()
    				});    				
    			},

    			deletePreacher: function(preacher) {
    				var  ConfirmBox = confirm('Are you sure you want to delete this preacher?')
    				if (ConfirmBox) {
    					this.$http.delete('/api/preacher/delete/' + preacher.name)
    						.then(function () {                    
                    this.getPreachersCount()                
    						    this.preachers.$remove(preacher)
    					});
    				}
    			},

    			cancelPreacherInput: function() {

    			}



    		} /*methods end here*/


  	}; /*compoent ends here */

</script>