import { getPostComments } from "../../api/facebook.js";

export default {
    state: () => ({
        isLoading: false,
        comments: null,
        errors: null,
    }),
    mutations: {
        setLoading(state, payload) {
            state.login = payload;
        },
        setError(state, payload) {
            state.error = payload;
        },
        setComments(state, comments) {
            state.comments = comments;
        }
    },
    actions: {
        async getPostComments({ commit }, { pageId, postId }) {
            commit("setLoading", true);
            const [response, error] = await getPostComments(pageId, postId);
            commit("setLoading", false);
            if (error) {
                commit("setErrors", error);
            }

            commit("setComments", response.data);
        }
    },
    getters: {}
};