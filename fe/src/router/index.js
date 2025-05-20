// src/router/index.js
import { createRouter, createWebHistory } from "vue-router";

// Import các trang
import Home from '@/views/pages/Home.vue'
import Shop from '@/views/pages/Shop.vue'
import ProductDetails from '@/views/pages/ProductDetails.vue'
import ShopCart from '@/views/pages/ShopCart.vue'
import Checkout from '@/views/pages/Checkout.vue'
import Blog from '@/views/pages/Blog.vue'
import BlogDetails from '@/views/pages/BlogDetails.vue'
import Contact from '@/views/pages/Contact.vue'
import Login from '@/views/pages/Login.vue'
import Register from '@/views/pages/Register.vue'

const routes = [
    {
        path: '/',
        component: () => import('@/views/layouts/DefaultLayout.vue'),
        children: [
            {
                path: '',
                name: 'Home',
                component: Home,
            },
            {
                path: 'cua-hang',
                name: 'Shop',
                component: Shop,
            },
            {
                path: 'chi-tiet-san-pham',
                name: 'ProductDetails',
                component: ProductDetails,
            },
            {
                path: 'gio-hang',
                name: 'ShopCart',
                component: ShopCart,
            },
            {
                path: 'thanh-toan',
                name: 'Checkout',
                component: Checkout,
            },
            {
                path: 'bai-viet',
                name: 'Blog',
                component: Blog,
            },
            {
                path: 'chi-tiet-bai-viet',
                name: 'BlogDetails',
                component: BlogDetails,
            },
            {
                path: 'lien-he',
                name: 'Contact',
                component: Contact,
            },
            {
                path: 'dang-nhap',
                name: 'Login',
                component: Login,
            },
            {
                path: 'dang-ky',
                name: 'Register',
                component: Register,
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
