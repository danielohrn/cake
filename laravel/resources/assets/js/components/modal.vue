<template>
    <div class="modal-background">
        <div class="modal-card">
            <slot></slot>
        </div>
    </div>
</template>

<style scoped>

.modal-background{
  background-color: dark-grey;
  width: 100vw;
  height: 100vh;
  position: fixed;
  top: 0;
  left: 0;
  z-index: 9999;
  display: flex;
  justify-content: center;
  align-items: center;
}

.modal-card{
  background-color: white;
  width: 80vw;
  height: 95vh;
  padding: 1em;
  display: flex;
  flex-direction: row; 
}

</style>


