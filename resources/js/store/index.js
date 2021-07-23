import Vue from 'vue';
import Vuex, { createLogger } from 'vuex';
import modules from "./modules/index.js";

Vue.use(Vuex);

const debug = process.env.NODE_ENV !== 'production';

export default new Vuex.Store({
    modules,
    strict: debug,
    plugins: debug ? [createLogger()] : []
});