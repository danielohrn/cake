<template>
<div class="section">
    <div class="sidebar">
    <ul class="meny">

        <li>
            <a href="">Översikt</a>
        </li>
        <li>
            <a @click="openNewArticleModal"
               :availableTags="availableTags"> Skapa artikel</a>
        </li>
        <li>
            <a href="">Skapa tagg</a>
        </li>
        <li>
            <a href="">Skapa roll</a>
        </li>
    </ul>
</div>
    <table class="table">
        <thead>
            <tr>
                <th>Rubrik</th>
                <th>Date</th>
                <th>Author</th>
                <th></th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>

            <ArticleRow
                :availableTags="availableTags"
                v-for="(article, i) in data"
                :key="i"
                :article="article"/>

        </tbody>
    </table>

    <EditableArticleModal
        type="editArticleModal"
        :availableTags="availableTags" />

    <NewArticleModal
        @update-articles="updateArticles($event)"
        :availableTags="availableTags"
        type="newArticleModal"/>

</div>
</template>

<script>
export default {
  data() {
      return {
            availableTags: [],
            data: [
              {name: 'Project one', title: 'This is the title of project one', slug: 'project-one', id: 1},
              {name: 'Project two', title: 'This is the title of project two', slug: 'project-two', id: 2}
            ],
        }
    },

    methods: {
        // getArticles(){
        //     axios.get('/api/articles')
        //         .then(res => {
        //             this.data = res.data;
        //         })
        // },
        //
        // updateArticles(id){
        //     axios.get(`/api/articles/${id}`)
        //      .then(res => {
        //          const { data: article } = res;
        //          this.data.push(article);
        //      });
        // },
        //
        // getTags(){
        //     axios.get('api/tags')
        //     .then(response => {
        //         this.availableTags = response.data;
        //         this.$store.commit('setTags', response.data);
        //     })
        // },
        //
        // openNewArticleModal() {
        //     this.$store.commit(
        //         'toggleModal',
        //         {modalType: 'newArticleModal', action: true}
        //     );
        // },
        //
        // getTags() {
        // axios.get('api/tags')
        //     .then(response => {
        //     this.availableTags = response.data;
        //     })
        // }
  },
  mounted() {
    this.getArticles();
    this.getTags();
  }
}
</script>

<style>
.section{
    display: flex;
    flex-direction: row;
    padding: 0;
}
.sidebar, .sidebar a{
    width: 10%;
    height: 100vh;
    background-color: #aedfbf;
    color: #000;
}

.sidebar li{
    margin: 20% 10%;
    font-size: 1.2em;
}
.sidebar ul{
    margin-top: 41px;

}
.table{
    width: 90%;
}



</style>
