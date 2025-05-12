




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
                    <div
                      class="p-3 row align-items-center border-bottom border-black"
                    >
                      <div class="col-4 d-flex align-items-center">
                        <input class="col-2" type="checkbox" name="" id="" />
                        <div class="col-10 d-flex justify-content-center">
                          <b>Tên sản phẩm</b>
                        </div>
                      </div>
                      <div class="col-2 row"><b>Giá sản phẩm</b></div>
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
                    <br />
                    <div class="p-3 row align-items-center">
                      <div class="col-4 d-flex align-items-center">
                        <input class="col-2" type="checkbox" name="" id="" />
                        <img
                          class="rounded-2 col-3"
                          :src="baseImageUrl + 'images.jpg'"
                          alt=""
                          width=""
                          height="80"
                        />
                        <div
                          class="h-100 col-7 px-3"
                          style="box-sizing: border-box"
                        >
                          <div class="text-break text-max-1">
                            asdasdasdasdasdasdasdasdasdasdas
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
                    <div class="p-3 row align-items-center">
                      <div class="col-4 d-flex align-items-center">
                        <input class="col-2" type="checkbox" name="" id="" />
                        <img
                          class="rounded-2 col-3"
                          :src="baseImageUrl + 'images.jpg'"
                          alt=""
                          width=""
                          height="80"
                        />
                        <div
                          class="h-100 col-7 px-3"
                          style="box-sizing: border-box"
                        >
                          <div class="text-break text-max-1">
                            asdasdasdasdasdasdasdasdasdasdas
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
                    <div class="p-3 row align-items-center">
                      <div class="col-4 d-flex align-items-center">
                        <input class="col-2" type="checkbox" name="" id="" />
                        <img
                          class="rounded-2 col-3"
                          :src="baseImageUrl + 'images.jpg'"
                          alt=""
                          width=""
                          height="80"
                        />
                        <div
                          class="h-100 col-7 px-3"
                          style="box-sizing: border-box"
                        >
                          <div class="text-break text-max-1">
                            asdasdasdasdasdasdasdasdasdasdas
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
/* Toggle switch với class riêng để tránh trùng */
.nlb-toggle-switch {
  position: relative;
  display: inline-block;
  width: 50px;
  height: 28px;
}

.nlb-toggle-input {
  opacity: 0;
  width: 0;
  height: 0;
}

.nlb-slider {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  border-radius: 28px;
  cursor: pointer;
  transition: background-color 0.4s;
}

.nlb-slider::after {
  content: "";
  position: absolute;
  width: 22px;
  height: 22px;
  left: 3px;
  bottom: 3px;
  background-color: white;
  border-radius: 50%;
  transition: transform 0.4s;
}

/* Khi checkbox được check */
.nlb-toggle-input:checked + .nlb-slider {
  background-color: #66bb6a;
}

.nlb-toggle-input:checked + .nlb-slider::after {
  transform: translateX(22px);
}
</style>

  <script setup>
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
  
  
  
  
  