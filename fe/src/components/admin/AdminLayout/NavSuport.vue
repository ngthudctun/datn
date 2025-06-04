<template>
  <div
    class="bg-white w-100 position-fixed"
    style="
      z-index: 1110;

      box-sizing: border-box;

      top: 0;
      border-bottom: 1px solid #e1e1e1;
    "
  >
    <nav class="row py-2 py-lg-3">
      <div class=" col-12 col-lg-3 ">
        <div class="d-flex align-items-center justify-content-start h-100">
          <i
            class="fa-solid ms-3 fa-bars d-lg-none"
            style="font-size: 24px; cursor: pointer"
            id="active-sidebar"
            @click="Adminlayout.getadminorder()"
          ></i>
          <input type="hidden"  name="" id="clickout">
          <div class="d-flex justify-content-center align-items-center">
            <img
              class="rounded"
              :src="$imageUrl + 'logo/logo.png'"
              alt=""
              width="100%"
              height="100%"
            />
          </div>
        </div>
      </div>

      <div
        class="col-lg-5 rounded d-none d-lg-flex align-items-center position-relative"
        style="border: 1px solid #e1e1e1"
      >
        <form class="d-flex align-items-center">
          <i class="fas fa-search"></i>
          <input
            autocomplete="off"
            placeholder="tìm kiếm chức năng "
            class="form-control border-0 ps-5"
            type="text"
            id="myInput"
            v-on:click="Adminlayout.myFunction('myInput', 'myUL')"
            v-on:input="Adminlayout.myFunction('myInput', 'myUL')"
          />
        </form>
        <ul
          id="myUL"
          class="position-absolute my-ul-list top-100 w-100"
          style="left: 0"
        >
          <li><a href="#">Trang chủ</a></li>
          <li><a href="#">Danh mục sản phẩm </a></li>
          <li><a href="#">Billy</a></li>
          <li><a href="#">Bob</a></li>
          <li><a href="#">Calvin</a></li>
          <li><a href="#">Christina</a></li>
          <li><a href="#">Cindy</a></li>
        </ul>
      </div>

      <div class="col-5 col-lg-3">
        <div class="d-flex align-items-center justify-content-start h-100 ">
          <div class="ms-2 d-none d-lg-flex">
            Xin chào trường nguyễn
          </div>
        </div>
      </div>
    </nav>
  </div>
</template>

<script setup>
import Barbtn from "@/components/admin/AdminLayout/button/Barbtn.vue";
import { AdminLayout } from "@/storage/admin/layoutAdmin.js";
const Adminlayout = AdminLayout();
</script>