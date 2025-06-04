




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
                <h2>Danh sách sản phẩm</h2>
                <div class="">
                  <h6 class="d-flex">
                    <a class="text-danger" href="">Trang chủ</a>
                    <div class="mx-1">/</div>
                    Danh sách sản phẩm
                  </h6>
                </div>
              </div>
            </div>
            <div class="row mt-4" style="border-top: 1px solid #e1e1e1">
              <div class="">
                <div class="mt-3">
                  <div class="row justify-content-center">
                    <div class="col-12 col-lg-6 row justify-content-center">
                      <div
                        class="btn btn-danger rounded-end-0 text-center col-5"
                      >
                        <router-link to="/admin/them-san-pham">
                          <div class="w-100">
                            <b class="text-white"> thêm sản phẩm</b>
                          </div>
                        </router-link>
                      </div>

                      <div
                        class="rounded-end d-flex align-items-center col-7"
                        style="background-color: #b2acac42"
                      >
                        <form class="d-flex align-items-center">
                          <i class="fas fa-search"></i>
                          <input
                            class="form-control mx-2 border-0 p-0"
                            style="background-color: rgb(227 230 237 / 0%)"
                            type=""
                            placeholder="Tìm kiếm sản phẩm"
                            aria-label=""
                          />
                        </form>
                      </div>
                    </div>
                    <div
                      class="col-12 col-lg-6 mt-3 mt-lg-0 col-lg-6 d-flex justify-content-start"
                      style="flex-wrap: wrap"
                    >
                      <div
                        class="col-12 col-lg-4 d-flex justify-content-center"
                      >
                        <div class="dropdown nlb-select w-100">
                          <button
                            class="btn w-100 btn-light border-0 w-100 dropdown-toggle text-center"
                            type="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                          >
                            bán chạy nhất
                          </button>
                          <ul class="dropdown-menu border-1 text-center">
                            <li>
                              <a class="dropdown-item" href="#">
                                bán chạy nhất</a
                              >
                            </li>
                            <li>
                              <a class="dropdown-item" href="#"> mới nhất</a>
                            </li>
                            <li>
                              <a class="dropdown-item" href="#"> cũ nhất</a>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div
                        class="col-12 w-100 col-lg-8 mt-2 mt-lg-0 d-flex justify-content-center"
                      >
                        <div
                          class="dropdown nlb-select px-1 col-4"
                          style="box-sizing: border-box"
                        >
                          <button
                            class="btn w-100 btn-light border-0 dropdown-toggle text-center w-100"
                            type="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                          >
                            theo giá
                          </button>
                          <ul class="dropdown-menu border-1 text-center">
                            <li>
                              <a class="dropdown-item" href="#">
                                thấp đến cao</a
                              >
                            </li>
                            <li>
                              <a class="dropdown-item" href="#">
                                cao đến thấp</a
                              >
                            </li>
                          </ul>
                        </div>
                        <div
                          class="dropdown nlb-select px-1 col-4"
                          style="box-sizing: border-box"
                        >
                          <button
                            class="btn btn-light border-0 dropdown-toggle text-center w-100"
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
                        <div
                          class="dropdown nlb-select px-1 col-4"
                          style="box-sizing: border-box"
                        >
                          <button
                            class="btn btn-light border-0 dropdown-toggle text-center w-100"
                            type="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                            @click.stop
                          >
                            Thêm
                          </button>
                          <ul
                            class="dropdown-menu border-1 text-center p-2"
                            style="min-width: 300px"
                          >
                            <div class="">
                              <div class="text-start">
                                <h5><b>Lọc theo: </b></h5>
                                <br />
                                <select
                                  v-on:change="getselectop($event.target.value)"
                                  class="form-select"
                                  id="categorySelect"
                                >
                                  <option value="">Tất cả</option>
                                  <option value="option-1">Danh mục</option>
                                  <option value="option-2">Mức giá</option>
                                  <option value="option-3">Người bán</option>
                                </select>
                                <br />
                                <!--  loc theo danh mucmuc -->
                                <select
                                  v-show="getSelect == 'option-1'"
                                  class="form-select"
                                  id=""
                                >
                                  <option value="">Tất cả</option>
                                  <option value="">Bánh ngọt</option>
                                  <option value="">Bánh mặn</option>
                                  <option value="">Đồ uống</option>
                                </select>
                                <!--  end show loc danh muc -->

                                <!-- loc theo giá -->
                                <div v-show="getSelect == 'option-2'" id="">
                                  <div class="">
                                    <div class="position-relative" @click.stop>
                                      <Rageslider />
                                    </div>
                                  </div>
                                </div>

                                <!-- end loc theo giá -->
                              </div>
                            </div>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row box-product" style="overflow-x: auto">
                    <ul>
                      <li>
                        <div
                          class="mt-4 d-flex align-items-center"
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
                          <div class="col-2 text-center">
                            <b>Giá sản phẩm</b>
                          </div>
                          <div
                            class="col-3 p-2 rounded d-flex justify-content-center"
                            style="flex-wrap: wrap"
                          >
                            <b>Tag</b>
                          </div>
                          <div class="col-2 d-flex justify-content-center">
                            <b>Trạng thái</b>
                          </div>
                        </div>

                        <div
                          class="py-3 d-flex align-items-center"
                          style="min-width: 1100px"
                        >
                          <div class="col-4 d-flex align-items-center">
                            <input
                              class="col-2"
                              type="checkbox"
                              name=""
                              id=""
                            />
                            <img
                              class="rounded-2 col-2"
                              :src="$imageUrl + 'product/' + 'product-5.jpg'"
                              alt=""
                              width="100px"
                              height="50px"
                            />
                            <div
                              class="h-100 col-7 px-3"
                              style="box-sizing: border-box"
                            >
                              <div class="text-break text-max-1">
                                Cái cây sản phẩm
                              </div>
                              <div class="">
                                <a
                                  class="text-decoration-underline link-primary"
                                  >danh muc</a
                                >
                              </div>
                            </div>
                          </div>
                          <div class="col-2 text-center">2.999,000 Đ</div>
                          <div
                            class="col-3 p-2 justify-content-center rounded d-flex"
                            style="flex-wrap: wrap"
                          >
                            <div
                              class="border-1 border p-1 m-1 rounded-2"
                              style="background-color: #e3e6ed"
                            >
                              may tinh
                            </div>
                            <div
                              class="border-1 border p-1 m-1 rounded-2"
                              style="background-color: #e3e6ed"
                            >
                              may tinh
                            </div>
                            <div
                              class="border-1 border p-1 m-1 rounded-2"
                              style="background-color: #e3e6ed"
                            >
                              may tinh
                            </div>
                            <div
                              class="border-1 border p-1 m-1 rounded-2"
                              style="background-color: #e3e6ed"
                            >
                              may tinh
                            </div>
                            <div
                              class="border-1 border p-1 m-1 rounded-2"
                              style="background-color: #e3e6ed"
                            >
                              may tinh
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
                                      :to="'/admin/cap-nhat-san-pham'"
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
                        <div
                          class="py-3 d-flex align-items-center"
                          style="min-width: 1100px"
                        >
                          <div class="col-4 d-flex align-items-center">
                            <input
                              class="col-2"
                              type="checkbox"
                              name=""
                              id=""
                            />
                            <img
                              class="rounded-2 col-2"
                              :src="$imageUrl + 'images.jpg'"
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
                                <a
                                  class="text-decoration-underline link-primary"
                                  >danh muc</a
                                >
                              </div>
                            </div>
                          </div>
                          <div class="col-2 text-center">2.999,000 Đ</div>
                          <div
                            class="col-3 p-2 justify-content-center rounded d-flex"
                            style="flex-wrap: wrap"
                          >
                            <div
                              class="border-1 border p-1 m-1 rounded-2"
                              style="background-color: #e3e6ed"
                            >
                              may tinh
                            </div>
                            <div
                              class="border-1 border p-1 m-1 rounded-2"
                              style="background-color: #e3e6ed"
                            >
                              may tinh
                            </div>
                            <div
                              class="border-1 border p-1 m-1 rounded-2"
                              style="background-color: #e3e6ed"
                            >
                              may tinh
                            </div>
                            <div
                              class="border-1 border p-1 m-1 rounded-2"
                              style="background-color: #e3e6ed"
                            >
                              may tinh
                            </div>
                            <div
                              class="border-1 border p-1 m-1 rounded-2"
                              style="background-color: #e3e6ed"
                            >
                              may tinh
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
                                    <router-link :to="'/admin/'">
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
    </div>
  </div>
</template>
  
<style>
</style>

  <script setup>
import "@/assets/js/adminjs/js/crudproduct/productlist.js";
import "@/assets/css/admincss/css/curdproduct/productlist.css";
import NavSuport from "@/components/admin/AdminLayout/NavSuport.vue";
import Rageslider from "@/components/admin/AdminLayout/button/rageslider.vue";
import { ref } from "vue";

const getSelect = ref(0);
const getselectop = (value) => {
  getSelect.value = value;
  console.log(getSelect.value);
};
const getcheck = (value) => {
  if (value == null) {
    return false;
  } else {
    return true;
  }
};
</script>
  
  
  
  
  