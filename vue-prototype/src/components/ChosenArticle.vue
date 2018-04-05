<template>
<section class="section">
  <div class="columns">
    <div class="column is-one-fifth">
      <div class="role-parent">
        <p class="role-mini">
          {{trimRole}}
        </p>
      </div>
    </div>
    <div class="column">
      <div class="search-box ">
        <b-field>
          <b-taginput @remove="test($event)" v-model="tags" icon="label" placeholder="Jag är politiker och söker ....">
          </b-taginput>
        </b-field>
      </div>
      <div class="chosen-tags">
        <a @click="addToTags(i)" v-for="(tag, i) in availableTags" class="button is-primary is-outlined">{{tag}}</a>
      </div>
    </div>
</div>

  <div class="articles">
    <div class="is-4" v-for="article in articles">

        <div class="card">
          <div class="card-image">
          </div>
          <div class="card-content">
            <div class="media">
              <h1><b>Alberto</b></h1>
            </div>

            <div class="content">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec iaculis mauris. <a>@bulmaio</a>.
              <a href="#">#css</a> <a href="#">#responsive</a>
              <br>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</template>

<script>
export default {
  name: 'ChosenArticle',
  data() {
    return {
      tags: [],
      availableTags: [
        'ställa ut',
        'konst',
        'vad är konst?',
        'hur är konst?',
        'var är konst?',
        'var är det offentliga rummet?',
        'var är konst?',
        'var är det offentliga rummet?',
        'var är konst?',
        'var är det offentliga rummet?'
      ],
      articles: [{
          title: 'Header',
          body:'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
        },
        {
          title: 'Header',
          body: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
        },
        {
          title: 'Header',
          body: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
        },
        {
          title: 'Header',
          body: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
        },
        {
          title: 'Header',
          body: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
        },
        {
          title: 'Header',
          body: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
        }
      ]
    }
  },
  methods: {
    addToTags(index) {
      console.log(this.availableTags[index], index);
      const tag = this.availableTags.splice(index, 1)[0];
      this.tags.push(tag);
    },
    test($event) {
      console.log($event)
      this.tags = this.tags.filter(tag => tag !== $event);
      this.availableTags.push($event);
    }
  },
  computed: {
    trimRole(){
      return this.$route.params.role.charAt(0).toUpperCase();
    }
  }

}
</script>
<style scoped>
p {
  text-align: center;

  width: 10%;
}

.columns {
  padding: 0rem 8rem;

}
.articles {
  display: flex;
  flex-wrap: wrap;
  padding: 0rem 8rem;
}

.column {
  display: flex;
  flex-direction: column;
}

.is-4 {
  width: 49%;
  margin-bottom: 2%;
}

.is-4:nth-child(odd) {
  margin-right: 1%;
}

.is-4:nth-child(even) {
  margin-left: 1%;
}

.chosen-tags {
  display: flex;
  justify-content: flex-start;
  flex-wrap: wrap;
}

.role-parent {
  display: flex;
  justify-content: space-between;
  height: 100%;
  width: 100%
}

.role-mini {
  display: flex;
  height: 100%;
  width: 100%;
  align-items: center;
  justify-content: center;
  background-color: #44a8ff;
  color: white;
  font-size: 72px;
  font-weight: 800;
}

.button {
  margin: 5px;
}
</style>
