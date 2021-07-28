import VueRouter from "vue-router";
import routes from "./routes.js";
import { checkIfUserLoggedIn } from "../api/auth.js";

const router = new VueRouter({
    mode: "history",
    routes
});

router.beforeEach(async (to, from, next) => {

    if (to.meta.login) {
        console.log(to.meta);
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