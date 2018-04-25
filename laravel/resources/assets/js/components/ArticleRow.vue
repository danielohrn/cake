<template>
    <tr>
        <td>
          <a @click="toggleModal" class="button">Edit</a>
        </td>
        <td>
            {{title}}
        </td>
        <td>
            {{created_at}}
        </td>
        <td>
            {{author}}
        </td>
        <td>

              <b-tag v-for="(tag, i) in articleTags" :key="i" rounded>{{tag}}</b-tag>

        </td>

    </tr>
</template>

<script>
import EditableArticleModal from './EditableArticleModal.vue';
import { mapState } from 'vuex';
import {filterOutTags} from '../functions';

export default {

  props: ['id','title', 'body', 'created_at', 'author', 'articleTags'],

  data(){
      return {
      }
  },

  computed: mapState(['modalOpen', 'availableTags', 'filteredTags', 'chosenArticle']),

  methods: {
      toggleModal(){
          this.$store.commit('toggleModal', {action: true});
          this.$store.commit('updateModal', {id: this.id, title: this.title, body: this.body, tags: this.articleTags, author: this.author})
          console.log(this.$store)
          const filteredTags = filterOutTags(this.chosenArticle, this.availableTags);
          this.$store.commit('filterTags', filteredTags);
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
  background-color: #38ee78;
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
