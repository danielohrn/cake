<template>
<section @click="toggle" class="section modal-container">
  <div>
    <span @click.stop="closeModal" class="modal--close">
                <b class='closeBtn'>&times;</b>
            </span>
  </div>
  <div class="modal-content">
    <div class="column">
      <div class="column-left">
        <h2>Redigera Projektet</h2>
        <input v-model="project.title" placeholder="Rubrik"/>

        <!-- Project tags -->
        <div class="project-tags">
            Taggar:
          <span
            v-for="(tag, index) in project.tags"
            @click="removeFromTags(tag)"
            :key="tag.name">

            {{tag.name}},
          </span>
        </div>

        <div id="app">
          <vue-editor v-model="project.body"></vue-editor>
          <div class='image-input'>
            <div class='heading'>
              <img src='/img/img.png' width='20' height='20' />
              <h6>Lägg till video:</h6>
            </div>
            <div class="media file has-name is-fullwidth">
            <label class="file-label">
            <input class="file-input" type="file" name="resume">
      <span class="file-cta">
        <span class="file-icon">
          <i class="fas fa-upload"></i>
        </span>
        <span class="file-label">
          Choose a file…
        </span>
      </span>
      <span class="file-name">
        Screen Shot 2017-07-29 at 15.54.25.png
      </span>
    </label>
          </div>
      </div>
    <div class='video-input'>
      <div class='heading'>
        <img src='/img/video.png' width='20' height='20' />
        <h6>Lägg till video:</h6>
      </div>
          <div class="media file has-name is-fullwidth">
            <label class="file-label">
      <input class="file-input" type="file" name="resume">
      <span class="file-cta">
        <span class="file-icon">
          <i class="fas fa-upload"></i>
        </span>
        <span class="file-label">
          Choose a file…
        </span>
      </span>
      <span class="file-name">
        Screen Shot 2017-07-29 at 15.54.25.png
      </span>
    </label>
          </div>
      </div>
        </div>
        <div class='tag-group'>
          <div class='tag-heading heading'>
            <img src='/img/tag.png' width='20' height='20' />
          <h6 class='tag-h6'>Lägg till taggar:</h6>
        </div>
        <div class='tags'>

          <ul> <!-- ALL TAGS -->
            <li v-for="(tag, index) in tags"
                v-if="tagNotSelected(tag.name)"
                :key="tag.name"
                @click="addToTags(index)">

              {{tag.name}}
            </li>
          </ul>

        </div>
        </div>
        <div class='btn-group'>
          <button @click="setNewStatus(-1)" class="btn-redirect button is-info is-outlined">
              Flytta till bakåt ett steg
          </button>
          <button  @click="updateProject" class="btn-redirect button is-success is-outlined">
              Spara Utkast
          </button>
          <button @click="setNewStatus(1)" class="btn-redirect button is-info is-outlined">
              Flytta framåt ett steg
          </button>
</div>
      </div>
      <div class="column-right">
        <h2>Noteringar</h2>
        <textarea placeholder="Skriv noteringar här"></textarea>
      </div>
    </div>
  </div>
</section>
</template>

<script>
  import {
    mapState
  }  from 'vuex';

  export default {
    props: ['project','status', 'tags'],
    computed: mapState(['SET_PROJECT_TO_EDIT']),
    data() {
      return {
        open: false,
        availableTags: [],
        project: project
      }
    },
    methods: {
      tagNotSelected(tag){
        for(let i = 0; i < this.project.tags.length; i++) {
          if(this.project.tags[i].name == tag) {
            return false;
          }
        }
        return true;
      },
      toggle() {
        this.open = !this.open;
      },
      closeModal() {
        this.$emit('CLOSE_MODAL');
      },
      redirectToProjectPage() {
        this.$store.commit('SET_PROJECT_TO_EDIT', this.project);
        this.$router.push("/project/" + this.project.slug);
      },
      getNextStatus(direction) {
          let index;
            console.log(this.status, 'status');
          for(let i = 0; i < this.status.length; i++) {
              if(this.status[i].name === this.project.role.name) {
                  index = (i + direction);
              }
          }
          return index;
      },
      setNewStatus(direction) {
          const nextStatus = this.getNextStatus(direction);

          // return if at index 0
          if(nextStatus < 0) return;

          this.project.role = Object.assign({}, this.status[nextStatus]);
          this.postUpdatedProject();
      },
      postUpdatedProject(){
        const project_id = this.project.id,
              next_role_id = this.project.role.id;

        axios.patch(`api/roles/${project_id}`,{role_id: next_role_id})
         .then(res => {
           this.$emit('UPDATE_PROJECT', this.project.id);
         })
         .catch(err => console.log(err));
      },
      addToTags(index) {
        const newProject = {...this.project};
        newProject.tags.push(this.tags[index]);

        this.project = newProject;
      },
      removeFromTags(tagToRemove) {

        const newProject = {...this.project};
        const newTags = newProject.tags.filter(projectTag => {
          return projectTag.id !== tagToRemove.id
        });
        newProject.tags = newTags;

        this.project = newProject;
      },

      updateProject(){
        axios.patch('/api/projects/' + this.project.id, this.project)
        .then(res => console.log(res))
        .catch(err => console.log(err))
      }


    },
    mounted() {}
  }
</script>

<style scoped>
  section.modal-container {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100%;
    background: #ffffff80;
    color: black;
    z-index: 999;
  }

  .modal-content {
    padding: 1em;
    background: white;
    color: black;
    width: 90%;
    height: 100%;
    position: relative;
    border: .5px solid lightgray;
    border-radius: 3px;
  }

  .column {
    display: flex;
    height: 90%;
  }

  input {
    font-size: 20px;
    margin-top: 1em;
  }

  textarea {
    resize: none;
    width: 95%;
    height: 285px;
    margin-top: 1.5em;
    padding: 1em;
    font-size: 15px;
  }

  .column-left {
    flex: 2;
    margin-right: 1em;
    padding: 1em;
  }

  input {
    margin-bottom: 1em;
  }

  .column-right {
    flex: 1;
    padding: 1em;
    border-left: 1px solid black;
    padding-left: 2em;
  }

  .modal-menu {
    display: flex;
    justify-content: center;
    padding: 0 1em 0 1em;
  }

  .modal--close {
    position: fixed;
    right: 20px;
    top: 10px;
    font-size: 30px;
    cursor: pointer;
  }

  .image-input,
  .video-input {
    margin-top: 1em;
  }
  .btn-group {
    display: flex;
    justify-content: flex-start;
    justify-content: space-around;
    margin-bottom: 5em;
    margin-top: 2em;
  }
  .heading {
    display: flex;
    align-items: center;
  }
  .tag-heading {
    margin-top: 1em;
  }
  h6 {
    margin: 1em 0 0.5em 0;
    color: black;
    margin-left: 1em;
  }
  .tags {
    padding: 0.5em;
    border: 1px solid lightgrey;
  }
  .closeBtn {
      cursor: pointer;
      font-size: 40px;
      font-weight: bold;
  }
  .closeBtn:hover {
    opacity: 0.7;
  }

  .project-tags {
    display: flex;
    flex-wrap: wrap;
    margin-bottom: 1em;
  }
  .project-tags h6 {
    margin: 0;
    align-self: center;
    text-transform: uppercase;
    font-size: 0.7em;
    letter-spacing: 2px;
  }
  .project-tags span {
    background-color: lightgrey;
    border-radius: 5px;
    margin: 0.3em;
    padding: 0.2em;
    font-size: 0.7em;
  }
</style>
