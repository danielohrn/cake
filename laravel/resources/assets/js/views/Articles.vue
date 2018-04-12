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
            <a v-for="(tag, i) in tags" :key="i" >#{{tag}} </a>
            <br>

        </div>
      </div>
    </div>
    <b-modal :active.sync="isCardModalActive" :width="960" scroll="keep" >
      <div class="card">
        <div class="card-image">
          <figure class="image is-4by3">
            <img src="static/img/placeholder-1280x960.png" alt="Image">
          </figure>
        </div>
        <div class="card-content">
          <div class="media">
            <div class="media-left">
              <figure class="image is-48x48">
                <img src="static/img/placeholder-1280x960.png" alt="Image">
              </figure>
            </div>
            <div class="media-content">
              <p class="title is-4">{{title}}</p>
            </div>
          </div>

          <div class="content">
            {{body}}
          </div>
        </div>
      </div>
    </b-modal>
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
