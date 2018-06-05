<template>
<div class="modal-background">
  <div class="article-card">

    <div class="article-content">
      <img class="article-img" v-bind:src="`/img/${img}`" alt="">
      <h1>{{title}}</h1> {{trimHtmlTags}}

    </div>
    <div class="article-sidebar">
      <div class="sidebar-box">
        <h2>Taggar</h2>
        <div class="tags">
          <b-taglist>
            <b-tag v-for="(tag, i) in tags" :key="i">{{tag}}</b-tag>
          </b-taglist>
        </div>
      </div>
      <div class="sidebar-box">
        <h2>Social</h2>
        <div class="social">
          <a href="#"><img src="https://image.flaticon.com/icons/svg/69/69407.svg" alt="" ></a>
          <a href="#"><img src="https://image.flaticon.com/icons/svg/69/69406.svg" alt="" ></a>
          <a href="#"><img src="https://image.flaticon.com/icons/svg/69/69480.svg" alt="" ></a>
        </div>
      </div>
    </div>

  </div>
</div>
</div>
</template>

<script>
export default {
  name: 'article-modal',
  props: ['title', 'body', 'tags', 'img'],
  computed: {
    trimHtmlTags() {
      const regex = new RegExp('<[a-z]+>|</[a-z]+>', 'gi')
      return this.body.replace(regex, ''); 
    }
  },
  data() {
    return {
      isCardModalActive: false


    }
  },
  methods: {
    toggleModal($event) {
      this.isCardModalActive = !this.isCardModalActive;
    },
    truncate(string) {
      return string.substring(0, 200) + '...';
    }
  }
}
</script>

<style scoped>

.modal-background{
  background-color: dark-grey;
  width: 100vw;
  height: 100vh;
  position: fixed;
  top: 0;
  left: 0;
  z-index: 9999;
  display: flex;
  justify-content: center;
  align-items: center;

}

.article-card {
  background-color: white;
  width: 80vw;
  height: 95vh;
  padding: 1em;
  display: flex;
  border: 4px solid black;
}

.article-img {
  width: 100%;
  height: auto;
}

.article-content {
  width: 70%;
  overflow: scroll;
}

.article-sidebar {
  width: 30%;
  height: 100%;
  padding: 1em;
  display: flex;
  flex-direction: column;
}

.sidebar-box {
  width: 100%;
  margin-bottom: 2em;
  display: flex;
  flex-direction: column;
}

.social {
  display: flex;
}

@media only screen and (max-width: 768px) {
  .article-card {
    flex-direction: column;
    width: 100%;
    overflow-y: scroll;
  }
  .article-content {
    width: 100%;
  }
  .article-sidebar {
    display: flex;
    justify-content: space-around;
    align-items: flex-end;
    flex-direction: column;
    width: 100%;
    overflow-y: scroll;
  }
  .social {
    display: flex;
    justify-content: space-around;
    margin-top: 1em;
  }
  .social img {
    width: 30px;
    height: 30px;
  }
}

h1 {
  font-size: 2em;
}
</style>
