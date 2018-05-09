<template>
<div class="section">
    <table class="table">
        <thead>
            <tr>
              <th>

              </th>
                <th>
                    Rubrik
                </th>
                <th>
                    Date
                </th>
                <th>
                    Author
                </th>
                <th>
                    Tags
                </th>
            </tr>
        </thead>
        <tbody>
            <ArticleRow :availableTags="availableTags" v-for="(article, i) in data" :key="i" v-bind="article"/>
        </tbody>
    </table>
    <EditableArticleModal type="editArticleModal" :availableTags="availableTags" />

    <NewArticleModal :availableTags="availableTags" type="newArticleModal"/>
    <button @click="openNewArticleModal" :availableTags="availableTags" class="button is-primary">Skapa ny artikel +</button>
</div>
</template>

<script>
export default {
  data() {
      return {
            availableTags: [],
            data: [],
        }
    },

    methods: {
        getArticles(){
            axios.get('/api/articles')
                .then(res => {
                    this.data = res.data;
                })
        },
        getTags(){
            axios.get('api/tags')
            .then(response => {
                console.log(response)
                this.availableTags = response.data;
                this.$store.commit('setTags', response.data);
            })
        },

        openNewArticleModal() {
            this.$store.commit('toggleModal', {modalType: 'newArticleModal', action: true}); 
        }, 

        getTags() {
        axios.get('api/tags')
            .then(response => {
            this.availableTags = response.data;
            })
        }
  },
  mounted() {
    this.getArticles();
    this.getTags();
  }
}
</script>

<style>


</style>
