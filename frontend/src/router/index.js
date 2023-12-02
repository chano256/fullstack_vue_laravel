import { createRouter, createWebHistory } from "vue-router";
import AuthorView from "../views/Author/AuthorView.vue";
import AuthorListView from "../views/Author/AuthorView.vue";

const routes = [
    {
        path: "/",
        name: "authors",
        component: AuthorListView,
    },
    {
        path: "/:id",
        name: "author",
        component: AuthorView,
    }
];

export default createRouter({
    history: createWebHistory(),
    routes: routes,
});