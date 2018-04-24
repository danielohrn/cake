<template>
  <modal v-if="this.isModalOpen">
            
        <div class="article-content">
            <input class="input" type="text" v-model="chosenArticle.title"/>
            <textarea class="textarea is-primary" cols="30" rows="20" v-model="chosenArticle.body"></textarea>
            <button @click="updateArticle" class="button is-primary">Spara</button>
        </div>
        <div class="article-sidebar">
            <b-field label="Taggar">
                <b-taginput
                    @remove="filterTags($event)"
                    maxlength="10"
                    :value="chosenArticle.tags">
                </b-taginput>
            </b-field>
            <div class="tags">
                <h3 class="title is-4">Lägg till taggar</h3>
                <a @click="addToTags(i)" v-for="(tag, i) in filteredTags" :key="i" class="button is-outlined is-primary">{{tag.name}}</a>
            </div>
        </div>

    </modal>
</template>

<script>
import {mapState} from 'vuex';
import {filterOutTags} from '../functions'; 

export default {
  props: ['availableTags'], 
  computed: mapState(['chosenArticle', 'filteredTags']), 
  data(){
      return {
          isModalOpen: true,
          article: {}, 
      }
  },
  methods: {
      updateArticle(){
          axios.patch('/api/articles', this.chosenArticle)
          .then(response => console.log(response.data))
          
          // Closes modal after save 
          this.$store.commit('toggleModal', false); 
      },
      filterTags(as){
          console.log(as)
          const filteredTags = filterOutTags(this.chosenArticle, this.availableTags); 
          this.$store.commit('filterTags', filteredTags);   
      },
      addToTags(index){
          const tag = this.filteredTags.splice(index, 1)[0];
          this.chosenArticle.tags.push(tag.name);
      }
  },

  updated(){
  },

  mounted(){
      this.filteredTags = this.availableTags; 
      console.log('mounted')
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


