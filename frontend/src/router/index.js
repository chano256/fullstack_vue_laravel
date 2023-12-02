import { createRouter, createWebHistory } from "vue-router";
import AuthorView from "../views/Author/AuthorView.vue";
import AuthorListView from "../views/Author/AuthorView.vue";

const routes = [
    { path: "/create", name: "authors-create", component: AuthorView },
    { path: "/",name: "authors-index",component: AuthorListView },
    { path: "/:id", name: "authors-show", component: AuthorView },
    { path: "/:id/update", name: "authors-update", component: AuthorView },
    { path: "/:id/delete", name: "authors-delete", component: AuthorView },

    // otherwise return them home
    { path: "*", redirect: "/" }
];

export default createRouter({
    history: createWebHistory(),
    routes: routes,
});