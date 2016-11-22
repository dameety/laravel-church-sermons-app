var Vue = require('vue');
Vue.use(require('vue-resource'));


Vue.http.headers.common['X-CSRF-TOKEN'] = ChurchSermons.csrfToken;
import Allsermons from './components/allsermons.vue';
import Allcategories from './components/allcategories.vue';
import Allusers from './components/allusers.vue';
import Newsermon from './components/newsermon.vue';
import Allpreachers from './components/allpreachers.vue';
import Allservices from './components/allservices.vue';
import Alladmins from './components/alladmins.vue';
import Sermoncards from './components/sermoncards.vue';



new Vue ({
	el: '#vue-app',

	components: {
		
		Allsermons,
		Allcategories,
		Allusers,
		Newsermon,
		Allpreachers,
		Allservices,
		Alladmins,
		Sermoncards,

	},

});