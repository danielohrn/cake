<template>
    <section @click="toggle" class="section modal-container">
        <div class="modal-content">
            <button class="btn-redirect" @click="redirectToProjectPage">
                Öppna projekt i egen sida
            </button>
            {{JSON.stringify(project)}}
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
        margin: 1em auto; 
        width: 75%; 
        position: relative;
    } 

</style>
