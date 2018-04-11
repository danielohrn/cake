<template>
  <div canCancel @click="toggleModal($event)" class="is-4">
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

            <b-taglist>
              <b-tag v-for="(tag, i) in tags" :key="i" >{{tag}}</b-tag>
            </b-taglist>
            <br>

        </div>
      </div>
    </div>
    <article-modal :title='title' :body="body" :tags="tags" :img="img" @click="toggleModal" v-if="this.isCardModalActive"/>
</div>
</template>

<script>

export default {
  name: 'Articles',
  props: ['title', 'body','tags', 'img'],
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



</style>
