<template>
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div class="body-wrapper" style="overflow: hidden; box-sizing: border-box">
      <!-- Sidebar Start -->

      <!--  Sidebar End -->
      <!--  Main wrapper -->

      <!--  Header Start -->

      <!--  Header End -->
      <div class="">
        <NavSuport />
      </div>
      <div id="toastbox" style="height: 100px" class="toastbox"></div>
      <div class="bg-white" style="padding-top: 70px">
        <div class="row border-black py-4">
          <div class="px-4" style="box-sizing: border-box">
            <div class="">
              <div class="ps-3" style="box-sizing: border-box">
                <h2>Danh sách danh mục</h2>
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
                      <div class="btn btn-danger rounded-end-0 text-center col-5">
                        <router-link to="/admin/them-danh-muc">
                          <div class="w-100">
                            <b class="text-white"> thêm danh mục</b>
                          </div>
                        </router-link>
                      </div>

                      <div class="rounded-end d-flex align-items-center col-7" style="background-color: #b2acac42">
                        <form class="d-flex align-items-center">
                          <i class="fas fa-search"></i>
                          <input v-model="filtersearch" v-on:input="getListCateSell()"
                            class="form-control mx-2 border-0 p-0" style="background-color: rgb(227 230 237 / 0%)"
                            type="" placeholder="Tìm kiếm danh mục" aria-label="" />
                        </form>
                      </div>
                    </div>
                    <div class="col-12 col-lg-6 mt-3 mt-lg-0 col-lg-6 d-flex justify-content-start"
                      style="flex-wrap: wrap">
                      <div class="col-12 col-lg-6 d-flex justify-content-center">
                        <select v-on:change="getListCateSell()" v-model="filtertime"
                          class="form-select w-100 text-center border-1">
                          <option value="newest">mới nhất</option>
                          <option value="oldest">cũ nhất</option>
                        </select>
                      </div>
                      <div class="col-12 w-100 col-lg-6 mt-2 mt-lg-0 d-flex justify-content-center">
                        <select v-on:change="getListCateSell()" v-model="filtertrash"
                          class="form-select w-100 text-center border-1 px-1" style="box-sizing: border-box">
                          <option value="1">Kích hoạt</option>
                          <option value="2">Đã ẩn</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row box-product" style="overflow-x: auto; ">
                    <ul style="border-bottom: 1px solid;">
                      <li>
                        <div class="mt-4 d-flex align-items-center"
                          style="background-color: #b3b3b31a; min-width: 1100px">
                          <div class="col-4 d-flex justify-content-center align-items-center">
                            <input class="" type="checkbox" name="" id="" />
                            <div class="col-10 d-flex justify-content-center">
                              <b>Tên danh mục</b>
                            </div>
                          </div>
                          <div class="col-2 text-center">
                            <b>Cập nhật gần nhất</b>
                          </div>
                          <div class="col-3 p-2 rounded d-flex justify-content-center" style="flex-wrap: wrap">
                            <b>Số lượng sản phẩm</b>
                          </div>
                          <div class="col-2 d-flex justify-content-center">
                            <b>Trạng thái</b>
                          </div>
                        </div>

                        <div v-for="(item, index) in catelist.data" :key="index" class="py-3 d-flex align-items-center"
                          style="min-width: 1100px">
                          <div class="col-4 d-flex align-items-center">
                            <input class="col-2" type="checkbox" name="" id="" />
                            <img class="rounded-2 col-2" :src="$imageUrl + item.image" alt="" width="100px"
                              height="50px" />
                            <div class="h-100 col-7 px-3" style="box-sizing: border-box">
                              <div class="text-break text-max-1">
                                {{ item.category_name }}
                              </div>
                            </div>
                          </div>
                          <div class="col-2 text-center">
                            {{ formatDate(item.updated_at) }}
                          </div>
                          <div class="col-3 p-2 justify-content-center rounded d-flex" style="flex-wrap: wrap">
                            <a href=""> {{ item.products_count }} sản phẩm</a>
                          </div>
                          <div class="col-2 d-flex justify-content-center">
                            <label class="switch">
                              <label class="nlb-toggle-switch">
                                <input type="checkbox" class="nlb-toggle-input" @click="changestatus(item.id)"
                                  :checked="getcheck(item.status)" />
                                <span class="nlb-slider"></span>
                              </label>
                              <span class="slider round"></span>
                            </label>
                          </div>
                          <div class="col-1 d-flex justify-content-center">
                            <div class="">
                              <div class="dropdown">
                                <div class="" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  <i class="fa-solid fa-ellipsis-vertical"></i>
                                </div>
                                <ul class="dropdown-menu">
                                  <li>
                                    <router-link :to="'/admin/cap-nhat-danh-muc/' + item.id
                                      ">
                                      <div class="dropdown-item">
                                        Chỉnh sửa
                                      </div>
                                    </router-link>
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
                    <ul class="pagination d-flex justify-content-end mt-2 px-5" style="box-sizing: border-box;">
                      <li v-for="(link, index) in catelist.links" :key="index" class="page-item" :class="{
                        active: link.active,
                        disabled: link.url === null,
                      }">
                        <a class="page-link" href="#" @click.prevent="
                          link.url
                            ? GetPaniCate(
                              link.url,
                              filtertrash,
                              filtertime,
                              filtersearch
                            )
                            : null
                          " v-html="link.label"></a>
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

