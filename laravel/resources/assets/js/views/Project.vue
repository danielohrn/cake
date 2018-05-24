<template>
  <section class="section">

    <button @click="show">show project object (debugging)</button>
    <div v-if="debug">{{PROJECT_TO_EDIT}}</div>

    <h1>
      {{PROJECT_TO_EDIT.name}}
    </h1>
    <small>
      This project is in status: {{PROJECT_TO_EDIT.status}}
    </small>
    <h2>
      {{PROJECT_TO_EDIT.title}}
    </h2>
    <p>
      {{PROJECT_TO_EDIT.content}}
    </p>

  </section>
</template>


<script>
import {mapState} from 'vuex';

  export default {
    computed: mapState(['PROJECT_TO_EDIT']),

    data(){
      return {
        debug: false,

      }
    },

    methods: {
      show(){
        this.debug = !this.debug;
      }
    }

  }
</script>

<style>

</style>
