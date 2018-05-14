<template>
  <div canCancel @click="toggleModal($event)" class="article-column">
      <div  class="card">
        <div class="card-image">
          <img v-bind:src="`/img/articlesNew.png`" alt="" >
        </div>
        <div class="card-content">
          <div class="media">
            <h1><b>{{title}}</b></h1>
          </div>

          <div class="content">
            <!-- {{truncate(body)}} -->
            <div>
            <h6>Author: {{author}} </h6>
            <h6>Date: {{time}} </h6>
          </div>
            <div class='tagList'>
            <b-taglist>
              <b-tag v-for="(tag, i) in articleTags" :key="i" >{{tag}}</b-tag>
            </b-taglist>
          </div>
        </div>
      </div>
    </div>
    <article-modal :title="title" :body="body" :tags="articleTags" :img="media" @click="toggleModal" v-if="this.isCardModalActive"></article-modal>
</div>
</template>

<script>

export default {
  name: 'Articles',
  props: ['title', 'body','articleTags', 'media', 'author','created_at'],
  data () {
    return {
      isCardModalActive: false


    }
  },
  methods: {
    toggleModal($event) {
      this.isCardModalActive = !this.isCardModalActive;
    },
    truncate(string){
     return string.substring(0, 200) + '...';
   }
 },
  computed: {
    time: function(){
      return this.created_at.slice(0, 10)
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.card-image{
  object-fit: none;
}
.article-column {
  width: 400px;
  height: auto;
  margin: 1em;
}
.tagList {
  margin-top: 1em;
  height: 70px;
}
.media h1 {
  font-size: 1.5em;
}
.card-content {
  padding-bottom: 0;
}
</style>
