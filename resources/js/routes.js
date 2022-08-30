import VueRouter from "vue-router"
import Home from "./pages/home.vue"
import Contacts from "./pages/contacts.vue"
import PostShow from "./pages/post/show.vue"

export const routes = [
    { path: "/", component: Home, name: "home"},
    { path: "/contatti", component: Contacts, name: "contacts"},
    { path: "/post/:slug", component: PostShow, name: "post.show"}
]