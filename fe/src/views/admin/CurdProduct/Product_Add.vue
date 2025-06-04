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
                <h2>Thêm sản phẩm sản phẩm</h2>
                <div class="">
                  <h6 class="d-flex">
                    <a class="text-danger" href="">Trang chủ</a>
                    <div class="mx-1">/</div>
                    Danh sách sản phẩm
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
                      <label for="usr">Tên sản phẩm:</label>
                      <input
                        v-model="nameproduct"
                        placeholder="nhập tên sản phẩm"
                        type="text"
                        class="mt-1 form-control"
                        :id="'product_name'"
                        style="box-shadow: 0 0 2px rgba(0, 0, 0, 0.5)"
                      />
                    </div>
                    <div class="form-group mt-3 position-relative">
                      <label for="usr">Danh mục:</label>
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
                    </div>

                    <div class="d-flex flex-wrap">
                      <div
                        v-if="category_name != null"
                        class="me-2 p-1 rounded d-flex align-items-center"
                        style="background-color: #e1e1e1"
                      >
                        <i
                          v-on:click="deletecateselect()"
                          class="fa-solid fa-trash px-2 link-secondary"
                          style="border-right: 1px solid"
                        ></i>
                        <div id="showcate_select" class="px-2">
                          {{ category_name }}
                        </div>
                      </div>
                    </div>

                    <label class="my-1" for="">Mô tả chi tiết</label>
                    <Adminwordtext @getpost="getpostpr" />
                    <div class="form-group mt-3">
                      <label for="usr">Trạng thái sản phẩm:</label>
                      <select name="" class="form-control mt-1" id="">
                        <option value="" class="">Chưa kích hoạt</option>
                        <option value="" class="">Kích hoạt</option>
                      </select>
                    </div>
                    <div class="form-group mt-3 d-flex align-items-center">
                      <label for="usr">Kích hoạt biến thể:</label>
                      <label
                        data-bs-toggle="collapse"
                        data-bs-target="#collapseExamplevari"
                        aria-expanded="false"
                        aria-controls="collapseExamplevari"
                        class="custom-switch mx-2"
                      >
                        <input type="checkbox" />
                        <span class="custom-slider"></span>
                      </label>
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
                        <div v-if="variantcontroll.stepvariant == 1" class="">
                          <StepOneVariant />
                        </div>
                        <div
                          v-else-if="variantcontroll.stepvariant == 2"
                          class=""
                        >
                          <StepTwoVariant />
                        </div>
                        <div
                          v-else-if="variantcontroll.stepvariant == 3"
                          class=""
                        >
                          <StepFinalVariant @variantvalue="variantget" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-lg-4">
                  <div class="p-2" style="box-sizing: border-box">
                    <div class="form-group mt-3">
                      <label for="">Sku :</label>
                      <input
                        v-model="skuproduct"
                        autocomplete="off"
                        placeholder="WWW-RRE-DD"
                        type="text"
                        class="mt-1 form-control"
                        id="usr"
                        style="box-shadow: 0 0 2px rgba(0, 0, 0, 0.5)"
                      />
                    </div>
                    <div class="form-group mt-3">
                      <label for="">Số lượng tồn kho:</label>
                      <input
                        autocomplete="off"
                        placeholder="VD: 12"
                        type="text"
                        class="mt-1 form-control"
                        id="usr"
                        style="box-shadow: 0 0 2px rgba(0, 0, 0, 0.5)"
                      />
                    </div>

                    <div class="form-group mt-3 position-relative">
                      <label for="usr">Hình ảnh sản phẩm</label><br />
                      <dragimg
                        type="product"
                        classify="variantpro"
                        inputshowimg="imageindex"
                        hideninp="lableindex"
                        @returnimg="reimg"
                      />
                      <input type="hidden" id="" name="selected_image" />
                    </div>
                    <div class="form-group mt-3">
                      <label for="">Giá cũ sản phẩm:</label>
                      <input
                        autocomplete="off"
                        placeholder="Nhập giá tiền gốc"
                        type="text"
                        class="mt-1 form-control"
                        id="usr"
                        style="box-shadow: 0 0 2px rgba(0, 0, 0, 0.5)"
                      />
                    </div>

                    <div class="form-group mt-3">
                      <label for="">Giá mới sản phẩm:</label>
                      <input
                        type="text"
                        placeholder="nhập giá tiền khuyến mãi (nếu có)"
                        class="mt-1 form-control"
                        id="usr"
                        style="box-shadow: 0 0 2px rgba(0, 0, 0, 0.5)"
                      />
                    </div>
                    <br />
                    <div class="w-100">
                      <button
                        type="button"
                        v-on:click="sumbitaddpro()"
                        class="w-100 btn btn-danger"
                      >
                        Thêm sản phẩm
                      </button>
                    </div>
                    <hr />
                    <div class="form-group mt-3 position-relative">
                      <label for="usr">Hình ảnh thêm</label>
                      <dragimgextra @returnimg="reimgex" />
                      <input
                        type="hidden"
                        id="value_img-hiden"
                        name="selected_image"
                      />
                    </div>
                    <div class="form-group">
                      <label for="">Cân nặng sản phẩm (kg):</label>
                      <input
                        autocomplete="off"
                        placeholder="Nhập Cân nặng sản phẩm"
                        type="text"
                        class="mt-1 form-control"
                        id="usr"
                        style="box-shadow: 0 0 2px rgba(0, 0, 0, 0.5)"
                      />
                    </div>
                    <div class="form-group">
                      <label for="">Kích cỡ (D-R-C) (cm):</label>
                      <div class="d-flex">
                        <div class="col-4 p-0">
                          <input
                            v-model="lengthpro"
                            autocomplete="off"
                            placeholder="Dài"
                            type="text"
                            class="mt-1 form-control"
                            id="usr"
                            style="box-shadow: 0 0 2px rgba(0, 0, 0, 0.5)"
                          />
                        </div>
                        <div class="col-4 px-1">
                          <input
                            v-model="widepro"
                            autocomplete="off"
                            placeholder="Rộng"
                            type="text"
                            class="mt-1 form-control"
                            id="usr"
                            style="box-shadow: 0 0 2px rgba(0, 0, 0, 0.5)"
                          />
                        </div>
                        <div class="col-4 p-0">
                          <input
                            v-model="heightpro"
                            autocomplete="off"
                            placeholder="Cao"
                            type="text"
                            class="mt-1 form-control"
                            id="usr"
                            style="box-shadow: 0 0 2px rgba(0, 0, 0, 0.5)"
                          />
                        </div>
                      </div>
                    </div>
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
const Adminlayout = AdminLayout();
const stepvariant = ref(0);

