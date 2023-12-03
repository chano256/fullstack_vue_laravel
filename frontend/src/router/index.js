import { createRouter, createWebHistory } from "vue-router";
import AuthorView from "../views/author/AuthorView.vue";
import AuthorList from "../views/author/List.vue";
import AuthorCreate from "../views/author/Create.vue";

const routes = [
    { path: "/authors/create", name: "authors-create", component: AuthorCreate },
    { path: "/authors",name: "authors-index",component: AuthorList },
    { path: "/authors/:id", name: "authors-show", component: AuthorView },
    { path: "/authors/:id/update", name: "authors-update", component: AuthorView },
    { path: "/authors/:id/delete", name: "authors-delete", component: AuthorView },

    // otherwise return them home with a regex
    { path: "/:pathMatch(.*)*", redirect: "/authors" }
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes
});

export default router