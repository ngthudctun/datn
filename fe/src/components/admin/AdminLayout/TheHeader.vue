

<template>
  <div class="">
    <aside
      class="left-sidebar animation-sidebar top-0 d-none d-lg-flex"
      style="z-index: 2000"
      id="sidebarch"
    >
      <!-- Sidebar scroll-->
      <div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar mt-4" data-simplebar="" style=" scrollbar-width: none; ">
          <button
            class="active-sidebar d-lg-none"
            v-on:click="Adminlayout.getadminorder()"
          >
            X
          </button>
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu text-danger">Home</span>
            </li>
            <li class="sidebar-item">
                <router-link to="/admin/">
                <div class="sidebar-link">
                  <i class="ti ti-atom"></i>
                <span class="hide-menu">Dashboard</span>
                </div>
              </router-link>

            </li>
            <!-- ---------------------------------- -->
            <!-- Dashboard -->
            <!-- ---------------------------------- -->

            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu text-danger">Quản lý Sản phẩm</span>
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
              <span class="hide-menu text-danger">Quản lý Bài viết</span>
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
              <span class="hide-menu text-danger"
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
              <span class="hide-menu text-danger">Cấu hình webside</span>
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
  </div>
</template>

  <script setup>
import { AdminLayout } from "@/storage/admin/layoutAdmin";
const Adminlayout = AdminLayout();
</script>
