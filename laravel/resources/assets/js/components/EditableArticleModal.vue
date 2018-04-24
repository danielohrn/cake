<template>
  <modal v-if="this.isModalOpen">
            
        <div class="article-content">
            <h3 class="title is-4">Skapa/ändra inlägg</h3>
            <input class="input" type="text" v-model="article.title" placeholder="Skapa rubrik.."/>
            <textarea class="textarea is-primary" cols="30" rows="20" v-model="article.body" placeholder="Skriv text.."></textarea>
            <button @click="updateArticle" class="button is-primary">Spara</button>
        </div>
        <div class="article-sidebar">
            <b-field label="Taggar">
                <b-taginput
                    maxlength="10"
                    :value="article.tags">
                </b-taginput>
            </b-field>
            <div class="tags">
                <h3 class="title is-6">Lägg till taggar</h3>
                <a v-for="(tag, i) in availableTags" :key="i" class="button is-outlined is-primary">{{tag.name}}</a>
            </div>
        </div>

    </modal>
</template>

<script>
import {mapState} from 'vuex';
export default {
  props: ['availableTags'], 
  computed: mapState(['chosenArticle']), 
  data(){
      return {
          isModalOpen: true,
          article: {}, 
      }
  },
  methods: {
      copyStore(){
          this.article = this.chosenArticle;
      },
      updateArticle(){
          axios.patch('/api/articles', this.article)
          .then(response => console.log(response.data))
      },
      consoleLog(){
          console.log(this.availableTags)
      }
  },
  mounted(){
      this.copyStore()
      this.consoleLog()
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


