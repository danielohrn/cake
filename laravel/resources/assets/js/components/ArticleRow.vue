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
        <EditableArticleModal :availableTags="availableTags" v-if="this.isModalOpen" :title="title" :body="body"  :created_at="created_at" :articleTags="articleTags" :author="author"/>
    </tr>
</template>

<script>
import EditableArticleModal from './EditableArticleModal.vue'; 
export default {

  props: ['title', 'body', 'created_at', 'author', 'articleTags', 'availableTags'],
  
  data(){
      return {
          isModalOpen: false
      }
  },
  methods: {
      toggleModal(){
          this.isModalOpen = true; 
      }
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


