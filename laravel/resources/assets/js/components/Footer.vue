<template>
  <footer>
    <p class='paragraph one'><b>BESÖKSADRESS</b><br/>
 Hälsingegatan 45<br/>
 113 31 Stockholm<br/>
 Handikappentré</p>
    <p class='paragraph two'><b>LEVERANSADRESS</b><br/>
 Hudiksvallsgatan 2<br/>
 113 30 Stockholm</p>
  </footer>
</template>

<script>
export default {
  data() {
    return {

    }
  }
}
</script>


<style scoped>
.section {
  padding: 0;
}
footer {
  width: 100%;
  display: flex;
  justify-content: space-around;
  background-color: #f5f5f5;
  height: 200px;
}
.one {
  margin: 3em 0 3em 4em;
}
.two {
  margin: 3em 4em 3em 0;
}
</style>
