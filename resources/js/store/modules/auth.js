import { login, register, logout } from "../../api/auth.js";

export default {
    state: () => ({
        isLoading: false,
        errors: null
    }),
    mutations: {
        setErrors: (state, payload) => {
            state.errors = payload;
        },
        setLoading: (state, payload) => {
            state.isLoading = payload;
        }
    },
    actions: {
        async login({ commit }, payload) {
            commit("setLoading", true);
            const [response, errors] = await login(payload);
            commit("setLoading", false);
            if (errors) {
                commit("setErrors", errors);
            }
        },
        async logout({ commit }) {
            commit("setLoading", true);
            const [response, errors] = await logout();
            commit("setLoading", false);
            if (errors) {
                commit("setErrors", errors);
            }
        },
        async register({ commit }, payload) {
            commit("setLoading", true);
            const [response, errors] = await register(payload);
            commit("setLoading", false);
            if (errors) {
                commit("setErrors", errors);
            }
        }
    },
    getters: {}
};