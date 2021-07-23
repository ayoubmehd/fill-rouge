import Home from "../views/Home.vue";
import Posts from "../views/Posts.vue";
import SinglePost from "../views/SinglePost.vue";
import AddPost from "../views/AddPost.vue";

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
    },
    {
        path: "/add-post",
        name: "AddPost",
        component: AddPost
    }
];

export default routes;