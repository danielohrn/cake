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

    <NewArticleModal type="newArticleModal"/>
    <button @click="openNewArticleModal" :availableTags="availableTags" class="button is-primary">Skapa ny artikel</button>
</div>
</template>

<script>
export default {
  data() {
      return {
            availableTags: [],
            data: [],
            columns: [
                {
                    field: 'title',
                    label: 'Rubrik',
                },
                {
                    field: 'body',
                    label: 'Content',
                },
                {
                    field: 'created_at',
                    label: 'Date',
                    centered: true
                },
                {
                    field: 'author',
                    label: 'Author',
                },
                {
                    field: 'articleTags',
                    label: 'Tags'
                }
            ]
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
          console.log(response)
          this.availableTags = response.data;
        })
    }
  },
  mounted() {
    this.getArticles();
    this.getTags();
    axios.post('/api/article')
     .then(res => {
         if(res.status === 200) {
             console.log('post to /article works')
             return; 
         }

         console.log('it does not work')
     }); 
  }
}
</script>

<style>


</style>
