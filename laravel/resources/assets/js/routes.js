import Vue from 'vue'
import Router from 'vue-router'
import Home from './views/Home'
import Articles from './views/Articles'
import ChosenArticle from './views/ChosenArticle'

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
      components:  {
        default: ChosenArticle,
        a: Articles
      },
      props: ['article']
    }

  ]
})
