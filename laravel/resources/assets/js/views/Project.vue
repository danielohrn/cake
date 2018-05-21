<template>
<section class="section">
    <div class="sidebar">
        <ul class="meny">
            <li>
                <a href="">Översikt</a>
            </li>
            <li>
                <a> Skapa artikel</a>
            </li>
            <li>
                <a href="">Skapa tagg</a>
            </li>
            <li>
                <a href="">Skapa roll</a>
            </li>
        </ul>
    </div>
    <section class="section project-section">
      <div v-for="role in roles" class="tile is-ancestor">
        <div class="tile is-parent">
          <article class="tile is-child notification ">
            <div class="content">
              <p class="title">{{role}}</p>
              <p class="subtitle"></p>
              <div class="content">
                <div v-if="role === test.role" class="tile no-padding is-parent is-vertical">
                  <article class="tile is-child notification is-primary">
                    <p class="title">Title</p>
                    <p class="subtitle">{{test.content}}</p>
                  </article>
                </div>
              </div>
            </div>
          </article>
        </div>
      </div>
    </section>

</section>
</template>


<script>
  export default {
    data(){
      return {
        roles: ['content', 'redaktör', 'faktagranskning', 'publicerare'],
        test:  {role: 'redaktör', content: 'this is content'}
      }
    }
  }
</script>

<style>
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
