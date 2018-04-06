import Vue from 'vue';
import Vuex from 'vuex';
import VuexPersistence from 'vuex-persist';

Vue.use(Vuex);

const vuexLocal = new VuexPersistence({
    storage: window.localStorage
})

export default new Vuex.Store({
  state: {
    role: {
      name: '',
      color: '',
      index: ''
    }
  },
  plugins: [vuexLocal.plugin],
  mutations: {
    updateRole (state, payload){
      state.role.name = payload.role.name;
      state.role.color = payload.role.color;
      state.role.index = payload.role.index;
    }
  }

});
