<template>
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__close">+</div>
        <ul class="offcanvas__widget">
            <li><a href="#"><span class="fal fa-heart"></span>
                    <div class="tip">2</div>
                </a></li>
            <li><a href="#"><span class="fal fa-cart-shopping"></span>
                    <div class="tip">2</div>
                </a></li>
            <li><span class="fal fa-user"></span></li>
        </ul>
        <div class="offcanvas__logo">
            <router-link to="/"><img :src="$imageUrl + 'logo.png'" alt=""></router-link>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__auth">
            <a href="login.html">Login</a>
            <a href="register.html">Register</a>
        </div>
    </div>
    <div class="w-100">
        <div class="header__banner"><img :src="$imageUrl + 'banner/header__banner.webp'" alt=""></div>
    </div>
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-2">
                    <div class="header__logo">
                        <router-link to="/"><img :src="$imageUrl + 'logo/logo.png'" alt=""></router-link>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-7">
                    <div class="h-100 d-flex align-items-center justify-content-center form__search">
                        <form action="#">
                            <input type="text" placeholder="Tìm sản phẩm, thương hiệu và tên cửa hàng">
                            <button type="submit" class="site-btn"><span
                                    class="fa-light fa-magnifying-glass"></span></button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="header__right">
                        <ul class="header__right__widget">
                            <li>
                                <router-link to="/user/thong-bao">
                                    <i class="fa-light fa-bell"></i>
                                    <div class="tip">2</div>
                                </router-link>
                            </li>
                            <li><router-link to="/user/san-pham-yeu-thich">
                                    <span class="fa-light fa-heart"></span>
                                    <div class="tip">2</div>
                                </router-link></li>
                            <li><router-link to="/user/gio-hang">
                                    <span class="fa-light fa-cart-shopping"></span>
                                    <div class="tip">2</div>
                                </router-link></li>
                            <li>
                                <router-link to="/user" title="nguyenkhachung" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" data-bs-title="Tooltip on bottom">
                                    <span class="fa-light fa-user"></span>
                                    <div class="tip">2</div>
                                </router-link>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="canvas__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
</template>
<script setup>

import { useRouter } from 'vue-router'
</script>