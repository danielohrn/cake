import Vue from 'vue';
import Vuex from 'vuex';
import VuexPersistence from 'vuex-persist';

Vue.use(Vuex);

const vuexLocal = new VuexPersistence({
    storage: window.localStorage
})

export default new Vuex.Store({
  state: {
    userRole: {
      name: '',
      color: '',
      index: ''
    },
    allRoles: {

    },
    chosenArticle: {
      title: '',
      body: '',
      tags: []
    },
    modalOpen: false 

  },
  plugins: [vuexLocal.plugin],
  mutations: {
    updateUserRole (state, payload){
      state.userRole.name = payload.role.name;
      state.userRole.color = payload.role.color;
      state.userRole.index = payload.role.index;
    },
    updateRoles (state, payload){
      state.allRoles = payload;
    }, 
    toggleModal(state, payload){
      state.modalOpen = payload.action; 
    },
    updateModal(state, payload){
      state.chosenArticle = payload;
    }
  }
});
