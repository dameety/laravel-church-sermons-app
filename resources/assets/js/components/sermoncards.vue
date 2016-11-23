<template>

<div class="row">
	<div id="topSearch" class="ui fluid huge icon input">
		<input type="text" v-model="searchWord" placeholder="Start Your Search Here">
	</div>
</div>

<div class="ui four stackable cards">
 	<div class="ui orange raised card"v-for="sermon in sermons | filterBy searchWord">
	    <div class="content">
	      <div class="header">{{ sermon.title }}</div>
	      <div class="meta">
	        <span class="category"><i class="icon-user"></i>Date: {{ sermon.datepreached }}</span>
	        <br>
	        <span class="category"><i class="icon-user"></i>Preacher: {{ sermon.preacher }}</span>
	      </div>
	      <br>
	      <div class="description">
	        <p>Category of message</p>
	      </div>
	      <br>
	      <div class="description">
	        <p>this is boatload of content waiting to be use. a paragraph ni jare</p>
	      </div>
	    </div>
	    <div id="actionButtons" class="extra content actionButtons">
	      <button class="fluid large ui orange button">
	      <i class="fa fa-download" aria-hidden="true"></i>
	          Download
	      </button>
	    </div>
  	</div>
 </div>
 <br>
 <br>
 <br>
<!-- pagination -->
 <div class="conatiner">
	<div class="col-md-4">
	</div>
	<div class="col-md-4">
		<div class="ui right float segment">
			<div class="ui raised segment">
				<button class="btn btn-primary btn-lg" @click="getAllSermons(pagination.prev_page_url)"
						:disabled="!pagination.prev_page_url">
			        Previous
			    </button> &nbsp; 
			    <span>Page {{pagination.current_page}} of {{pagination.last_page}}</span> &nbsp; 
			    <button class="btn btn-primary btn-lg" @click="getAllSermons(pagination.next_page_url)"
			            :disabled="!pagination.next_page_url">Next
			    </button>
			</div>
		</div>
	</div>
	<div class="col-md-4">
	</div>
</div>

</template>

<script>
	export default {

		data: function() {
			return {
				searchWord: "", 		/*used by the search bar*/
				pagination: {},
				sermons: [], 			/*using the getAllSermons()*/
				pagination: {},
			};
		},



		created: function() {
			this.getAllSermons();

		},

		methods: {
			getAllSermons: function (page_url) {
                let vm = this;
                page_url = page_url || '/users/sermons/paginated'
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


		} /*methods end here*/


  	}; /*compoent ends here */

</script>