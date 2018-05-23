<template>
    <article class="tile is-child notification is-primary">
        <p class="title is-5">{{project.name}}</p>
        <p class="subtitle is-6">{{project.content}}</p>
    </article>
</template>

<script>

export default {
    props: ['project'], 
    data() {
        return {

        }
    }
    
}
</script>
