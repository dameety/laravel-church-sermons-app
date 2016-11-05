<template>
	<section class="panel">
      <header class="panel-heading">
        Fill the form below.
      </header>
      <div class="panel-body">
      	<form class="form-horizontal tasi-form" @submit.prevent="saveMessage()" method="POST" enctype="multipart/form-data">

      		<div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Title:</label>
                  <div class="col-sm-8">
                      <input type="text" name="title" v-model="newSermon.title" class="form-control">
                  </div>
            </div>      
            <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Preacher: </label>
                  <div class="col-sm-8">
                      <input type="text" name="preacher" v-model="newSermon.preacher" class="form-control">
                  </div>
            </div>
            <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Service: </label>
                  <div class="col-sm-8">
                      <input type="text" name="service" v-model="newSermon.service" class="form-control">
                  </div>
            </div>
            <div class="form-group">
                  <label class="col-sm-2 col-sm-2  control-label">Category: </label>
                  <div class="col-lg-8">
                      <select name="category_id" v-model="newSermon.category_id" class="form-control m-b-10">
                          <option v-for="category in categories" v-bind:value="category.id">
                          	{{ category.name }}
                          </option>                          
                      </select>
                  </div>
            </div>

            <br>
              
            <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label"></label>
                  <div class="col-sm-8">
                      <p> Please fill the date inputs below as much as you remember</p>
                  </div>
            </div>
            <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Date: </label>
                  <div class="col-sm-8">
                      <input type="text" name="datepreached" v-model="newSermon.datepreached" class="form-control">
                  </div>
            </div>             
            <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Month: </label>
                  <div class="col-lg-8">
                      <select name="month" v-model="newSermon.month" class="form-control m-b-10">
                          <option value="january">January</option>
                          <option value="february">February</option>
                          <option value="march">March</option>
                          <option value="april">April</option>
                          <option value="may">May</option>
                          <option value="june">June</option>
                          <option value="july">July</option>
                          <option value="august">August</option>
                          <option value="september">September</option>
                          <option value="october">October</option>
                          <option value="november">November</option>
                          <option value="december">December</option>
                      </select>
                  </div>
            </div>
            <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Year: </label>
                  <div class="col-sm-8">
                      <input name="year" type="text" v-model="newSermon.year" class="form-control">
                  </div>
            </div>
              
            <br>
              
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Status: </label>
                <div class="col-lg-8">
                    <select name="status" v-model="newSermon.status" class="form-control m-b-10">
                        <option value="free">Free</option>
                        <option value="premium">Premium</option>
                    </select>
                </div>
            </div>        
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">File: </label>
                <div class="col-sm-8">
<!--                     <input type="file" id="sermonFile" name="sermonFile[]" v-model="newSermon.sermonFile" class="form-control"> -->
<!--                     <input type="file" id="sermonFile" name="sermonFile" accept="audio/*" v-model="newSermon.sermonFile" class="form-control"> -->

                    <input v:el=sermonFile type="file" name="sermonFile" id="sermonFile">



                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label"></label>
                <div class="col-sm-8">
                    <button type="submit" class="btn btn-success">Save Sermon</button>
                </div>
            </div>

        </form>
      </div>
    </section>
</template>

<script>
	export default {

    		data: function() {
    			return {

    				categories: {}, /*using the fetchCategories()*/

            newSermon: {
              title: "",
              preacher: "",
              service:"",
              category_id: "",
              datepreached: "",
              month: "",
              year: "",
              status: "",
             /* sermonFile: "",*/
              
            },
                       
            
    			};

    		}, /*data ends here*/



    		created: function() {

          		this.getCategories();

    		},

    		methods: {

    			getCategories: function () {
              this.$http.get('/api/category')
              	.then(function (response) {
                      this.categories = response.body;
                  });
          },

        	saveMessage: function () {

              /*var files = this.$els.sermonFile;*/

              var formData = new FormData();

                  formData.append('title', this.newSermon.title);
                  formData.append('preacher', this.newSermon.preacher);
                  formData.append('service', this.newSermon.service);
                  formData.append('category_id', this.newSermon.category_id);
                  formData.append('datepreached', this.newSermon.datepreached);
                  formData.append('month', this.newSermon.month);
                  formData.append('year', this.newSermon.year);
                  formData.append('status', this.newSermon.status); 
/*                  formData.append('sermonFile', this.newSermon.sermonFile);*/
                  formData.append('sermonFile', this.$els.sermonFile);

    /*              formData.append('sermonFile[]', this.$els.sermonFile.files[0]);*/

                  /*formData.append('sermonFile', this.$$.sermonFile.files[0]);*/


                   this.$http.post('/api/sermon/save', formData).then((response) => {
                      console.log(response.body);
                   }); 
               
          },   


    		} /*methods end here*/


  	}; /*compoent ends here */
</script>