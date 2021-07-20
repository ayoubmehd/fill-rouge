import Home from "../views/Home.vue";
import Posts from "../views/Posts.vue";
import SinglePost from "../views/SinglePost.vue";

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
    },
    {
        path: "/post",
        name: "SinglePost",
        component: SinglePost
    }
];

export default routes;