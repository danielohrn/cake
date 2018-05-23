<template>
     <section class="section project-section">
        <div class="tile is-ancestor">
        <div class="tile is-parent">
          <article class="tile is-child notification ">
            <div class="content">
              <p class="title">{{status.name}}</p>
              <p class="subtitle"></p>
              <div class="content">
                <div class="tile no-padding is-parent is-vertical">
                    <slot>
                        <!-- PROJECT CARD GOES HERE AS A CHILD ELEMENT --> 
                    </slot>
                </div>
              </div>
            </div>
          </article>
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
    }
    .tile {
    margin: .5rem;
    }
    .tile.no-padding {
    padding: 0px;
    }

</style>
