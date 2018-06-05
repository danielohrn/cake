<template>
    <div v-if="newProjectModal" class="modal-background">
        <div class="modal-card">
        <div class="article-content">
            <h3 class="title is-4">Skapa/ändra inlägg</h3>
            <form @submit.prevent="newArticle">
                <input required v-model="article.title" class="input" type="text" placeholder="Skapa rubrik..." />
                <textarea required v-model="article.body" class="textarea" cols="30" rows="20" placeholder="Skriv text..."></textarea>
                <button type="submit" class="button">Spara</button>
            </form>
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
            </div>
        <button class="button close"  @click="closeModal">Stäng</button>
    </div>
  
</template>

<script>

export default {
    props: ['tags', 'availableTags', 'newProjectModal'], 

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
            // Post the new article to the db 
            axios.post('/api/article', this.article)
             .then(res => {
                // If POST was OK
                if(res.status === 200) {
                    // Clear the local article object when saving 
                    this.article.title = null; 
                    this.article.body = null; 
                    this.article.tags.length = 0;
    
                    /* Emit event to parent component
                       and fetch the new article */ 
                    const articleId = res.data.id; 
                    this.$emit('update-articles', articleId); 
    
                    // Close modal on save 
                    this.$store.commit(
                        'toggleModal', 
                        {modalType: 'newArticleModal', action: false}
                    ); 
                } 
             });
        },
        closeModal(){
            this.$emit('closeProject', false)
            console.log('clicked')
      },
  

        addToTags(index){
            const tag = this.availableTags.splice(index, 1)[0];
            this.article.tags.push(tag.name);
        }, 
        
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

.tags a {
    display: block;
    width: 100%;
    margin: .3em 0;
}

.article-content input, button {
    margin: .2em 0;
}
</style>

