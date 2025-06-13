// src/router/index.js
import { createRouter, createWebHistory } from "vue-router";

// Import các trang
import Home from '@/views/pages/Home.vue'
import Store from '@/views/pages/Store.vue'
import ProductDetails from '@/views/pages/ProductDetails.vue'
import ShopCart from '@/views/pages/ShopCart.vue'
import Checkout from '@/views/pages/Checkout.vue'
import Blog from '@/views/pages/Blog.vue'
import BlogDetails from '@/views/pages/BlogDetails.vue'
import Contact from '@/views/pages/Contact.vue'
import Login from '@/views/pages/Login.vue'
import Register from '@/views/pages/Register.vue'
import ForgotPassword from '@/views/pages/ForgotPassword.vue'

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
                name: 'Store',
                component: Store,
            },
            {
                path: 'cua-hang/:slug',
                name: 'StoreSlug',
                component: Store,
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
            {
                path: 'quen-mat-khau',
                name: 'ForgotPassword',
                component: ForgotPassword,
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
                path: "danh-sach-san-pham",
                name: "listproduct",
                component: () => import('@/views/admin/CurdProduct/Product_List.vue'),
            },
            {
                path: "them-san-pham",
                name: "add-product",
                component: () => import('@/views/admin/CurdProduct/Product_Add.vue'),
            },
            {
                path: "cap-nhat-san-pham",
                name: "updateupdate-product",
                component: () => import('@/views/admin/CurdProduct/Product_update.vue'),
            },
            {
                path: "danh-sach-danh-muc",
                name: "catelist",
                component: () => import('@/views/admin/CrudCategory/Cate_List.vue'),
            },
            {
                path: "them-danh-muc",
                name: "add-cate",
                component: () => import('@/views/admin/CrudCategory/Cate_add.vue'),
            },
            {
                path: "cap-nhat-danh-muc/:id",
                name: "update-cate",
                component: () => import('@/views/admin/CrudCategory/Cate_update.vue'),
                
            },
        ],

    }
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;
