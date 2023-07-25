import { createRouter, createWebHistory } from "vue-router";

import Home from '../components/quotes/Home.vue'
import AddQuote from "../components/quotes/AddQuote.vue";
import EditQuote from "../components/quotes/EditQuote.vue";
import About from '../components/quotes/About.vue'
import NotFound404 from "../components/quotes/NotFound404.vue";

const routes = [
    {
        path: '/',
        component: Home,
        name: 'home',
    },
    {
        path: '/add-quote',
        component: AddQuote,
        name: 'add-quote',
    },
    {
        path: '/quotes/:id',
        component: EditQuote,
        name: 'edit-quote',
    },
    {
        path: '/about',
        component: About,
        name: 'about',
    },
    {
        path: '/:pathMatch(.*)*',
        component: NotFound404,
        name: 'notfound',
    }
]

const router = createRouter({
   history: createWebHistory(),
   routes
})

export default router
