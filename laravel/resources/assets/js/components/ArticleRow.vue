<template>
    <tr @click="goToProject">

        <router-link :to="'/project/' + article.slug">

        <td>
            {{article.title}}
        </td>
        <td>
            {{created_at}}
        </td>
        <td>
            {{author}}
        </td>
                <td>

        </td>
        <td>

<!-- PROJECT STATUS -->

        </td>

        </router-link>

    </tr>
</template>

<script>
import EditableArticleModal from './EditableArticleModal.vue';
import { mapState } from 'vuex';
import {filterOutTags} from '../functions';

export default {

  props: ['article','id','title', 'body', 'created_at', 'author', 'articleTags'],

  data(){
      return {

      }
  },

  computed: mapState(['modalOpen', 'availableTags', 'filteredTags', 'chosenArticle']),

  methods: {
      toggleModal(){
          this.$store.commit('toggleModal', {modalType: 'editArticleModal', action: true});
          this.$store.commit('updateModal', {id: this.id, title: this.title, body: this.body, tags: this.articleTags, author: this.author})
          console.log(this.$store)
          const filteredTags = filterOutTags(this.chosenArticle, this.availableTags);
          this.$store.commit('filterTags', filteredTags);
      },
      goToProject(){
        this.$route.push()
      }
  },

  destroyed(){
      console.log('destroyed')
     this.$store.commit('toggleModal', {action: false});
  }
}
</script>

<style>
td span.article-body {
    display: block;
    height: 100px;
    overflow: hidden;
}

.article-img{
  width: 100%;
  height: auto;
}

.article-content{
  width: 70%;
  overflow: scroll;
}

.article-sidebar{
  width: 30%;
  height: 100%;
  padding: 1em;
  display: flex;
  flex-direction: column;
}

.sidebar-box{
  width: 100%;
  margin-bottom: 2em;
  display: flex;
  flex-direction: column;
}

.social{
  display: flex;


}
.button{
  background-color: #aedfbf;
  color: #000;
  border: none;
}
.table td {
    vertical-align: center;
}


h1{
  font-size: 2em;
}
</style>
