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
                      <label for="usr">Tên danh mục:</label>
                      <input
                        v-model="category_name"
                        value="máy tính"
                        placeholder="nhập tên sản phẩm"
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
                        <button
                          type="button"
                          class="btn rounded-start-0 top-0 end-0 btn-danger position-absolute"
                        >
                          Thêm danh mục
                        </button>
                      </form>

                      <ul
                        id="myULcate"
                        class="position-absolute my-ul-list top-100 w-100"
                        style="left: 0"
                      >
                        <li>
                          <div href="#" class="box-con w-100">
                            <label class="w-100" for="idcate-1">
                              <input
                                type="radio"
                                class="list_cate"
                                name="category_product"
                                id="idcate-1"
                                value="Con cá 1"
                                v-on:click="Adminlayout.clickout('myULcate')"
                                v-on:change="categoryget(1)"
                              />
                              Con cá 1
                            </label>
                          </div>
                        </li>
                        <li>
                          <div href="#" class="box-con w-100">
                            <label class="w-100" for="idcate-2">
                              <input
                                type="radio"
                                class="list_cate"
                                name="category_product"
                                id="idcate-2"
                                value="Con cá 2"
                                v-on:click="Adminlayout.clickout('myULcate')"
                                v-on:change="categoryget(2)"
                              />
                              Con cá 2
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
                      <select name="" class="form-control mt-1" id="">
                        <option value="" class="">Chưa kích hoạt</option>
                        <option value="" class="">Kích hoạt</option>
                      </select>
                    </div>

                    <div class="collapse mt-3" id="collapseExamplevari">
                      <h6 class="d-flex">
                        <div
                          class="cursor-pointer link-danger"
                          @click="variantcontroll.upstepvariant(1)"
                          href=""
                        >
                          Thêm thuộc tính
                        </div>
                        <div class="mx-1">/</div>
                        <div
                          class=""
                          :class="{
                            'link-danger':
                              variantcontroll.stepvariant == 2 ||
                              variantcontroll.stepvariant == 3,
                          }"
                        >
                          Tạo biến thể
                        </div>
                        <div class="mx-1">/</div>
                        <div
                          class=""
                          :class="{
                            'link-danger': variantcontroll.stepvariant == 3,
                          }"
                        >
                          Thêm sản phẩm biến thể
                        </div>
                      </h6>
                      <div
                        class="card card-body"
                        style="box-shadow: 0 0 2px rgba(0, 0, 0, 0.5)"
                      >
                        <div v-show="variantcontroll.stepvariant == 1" class="">
                          <StepOneVariant />
                        </div>
                        <div v-show="variantcontroll.stepvariant == 2" class="">
                          <StepTwoVariant />
                          <div class=""></div>
                        </div>
                        <div v-show="variantcontroll.stepvariant == 3" class="">
                          <StepFinalVariant />
                          <div class=""></div>
                        </div>
                      </div>
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
                        @returnimg="reimg"
                      />
                      <input type="hidden" id="" name="selected_image" />
                    </div>
                  </div>
                  <div class="w-100">
                    <button
                      type="button"
                      @click="uploadcate()"
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
import dragimgextra from "@/components/admin/AdminLayout/button/imagesupload/dragextraimg.vue";
import StepOneVariant from "@/components/admin/AdminLayout/variantstep/StepOneVariant.vue";
import StepTwoVariant from "@/components/admin/AdminLayout/variantstep/StepTwoVariant.vue";
import StepFinalVariant from "@/components/admin/AdminLayout/variantstep/StepFinalVariant.vue";
import { variantcontrollerad } from "@/assets/js/adminjs/js/crudproduct/variantproad";
const variantcontroll = variantcontrollerad();
import { onMounted, watch, ref } from "vue";
import axios from "axios";
const Adminlayout = AdminLayout();

const inputvariant = ref([]);

const category_name = ref("");
const image = ref("");
const category_parent_name = ref(null);
const category_parent_id = ref(null);
const slug = ref("");
function reimg(img) {
  image.value = img;
}
const uploadcate = async () => {
  const formData = new FormData();
  formData.append("category_name", category_name.value);
  formData.append("category_parent_id", category_parent_id.value);
  formData.append("image", image.value);
  formData.append("slug", slug.value || "");

  try {
    const response = await axios.post(`/api/seller-category`, formData);
    console.log(response);
    /*  errors.value = {}; */
  } catch (error) {
    {
      console.log(error.response.data);
    }
  }
};

onMounted(() => {});
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
const stepvariant = ref(0);
</script>
