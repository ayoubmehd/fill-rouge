import { addPost, getAllPosts } from "../../api/post.js";

export default {
    state: () => ({
        isLoading: false,
        errors: null,
        posts: null
    }),
    mutations: {
        setLoading(state, payload) {
            state.isLoading = payload;
        },
        setError(state, payload) {
            state.errors = payload;
        },
        setPosts(state, payload) {
            state.posts = payload;
        }
    },
    actions: {
        async addPost({ commit }, payload) {
            commit("setLoading", true);
            const [data, errors] = await addPost(payload);
            commit("setLoading", false);
            commit("setError", errors);
        },
        async getAllPosts({ commit }) {
            commit("setLoading", true);
            const [paginate, errors] = await getAllPosts();
            commit("setPosts", paginate.data);
            commit("setLoading", false);
            commit("setError", errors);
        }
    }
};