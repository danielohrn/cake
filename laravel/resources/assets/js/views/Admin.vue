<template>
<div class="section">
  <Sidebar></Sidebar>
  <div class='body'>
  <div class='tiles'>
    <ProjectTile v-for="(status, i) in status" :status="status" :key="i">

      <ProjectCard v-for="(project) in data" v-if="project.role_id === status.id" :key="project.name" :project="project" />

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
      data: [],
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
        .then( res => {
          console.log(res.data); 
          this.data = res.data} )
      }
  },
  mounted() {
    this.getRoles()
    this.getProjects()
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
  padding: 0em 1em 0em 3em;
}
.tiles {
  display: flex;
  width: 100%;
}

</style>
