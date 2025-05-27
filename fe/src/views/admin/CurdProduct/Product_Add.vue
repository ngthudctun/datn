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
              <div class="w-100 row">
                <div class="col-8" style="border-right: 1px solid #e1e1e1">
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
                          Thêm danh mục
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
                            <label class="mx-2" for="ttt"> Con cá 1</label>
                          </div>
                        </li>
                        <li>
                          <div href="#" class="box-con">
                            <input type="checkbox" name="" id="ttt" />
                            <label class="mx-2" for="ttt"> Con cá 2</label>
                          </div>
                        </li>
                        <li>
                          <div href="#" class="box-con">
                            <input type="checkbox" name="" id="ttt" />
                            <label class="mx-2" for="ttt"> Con cá 3 </label>
                          </div>
                        </li>
                        <li>
                          <div href="#" class="box-con">
                            <input type="checkbox" name="" id="ttt" />
                            <label class="mx-2" for="ttt"> Con cá 4</label>
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
                    <br />
                    <label class="my-1" for=""><b>Mô tả chi tiết</b></label>
                    <Adminwordtext />
                    <div class="form-group mt-3">
                      <label for="usr"><b>Trạng thái sản phẩm:</b></label>
                      <select name="" class="form-control mt-1" id="">
                        <option value="" class="">Chưa kích hoạt</option>
                        <option value="" class="">Kích hoạt</option>
                      </select>
                    </div>
                    <div class="form-group mt-3 d-flex align-items-center">
                      <label for="usr"><b>Kích hoạt biến thể:</b></label>
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
                      <div
                        class="card card-body"
                        style="box-shadow: 0 0 2px rgba(0, 0, 0, 0.5)"
                      >
                        <div class="d-none">
                          <div class="" id="boxinputvariant">
                            <div
                              v-for="(item, index) in inputvariant"
                              :key="index"
                              class="form-group mt-3 d-flex align-items-center justify-content-between"
                              id="inputbtnvari"
                            >
                              <input
                                v-model="inputvariant[index]"
                                placeholder="nhập biến thể sản phẩm"
                                type="text"
                                class="mt-1 form-control"
                                id="usr"
                                style="
                                  box-shadow: 0 0 2px rgba(0, 0, 0, 0.5);
                                  width: 95%;
                                "
                              />
                              <div class="d-flex">
                                <i
                                  class="fa-solid fa-trash"
                                  @click="deleteVariant(index)"
                                  v-if="inputvariant.length > 1"
                                ></i>
                              </div>
                            </div>
                          </div>

                          <div class="mt-4 d-flex">
                            <div
                              @click="addInputVariant()"
                              style="box-shadow: 0 0 2px rgba(0, 0, 0, 0.5)"
                              id="sumbit_img"
                              type="button"
                              class="btn"
                            >
                              + Thêm Biến thể
                            </div>
                            <div
                              @click="submitVariants()"
                              style="box-shadow: 0 0 2px rgba(0, 0, 0, 0.5)"
                              id="sumbit_img"
                              type="button"
                              class="btn mx-2"
                            >
                              Lưu
                            </div>
                          </div>
                        </div>

                        <div class="">
                          <select
                            class="form-select"
                            aria-label="Default select example"
                          >
                            <option selected>Tên biến thể</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                          </select>
                          <div class="form-group mt-3">
                            <label for="usr"><b>Tuy chọn biến thể</b></label>
                            <input
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
                <div class="col-4">
                  <div class="p-2" style="box-sizing: border-box">
                    <div class="form-group mt-3">
                      <label for=""><b>Số lượng tồn kho:</b></label>
                      <input
                        type="text"
                        class="mt-1 form-control"
                        id="usr"
                        style="box-shadow: 0 0 2px rgba(0, 0, 0, 0.5)"
                      />
                    </div>

                    <div class="form-group mt-3 position-relative">
                      <label for="usr"><b>Hình ảnh sản phẩm</b></label
                      ><br />
                      <dragimg />
                      <input type="hidden" id="" name="selected_image" />
                    </div>
                    <div class="form-group mt-3">
                      <label for=""><b>Giá cũ sản phẩm:</b></label>
                      <input
                        type="text"
                        class="mt-1 form-control"
                        id="usr"
                        style="box-shadow: 0 0 2px rgba(0, 0, 0, 0.5)"
                      />
                    </div>

                    <div class="form-group mt-3">
                      <label for=""><b>Giá mới sản phẩm:</b></label>
                      <input
                        type="text"
                        class="mt-1 form-control"
                        id="usr"
                        style="box-shadow: 0 0 2px rgba(0, 0, 0, 0.5)"
                      />
                    </div>
                    <br />
                    <div class="w-100">
                      <button type="button" class="w-100 btn btn-primary">
                        Thêm sản phẩm
                      </button>
                    </div>
                    <hr />
                    <div class="form-group mt-3 position-relative">
                      <label for="usr"><b>Hình ảnh thêm</b></label>
                      <dragimgextra />
                      <input
                        type="hidden"
                        id="value_img-hiden"
                        name="selected_image"
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
</template>
  
<style>
</style>

  <script setup>
import "@/assets/css/admincss/css/curdproduct/productadd.css";
import NavSuport from "@/components/admin/AdminLayout/NavSuport.vue";
import { AdminLayout } from "@/storage/admin/layoutAdmin";
import Adminwordtext from "@/components/admin/AdminLayout/textword.vue";
import dragimg from "@/components/admin/AdminLayout/button/imagesupload/dragimg.vue";
import dragimgextra from "@/components/admin/AdminLayout/button/imagesupload/dragextraimg.vue";
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
</script>