<template>
<div class="section">
  <!-- <b-table :data="data" :columns="columns"></b-table> -->
  <table class="table">
    <thead>
      <tr>
        <th>
          Rubrik
        </th>
        <th>
          Body
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
      <ArticleRow :availableTags="availableTags" v-for="(article, i) in data" :key="i" v-bind="article" />
    </tbody>
  </table>
  <EditableArticleModal :availableTags="availableTags" />
</div>
</template>

<script>
export default {
  data() {
    return {
      availableTags: [],
      data: [],
      columns: [{
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
        }
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
  }
}
</script>

<style>

</style>
