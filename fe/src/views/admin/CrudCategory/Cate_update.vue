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
          <div class="px-lg-2" style="box-sizing: border-box">
            <div class="">
              <div class="ps-3" style="box-sizing: border-box">
                <h2>Cập nhật danh mục</h2>
                <div class="">
                  <h6 class="d-flex">
                    <a class="text-danger" href="">Trang chủ</a>
                    <div class="mx-1">/</div>
                    cập nhật danh mục
                  </h6>
                </div>
              </div>
            </div>
            <div class="mt-4" style="border-top: 1px solid #e1e1e1">
              <div class="w-100 d-flex flex-wrap">
                <div
                  class="col-12 col-lg-8"
                  style="border-right: 1px solid #e1e1e1"
                >
                  <div class="p-2" style="box-sizing: border-box">
                    <div class="form-group mt-3">
                      <label for="usr"
                        >Tên danh mục:
                        <div
                          v-if="erroraray && erroraray['category_name']"
                          class="text-danger mx-2"
                        >
                          {{ erroraray["category_name"][0] }}
                        </div></label
                      >
                      <input
                        v-model="category_name"
                        value="máy tính"
                        placeholder="nhập tên danh mục"
                        type="text"
                        class="mt-1 form-control"
                        id="usr"
                        style="box-shadow: 0 0 2px rgba(0, 0, 0, 0.5)"
                      />
                    </div>

                    <div class="form-group mt-3 position-relative">
                      <label for="usr">Danh mục cha:</label>
                      <form
                        class="d-flex form-control mt-1 align-items-center position-relative"
                        for="myInputcate"
                        style="box-shadow: 0 0 2px rgba(0, 0, 0, 0.5)"
                      >
                        <input
                          placeholder="VD: Máy tính-Máy tính bảng-laptop"
                          autocomplete="off"
                          class="m-0 p-0 w-100 border-0"
                          type="text"
                          id="myInputcate"
                          v-on:click="
                            Adminlayout.myFunction('myInputcate', 'myULcate')
                          "
                          v-on:input="
                            Adminlayout.myFunction('myInputcate', 'myULcate')
                          "
                        />
                      </form>

                      <ul
                        id="myULcate"
                        class="position-absolute my-ul-list top-100 w-100"
                        style="left: 0"
                      >
                        <li
                          v-for="(item, index) in category_parent_arr"
                          :key="index"
                        >
                          <div href="#" class="box-con w-100">
                            <label class="w-100" :for="'idcate-' + item.id">
                              <input
                                type="radio"
                                class="list_cate"
                                name="category_product"
                                :id="'idcate-' + item.id"
                                :value="item.category_name"
                                v-on:click="Adminlayout.clickout('myULcate')"
                                v-on:change="categoryget(item.id)"
                              />
                              {{ item.category_name }}
                            </label>
                          </div>
                        </li>
                      </ul>
                      <div class="d-flex flex-wrap">
                        <div
                          v-if="category_parent_name != null"
                          class="me-2 p-1 rounded d-flex align-items-center"
                          style="background-color: #e1e1e1"
                        >
                          <i
                            v-on:click="deletecateselect()"
                            class="fa-solid fa-trash px-2 link-secondary"
                            style="border-right: 1px solid"
                          ></i>
                          <div id="showcate_select" class="px-2">
                            {{ category_parent_name }}
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group mt-3">
                      <label for="usr">Trạng thái danh mục:</label>
                      <select
                        v-model="status"
                        name=""
                        class="form-control mt-1"
                        id=""
                      >
                        <option value="2" class="">Chưa kích hoạt</option>
                        <option value="1" class="">Kích hoạt</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-lg-4">
                  <div class="p-2" style="box-sizing: border-box">
                    <div class="form-group mt-3">
                      <label for="">Slug</label>
                      <input
                        v-model="slug"
                        value="may-tinh"
                        autocomplete="off"
                        placeholder="VD: may-tinh"
                        type="text"
                        class="mt-1 form-control"
                        id="usr"
                        style="box-shadow: 0 0 2px rgba(0, 0, 0, 0.5)"
                      />
                    </div>

                    <div class="form-group mt-3 position-relative">
                      <label for="usr">Hình ảnh danh mục</label><br />
                      <dragimg
                        type="categories"
                        classify="variantpro"
                        inputshowimg="imageindex"
                        hideninp="lableindex"
                        :haveImage="image"
                        @returnimg="reimg"
                      />
                      <input type="hidden" id="" name="selected_image" />
                    </div>
                  </div>
                  <div class="w-100">
                    <button
                      type="button"
                      @click="updateCate()"
                      class="w-100 btn btn-danger"
                    >
                      Thêm danh mục
                    </button>
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
import "@/assets/css/admincss/css/curdproduct/productadd.css";
import "@/assets/css/bootstrap.min.css";
import NavSuport from "@/components/admin/AdminLayout/NavSuport.vue";
import { AdminLayout } from "@/storage/admin/layoutAdmin";
import Adminwordtext from "@/components/admin/AdminLayout/textword.vue";
import dragimg from "@/components/admin/AdminLayout/button/imagesupload/dragimg.vue";
import Swal from "sweetalert2";
import { onMounted, watch, ref } from "vue";
import { useRoute } from "vue-router";

