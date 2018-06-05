<template>
    <div v-if="newProjectModal" class="modal-background">
        <div class="modal-card">
        <div class="article-content">
            <h3 class="title is-4">Skicka in en idé</h3>
            <form @submit.prevent="newArticle">
                <input required v-model="article.title" class="input" type="text" placeholder="Skapa rubrik..." />
                <textarea required v-model="article.body" class="textarea" cols="30" rows="20" placeholder="Skriv text..."></textarea>
                <button type="submit" class="button">Skicka</button>
            </form>
        </div>
        </div>
        <button class="button close"  @click="closeModal">Stäng</button>
    </div>
    
</template>

<script>

export default {
    props: ['newProjectModal'], 

    data() {
        return {
            article: {
                title: null,
                body: null,
            } 
        }
    }, 

    methods: {
        newArticle() {
            console.log(this.article); 
            axios.post('/api/projects', this.article)
             .then(res => this.closeModal())
             .catch(err => console.log(err)); 
        },
        closeModal(){
            this.$emit('closeProject', false)
            console.log('clicked')
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

.article-content {
    width: 100%; 
}

.article-content input, button {
    margin: .2em 0;
}
</style>

