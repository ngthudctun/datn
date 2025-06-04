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
                    Thêm danh mục
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
                        placeholder="nhập tên sản phẩm"
                        type="text"
                        class="mt-1 form-control"
                        id="usr"
                        style="box-shadow: 0 0 2px rgba(0, 0, 0, 0.5)"
                      />
                    </div>

                    <label class="my-1" for="">Mô tả chi tiết</label>
                    <Adminwordtext />
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
                        autocomplete="off"
                        placeholder="VD: 12"
                        type="text"
                        class="mt-1 form-control"
                        id="usr"
                        style="box-shadow: 0 0 2px rgba(0, 0, 0, 0.5)"
                      />
                    </div>

                    <div class="form-group mt-3 position-relative">
                      <label for="usr">Hình ảnh danh mục</label><br />
                      <dragimg
                        type="product"
                        classify="variantpro"
                        inputshowimg="imageindex"
                        hideninp="lableindex"
                      />
                      <input type="hidden" id="" name="selected_image" />
                    </div>
                  </div>
                  <div class="w-100">
                    <button type="button" class="w-100 btn btn-danger">
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
const Adminlayout = AdminLayout();

const inputvariant = ref([]);

// Load từ localStorage
onMounted(() => {
  const stored = localStorage.getItem("inputvariarr");
  if (stored) {
    try {
      inputvariant.value = JSON.parse(stored);
    } catch (e) {
      console.error("Lỗi khi parse JSON từ localStorage", e);
    }
  }
});

watch(
  inputvariant,
  (newVal) => {
    localStorage.setItem("inputvariarr", JSON.stringify(newVal));
  },
  { deep: true }
);

const addInputVariant = () => {
  inputvariant.value.push("");
};

const deleteVariant = (index) => {
  if (inputvariant.value.length > 1) {
    inputvariant.value.splice(index, 1);
  }
};

const submitVariants = () => {
  const filtered = inputvariant.value
    .map((item) => item.trim())
    .filter((item) => item !== "");

  if (filtered.length === 0) {
    alert("Vui lòng nhập ít nhất một biến thể.");
    return;
  }

  console.log("Các biến thể:", filtered);

  localStorage.setItem("inputvariarr", JSON.stringify(filtered));
  console.log(localStorage.getItem("inputvariarr", JSON.stringify(filtered)));
};
const stepvariant = ref(0);
</script>
