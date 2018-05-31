<template>
<section @click="toggle" class="section modal-container">
  <div>
    <span @click.stop="closeModal" class="modal--close">
                <b >&#x2715;</b>
            </span>
  </div>
  <div class="modal-content">
    <div class='modal-menu'>
      <div>
        <span><b>Project title:</b> {{JSON.stringify(project.title)}}</span>
        <span><b>Project status:</b> {{JSON.stringify(project.status)}}</span>
      </div>
      <div>
        <button class="btn-redirect" @click="redirectToProjectPage">
            Öppna projekt i egen sida
        </button>
      </div>
    </div>
    <div class="column">
      <div class="column-left">
        <input placeholder="Rubrik"></input>
        <div id="app">
          <vue-editor v-model="content"></vue-editor>
          <div class='image-input'>
            <label>Lägg till bild:
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
        </label>
      </div>
    <div class='video-input'>
        <label>Lägg till video:
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
        </label>
      </div>
        </div>
        <div class='checkbox-parent'>
        <label class="checkbox">
  <input type="checkbox">
  Idé
</label>
<label class="checkbox">
<input type="checkbox">
Faktainsamling
</label>
<label class="checkbox">
<input type="checkbox">
Bearbetning
</label>
<label class="checkbox">
<input type="checkbox">
Faktakontroll
</label>
<label class="checkbox">
<input type="checkbox">
Publicera
</label>
</div>
      </div>
      <div class="column-right">
        <h2>Noteringar</h2>
        <textarea placeholder="Skriv noteringar här"></textarea>
      </div>
    </div>
    <button @click="setNewStatus">Gå vidare</button>
  </div>
</section>
</template>

<script>
  import {
    mapState
  }  from 'vuex';

  export default {
    props: ['project','status'],
    computed: mapState(['SET_PROJECT_TO_EDIT']),
    data() {
      return {
        open: false
      }
    },
    methods: {
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
      getNextStatus() {
          let index; 
          for(let i = 0; i < this.status.length; i++) {
              if(this.status[i].name === this.project.role.name) {
                  index = (i + 1);
              }
          }
          return index; 
      }, 
      setNewStatus() {
          const nextStatus = this.getNextStatus(); 
          this.project.role = Object.assign({}, this.status[nextStatus]); 

          this.postUpdatedProject(); 
      },
      postUpdatedProject(){
        const project_id = this.project.id, 
              next_role_id = this.project.role.id; 

        axios.patch(`api/roles/${project_id}`,{role_id: next_role_id})
         .then(res => console.log(res))
         .catch(err => console.log(err));  
      }
    }

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

  .content-left {}

  button {
    font-size: 15px;
    border-radius: 5px;
    height: 30px;
    margin-left: 1em;
  }

  .modal-menu {
    display: flex;
    justify-content: space-between;
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
  .checkbox-parent {
    display: flex;
    justify-content: flex-start;
    justify-content: space-around;
    margin-bottom: 5em;
    margin-top: 1em;
  }
</style>
