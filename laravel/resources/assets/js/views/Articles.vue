<template>
  <div canCancel @click="toggleModal($event)" class="article-column">
      <div  class="card">
        <div class="card-image">
          <img v-bind:src="`/img/${media}`" alt="" >
        </div>
        <div class="">


          <div class="content">
            <h1><b>{{title}}</b></h1>
            <!-- {{truncate(body)}} -->
            <div class='text-box'>
            <h6>Skriven av {{author}}</h6>
            <h6>{{time}}</h6>
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
.content h1 {
  font-size: 1.5em;
}
.content{
  margin: 1em;
}
.text-box {
  margin-top: 1em;
}
.text-box h6{
  margin: 0;
}
</style>
