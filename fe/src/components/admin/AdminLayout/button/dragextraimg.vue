<template>
  <div class="">
    <label
      class="custum-file-upload d-none"
      id="show-one-img"
      data-bs-toggle="offcanvas"
      data-bs-target="#offcanvasExample22pp"
      aria-controls="offcanvasExample"
    >
      <img
        src=""
        class="border border-black"
        width="100%"
        height="100px"
        alt=""
      />
    </label>

    <!-- Placeholder khi chưa chọn ảnh -->
    <label
      class="custum-file-upload"
      id="no-img-input"
      data-bs-toggle="offcanvas"
      data-bs-target="#offcanvasExample22pp"
      aria-controls="offcanvasExample"
    >
      <div class="icon">
        <img
          src="https://static.vecteezy.com/system/resources/previews/000/335/346/non_2x/line-black-icon-vector.jpg"
          width="50px"
          alt=""
        />
      </div>
    </label>
    <input type="text" class="d-none" name="" id="images_product-one" />
    <div
      class="offcanvas offcanvas-start"
      style="z-index: 2000; width: 90%"
      tabindex="-1"
      id="offcanvasExample22pp"
      aria-labelledby="offcanvasExampleLabel"
    >
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">
          Thư mục hình ảnh phu
        </h5>
        <button
          type="button"
          class="btn-close text-reset"
          data-bs-dismiss="offcanvas"
          aria-label="Close"
        ></button>
      </div>
      <div class="offcanvas-body" style="height: 500px">
        <div
          class="row justify-content-center p-2"
          style="border: 1px solid; box-sizing: border-box; height: 500px"
        >
          <div class="col-2">
            <div
              class="py-2 link-primary"
              style="border-bottom: 1px solid black"
            >
              Hình ảnh sản phẩm
            </div>
            <div
              class="py-2 link-primary"
              style="border-bottom: 1px solid black"
            >
              Hình ảnh Danh mục
            </div>
          </div>
          <div
            class="col-7 d-flex justify-content-center flex-wrap pb-9"
            style="border-right: 1px solid black; border-left: 1px solid black"
          >
            <div class="col-12">
              <div class="w-100 d-flex justify-content-between">
                <div class="col-3 position-relative">
                  <label for="usr"><b>Lọc theo:</b></label>

                  <select
                    class="mt-1 form-select"
                    aria-label="Default select example"
                  >
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                </div>
                <div class="col-3 px-1" style="box-sizing: border-box">
                  <label for="usr" style="visibility: hidden"><b>.</b></label
                  ><br />
                  <button type="button" class="mt-1 btn btn-primary">
                    Thêm Hình ảnh
                  </button>
                </div>
                <div class="col-1"></div>
                <div class="col-5">
                  <label for="usr"><b>Tìm kiếm:</b></label>

                  <input
                    type="text"
                    class="mt-1 form-control"
                    id="usr"
                    placeholder="tìm kiếm sản phẩm"
                    style="box-shadow: 0 0 2px rgba(0, 0, 0, 0.5)"
                  />
                </div>
              </div>
              <div
                class="row mt-4 justify-content-center"
                style="
                  box-sizing: border-box;
                  max-height: 500px;
                  overflow: auto;
                "
              >
                <div class="row mt-4" style="max-height: 500px; overflow: auto">
                  <div
                    class="col-3 mb-2"
                    v-for="img in images"
                    :key="img"
                    @click="imageStore.toggleExtraImage(img)"
                    style="position: relative; cursor: pointer"
                  >
                    <img
                      :src="$imagebaseUrl + img"
                      class="images_select-ss"
                      style="box-shadow: 0 0 5px rgba(0, 0, 0, 0.5)"
                      width="100%"
                      height="150px"
                      :class="{
                        'img-selected': imageStore.extra_array.includes(img),
                      }"
                    />
                 
                  </div>
                </div>
              </div>
            </div>

            <!--     -->
          </div>
          <div
            class="col-3 rounded position-relative"
            style="background: #0034ff0a"
          >
            <label for="usr"><b>URL:</b></label>

            <input
              type="text"
              class="mt-1 form-control"
              id="usr"
              placeholder="url..."
              style="box-shadow: 0 0 2px rgba(0, 0, 0, 0.5)"
            />
            <br />
            <label for="usr"><b>Tiêu đề:</b></label>

            <input
              type="text"
              class="mt-1 form-control"
              id="show_name_extra"
              placeholder="ten hinh anh"
              style="box-shadow: 0 0 2px rgba(0, 0, 0, 0.5)"
            /><br />
            <label for="usr"><b>URL:</b></label>

            <input
              type="text"
              class="mt-1 form-control"
              id="usr"
              placeholder="url..."
              style="box-shadow: 0 0 2px rgba(0, 0, 0, 0.5)"
            />
            <br />

            <button
              @click="submitImage"
              id="sumbit_img"
              type="button"
              class="btn bottom-0 end-0 btn-primary position-absolute"
            >
              Thêm Hinh anh
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>


<style>
.offcanvas-backdrop {
  z-index: 1900;
}
</style>
<script setup>
import { useImageSelect } from "@/assets/js/adminjs/dragimg.js";
import { onMounted, ref } from "vue";
const imagebaseUrl = import.meta.env.VITE_IMAGE_BASE_URL;
const imageStore = useImageSelect();
const images = ["images.jpg", "1", "2", "22", "3"];
function submitImage() {}
</script>