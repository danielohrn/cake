<template>
    <article @click.stop="openModal" class="tile is-child notification is-primary">
        <p class="title is-5">{{project.name}}</p>
        <p class="subtitle is-6">{{project.content}}</p>

        <EditProjectModal @CLOSE_MODAL="closeModal" v-if="open" :project="project"/>

    </article>
</template>

<script>

export default {
    props: ['project'], 
    data() {
        return {
            open: false
        }
    },

    methods: {
        openModal() {
            this.open = true; 
        },
        closeModal() {
            this.open = false; 
        }
    }
    
}
</script>
