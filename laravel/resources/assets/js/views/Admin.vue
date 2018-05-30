<template>
<div class="section">
  <Sidebar></Sidebar>
  <div class='body'>
  <div class='tiles'>
    <ProjectTile v-for="(status, i) in status" :status="status" :key="i">

      <ProjectCard v-for="(project) in data" v-if="project.status === status.name" :key="project.name" :project="project" />

    </ProjectTile>
  </div>
</div>


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
      status: [],
      data: [{
          name: 'Project one',
          title: 'Title project one',
          content: 'Content project one',
          slug: 'project-one',
          id: 1,
          status: 'content'
        },
        {
          name: 'Project two',
          title: 'Title project two',
          content: 'Content project two',
          slug: 'project-two',
          id: 2,
          status: 'redaktör'
        },
        {
          name: 'Project three',
          title: 'Title project three',
          content: 'Content project three',
          slug: 'project-three',
          id: 2,
          status: 'publicera'
        },
        {
          name: 'Project four',
          title: 'Title project four',
          content: 'Content project four',
          slug: 'project-four',
          id: 1,
          status: 'content'
        },
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
      getRoles(){
        axios.get('/api/roles')
        .then( res => this.status = res.data)
        .catch( err => console.log(err))
      }
  },
  mounted() {
    this.getArticles();
    this.getTags();
    this.getRoles()
  }
}
</script>

<style scoped>
.section {
  position: relative;
  width: 100%;
  height: 100vh;
  display: flex;
  flex-direction: row;
  padding: 0;
}
.body {
  position: absolute;
  width: 100%;
  z-index: 2;
  padding: 2em;
}
.tiles {
  display: flex;
  width: 100%;
}

</style>
