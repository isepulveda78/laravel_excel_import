const { default: Axios } = require("axios")

const state = {
    name = []
}

const getters = {
    getSapData: state => state.name
}

const mutations = {
    set_sap (state, sap){
        state.sap = sap
    }
}

const actions = {
   getSapData ({ commit }) {
       axios.get('/files.json')
       .then(res => res.data)
       .then(sap => {
           commit('set_sap', sap)
       })
   }

   postSapData ({dispatch}){
       axios.post()
   }
}

export default{
    state,
    getters,
    mutations,
    actions
}