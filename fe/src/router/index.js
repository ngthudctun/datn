// src/router/index.js
import { createRouter, createWebHistory } from "vue-router";

// Import các trang

const routes = [


    {
        path: "/",
        component: () => import("@/views/layouts/DefaultLayout.vue"),
        children: [
            {
                path: "",
                name: "index",
                component: () => import('@/views/admin/index.vue'),
            },

        ],

    },

    {
        path: "/admin",
        component: () => import("@/views/layouts/AdminLayout.vue"),
        children: [
            {
                path: "",
                name: "index",
                component: () => import('@/views/admin/index.vue'),
            },
            {
                path: "cateproduct",
                name: "category-product",
                component: () => import('@/views/admin/CurdProduct/Product_List.vue'),
            },
            {
                path: "add-product",
                name: "add-product",
                component: () => import('@/views/admin/CurdProduct/Product_Add.vue'),
            },
        ],

    }
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;
