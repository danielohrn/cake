<template>
    <article @click="openModal" class="tile is-child notification is-primary">
        <p class="title is-5">{{project.title}}</p>
        <p class="subtitle is-6"> {{trimPTags(project.body)}}</p>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M18 14.45v6.55h-16v-12h6.743l1.978-2h-10.721v16h20v-10.573l-2 2.023zm1.473-10.615l1.707 1.707-9.281 9.378-2.23.472.512-2.169 9.292-9.388zm-.008-2.835l-11.104 11.216-1.361 5.784 5.898-1.248 11.103-11.218-4.536-4.534z"/></svg>
        <EditProjectModal 
            @UPDATE_PROJECT="updateProject" 
            @CLOSE_MODAL="closeModal" 
            v-if="open" 
            :status="status" 
            :project="project"
            :tags="tags"/>
    </article>
</template>

<script>

export default {
    props: ['project','status', 'tags'], 
    data() {
        return {
            open: false
        }
    },

    methods: {
        openModal() {
            this.open = true;
        },
        closeModal(){
            this.open = false; 
        },
        updateProject(projectId) {
            console.log('projectcard', projectId)
            this.$emit('UPDATE_PROJECT',projectId); 
        },
        trimPTags(string) {
            const regex = new RegExp('<p>|</p>', 'g')
            return string.replace(regex, ''); 
        }
    }
    
}
</script>

<style scoped>

    article {
        position: relative;
    }

    article p{
        margin-bottom: 35px; 
    }

    svg {
        position: absolute;
        top: 10px;
        right: 10px; 
    }
</style>

