<template>
<div class="section">
<<<<<<< HEAD
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
=======
  <Sidebar></Sidebar>
  <div class='body'>

      <button class='menuBtn' v-on:click='sideBarToggle'>Menu</button>

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
>>>>>>> 91daaa05ad2dae964e5127676a6650f11eebc2af

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
        sideBarToggle() {
            document.getElementById('sidebar').style.left = '0%';
        }
    },

    mounted() {
        this.getProjects();
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

.menuBtn {
  position: relative;
  left: 17em;
  padding: 0.5em;
  margin-bottom: 2em;
  background-color: #000;
  color: white;
  border-radius: 5px;
  outline: none;
  top: 30px;
  z-index: 2;
  cursor: pointer;
}
</style>
