import Home from "../views/Home.vue";
import Posts from "../views/Posts.vue";

const routes = [
    {
        path: "/",
        name: "Home",
        component: Home
    },
    {
        path: "/posts",
        name: "Posts",
        component: Posts
    }
];

export default routes;