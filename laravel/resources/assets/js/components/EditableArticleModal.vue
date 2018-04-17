<template>
  <modal v-if="this.isModalOpen">
            
        <div class="article-content">
            <input class="input" type="text" :value="title"/>
            <textarea class="textarea is-primary" cols="30" rows="20">{{body}}</textarea>
            <button class="button is-primary">Spara</button>
        </div>
        <div class="article-sidebar">
            <b-field label="Taggar">
                <b-taginput
                    maxlength="10"
                    :value="articleTags">
                </b-taginput>
            </b-field>
            <div class="tags">
                <h3 class="title is-4">Lägg till taggar</h3>
                <a v-for="(tag, i) in availableTags" :key="i" class="button is-outlined is-primary">{{tag.name}}</a>
            </div>
        </div>

    </modal>
</template>

<script>

export default {
  props: ['title', 'body', 'articleTags', 'author', 'availableTags'], 
  data(){
      return {
          isModalOpen: true
      }
  },
  mounted(){

  }
}
</script>

<style scoped>
.tags a {
    display: block; 
    width: 100%; 
    margin: .3em 0; 
}

.article-content input, button {
    margin: .2em 0; 
}
</style>


