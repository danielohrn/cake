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
    editArticleModal: false,
    newArticleModal: false, 
    availableTags: [], 
    filteredTags: [],

    PROJECT_TO_EDIT: null, 
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
      console.log(payload)
      state[payload.modalType] = payload.action; 
    },
    updateModal(state, payload){
      state.chosenArticle = payload;
    },
    setTags(state, payload){
      state.availableTags = payload; 
    }, 
    filterTags(state, payload){
      state.filteredTags = payload; 
    }, 
    SET_PROJECT_TO_EDIT(state, payload){
      console.log(payload, 'payload!')
      state.PROJECT_TO_EDIT = payload; 
    }
  }
});
