import './bootstrap';
import router from './routes';
import Buefy from 'buefy';
import 'buefy/lib/buefy.css';
import store from './store.js';
import Overdrive from 'vue-overdrive'

Vue.use(Overdrive)



Vue.use(Buefy)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('home', require('./components/Home.vue'));
Vue.component('articles', require('./components/Articles.vue'));
Vue.component('chosen-article', require('./components/ChosenArticle.vue'));

const app = new Vue({
    el: '#app',
    store,
    router
});
