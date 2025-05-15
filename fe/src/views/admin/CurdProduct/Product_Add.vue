




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
    <div class="body-wrapper" style="overflow: hidden; box-sizing: border-box">
      <!-- Sidebar Start -->

      <!--  Sidebar End -->
      <!--  Main wrapper -->

      <!--  Header Start -->

      <!--  Header End -->
      <div class="">
        <NavSuport />
      </div>

      <div class="bg-white" style="padding-top: 70px">
        <div class="row border-black py-4">
          <div class="px-4" style="box-sizing: border-box">
            <div class="">
              <div class="ps-3" style="box-sizing: border-box">
                <h2>Thêm sản phẩm sản phẩm</h2>
                <div class="">
                  <h6 class="d-flex">
                    <a href="">Trang chủ</a>
                    <div class="mx-1">/</div>
                    Danh sách sản phẩm
                  </h6>
                </div>
              </div>
            </div>
            <div class="mt-4" style="border-top: 1px solid #e1e1e1">
              <div class="w-100 row" style="height: 1000px">
                <div class="col-8" style="border-right: 1px solid beige">
                  <div class="p-3" style="box-sizing: border-box">
                    <h4>Điền thông tin sản phẩm</h4>
                    <div class="form-group mt-3">
                      <label for="usr"><b>Tên sản phẩm:</b></label>
                      <input
                        type="text"
                        class="mt-1 form-control"
                        id="usr"
                        style="box-shadow: 0 0 2px rgba(0, 0, 0, 0.5)"
                      />
                    </div>
                    <div class="form-group mt-3 position-relative">
                      <label for="usr"><b>Danh mục:</b></label>
                      <form
                        class="d-flex form-control mt-1 align-items-center position-relative"
                        key=""
                        style="box-shadow: 0 0 2px rgba(0, 0, 0, 0.5)"
                      >
                        <input
                          autocomplete="off"
                          class="form-control m-0 p-0 border-0"
                          type="text"
                          id="myInputcate"
                          v-on:click="
                            Adminlayout.myFunction('myInputcate', 'myULcate')
                          "
                          v-on:input="
                            Adminlayout.myFunction('myInputcate', 'myULcate')
                          "
                        />
                        <button
                          type="button"
                          class="btn top-0 end-0 btn-primary position-absolute"
                        >
                          Primary
                        </button>
                      </form>

                      <ul
                        id="myULcate"
                        class="position-absolute my-ul-list top-100 w-100"
                        style="left: 0"
                      >
                        <li>
                          <div href="#" class="box-con">
                            <input type="checkbox" name="" id="ttt" />
                            <label class="mx-2" for="ttt"> Con cá</label>
                          </div>
                        </li>
                        <li>
                          <div href="#" class="box-con">
                            <input type="checkbox" name="" id="ttt" />
                            <label class="mx-2" for="ttt"> Con cá</label>
                          </div>
                        </li>
                        <li>
                          <div href="#" class="box-con">
                            <input type="checkbox" name="" id="ttt" />
                            <label class="mx-2" for="ttt"> Con cá</label>
                          </div>
                        </li>
                        <li>
                          <div href="#" class="box-con">
                            <input type="checkbox" name="" id="ttt" />
                            <label class="mx-2" for="ttt"> Con cá</label>
                          </div>
                        </li>
                        <li>
                          <div href="#" class="box-con">
                            <input type="checkbox" name="" id="ttt" />
                            <label class="mx-2" for="ttt"> Con cá</label>
                          </div>
                        </li>
                        <li>
                          <div href="#" class="box-con">
                            <input type="checkbox" name="" id="ttt" />
                            <label class="mx-2" for="ttt"> Con cá</label>
                          </div>
                        </li>
                      </ul>
                    </div>
                    <br>
                    <label class="my-1" for=""><b>Mô tả chi tiết</b></label>
                    <Adminwordtext />
                  </div>
                </div>
                <div class="col-4 border-black border-1"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
  
<style>
</style>

  <script setup>
import "@/assets/css/admincss/css/curdproduct/productadd.css";
import NavSuport from "@/components/admin/AdminLayout/NavSuport.vue";
import { AdminLayout } from "@/storage/admin/layoutAdmin";
import Adminwordtext from "@/components/admin/AdminLayout/textword.vue";

import { onMounted, ref } from "vue";
const Adminlayout = AdminLayout();
</script>
  
  
  
  
  