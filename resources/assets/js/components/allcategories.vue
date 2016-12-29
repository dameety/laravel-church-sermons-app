<template>

  <!-- the edit modal -->
  <div class="modal fade editModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        
          <div class="modal-body">
            <form method="post" @submit.prevent="saveUpdateCategory(updateCategory.slug)">
                <div class="form-group">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <br>
                    <label>Name: </label>                        
                    <input type="text" maxlength="75" required="required" name="name" class="form-control input-sm" v-model="updateCategory.name">
                    <span v-if="formErrors['name']" class="inputError">{{ formErrors['name'] }}</span>                        
                </div>
                <div class="form-group">
                    <label>Description: </label> (optional)                        
                    <textarea type="text"  maxlength="300" required="required" name="info" class="form-control input-lg" rows="4" v-model="updateCategory.info"></textarea>
                    <span v-if="formErrors['info']" class="inputError">{{ formErrors['info'] }}</span>
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



	<div class="row">
        <div class="col-md-4">
            <div class="panel">
                <header class="panel-heading">
                    Add New Category
                </header>
                <div class="panel-body">
                  <form @submit.prevent="addNewCategory">
                    <br>
                    <div class="form-group">
                        <label>Name</label>                        
                        <input type="text" v-model="newCategory.name" required="required" maxlength="32" name="name" class="form-control" placeholder="e.g Grace, Success, Forgiveness, etc">
                        <span v-if="formErrors['name']" class="inputError">{{ formErrors['name'] }}</span>                        
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Description</label> (optional)                        
                        <textarea type="text" v-model="newCategory.info" name="info" class="form-control" rows="5"> </textarea>
                        <span v-if="formErrors['info']" class="inputError">{{ formErrors['info'] }}</span>
                    </div>
                    <br>
                    <br>
                    <div class="form-group">                    
                        <button type="submit" class="btn btn-success btn-block">Add Category</button>
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
                      All Categories
                    </div>
                    <div class="col-sm-3 pull-right">
                      <span class="badge badge-info count">Total : {{categoriesCount.length}}</span>
                    </div>
                  </div>
                </header>
                
                <div class="panel-body">
                    <div class="panel-body table-responsive">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="col-md-6">
                              <input type="text" v-model="searchWord" class="form-control input-sm" placeholder="start searching here">  
                            </div>
                          </div>
                          <div class="col-md-5 pull-right">
                            <div class="pagination pull-right">
                              <button class="btn btn-default btn-sm" @click="fetchCategories(pagination.prev_page_url)"
                                      :disabled="!pagination.prev_page_url">
                                  Previous
                              </button> &nbsp; 
                              <span>Page {{pagination.current_page}} of {{pagination.last_page}}</span> &nbsp; 
                              <button class="btn btn-default btn-sm" @click="fetchCategories(pagination.next_page_url)"
                                      :disabled="!pagination.next_page_url">Next
                              </button>
                            </div>
                          </div>
                        </div>

                        <hr>

                        <div class="row" v-for="category in categories | filterBy searchWord">
                          <div class="col-md-12">
                              <h4 class="heading categoryName">Name: &nbsp;&nbsp; {{category.name}}</h4>
                              <div class="pull-right">
                                <button id="categoryBtnAdj" type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target=".editModal" @click.prevent="editCategory(category)">Edit</button>
                                <button type="button" class="btn btn-sm btn-danger" @click.prevent="deleteCategory(category)">Delete</button>                                
                              </div>
                              <p class="categoryInfo"><strong>Description: </strong>&nbsp;&nbsp; {{category.info}}</p>
                              <hr>
                          </div>
                        </div>

                    </div>                	
                </div> <!-- table body ends here -->

                <header class="panel-heading"> <!-- bottom panel -->
                  <div class="row">

                    <div class="col-sm-5 pull-right">
                      <div class="pagination pull-right">
                      <button class="btn btn-default btn-sm" @click="fetchCategories(pagination.prev_page_url)"
                              :disabled="!pagination.prev_page_url">
                          Previous
                      </button> 
                      <span>Page {{pagination.current_page}} of {{pagination.last_page}}</span> 
                      <button class="btn btn-default btn-sm" @click="fetchCategories(pagination.next_page_url)"
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

    const swal = require('sweetalert2');

  	export default {

    		data: function() {
    			return {

    				categories: [], /*using the fetchCategories()*/
            searchWord: "",     /*used by the global filter*/
    				newCategory: {
    					name: "",
    					info: ""
    				},
            pagination: {},
            categoriesCount: {},
            formErrors: {},
            updateCategory: {}
            
    			};
    		}, /*data ends here*/

    		created: function() {
    			this.fetchCategories();
          this.getCategoriesCount();
    		},

    		methods: {

          getCategoriesCount: function () {
            this.$http.get('/api/category')
              .then(function (response) {
                  this.categoriesCount = response.body;
              });
          },

    			fetchCategories: function(page_url) {
            let vm = this;
            page_url = page_url || '/api/category/paginated'
            this.$http.get(page_url)
              .then(function (response) {
                vm.makePagination(response.data)
                vm.$set('categories', response.data.data)
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

    			addNewCategory: function() {
            var category = this.newCategory
    				this.newCategory = { name: "", info: ""}
    				this.$http.post('/api/category/new', category)
              .then((response) => {
      					this.fetchCategories()
                this.getCategoriesCount()
    				}, (response) => {
              var errors = response.body;
              this.formErrors = errors;
            });    				
    			},

          editCategory: function(category) {
            this.$set('updateCategory', category);
          },

          saveUpdateCategory: function (slug) {
            var categories = this.updateCategory
              this.$http.patch('/api/category/' + slug, categories)
                .then(function (response) {
                  this.fetchCategories();
                });
          },

          deleteCategory: function(category) {
              var vm = this;
              swal({
                    title: 'Are you sure?',
                    text: 'This category will be deleted if you continue',
                    type: 'warning',
                    showCancelButton: true
                }).then(function(){
                  vm.$http.delete('/api/category/delete/' + category.name)
                      .then(function () {
                        this.getCategoriesCount()
                        this.categories.$remove(category)
                      });
                  }).done();
          },

    			
   		} /*methods end here*/


  	}; /*compoent ends here */

</script>