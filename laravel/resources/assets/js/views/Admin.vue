<template>
<div class="section">
  <Sidebar></Sidebar>
  <div class='body'>
  <div class='tiles'>
    <ProjectTile v-for="(status, i) in status" :status="status" :key="i">

<<<<<<< HEAD
      <ProjectCard v-for="(project) in data" v-if="project.role_id === status.id" :key="project.name" :project="project" />
=======
      <ProjectCard
        v-for="(project) in data"
        v-if="project.status === status.name"
        :key="project.name"
        :project="project" />
>>>>>>> MASTER-project-dashboard

    </ProjectTile>
  </div>
</div>

</div>
</template>

<script>
export default {
  data() {
    return {
      availableTags: [],
      status: [],
<<<<<<< HEAD
      data: [],
=======
      data: [{
          name: 'Project one',
          title: 'Title project one',
          content: 'Content project one',
          slug: 'project-one',
          id: 1,
          status: 'beställare'
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
>>>>>>> MASTER-project-dashboard
    }
  },

  methods: {
      getRoles(){
        axios.get('/api/roles')
        .then( res => this.status = res.data)
        .catch( err => console.log(err))
      },
      getProjects(){
        axios.get('api/projects')
        .then( res => this.data = res.data )
      }
  },
  mounted() {
    this.getRoles()
    this.getProjects()
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
