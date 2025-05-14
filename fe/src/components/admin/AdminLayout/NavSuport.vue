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
      <div class="col-lg-3 col-7">
        <div class="d-flex align-items-center justify-content-start h-100 mx-4">
          <i
            class="ti ti-menu-2 d-flex d-lg-none active-sidebar"
            style="font-size: 24px; cursor: pointer"
            id="active-sidebar"
            @click="Adminlayout.getadminorder()"
          ></i>
          <div class="ms-2 d-flex justify-content-center align-items-center">
            <img
              class="mx-2 rounded"
              :src="$imagebaseUrl + 'images.jpg'"
              alt=""
              width="60"
              height="100%"
            />
            <div class="d-flex justify-content-center align-items-center size">
              shop now
            </div>
          </div>
        </div>
      </div>

      <div
        class="col-lg-5 rounded d-none d-lg-flex align-items-center"
        style="border: 1px solid #e1e1e1"
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
        <div class="d-flex align-items-center justify-content-start h-100 mx-4">
          <div class="ms-2 d-none d-lg-flex">
            <b>Xin chào trường nguyễn</b>
          </div>
        </div>
      </div>
    </nav>
  </div>
</template>

<script setup>
import { AdminLayout } from "@/storage/admin/layoutAdmin";
const Adminlayout = AdminLayout();
</script>