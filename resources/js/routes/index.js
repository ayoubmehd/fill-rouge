import VueRouter from "vue-router";
import routes from "./routes.js";
import { checkIfUserLoggedIn } from "../api/auth.js";

const router = new VueRouter({
    mode: "history",
    linkActiveClass: "active",
    routes
});

router.beforeEach(async (to, from, next) => {

    if (to.meta.login) {
        const [response, error] = await checkIfUserLoggedIn();

        if (error) {
            next({ name: "Login" });
            return;
        }

        if (response.statusCode >= 300) {
            next({ name: "Login" });
            return;
        }
    }

    next();
});

export default router;