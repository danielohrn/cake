<template>
  <section class="section">
    <div class="">
      <p class="">
        {{this.$route.params.role}}
      </p>
    </div>
  </section>
</template>

<script>
  export default {
    name: 'ChosenArticle',
    data() {
      return {

      }
    }

  }
</script>
<style scoped>
  p {
    text-align: center;
    border: 1px solid blue;
    width: 10%;
  }
</style>
