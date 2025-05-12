

<template>

  <div class="">

    
    <aside class="left-sidebar top-0 d-none d-lg-flex">
      <!-- Sidebar scroll-->
      <div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar mt-4" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu text-primary">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./index.html" aria-expanded="false">
                <i class="ti ti-atom"></i>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <!-- ---------------------------------- -->
            <!-- Dashboard -->
            <!-- ---------------------------------- -->

            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu text-primary">Quản lý Sản phẩm</span>
            </li>
            <li class="sidebar-item">
              <router-link to="cateproduct">
                <div class="sidebar-link">
                  <i class="ti ti-atom"></i>
                  <span class="hide-menu">Danh mục sản phẩm</span>
                </div>
              </router-link>
            </li>

            <li class="sidebar-item">
              <a class="sidebar-link" href="./index.html" aria-expanded="false">
                <i class="ti ti-atom"></i>
                <span class="hide-menu">Danh sách sản phẩm</span>
              </a>
            </li>

            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu text-primary">Quản lý Bài viết</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./index.html" aria-expanded="false">
                <i class="ti ti-atom"></i>
                <span class="hide-menu">Giới thiệu</span>
              </a>
            </li>
            <li
              class="sidebar-item"
              data-bs-toggle="collapse"
              href="#collapseExample"
              role="button"
              aria-expanded="false"
              aria-controls="collapseExample"
            >
              <div class="sidebar-link" aria-expanded="false">
                <i class="ti ti-atom"></i>

                <div class="">Bài viết</div>
                <i class="fa-solid fa-chevron-down"></i>
              </div>
            </li>
            <div class="collapse" id="collapseExample">
              <div class="card card-body px-2 py-0">
                <li class="sidebar-item">
                  <div class="sidebar-link" aria-expanded="false">
                    <i class="ti ti-atom"></i>
                    <span class="hide-menu">Danh mục bài viết</span>
                  </div>
                  <div class="sidebar-link" aria-expanded="false">
                    <i class="ti ti-atom"></i>
                    <span class="hide-menu">Bài viết</span>
                  </div>
                </li>
              </div>
            </div>

            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu text-primary"
                >Quản lý hình ảnh, liên kết</span
              >
            </li>

            <li
              class="sidebar-item"
              data-bs-toggle="collapse"
              href="#banner"
              role="button"
              aria-expanded="false"
              aria-controls="banner"
            >
              <div class="sidebar-link" aria-expanded="false">
                <i class="ti ti-atom"></i>

                <div class="">banner</div>
                <i class="fa-solid fa-chevron-down"></i>
              </div>
            </li>
            <div class="collapse" id="banner">
              <div class="card card-body px-2 py-0">
                <li class="sidebar-item">
                  <div class="sidebar-link" aria-expanded="false">
                    <i class="ti ti-atom"></i>
                    <span class="hide-menu">Danh sách banner</span>
                  </div>
                  <div class="sidebar-link" aria-expanded="false">
                    <i class="ti ti-atom"></i>
                    <span class="hide-menu">Danh sách slide show </span>
                  </div>
                </li>
              </div>
            </div>

            <li class="sidebar-item">
              <a class="sidebar-link" href="./index.html" aria-expanded="false">
                <i class="ti ti-atom"></i>
                <span class="hide-menu">Danh mục gợi ý</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./index.html" aria-expanded="false">
                <i class="ti ti-atom"></i>
                <span class="hide-menu">Favicon</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./index.html" aria-expanded="false">
                <i class="ti ti-atom"></i>
                <span class="hide-menu">Logo</span>
              </a>
            </li>

            <li
              class="sidebar-item"
              data-bs-toggle="collapse"
              href="#settingcontact"
              role="button"
              aria-expanded="false"
              aria-controls="settingcontact"
            >
              <div class="sidebar-link" aria-expanded="false">
                <i class="ti ti-atom"></i>

                <div class="">Mạng xã hội</div>
                <i class="fa-solid fa-chevron-down"></i>
              </div>
            </li>
            <div class="collapse" id="settingcontact">
              <div class="card card-body px-2 py-0">
                <li class="sidebar-item">
                  <div class="sidebar-link" aria-expanded="false">
                    <i class="ti ti-atom"></i>
                    <span class="hide-menu">Thông tin mạng xã hội</span>
                  </div>
                  <div class="sidebar-link" aria-expanded="false">
                    <i class="ti ti-atom"></i>
                    <span class="hide-menu">Thông tin footer </span>
                  </div>
                </li>
              </div>
            </div>

            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu text-primary">Cấu hình webside</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./index.html" aria-expanded="false">
                <i class="ti ti-atom"></i>
                <span class="hide-menu">Thiết lập Gmail</span>
              </a>
            </li>

            <li class="sidebar-item">
              <a class="sidebar-link" href="./index.html" aria-expanded="false">
                <i class="ti ti-atom"></i>
                <span class="hide-menu">Thiết lập thông tin</span>
              </a>
            </li>
          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <div
      class="bg-white w-100 position-fixed"
      style="
        z-index: 1110;

        box-sizing: border-box;

        top: 0;
        box-shadow: 0 0 2px rgba(0, 0, 0, 0.5);
      "
    >
      <nav class="row py-2 py-lg-3">
        <div class="col-lg-3 col-7">
          <div
            class="d-flex align-items-center justify-content-start h-100 mx-4"
          >
            <i class=" d-flex d-lg-none ti ti-menu-2"></i>
            <div class="ms-2 d-flex justify-content-center align-items-center">
              <img
                class="mx-2 rounded"
                :src="baseImageUrl + 'images.jpg'"
                alt=""
                width="60"
                height="100%"
              />
              <div
                class="d-flex justify-content-center align-items-center size"
              >
                shop now
              </div>
            </div>
          </div>
        </div>

        <div
          class="col-lg-5 border border-dark rounded d-none d-lg-flex align-items-center"
        >
          <form class="d-flex align-items-center">
            <i class="fas fa-search"></i>
            <input
              class="form-control border-0 ps-5"
              type=""
              placeholder="Search anything..."
              aria-label=""
            />
          </form>
        </div>

        <div class="col-lg-3 col-5">
          <div
            class="d-flex align-items-center justify-content-start h-100 mx-4"
          >
            <div class="ms-2 d-none d-lg-flex">
              <b>Xin chào trường nguyễn</b>
            </div>
          </div>
        </div>
      </nav>
    </div>
    
  </div>

  
</template>

  <script setup>

import { baseImageUrl } from "@/config/constans.js";

</script>
