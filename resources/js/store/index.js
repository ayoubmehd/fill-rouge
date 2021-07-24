import Vue from 'vue';
import Vuex, { createLogger } from 'vuex';
import user from "./modules/user.js";

Vue.use(Vuex);

const debug = process.env.NODE_ENV !== 'production';

export default new Vuex.Store({
    strict: debug,
    modules: {
        user
    },
    plugins: debug ? [createLogger()] : []
});