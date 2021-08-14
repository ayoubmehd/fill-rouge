import Login from "../views/Login.vue";
import Register from "../views/Register.vue";
import Home from "../views/Home.vue";
import Posts from "../views/Posts.vue";
import SinglePost from "../views/SinglePost.vue";
import AddPost from "../views/AddPost.vue";
import AppManagment from "../views/AppManagment.vue";

const routes = [
    {
        path: "/login",
        name: "Login",
        component: Login,
        meta: {
            layout: "Empty"
        }
    },
    {
        path: "/register",
        name: "Register",
        component: Register,
        meta: {
            layout: "Empty"
        }
    },
    {
        path: "/",
        name: "Home",
        component: Home,
        meta: {
            login: true,
        }
    },
    {
        path: "/app-managment",
        name: "AppManagment",
        component: AppManagment,
        meta: {
            login: true,
        }
    },
    {
        path: "/posts",
        name: "Posts",
        component: Posts,
        meta: {
            login: true,
        }
    },
    {
        path: "/post/:id",
        name: "SinglePost",
        component: SinglePost,
        meta: {
            login: true,
        }
    },
    {
        path: "/add-post",
        name: "AddPost",
        component: AddPost,
        meta: {
            login: true,
        }
    }
];

export default routes;