import axios from "axios";
const Adminlayout = AdminLayout();
const route = useRoute();
const inputvariant = ref([]);
const id = route.params.id;
console.log("Route ID:", route.params.id);
const erroraray = ref(null);
const category_parent_arr = ref(null);
const category_name = ref("");
const image = ref("");
const category_parent_name = ref(null);
const category_parent_id = ref(0);
const slug = ref("");
const status = ref(1);
function reimg(img) {
  image.value = img;
}

const getCategory = async () => {
  try {
    const response = await axios.get(`/api/seller-category/${id}`);
    category_name.value = response.data.data.category_name;
    image.value = response.data.data.image;
    category_parent_name.value = response.data.data.category_parent_name;
    category_parent_id.value = response.data.data.category_parent_id;
    slug.value = response.data.data.slug;
    status.value = response.data.data.status;
    category_parent_arr.value = response.data.cateparent;
    console.log(response);
  } catch (error) {
    console.log(error);
  }
};

const updateCate = async () => {
  const formData = new FormData();
  formData.append("_method", "PATCH");
  formData.append("category_name", category_name.value);
  formData.append("category_parent_id", category_parent_id.value || 0);
  formData.append("image", image.value || "");
  formData.append("slug", slug.value || "");
  formData.append("status", status.value || "");

  try {
    const response = await axios.post(`/api/seller-category/${id}`, formData);
    console.log(response);
    if (response) {
      Swal.fire({
<<<<<<< HEAD
        icon: "success",
        title: response.data.type,
        text: response.data.message,
=======
        icon: response.data.type,
        title: response.data.message,
        text: "bạn sẽ được chuyển hướng sau 2 giây",
>>>>>>> 0055686a09fb6751679672067b3054586721cd03
        timer: 2000,
        showConfirmButton: true,
      });

      setTimeout(() => {
        erroraray.value = null;
        window.location.href = "/admin/danh-sach-danh-muc";
      }, 2000);
    }
  } catch (error) {
    if (error.response) {
      erroraray.value = error.response.data.errors;
      console.log(erroraray.value);
    }
  }
};

onMounted(() => {
  getCategory();
});

function categoryget(valuenum) {
  var inputshowcatevalue = document.getElementById("idcate-" + valuenum).value;
  category_parent_name.value = inputshowcatevalue;
  category_parent_id.value = valuenum;
  console.log(category_parent_id.value);
}
function deletecateselect() {
  document.querySelectorAll('input[type="radio"].list_cate').forEach((r) => {
    r.checked = false;
  });
  category_parent_name.value = null;
  category_parent_id.value = null;
}
</script>
