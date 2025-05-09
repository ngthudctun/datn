
<template>
    <div
      class="page-wrapper"
      id="main-wrapper"
      data-layout="vertical"
      data-navbarbg="skin6"
      data-sidebartype="full"
      data-sidebar-position="fixed"
      data-header-position="fixed"
    >
      <!-- Sidebar Start -->
  
      <!--  Sidebar End -->
      <!--  Main wrapper -->
      <div class="body-wrapper">
        <!--  Header Start -->
   
        <!--  Header End -->
        <div class="">
              <NavSuport />
        </div>
  
        <div class="container-fluid">
          <div class="row bg-white py-3 rounded" style="  box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);">
            <div class="">
              <div class="mt-1"><h5>Bảng điều khiển</h5></div>
              <hr>
              <div class="border-top mt-3">
                <div class="row">
                  <div class="col-12 py-1 col-lg-4">
                    <div
                      class="d-flex bg-info rounded border border-dark-light text-white px-1"
                    >
                      <div class="p-3 bg-info m-1 text h1 rounded text-white">
                        <i class="fa-solid fa-globe"></i>
                      </div>
                      <div
                        class="d-flex col-9 px-3 flex-column align-items-center justify-content-center"
                      >
                        <div class="">cài đặt trang web</div>
                        <b>xem thêm</b>
                      </div>
                    </div>
                  </div>
  
                  <div class="col-12 py-1 col-lg-4">
                    <div
                      class="d-flex bg-warning rounded border border-dark-light text-white px-1"
                    >
                      <div class="p-3 m-1 text h1 rounded text-white">
                        <i class="fa-solid fa-globe"></i>
                      </div>
                      <div
                        class="d-flex col-9 px-3 flex-column align-items-center justify-content-center"
                      >
                        <div class="">cài đặt trang web</div>
                        <b>xem thêm</b>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 py-1 col-lg-4">
                    <div
                      class="d-flex bg-danger bg-gradient rounded border border-dark-light text-white px-1"
                    >
                      <div class="p-3 m-1 text h1 rounded text-white">
                        <i class="fa-solid fa-globe"></i>
                      </div>
                      <div
                        class="d-flex col-9 px-3 flex-column align-items-center justify-content-center"
                      >
                        <div class="">cài đặt trang web</div>
                        <b>xem thêm</b>
                      </div>
                    </div>
                  </div>
                </div>
                <!--    <div class="row d-flex ">
                  <div
                    class="col-2 h-100 mx-1  d-flex"
                    style="border: 1px solid black; border-radius: 5px"
                  >
                    <div class="col-3 p-3 m-1 bg-secondary text h1 rounded text-white">   <i class="fa-solid fa-globe"></i></div>
                  </div>
                </div> -->
              </div>
            </div>
          </div>
        </div>
     
      </div>
    </div>
  </template>
  
  <script setup>
  import NavSuport from "@/components/admin/AdminLayout/NavSuport.vue";
  import { baseImageUrl } from "@/config/constans.js";
  </script>
  
  
  
  
  