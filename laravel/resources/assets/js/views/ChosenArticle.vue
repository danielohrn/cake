<template>
<section class="section">
  <div class="columns margin-x">
    <div class="column">
      <overdrive v-bind:id="id">
        <div class="role-parent">
          <p class="role-mini">
            {{trimRole}}
          </p>
        </div>
      </overdrive>
    </div>
    <div class="column is-10">
      <div class="search-box margin-bottom">
        <b-field>
          <b-taginput @remove="removeTag($event)" v-model="tags" icon="label" v-bind:placeholder="`Jag är ${role} och söker...`">
          </b-taginput>
        </b-field>
      </div>
      <div class="chosen-tags">
        <a @click="addToTags(i)" v-for="(tag, i) in availableTags" class="button is-dark is-outlined is-size-7-mobile" :key="i">{{tag.name || tag }}</a>
      </div>
    </div>
  </div>
  <div class="columns flex-wrap margin-x" @click="isCardModalActive = true">
    <Articles v-for="(article, i) in filteredArticles" @click="toggleModal($event)" v-bind="article" :key="i"></Articles>

    <div v-if="!this.filteredArticles.length">Sökresultatet gav inga träffar, sök bättre.</div>
  </div>

</section>
</template>

<script>
import Articles from './Articles'
export default {
  name: 'ChosenArticle',
  data() {
    return {
      isCardModalActive: false,
      tags: [],
      availableTags: [],
      articles: [],
      filteredArticles: [],
      role: this.$store.state.userRole.name
    }
  },
  methods: {
    addToTags(index) {
      const tag = this.availableTags.splice(index, 1)[0];
      this.tags.push(tag.name || tag );
      this.filter();
    },
    filter() {
      const articles = this.articles.filter(article =>
        this.isMatch(this.tags, article)
      )
      this.filteredArticles = articles;
    },
    isMatch(filters, article) {
      for (let i = 0; i < filters.length; i++) {
        if (article.articleTags.indexOf(filters[i]) === -1) {
          return false;
        }
      }
      return true;
    },
    removeTag($event) {
      // Moves tag from 'active' to 'available'
      this.tags = this.tags.filter(tag => tag !== $event);
      this.availableTags.push($event);
      console.log($event)
      // If there are tags, filter the articles
      if (this.tags.length) {
        this.filter()
      } else {
        // If there are no tags, display all articles
        this.filteredArticles = this.articles;
      }
    },
    toggleModal($event) {
      this.isCardModalActive = true;
      console.log($event)
    },
    getArticles(){
      axios.get('api/articles')
      .then(response => {
          this.articles = response.data;
          this.filteredArticles = response.data;
      })
    },
    getTags(){
      axios.get('api/tags')
      .then(response => {
        this.availableTags = response.data;
      })
    }
  },
  computed: {
    trimRole() {
      return this.$route.params.role.charAt(0).toUpperCase();
    },
    id(){
      return this.$store.state.userRole.index
    },
    color(){
      return this.$store.state.userRole.color
    }
  },

  mounted() {
    this.filteredArticles = this.articles;
    this.getArticles()
    this.getTags()
  }

}
</script>
<style scoped>
.flex-wrap {
  display: flex;
  flex-wrap: wrap;
}

.margin-x {
  margin-right: 1em;
  margin-left: 1em;
}

.margin-bottom {
  margin-bottom: .3em
}

.role-mini {
  display: flex;
  justify-content: center;
  color: white;
  font-size: 72px;
  font-weight: 500;
  background-color: #38ee78;
  color: #000;
}

.button {
  margin: 0.2em;
}
.chosen-tags .button {
  background-color: #000;
  color: white;
}
.chosen-tags .button:hover {
  background-color: #38ee78;
  color: #000;
  border-color: #38ee78;
}
</style>
