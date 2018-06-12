import Vue from 'vue'
import Router from 'vue-router'
import Home from './views/Home'
import Articles from './views/Articles'
import ChosenArticle from './views/ChosenArticle'
import Admin from './views/Admin';
import Project from './views/Project';
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
        default: ChosenArticle,
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
    },
    {
      path: '/admin',
      name: 'Admin',
      components:  {
        default: Admin
      }
    },
    {
      path: '/project/:id',
      name: 'project',
      component: Project,
    }

  ]
})
