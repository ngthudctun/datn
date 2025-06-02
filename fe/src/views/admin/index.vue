
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
    <div class="body-wrapper" style="overflow: hidden; box-sizing: border-box">
      <!--  Header Start -->
      <NavSuport />
      <!--  Header End -->

      <div class="p-2" style="box-sizing: border-box">
        <div class="">
          <div class="row py-3 bg-white" style="">
            <div class="">
              <div class="mt-1"><h5>Bảng điều khiển</h5></div>
              <hr />
              <div class="mt-3" style="padding-top: 20px">
                <div class="row">
                  <div class="col-lg-3 col-sm-6 py-1">
                    <div class="d-flex rounded border border-dark-light px-1">
                      <div
                        class="col-3 p-3 m-1 bg-secondary text h1 rounded text-white d-flex justify-content-center"
                      >
                        <i class="fa-solid fa-globe"></i>
                      </div>
                      <div
                        class="d-flex col-9 px-3 flex-column align-items-center justify-content-center"
                      >
                        <div class="">cài đặt trang</div>
                        <b>xem thêm</b>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3 col-sm-6 py-1">
                    <div class="d-flex rounded border border-dark-light px-1">
                      <div
                        class="col-3 p-3 m-1 bg-primary text h1 rounded text-white d-flex justify-content-center"
                      >
                        <i class="fa-solid fa-user"></i>
                      </div>
                      <div
                        class="d-flex col-9 px-3 flex-column align-items-center justify-content-center"
                      >
                        <div class="">cài đặt trang cá nhân</div>
                        <b>xem thêm</b>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3 col-sm-6 py-1">
                    <div class="d-flex rounded border border-dark-light px-1">
                      <div
                        class="col-3 p-3 m-1 bg-gradient bg-danger text h1 rounded text-white d-flex justify-content-center"
                      >
                        <i class="fa-solid fa-key"></i>
                      </div>
                      <div
                        class="d-flex col-9 px-3 flex-column align-items-center justify-content-center"
                      >
                        <div class="">Cài đặt tài khoản</div>
                        <b>xem thêm</b>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3 col-sm-6 py-1">
                    <div class="d-flex rounded border border-dark-light px-1">
                      <div
                        class="col-3 p-3 m-1 bg-dark bg text h1 rounded text-white d-flex justify-content-center"
                      >
                        <i class="fa-solid fa-envelope"></i>
                      </div>
                      <div
                        class="d-flex col-9 px-3 flex-column align-items-center justify-content-center"
                      >
                        <div class="">Hộp thư đến</div>
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

        <div class="pt-0">
          <div class="row bg-white py-3" style="">
            <div class="">
              <div class="mt-1"><h5>Bảng điều khiển</h5></div>
              <hr />
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
                      class="d-flex bg-primary rounded border border-dark-light text-white px-1"
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
        <div class="pt-0">
          <div class="row bg-white" style="">
            <div class="border py-2">
              <div class="mt-1"><h5>Thống kê sô liệu</h5></div>
              <div class="border-top mt-3">
                <div class="row">
                  <div class="col-6 col-lg-3 py-1">
                    <div class="d-flex rounded px-1">
                      <div class="col-3 p-3 m-1 text h1 rounded text-white">
                        <i
                          class="fas fa-chart-bar bg-secondary p-2 rounded-5"
                        ></i>
                      </div>
                      <div
                        class="d-flex col-9 px-3 flex-column align-items-start justify-content-center"
                      >
                        <div class="">Đang online</div>
                        <b>123123</b>
                      </div>
                    </div>
                  </div>

                  <div class="col-6 col-lg-3 py-1">
                    <div class="d-flex rounded px-1">
                      <div class="col-3 p-3 m-1 text h1 rounded text-white">
                        <i
                          class="fas fa-chart-bar bg-primary p-2 rounded-5"
                        ></i>
                      </div>
                      <div
                        class="d-flex col-9 px-3 flex-column align-items-start justify-content-center"
                      >
                        <div class="">Online trong ngày</div>
                        <b>123123</b>
                      </div>
                    </div>
                  </div>

                  <div class="col-6 col-lg-3 py-1">
                    <div class="d-flex rounded px-1">
                      <div class="col-3 p-3 m-1 text h1 rounded text-white">
                        <i class="fas fa-chart-bar bg-danger p-2 rounded-5"></i>
                      </div>
                      <div
                        class="d-flex col-9 px-3 flex-column align-items-start justify-content-center"
                      >
                        <div class="">Online trong tuần</div>
                        <b>123213</b>
                      </div>
                    </div>
                  </div>

                  <div class="col-6 col-lg-3 py-1">
                    <div class="d-flex rounded px-1">
                      <div class="col-3 p-3 m-1 text h1 rounded text-white">
                        <i
                          class="fas fa-chart-bar bg-warning p-2 rounded-5"
                        ></i>
                      </div>
                      <div
                        class="d-flex col-9 px-3 flex-column align-items-start justify-content-center"
                      >
                        <div class="">Online trong tháng</div>
                        <b>12312312</b>
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
        <div class="body-wrapper-inner">
          <div class=" ">
            <!--  Row 1 -->
            <div class="row" style="box-sizing: border-box">
              <div class="col-lg-8 d-flex align-items-strech p-0">
                <div class="card w-100">
                  <div class="card-body">
                    <div
                      class="d-sm-flex d-block align-items-center justify-content-between mb-9"
                    >
                      <div class="mb-3 mb-sm-0">
                        <h5 class="card-title fw-semibold">Sales Overview</h5>
                      </div>
                      <div>
                        <select class="form-select">
                          <option value="1">March 2025</option>
                          <option value="2">April 2025</option>
                          <option value="3">May 2025</option>
                          <option value="4">June 2025</option>
                        </select>
                      </div>
                    </div>
                    <div id=""><chart /></div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 p-0">
                <div class="row bg-white">
                  <div class="col-lg-12">
                    <!-- Yearly Breakup -->
                    <div class="card overflow-hidden">
                      <div class="card-body">
                        <h5 class="card-title mb-9 fw-semibold">
                          Tổng doanh thu
                        </h5>
                        <div class="row align-items-center">
                          <div class="col-7">
                            <h4 class="fw-semibold mb-3">36,358 VND</h4>

                            <div class="d-flex align-items-center">
                              <div class="me-4">
                                <span
                                  class="round-8 bg-primary rounded-circle me-2 d-inline-block"
                                ></span>
                                <span class="">2025</span>
                              </div>
                              <div>
                                <span
                                  class="round-8 bg-light-primary rounded-circle me-2 d-inline-block"
                                ></span>
                                <span class="">2024</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-5">
                            <chart2 />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12 bg-white">
                    <!-- Monthly Earnings -->
                    <div class="card mb-0">
                      <div class="card-body h-100">
                        <div class="row alig n-items-start">
                          <div class="col-8">
                            <h5 class="card-title mb-9 fw-semibold">
                              Tổng đơn hàng
                            </h5>
                            <h4 class="fw-semibold mb-3">Tổng: 2333</h4>
                            <div class="d-flex align-items-center pb-1">
                              <span
                                class="me-2 rounded-circle bg-light-danger round-20 d-flex align-items-center justify-content-center"
                              >
                                <i
                                  class="ti ti-arrow-down-right text-danger"
                                ></i>
                              </span>
                            </div>
                          </div>
                          <div class="col-4">
                            <div class="d-flex justify-content-end">
                              <div
                                class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center"
                              >
                                <i class="ti ti-currency-dollar fs-6"></i>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 d-flex align-items-stretch">
                <div class="card w-100">
                  <div class="card-body p-4">
                    <div class="mb-4">
                      <h5 class="card-title fw-semibold">Lịch sử đơn hàng</h5>
                    </div>
                    <ul class="timeline-widget mb-0 position-relative mb-n5">
                      <li
                        class="timeline-item d-flex position-relative overflow-hidden"
                      >
                        <div
                          class="timeline-time text-dark flex-shrink-0 text-end"
                        >
                          09:30
                        </div>
                        <div
                          class="timeline-badge-wrap d-flex flex-column align-items-center"
                        >
                          <span
                            class="timeline-badge border-2 border border-primary flex-shrink-0 my-8"
                          ></span>
                          <span
                            class="timeline-badge-border d-block flex-shrink-0"
                          ></span>
                        </div>
                        <div class="">
                          giao hàng thành công hóa đơn 50.000.000d
                        </div>
                      </li>
                      <li
                        class="timeline-item d-flex position-relative overflow-hidden"
                      >
                        <div
                          class="timeline-time text-dark flex-shrink-0 text-end"
                        >
                          10:00 am
                        </div>
                        <div
                          class="timeline-badge-wrap d-flex flex-column align-items-center"
                        >
                          <span
                            class="timeline-badge border-2 border border-info flex-shrink-0 my-8"
                          ></span>
                          <span
                            class="timeline-badge-border d-block flex-shrink-0"
                          ></span>
                        </div>
                      </li>
                      <li
                        class="timeline-item d-flex position-relative overflow-hidden"
                      ></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-lg-8 d-flex align-items-stretch">
                <div class="card w-100">
                  <div class="card-body">
                    <div
                      class="d-sm-flex d-block align-items-center justify-content-between mb-7"
                    >
                      <div class="mb-3 mb-sm-0">
                        <h4 class="card-title fw-semibold">
                          Sản phẩm bán chạy
                        </h4>
                      </div>
                      <div>
                        <select class="form-select">
                          <option value="1">March 2025</option>
                          <option value="2">April 2025</option>
                          <option value="3">May 2025</option>
                          <option value="4">June 2025</option>
                        </select>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <div class="border-bottom py-3">
                          <div class="row">
                            <div class="col-3 text-start">
                              <b>Tên sản phẩm</b>
                            </div>
                            <div class="col-3 text-center">
                              <b>Số lượng còn </b>
                            </div>
                            <div class="col-2 text-center">
                              <b>Số lượng bán </b>
                            </div>
                            <div class="col-3 text-center"><b>Đánh giá</b></div>
                            <div class="col-1 text-center"></div>

                            <!-- Dropdown -->
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="">
                      <div class="row">
                        <div class="py-3">
                          <div class="row">
                            <div class="col-3 text-start">banh trang 123</div>
                            <div class="col-3 text-center">
                              <div class="text-success"><b>553</b></div>
                            </div>
                            <div class="col-2 text-center"><b>233</b></div>
                            <div class="col-3 text-center text-warning">
                              <i class="fa-solid fa-star"></i
                              ><i class="fa-solid fa-star"></i
                              ><i class="fa-solid fa-star"></i
                              ><i class="fa-solid fa-star"></i
                              ><i class="fa-solid fa-star"></i>
                            </div>
                            <div class="col-1 text-center">
                              <div class="">
                                <div class="dropdown">
                                  <div
                                    class=""
                                    type="button"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false"
                                  >
                                    <i
                                      class="fa-solid fa-ellipsis-vertical"
                                    ></i>
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

                            <!-- Dropdown -->
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class=""></div>
         
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import chart from "@/components/admin/chart/chart.vue";
import NavSuport from "@/components/admin/AdminLayout/NavSuport.vue";
import chart2 from "@/components/admin/chart/chart2.vue";
import { baseImageUrl } from "@/config/constans.js";
</script>




