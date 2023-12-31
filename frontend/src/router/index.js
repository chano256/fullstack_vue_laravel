import { createRouter, createWebHistory } from "vue-router";
import AuthorEdit from "../views/author/Edit.vue";
import AuthorList from "../views/author/List.vue";
import AuthorCreate from "../views/author/Create.vue";
import AuthorShow from "../views/author/Show.vue";
import AuthorDelete from "../views/author/Delete.vue";
import CategoryList from "../views/categories/CategoryListView.vue";

const routes = [
    // define routes for authors
    { path: "/authors/create", name: "authors-create", component: AuthorCreate },
    { path: "/authors",name: "authors-index",component: AuthorList },
    { path: "/authors/:id", name: "authors-show", component: AuthorShow },
    { path: "/authors/:id/update", name: "authors-update", component: AuthorEdit },
    { path: "/authors/:id/delete", name: "authors-delete", component: AuthorDelete },

    // define routes for categories
    { path: "/categories", name: "categories-list", component: CategoryList },

    // otherwise return them home with a regex
    { path: "/:pathMatch(.*)*", redirect: "/authors" }
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes
});

export default router