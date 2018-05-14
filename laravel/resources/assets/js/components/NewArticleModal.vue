<template>
  <modal v-if="newArticleModal" type="newArticleModal">
        <div class="article-content">
            <h3 class="title is-4">Skapa/ändra inlägg</h3>
            <input v-model="article.title" class="input" type="text" placeholder="Skapa rubrik..." />
            <textarea v-model="article.body" class="textarea" cols="30" rows="20" placeholder="Skriv text..."></textarea>
            <button @click="newArticle" class="button">Spara</button>
        </div>
        <div class="article-sidebar">
            <b-field label="Taggar">
                <b-taginput
                    maxlength="10"
                    :value="article.tags">
                </b-taginput>
            </b-field>
            <div class="tags">
                <h3 class="title is-4">Lägg till taggar</h3>
                <a @click="addToTags(i)" v-for="(tag, i) in availableTags" :key="i" class="button is-outlined">{{tag.name}}</a>
            </div>
        </div>
  </modal>
</template>

<script>
import { mapState } from 'vuex';

export default {
    props: ['tags', 'availableTags'], 
    computed: mapState(['newArticleModal']), 

    data() {
        return {
            article: {
                title: null,
                body: null,
                tags: []
            } 
        }
    }, 

    methods: {
        newArticle() {
            console.log(this.article); 
            axios.post('/api/article', this.article)
             .then(res => console.log(res))
             .catch(err => console.log(err))
        }, 

        addToTags(index){
            const tag = this.availableTags.splice(index, 1)[0];
            this.article.tags.push(tag.name);
        }, 

        
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

