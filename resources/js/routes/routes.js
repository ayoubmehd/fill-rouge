import Login from "../views/Login.vue";
import Register from "../views/Register.vue";
import Home from "../views/Home.vue";
import Posts from "../views/Posts.vue";
import SinglePost from "../views/SinglePost.vue";
import AddPost from "../views/AddPost.vue";

const routes = [
    {
        path: "/login",
        name: "Login",
        component: Login
    },
    {
        path: "/register",
        name: "Register",
        component: Register
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
        path: "/posts",
        name: "Posts",
        component: Posts,
        meta: {
            login: true,
        }
    },
    {
        path: "/post",
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