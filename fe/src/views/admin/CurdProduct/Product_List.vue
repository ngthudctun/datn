




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

            <div class="mt-3">
              <div class="row justify-content-center ">
                <div class="col-12 col-lg-6 row justify-content-center">
                  <div
                    class="add_product py-2  rounded-start-1 text-center col-5  text-white"
                  >
                    <b> thêm sản phẩm</b>
                  </div>
                  <div
                    class="py-2  rounded-end text-center col-7"
                    style="background-color: #b2acac42"
                  >
                    <form class="d-flex align-items-center">
                      <i class="fas fa-search"></i>
                      <input
                        class="form-control mx-2  border-0 p-0 "
                        type=""
                        placeholder="Tìm kiếm sản phẩm"
                        aria-label=""
                      />
                    </form>
                  </div>
                </div>
                <div class="col-12 mt-3 mt-lg-0 col-lg-6 d-flex justify-content-end">
                  <div class="col-7 d-flex justify-content-center">
                    <div class="dropdown nlb-select">
                      <button
                        class="btn btn-light border-0 dropdown-toggle text-center"
                        type="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                      >
                        Sản phẩm bán chạy nhất
                      </button>
                      <ul class="dropdown-menu border-1 text-center">
                        <li>
                          <a class="dropdown-item" href="#"
                            >Sản phẩm bán chạy nhất</a
                          >
                        </li>
                        <li>
                          <a class="dropdown-item" href="#"
                            >Sản phẩm mới nhất</a
                          >
                        </li>
                        <li>
                          <a class="dropdown-item" href="#">Sản phẩm cũ nhất</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="col-5 d-flex justify-content-center">
                    <div class="dropdown nlb-select">
                      <button
                        class="btn btn-light border-0 dropdown-toggle text-center"
                        type="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                      >
                        Trạng thái
                      </button>
                      <ul class="dropdown-menu border-1 text-center">
                        <li>
                          <a class="dropdown-item" href="#">Đã ẩn</a>
                        </li>
                        <li>
                          <a class="dropdown-item" href="#">Kích hoạt</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row box-product" style="overflow-x: auto">
                <ul>
                  <li>
                    <div
                      class="mt-4 d-flex align-items-center border-bottom border-black"
                      style="background-color: #b3b3b31a; min-width: 1100px"
                    >
                      <div
                        class="col-4 d-flex justify-content-center align-items-center"
                      >
                        <input class="" type="checkbox" name="" id="" />
                        <div class="col-10 d-flex justify-content-center">
                          <b>Tên sản phẩm</b>
                        </div>
                      </div>
                      <div class="col-2 row"><b>Giá sản phẩm</b></div>
                      <div
                        class="col-3 p-2 rounded d-flex justify-content-center"
                        style="flex-wrap: wrap ;"
                      >
                        <b>Tag</b>
                      </div>
                      <div class="col-2 d-flex justify-content-center">
                        <b>Trạng thái</b>
                      </div>
                    </div>
                    <br />
                    <div class="py-3 row align-items-center" style=" min-width: 1100px">
                      <div class="col-4 d-flex align-items-center">
                        <input class="col-2" type="checkbox" name="" id="" />
                        <img
                          class="rounded-2 col-2"
                          :src="baseImageUrl + 'images.jpg'"
                          alt=""
                          width=""
                          height="50"
                        />
                        <div
                          class="h-100 col-7 px-3"
                          style="box-sizing: border-box"
                        >
                          <div class="text-break text-max-1">
                            Cái cây sản phẩm
                          </div>
                          <div class="">
                            <a class="text-decoration-underline link-primary"
                              >danh muc</a
                            >
                          </div>
                        </div>
                      </div>
                      <div class="col-2 row"><b>2.999,000 Đ</b></div>
                      <div
                        class="col-3 p-2 justify-content-center rounded d-flex"
                        style="flex-wrap: wrap"
                      >
                        <div
                          class="border-1 border p-1 m-1 rounded-2"
                          style="background-color: #e3e6ed"
                        >
                          <b>may tinh</b>
                        </div>
                        <div
                          class="border-1 border p-1 m-1 rounded-2"
                          style="background-color: #e3e6ed"
                        >
                          <b>may tinh</b>
                        </div>
                        <div
                          class="border-1 border p-1 m-1 rounded-2"
                          style="background-color: #e3e6ed"
                        >
                          <b>may tinh</b>
                        </div>
                        <div
                          class="border-1 border p-1 m-1 rounded-2"
                          style="background-color: #e3e6ed"
                        >
                          <b>may tinh</b>
                        </div>
                        <div
                          class="border-1 border p-1 m-1 rounded-2"
                          style="background-color: #e3e6ed"
                        >
                          <b>may tinh</b>
                        </div>
                      </div>
                      <div class="col-2 d-flex justify-content-center">
                        <label class="switch">
                          <label class="nlb-toggle-switch">
                            <input
                              type="checkbox"
                              class="nlb-toggle-input"
                              :checked="getcheck()"
                            />
                            <span class="nlb-slider"></span>
                          </label>
                          <span class="slider round"></span>
                        </label>
                      </div>
                      <div class="col-1 d-flex justify-content-center">
                        <div class="">
                          <div class="dropdown">
                            <div
                              class=""
                              type="button"
                              data-bs-toggle="dropdown"
                              aria-expanded="false"
                            >
                              <i class="fa-solid fa-ellipsis-vertical"></i>
                            </div>
                            <ul class="dropdown-menu">
                              <li>
                                <router-link
                                  :to="'/admin/product-editproduct/'"
                                >
                                  <div class="dropdown-item">
                                    Chỉnh sửa
                                  </div></router-link
                                >
                              </li>
                              <li>
                                <div class="dropdown-item">xoa</div>
                              </li>
                            </ul>
                          </div>
                        </div>
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
  
<style>
</style>

  <script setup>
import "@/assets/css/admincss/css/curdproduct/productlist.css";
import NavSuport from "@/components/admin/AdminLayout/NavSuport.vue";
import { baseImageUrl } from "@/config/constans.js";
const getcheck = (value) => {
  if (value == null) {
    return false;
  } else {
    return true;
  }
};
</script>
  
  
  
  
  