<style></style>

<script setup>
import "@/assets/js/adminjs/js/crudproduct/productlist.js";
import "@/assets/css/admincss/css/curdproduct/productlist.css";
import NavSuport from "@/components/admin/AdminLayout/NavSuport.vue";
import Rageslider from "@/components/admin/AdminLayout/button/rageslider.vue";
import { ref, onMounted } from "vue";

import { useShowtoast } from "@/assets/js/toast";
import axios from "axios";
import Categories from "@/components/user/home/Categories.vue";
import dayjs from "dayjs";
const toastStore = useShowtoast();
const formatDate = (datetime) => {
  return dayjs(datetime).format("DD/MM/YYYY HH:mm");
};

const catelist = ref([]);
const filtertime = ref("newest");
const filtertrash = ref(1);
const filtersearch = ref(null);

const getListCateSell = async () => {
  try {
    const response = await axios.get(`/api/seller-category`, {
      params: {
        search: filtersearch.value,
        sort: filtertime.value,
        status: filtertrash.value,
      },
    });
    catelist.value = response.data; // Cập nhật dữ liệu
    console.log(catelist.value);
  } catch (error) {
    console.error("Lỗi khi gọi API:", error);
  }
};
const decodeHtml = (html) => {
  const txt = document.createElement("textarea");
  txt.innerHTML = html;
  return txt.value;
};
const GetPaniCate = async (link, status, sort, search) => {
  try {
    if (!link) return;

    const url = new URL(decodeHtml(link));
    if (status) url.searchParams.set("status", filtertrash.value);
    if (sort) url.searchParams.set("sort", filtertime.value);
    if (search) url.searchParams.set("search", filtersearch.value);

    const response = await axios.get(url.toString());

    catelist.value = response.data;
  } catch (error) {
    console.error("Lỗi khi gọi API:", error);
  }
};

onMounted(() => {
  getListCateSell(); // Gọi API khi component được mount
});

const getSelect = ref(0);
const getselectop = (value) => {
  getSelect.value = value;
  console.log(getSelect.value);
};

const getcheck = (checkvalue) => {
  console.log(checkvalue);
  if (checkvalue == 1) {
    return true;
  } else {
    return false;
  }
};

const changestatus = async (id) => {
  try {
    const response = await axios.patch("/api/seller-category-change-status", {
      id,
    });

    toastStore.toast({
      title: "Thông báo",
      message: response.data.message,
      type: response.data.type,
      duration: 2000,
    });
    console.log(response);
  } catch (error) {
    console.error("Lỗi khi đổi trạng thái:", error);
  }
};
</script>