<template>
     <section class="section project-section">
              <p class="title">{{status.name}}</p>
              <p class="subtitle"></p>
              <div class="content">
                <div class="tile no-padding is-parent is-vertical">
                    <slot>
                        <!-- PROJECT CARD GOES HERE AS A CHILD ELEMENT --> 
                    </slot>
                </div>
              </div>
    </section>   
</template>

<script>
export default {
    props: ['status'], 
    data() {
        return {
            
        }
    }
    
}
</script>
<style scoped>

    .project-section {
    width: 90%;
    flex-direction: column;
    }
    .tile {
    margin: .5rem;
    }
    .tile.no-padding {
    padding: 0px;
    }
    .project-section{
        background-color: #E3E4E6;
        margin: 5px;
    }
    .tile.is-child {
        padding: 5px;
    }
    p.title{
        font-size: 1.2em;
        margin: 1em;
    }

</style>
