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

</div>
</template>

<script>
export default {
  data() {
      return {
            availableTags: [],
            status: [
                    {name: 'content'},
                    {name: 'redaktör'},
                    {name: 'faktagranskning'},
                    {name: 'publicera'}
                ], 
            data: [
                {name: 'Project one', title: 'Title project one', content: 'Content project one' ,slug: 'project-one', id: 1, status: 'content'},
                {name: 'Project two', title: 'Title project two', content: 'Content project two' ,slug: 'project-two', id: 2, status: 'redaktör'},
                {name: 'Project three', title: 'Title project three', content: 'Content project three' ,slug: 'project-three', id: 2, status: 'publicera'}, 
                {name: 'Project four', title: 'Title project four', content: 'Content project four' ,slug: 'project-four', id: 1, status: 'content'},
            ],
        }
    },

    methods: {
         getProjects(){
             axios.get('/api/projects')
                 .then(res => {
                     this.data = res.data;
                 })
         },
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
    this.getProjects();

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
