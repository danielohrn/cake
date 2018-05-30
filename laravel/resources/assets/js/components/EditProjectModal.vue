<template>
    <section @click="toggle" class="section modal-container">
        <div class="modal-content">
          <div class='modal-menu'>
          <div>
            <span><b>Project title:</b> {{JSON.stringify(project.title)}}</span>
            <span><b>Project title:</b> {{JSON.stringify(project.status)}}</span>
          </div>
            <div>
            <button class="btn-redirect" @click="redirectToProjectPage">
                Öppna projekt i egen sida
            </button>
          </div>
        </div>
            <div class="column">
                <div class="column-left">
                    <input placeholder="Rubrik"></input>
                    <div class="content-left">
                    <textarea placeholder="Skriv inläggstext här">{{JSON.stringify(project.content)}}</textarea>
                </div>
                </div>
                <div class="column-right">
                    <h2>Noteringar</h2>
                    <textarea placeholder="Skriv noteringar här"></textarea>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import {mapState} from 'vuex';

export default {
  props: ['project'],
  computed: mapState(['SET_PROJECT_TO_EDIT']),
  data(){
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
        height:  100vh;
        background: #ffffff80;
        color: black;
        z-index: 999;
    }

    .modal-content {
        padding: 1em;
        background: white;
        color: black;
        width: 90%;
        height: 100%;
        position: relative;
        border: .5px solid lightgray;
        border-radius: 3px;
    }

    .column {
        display: flex;
        height: 90%;
    }
    input {
        font-size: 20px;
        margin-top: 1em;
    }
    textarea {
      resize: none;
      width: 95%;
      height: 400px;
      margin-top: 1em;
      padding: 1em;
    }
    .column-left{
        flex: 2;
    }
    .column-right{
        flex: 1;
        border-left: 1px solid black;
        padding-left: 2em;
    }
    .content-left {

    }
    button {
      font-size: 15px;
      border-radius: 5px;
      height: 30px;
      margin-left: 1em;
    }
    .modal-menu {
      display: flex;
      justify-content: space-between;
      padding: 0 1em 0 1em;
    }

</style>
