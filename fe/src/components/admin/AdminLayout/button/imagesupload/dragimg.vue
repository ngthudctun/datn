<template>
  <div class="">
    <div class="" v-show="props.type != 'post'">
      <label
        class="custum-file-upload d-none"
        id="show-one-img"
        data-bs-toggle="offcanvas"
        data-bs-target="#offcanvasExample22one"
        aria-controls="offcanvasExample22one"
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
        data-bs-target="#offcanvasExample22one"
        aria-controls="offcanvasExample22one"
      >
        <div class="icon">
          <img
            src="https://static.vecteezy.com/system/resources/previews/000/335/346/non_2x/line-black-icon-vector.jpg"
            width="50px"
            alt=""
          />
        </div>
      </label>
    </div>
    <input type="text" class="d-none" name="" id="images_product-one" />
    <div
      class="offcanvas offcanvas-start"
      style="z-index: 2000; width: 90%"
      tabindex="-1"
      id="offcanvasExample22one"
      aria-labelledby="offcanvasExampleLabel"
    >
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel"></h5>
        <button
          type="button"
          class="btn-close text-reset"
          data-bs-dismiss="offcanvas"
          aria-label="Close"
        ></button>
      </div>
      <div class="offcanvas-body">
        <div
          class="row justify-content-center py-2 h-100 position-relative"
          style="border: 1px solid #e1e1e1; box-sizing: border-box"
        >
          <div class="col-2">
            <div
              class="py-2 link-danger"
              style="border-bottom: 1px solid #e1e1e1"
            >
              Hình ảnh sản phẩm
            </div>
            <div
              class="py-2 link-danger"
              style="border-bottom: 1px solid #e1e1e1"
            >
              Hình ảnh Danh mục
            </div>
          </div>

          <div
            class="col-7 d-flex justify-content-center flex-wrap pb-9"
            style="
              border-right: 1px solid #e1e1e1;
              border-left: 1px solid #e1e1e1;
            "
          >
            <div class="col-12">
              <div class="w-100 d-flex justify-content-between">
                <div class="col-3 position-relative">
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
                  <button
                    type="button"
                    @click="showupdateimg('show_all-img', 'uploadimg')"
                    class="mt-1 btn btn-danger"
                  >
                    Thêm Hình ảnh
                  </button>
                </div>
                <div class="col-1"></div>
                <div class="col-5">
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
                class="row justify-content-center"
                style="
                  box-sizing: border-box;
                  max-height: 500px;
                  overflow: auto;
                "
              >
                <div class="row mt-4" style="max-height: 500px; overflow: auto">
                  <div class="mt-5" id="uploadimg" v-show="uploadnum == 1">
                    <uploadimage />
                  </div>
                  <div class="row" id="show_all-img" v-show="uploadnum == 0">
                    <div
                      class="col-3 mb-2"
                      v-for="img in images"
                      :key="img"
                      @click="imageStore.toggleImageSelect(img)"
                      style="position: relative; cursor: pointer"
                    >
                      <img
                        :src="$imageUrl + 'product/' + img"
                        class="images_select-ss"
                        style="box-shadow: 0 0 5px rgba(0, 0, 0, 0.5)"
                        width="100%"
                        height="170px"
                        :class="{
                          'img-selected': imageStore.selectedImage === img,
                        }"
                      />
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!--     -->
          </div>
          <div class="col-3 rounded position-relative">
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
              id="value_img-hiden"
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
              data-bs-toggle="offcanvas"
              data-bs-target="#offcanvasExample222"
              aria-controls="offcanvasExample222"
              @click="submitImage()"
              id="sumbit_img"
              type="button"
              class="btn btn-danger"
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
import uploadimage from "./uploadimagesAd.vue";
const imageUrl = import.meta.env.VITE_IMAGE_BASE_URL;
const props = defineProps({
  type: String,
  classify: String,
  hideninp: String,
});
console.log(props);
const imageStore = useImageSelect();
const images_firt = ref(null);
const images = [
  "product-2.jpg",
  "product-1.jpg",
  "product-3.jpg",
  "product-4.jpg",
  "product-5.jpg",
];
function submitImage() {
  console.log(props);
  const noimg = document.getElementById("no-img-input");
  const oneimg = document.getElementById("show-one-img");
  const showoneimg = oneimg.querySelector("img");
  const hiddenInput = document.getElementById("value_img-hiden");
  const selected = hiddenInput.value;

  if (selected) {
    oneimg.classList.remove("d-none");
    noimg.classList.add("d-none");
    showoneimg.src = imageUrl + "product/" + selected;
  } else {
    oneimg.classList.add("d-none");
    noimg.classList.remove("d-none");
  }
}

let uploadnum = ref(0);
function showupdateimg() {
  uploadnum.value = uploadnum.value === 0 ? 1 : 0;
}
</script>