<template>
  <div canCancel @click="toggleModal($event)" class="flex-grow column is-6">
      <div  class="card">
        <div class="card-image">
        </div>
        <div class="card-content">
          <div class="media">
            <h1><b>{{title}}</b></h1>
          </div>

          <div class="content">
            {{truncate(body)}}
            <br/>
            <a v-for="(tag, i) in articleTags" :key="i" >#{{tag}} </a>
            <br>

        </div>
      </div>
    </div>
    <article-modal :title="title" :body="body" :tags="tags" :img="img" @click="toggleModal" v-if="this.isCardModalActive"></article-modal>
</div>
</template>

<script>

export default {
  name: 'Articles',
  props: ['title', 'body','articleTags', 'img'],
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
.flex-grow {
  display: flex;
  flex-grow: 1;
}
.container {

}
</style>
