<template>
    <article class="tile is-child notification is-primary">
        <p class="title">{{project.name}}</p>
        <p class="subtitle">{{project.content}}</p>
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
