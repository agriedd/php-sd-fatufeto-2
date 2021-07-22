export default {
    namespaced: true,
    state: {
        src : null,
    },
    mutations: {
        SHOW_IMAGE(state, payload) {
            state.src = payload.src
        },
    },
    actions: {
        showImage({ commit }, payload) {
            commit("SHOW_IMAGE", payload);
        },
        show({ commit }, payload) {
            commit("SHOW_IMAGE", payload);
        },
    },
}