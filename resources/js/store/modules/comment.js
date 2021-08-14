import { getPostComments, createComment, replyToComment } from "../../api/facebook.js";

export default {
    state: () => ({
        isLoading: false,
        comments: null,
        comment: null,
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
        },
        setComment(state, comment) {
            state.comment = comment;
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
        },
        async createComment({ commit }, { pageId, postId, comment }) {
            commit("setLoading", true);
            const [response, error] = await createComment(pageId, postId, comment);
            commit("setLoading", false);
            if (error) {
                commit("setErrors", error);
            }
        },
        setComment({ commit }, { comment }) {
            commit("setComment", comment);
        },
        async replyToComment({ commit }, { pageId, commentId, comment }) {
            commit("setLoading", true);
            const [response, error] = await replyToComment(pageId, commentId, comment);
            commit("setLoading", false);
            if (error) {
                commit("setErrors", error);
            }
        }
    },
    getters: {}
};