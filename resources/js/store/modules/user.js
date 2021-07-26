import store from "../index.js";
import { getUserPages } from "../../api/facebook.js";

export default {
    state: () => ({
        pages: [],
    }),
    mutations: {
        updateUserPages(state, payload) {
            state.pages = payload;
        }
    },
    actions: {
        async getUserPages({ commit }) {
            const response = await getUserPages();
            commit("updateUserPages", response.data[0]);
        }
    }
};