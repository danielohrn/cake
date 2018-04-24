<template>
  <div canCancel @click="toggleModal($event)" class="article-column">
      <div  class="card">
        <div class="card-image">
          <img v-bind:src="`/img/${media}`" alt="">
        </div>
        <div class="card-content">
          <div class="media">
            <h1><b>{{title}}</b></h1>
          </div>

          <div class="content">
            {{truncate(body)}}
            <b-taglist>
              <b-tag v-for="(tag, i) in articleTags" :key="i" >{{tag}}</b-tag>
            </b-taglist>
        </div>
      </div>
    </div>
    <article-modal :title="title" :body="body" :tags="articleTags" :img="media" @click="toggleModal" v-if="this.isCardModalActive"></article-modal>
</div>
</template>

<script>

export default {
  name: 'Articles',
  props: ['title', 'body','articleTags', 'media'],
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
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.card-image{
  object-fit: none;
}
.article-column {
  width: 50vh;
  height: auto;
  margin: 1em;

}
@media only screen and (max-width: 1300px) {
  .article-column {
      width: 40vh;
  }
}
@media only screen and (max-width: 965px) {
  .article-column {
      width: 40vh;
  }
}
@media only screen and (max-width: 768px) {
  .article-column {
      width: 35vh;
  }
}
@media only screen and (max-width: 580px) {
  .article-column {
      width: 40vh;
  }
}
</style>
