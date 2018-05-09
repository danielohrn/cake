<template>
  <modal v-if="newArticleModal" type="newArticleModal">

        <div class="article-content">
            <h3 class="title is-4">Skapa/ändra inlägg</h3>
            <input class="input" type="text" placeholder="Skapa rubrik..." />
            <textarea class="textarea is-primary" cols="30" rows="20" placeholder="Skriv text..."></textarea>
            <button class="button is-primary">Spara</button>
        </div>
        <div class="article-sidebar">
            <b-field label="Taggar">
                <b-taginput maxlength="10">
                </b-taginput>
            </b-field>
            <div class="tags">
                <h3 class="title is-4">Lägg till taggar</h3>
                <a class="button is-outlined is-primary">{{tags}}</a>
            </div>
        </div>
  </modal>
</template>

<script>
import { mapState } from 'vuex';

export default {
    props: ['tags'], 
    computed: mapState(['newArticleModal'])  
}
</script>
