<template>
    <div v-if="modalOpen" class="modal-background">
        <div class="modal-card">
            <slot></slot>
        </div>
        <button class="button close" @click.stop="closeModal">Stäng</button>
    </div>
</template>

<script>
import {
  mapState
} from 'vuex'; 

export default {
  data(){
      return {

      }
  }, 

  computed: mapState(['modalOpen']), 

  methods: {
        closeModal(){
          this.$store.commit('toggleModal', {action: false}); 
      }
  }, 

  mounted(){
      console.log(this.modalOpen)
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

.modal-card{
  background-color: white;
  width: 80vw;
  height: 95vh;
  padding: 1em;
  display: flex;
  flex-direction: row; 
}

button.close {
    position: fixed; 
    top: 10px;
    right: 10px; 
}

</style>


