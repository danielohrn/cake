import Vue from 'vue'
import Router from 'vue-router'
import Home from './components/Home'
import Articles from './components/Articles'
import ChosenArticle from './components/ChosenArticle'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'Home',
      component: Home
    },
    {
      path: '/articles',
      name: 'Articles',
      components: {
        default: Home,
        a: Articles
      }
    },
    {
      path: '/articles/:role',
      name: 'Role',
      component:  ChosenArticle,
      props: true
    }

  ]
})
