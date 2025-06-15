import { createRouter, createWebHistory } from 'vue-router'
import { useAuthStore } from '@/stores/auth'
import { useShowtoast } from '@/assets/js/toast'

// Import các trang
import Home from '@/views/pages/Home.vue'
import Store from '@/views/pages/Store.vue'
import ProductDetail from '@/views/pages/ProductDetail.vue'
import ShopCart from '@/views/pages/ShopCart.vue'
import Checkout from '@/views/pages/Checkout.vue'
import Blog from '@/views/pages/Blog.vue'
import BlogDetails from '@/views/pages/BlogDetails.vue'
import Contact from '@/views/pages/Contact.vue'
import Login from '@/views/pages/Login.vue'
import Register from '@/views/pages/Register.vue'
import ForgotPassword from '@/views/pages/ForgotPassword.vue'
import User from '@/views/pages/User.vue'
import Terms from '@/views/pages/Terms.vue'
import Privacy from '@/views/pages/Privacy.vue'
import Wishlist from '@/views/pages/Wishlist.vue'

const routes = [
    {
        path: '/',
        component: () => import('@/views/layouts/DefaultLayout.vue'),
        children: [
            { path: '', name: 'Home', component: Home },
            { path: 'cua-hang', name: 'Store', component: Store },
            { path: 'cua-hang/:slug', name: 'StoreSlug', component: Store },
            { path: '/san-pham/:slug', name: 'product.detail', component: ProductDetail, props: true },
            { path: 'user/gio-hang', name: 'ShopCart', component: ShopCart, meta: { requiresAuth: true } },
            { path: 'thanh-toan', name: 'Checkout', component: Checkout, meta: { requiresAuth: true } },
            { path: 'bai-viet', name: 'Blog', component: Blog },
            { path: 'chi-tiet-bai-viet', name: 'BlogDetails', component: BlogDetails },
            { path: 'dieu-khoan-dich-vu', name: 'Terms', component: Terms },
            { path: 'chinh-sach-bao-mat', name: 'Privacy', component: Privacy },
            { path: 'lien-he', name: 'Contact', component: Contact },
            { path: 'dang-nhap', name: 'Login', component: Login },
            { path: 'dang-ky', name: 'Register', component: Register },
            { path: 'quen-mat-khau', name: 'ForgotPassword', component: ForgotPassword },
            { path: 'user', name: 'user', component: User, meta: { requiresAuth: true } },
            { path: 'user/san-pham-yeu-thich', name: 'wishlist', component: Wishlist, meta: { requiresAuth: true } }
        ]
    },
    {
        path: '/admin',
        component: () => import('@/views/layouts/AdminLayout.vue'),
        children: [
            { path: '', name: 'index', component: () => import('@/views/admin/index.vue') },
            { path: 'danh-sach-san-pham', name: 'listproduct', component: () => import('@/views/admin/CurdProduct/Product_List.vue') },
            { path: 'them-san-pham', name: 'add-product', component: () => import('@/views/admin/CurdProduct/Product_Add.vue') },
            { path: 'cap-nhat-san-pham', name: 'updateupdate-product', component: () => import('@/views/admin/CurdProduct/Product_update.vue') },
            { path: 'danh-sach-danh-muc', name: 'catelist', component: () => import('@/views/admin/CrudCategory/Cate_List.vue') },
            { path: 'them-danh-muc', name: 'add-cate', component: () => import('@/views/admin/CrudCategory/Cate_add.vue') },
            { path: 'cap-nhat-danh-muc/:id', name: 'update-cate', component: () => import('@/views/admin/CrudCategory/Cate_update.vue') }
        ]
    },
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

// Đặt sau khi router được tạo
router.beforeEach((to, from, next) => {
    // Đợi store được khởi tạo khi có app context
    const auth = useAuthStore()
    const toast = useShowtoast()

    if (to.meta.requiresAuth && !auth.isLoggedIn) {
        toast.toast({
            title: 'Thông báo',
            message: 'Bạn cần đăng nhập để truy cập trang này',
            type: 'info'
        })
        next('/dang-nhap')
    } else {
        next()
    }
})

export default router