const category_name = ref(null);

/* khai bao gia tri */
const category_id = ref(null);
const nameproduct = ref(null);
const imagename = ref(null);
const imageextra = ref(null);
const skuproduct = ref(null);
const stockquantity = ref(1);
const price = ref(0);
const pricesale = ref(0);
const prodetails = ref("");
const status = ref(1);
const weight = ref(null);
const widepro = ref(null);
const heightpro = ref(null);
const lengthpro = ref(null);
const variantproduct = ref(null);
/* end khai bao */

function deletecateselect() {
  document.querySelectorAll('input[type="radio"].list_cate').forEach((r) => {
    r.checked = false;
  });
  category_name.value = null;
  category_id.value = null;
}
function categoryget(valuenum) {
  var inputshowcatevalue = document.getElementById("idcate-" + valuenum).value;
  category_name.value = inputshowcatevalue;
  category_id.value = valuenum;
  console.log(valuenum);
}
function variantget(valuevari) {
  variantproduct.value = valuevari;
}
function getpostpr(valuepost) {
  prodetails.value = valuepost;
}

function reimg(img) {
  imagename.value = img;
}
function reimgex(img) {
  imageextra.value = img;
}
function sumbitaddpro() {
  /*  document.querySelectorAll() */

  const product = {
    category_id: category_id.value,
    name: nameproduct.value,
    image: imagename.value,
    image_extra: imageextra.value,
    sku: skuproduct.value,
    stock: stockquantity.value,
    price: price.value,
    price_sale: pricesale.value,
    status: status.value,
    weight: weight.value,
    wide: widepro.value,
    height: heightpro.value,
    length: lengthpro.value,
    variantproduct: variantproduct.value,
    details: prodetails.value,
  };
  variantcontroll.productall = product;
  console.log(variantcontroll.productall);
}
</script>
