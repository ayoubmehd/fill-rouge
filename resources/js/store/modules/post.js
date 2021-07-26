import { addPost } from "../../api/post.js";

export default {
    state: () => ({
        isLoading: false,
        errors: null
    }),
    mutations: {
        setLoading(state, payload) {
            state.isLoading = payload;
        },
        setError(state, payload) {
            state.errors = payload;
        }
    },
    actions: {
        async addPost({ commit }, payload) {
            commit("setLoading", true);
            const [data, errors] = await addPost(payload);
            commit("setLoading", false);
            commit("setError", errors);
        }
    }
};