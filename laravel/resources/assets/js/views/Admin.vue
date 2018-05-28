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
    
        <ProjectTile v-for="(status, i) in status" :status="status" :key="i">
            
            <ProjectCard 
                v-for="(project) in data" 
                v-if="project.status === status.name" 
                :key="project.name"
                :project="project"
            />

        </ProjectTile>


    <!-- <EditableArticleModal
        type="editArticleModal"
        :availableTags="availableTags" />

    <NewArticleModal
        @update-articles="updateArticles($event)"
        :availableTags="availableTags"
        type="newArticleModal"/> -->

</div>
</template>

<script>
export default {
  data() {
      return {
            availableTags: [],
            status: [
                    {name: 'Idé'},
                    {name: 'Faktainsamling'},
                    {name: 'Bearbetning'},
                    {name: 'Faktakontroll'},
                    {name: 'Publicera'}
                ], 
            data: [
                {name: 'Project one', title: 'Title project one', content: 'Content project one' ,slug: 'project-one', id: 1, status: 'Idé'},
                {name: 'Project two', title: 'Title project two', content: 'Content project two' ,slug: 'project-two', id: 2, status: 'Idé'},
                {name: 'Project three', title: 'Title project three', content: 'Content project three' ,slug: 'project-three', id: 2, status: 'Faktainsamling'}, 
                {name: 'Project four', title: 'Title project four', content: 'Content project four' ,slug: 'project-four', id: 1, status: 'Bearbetning'},
                {name: 'Project five', title: 'Title project five', content: 'Content project five' ,slug: 'project-five', id: 1, status: 'Faktakontroll'},
                {name: 'Project six', title: 'Title project six', content: 'Content project six' ,slug: 'project-six', id: 1, status: 'Faktakontroll'},
                {name: 'Project seven', title: 'Title project seven', content: 'Content project seven' ,slug: 'project-seven', id: 1, status: 'Publicera'},
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
    width: 40%;
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
