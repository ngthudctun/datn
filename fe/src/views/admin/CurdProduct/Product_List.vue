
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
        <div
          class="row bg-white py-3 rounded"
          style="box-shadow: 0 0 5px rgba(0, 0, 0, 0.5)"
        >
          <div class="">
            <div class="mt-1"><h5>Bảng điều khiển</h5></div>
            <hr />
            <div class="border-top mt-3">
              <div class="row">
                <ul>
                  <li>
                    <div class="p-3 row">
                      <div class="col-4 d-flex">
                          <input type="checkbox" name="" id="">
                          <img :src="baseImageUrl + 'images.jpg'" alt="">
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
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
  
  
  
  
  