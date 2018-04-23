<template>
    <tr @click="toggleModal">
        <td>
            {{title}}
        </td>
        <td>
            <span class="article-body">{{body}}</span>
        </td>
        <td>
            {{created_at}}
        </td>
        <td>
            {{author}}
        </td>
        <td>
            <ul>
                <li v-for="(tag, i) in articleTags" :key="i">{{tag}}</li>   
            </ul>
        </td>

    </tr>
</template>

<script>
import EditableArticleModal from './EditableArticleModal.vue'; 
import { mapState } from 'vuex';
export default {

  props: ['id','title', 'body', 'created_at', 'author', 'articleTags', 'availableTags'],
  
  data(){
      return {
      }
  },

  computed: mapState(['modalOpen']), 

  methods: {
      toggleModal(){
          this.$store.commit('toggleModal', {action: true});
          this.$store.commit('updateModal', {id: this.id, title: this.title, body: this.body, tags: this.articleTags, author: this.author})
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


h1{
  font-size: 2em;
}
</style>


