import Vue from 'vue'
import Router from 'vue-router'
import Home from '@/components/Home'
import Article from '@/components/Article'
import ChosenArticle from '@/components/ChosenArticle'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'Home',
      component: Home
    },
    {
      path: '/article',
      name: 'Article',
      components: {
        default: Home,
        a: Article
      }
    },
    {
      path: '/articles/:role',
      name: 'Role',
      component: ChosenArticle,
      props: true
    }

  ]
})
