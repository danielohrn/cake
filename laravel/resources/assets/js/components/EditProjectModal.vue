<template>
<section @click="toggle" class="section modal-container">
  <div class="modal-content">
    <div class='menuParent'>
      <div class='menu'>
        <!-- <h3>{{JSON.stringify(project.name)}}</h3> -->
          <div>
            <h2><b>Title:</b></h2>
            <h5>{{JSON.stringify(project.title)}}</h5>
          </div>
          <div>
            <h2><b>Status:</b></h2>
            <h5>{{JSON.stringify(project.status)}}</h5>
          </div>
      </div>
        <button class="btn-redirect" @click="redirectToProjectPage">
              Öppna projekt i egen sida
          </button>
    </div>

    <div class='main-content'>
      <!-- {{JSON.stringify(project)}} -->
      <textarea>{{JSON.stringify(project.content)}}</textarea>

      <div class='edit-btns'>
        <button class='edit-btn'>Edit</button>
        <button class='edit-btn'>Edit</button>
        <button class='edit-btn'>Edit</button>
        <button class='edit-btn'>Edit</button>
        <button class='edit-btn'>Edit</button>
      </div>
    </div>
    <div class='addImg'>
      <h4>Lägg till bild:</h4>
      <div class="file has-name is-left">
        <label class="file-label">
    <input class="file-input" type="file" name="resume">
    <span class="file-cta">
      <span class="file-icon">
        <i class="fas fa-upload"></i>
      </span>
      <span class="file-label">
        Choose a file…
      </span>
    </span>
    <span class="file-name">
      Screen Shot 2017-07-29 at 15.54.25.png
    </span>
  </label>
      </div>
    </div>
    <div class='saveBtn'>
      <button>Spara</button>
    </div>
  </div>
</section>
</template>

<script>
import {
  mapState
}  from 'vuex';

export default {
  props: ['project'],
  computed: mapState(['SET_PROJECT_TO_EDIT']),
  data() {
    return {
      open: false
    }
  },
  methods: {
    toggle() {
      this.open = !this.open;
    },
    redirectToProjectPage() {
      this.$store.commit('SET_PROJECT_TO_EDIT', this.project);
      this.$router.push("/project/" + this.project.slug);
    }
  }

}
</script>

<style scoped>
section.modal-container {
  position: fixed;
  top: 0;
  left: 0;
  width: 100vw;
  height: 100vh;
  background: #ffffff80;
  color: black;
  z-index: 9999;
}

.modal-content {
  padding: 1em;
  background: white;
  color: black;
  margin: 1em auto;
  width: 75%;
  height: 100%;
  position: relative;
}

.btn-redirect {
  width: 30%;
  background-color: #7856d5;
  color: white;
  font-weight: bold;
  font-size: 15px;
  border-radius: 5px;
  outline: none;
  margin: 1em;
  height: 50px;
}

.btn-redirect:hover {
  opacity: 0.9;
}

.main-content {
  display: flex;
  justify-content: space-around;
  margin: 1em;
}

.edit-btns {
  display: flex;
  flex-direction: column;

}

.edit-btn {
  width: 80px;
  background-color: #7856d5;
  color: white;
  padding: 0.3em;
  font-weight: bold;
  font-size: 15px;
  border-radius: 5px;
  margin-top: 0.5em;
  outline: none;
}

.edit-btn:hover {
  opacity: 0.9;
}

.menu {
  display: flex;
  flex-direction: row;
  padding: 1em;
  width: 100%;
}

.menu div {
  margin: 0 0em 0 1em;
}

.addImg {
  margin: 1em;
}

textarea {
  width: 80%;
  resize: none;
  margin: 0 0.5em 0 0;
}

.saveBtn {
  display: flex;
  justify-content: flex-end;
  align-items: flex-end;
}

.saveBtn button {
  width: 80px;
  background-color: #7856d5;
  color: white;
  padding: 0.3em;
  font-weight: bold;
  font-size: 15px;
  border-radius: 5px;
  margin-top: 0.5em;
  outline: none;
}

.menuParent {
  display: flex;
}
</style>
