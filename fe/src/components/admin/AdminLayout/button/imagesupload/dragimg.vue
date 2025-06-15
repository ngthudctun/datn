<template>
  <div class="">
    <div v-show="props.type != 'post'">
      <label
        class="custum-file-upload"
        :id="props.inputshowimg"
        data-bs-toggle="offcanvas"
        :data-bs-target="'#' + props.hideninp"
        :aria-controls="props.hideninp"
      >
        <img
          v-if="images_firt"
          :src="$imageUrl + images_firt"
          class="border border-black"
          width="100%"
          height="100px"
          alt=""
        />
        <img
          v-if="!images_firt"
          src="https://static.vecteezy.com/system/resources/previews/000/335/346/non_2x/line-black-icon-vector.jpg"
          class="border border-black"
          width="100%"
          height="100px"
          alt=""
        />
      </label>

      <!-- Placeholder khi chưa chọn ảnh -->
    </div>
    <input type="text" class="d-none" name="" id="images_product-one" />
    <div
      class="offcanvas offcanvas-start"
      style="z-index: 2000; width: 85%"
      tabindex="-1"
      :id="props.hideninp"
      aria-labelledby="offcanvasExampleLabel"
    >
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">
          Thư mục hình ảnh
        </h5>
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
          <div class="col-12 col-xl-2">
            <div class="">
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
          </div>

          <div
            class="col-12 col-xl-7 d-flex justify-content-center flex-wrap pb-9"
            style="
              border-right: 1px solid #e1e1e1;
              border-left: 1px solid #e1e1e1;
            "
          >
            <div class="w-100">
              <div class="row d-flex flex-wrap justify-content-between">
                <div class="col-12 col-xl-3 position-relative">
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
                <div
                  class="col-12 col-md-6 col-xl-3"
                  style="box-sizing: border-box"
                >
                  <button
                    type="button"
                    @click="showupdateimg('show_all-img', 'uploadimg')"
                    class="mt-1 btn btn-danger w-100"
                  >
                    Thêm Hình ảnh
                  </button>
                </div>

                <div class="col-12 col-md-6 col-xl-6">
                  <input
                    type="text"
                    class="mt-1 form-control"
                    id="usr"
                    placeholder="tìm kiếm sản phẩm"
                    style="box-shadow: 0 0 2px rgba(0, 0, 0, 0.5)"
                  />
                </div>
              </div>
              <div class="row justify-content-center">
                <div class="mt-4">
                  <div class="mt-5" id="uploadimg" v-show="uploadnum == 1">
                    <uploadimage />
                  </div>
                  <div class="" v-show="uploadnum == 0">
                    <div
                      class="d-flex flex-wrap"
                      id="show_all-img"
                      style="max-height: 500px; overflow: auto"
                    >
                      <div
                        class="col-6 col-md-3 col-xl-3 mb-2"
                        v-for="img in images"
                        :key="img"
                        @click="toggleImageSelect(img)"
                        style="position: relative; cursor: pointer"
                      >
                        <img
                          :src="$imageUrl + img"
                          class="images_select-ss"
                          style="box-shadow: 0 0 5px rgba(0, 0, 0, 0.5)"
                          width="100%"
                          height="170px"
                          :class="{
                            'img-selected': selectedImage === img,
                          }"
                        />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!--     -->
          </div>
          <div
            class="col-12 col-xl-3 mt-3 m-xl-0 rounded position-relative"
            v-show="uploadnum == 0"
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
import { onMounted, ref, watch } from "vue";
import uploadimage from "./uploadimagesAd.vue";
import axios from "axios";
<<<<<<< HEAD
<<<<<<< HEAD
import { baseImageUrl } from "@/config/constans";
=======
>>>>>>> 74732299 (add-model)
=======
import { baseImageUrl } from "@/config/constans";
>>>>>>> 0055686a09fb6751679672067b3054586721cd03
const imageUrl = import.meta.env.VITE_IMAGE_BASE_URL;
const props = defineProps({
  type: String,
  classify: String,
  inputshowimg: String,
  hideninp: String,
  groupIndex: Number,
  haveImage: String,
});
const images_firt = ref(null);
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 0055686a09fb6751679672067b3054586721cd03

const imageStore = useImageSelect();

const images = ref([]);
const hiddenInput = ref(null);
<<<<<<< HEAD
=======
const images = ref([]);
>>>>>>> 74732299 (add-model)
=======
>>>>>>> 0055686a09fb6751679672067b3054586721cd03
const getListCateSell = async () => {
  try {
    const response = await axios.get(`/api/seller-image-gate`, {
      params: {
        type: "product",
      },
    });
    images.value = response.data; // Cập nhật dữ liệu
<<<<<<< HEAD
<<<<<<< HEAD
=======
    console.log(images.value);
>>>>>>> 74732299 (add-model)
=======
>>>>>>> 0055686a09fb6751679672067b3054586721cd03
  } catch (error) {
    console.error("Lỗi khi gọi API:", error);
  }
};
<<<<<<< HEAD
<<<<<<< HEAD
=======
/* const GetPaniCate = async (link) => {
  try {
    console.log(link);
    const response = await axios.get(link);
    catelist.value = response.data; // Cập nhật dữ liệu
  } catch (error) {
    console.error("Lỗi khi gọi API:", error);
  }
}; */

onMounted(() => {
  getListCateSell(); // Gọi API khi component được mount
});
>>>>>>> 74732299 (add-model)
=======
>>>>>>> 0055686a09fb6751679672067b3054586721cd03

const emit = defineEmits(["returnimg", "returnimgex"]);
function submitImage() {
  /* ("su dung cho bai post"); */

  const noimg = document.getElementById("no-img-input");
  const selected = selectedImage.value;
  emit("returnimgex", {
    groupIndex: props.groupIndex,
    imageindex: imageUrl + "product/" + selected,
  });
  emit("returnimg", selected);
  if (selected) {
<<<<<<< HEAD
<<<<<<< HEAD
    images_firt.value = selected;
=======
    oneimg.classList.remove("d-none");
    noimg.classList.add("d-none");
    images_firt.value = imageUrl + selected;
    showoneimg.src = images_firt.value;
>>>>>>> 74732299 (add-model)
=======
    images_firt.value = selected;
>>>>>>> 0055686a09fb6751679672067b3054586721cd03
  } else {
    images_firt.value = null;
  }
}

const selectedImage = ref(null);

function toggleImageSelect(img) {
  if (selectedImage.value === img) {
    selectedImage.value = null;
  } else {
    selectedImage.value = img;
  }
}

let uploadnum = ref(0);
function showupdateimg() {
  uploadnum.value = uploadnum.value === 0 ? 1 : 0;
}
function handleHaveImageChange(newVal) {
  if (newVal) {
    selectedImage.value = newVal;
    images_firt.value = newVal;
    console.log("➡ haveImage:", newVal);
  } else {
    selectedImage.value = null;
    images_firt.value = null;
  }
}
watch(
  () => props.haveImage,
  (newVal) => {
    handleHaveImageChange(newVal);
  },
  { immediate: true }
);
onMounted(() => {
  getListCateSell();
  if (props.haveImage) {
    selectedImage.value = props.haveImage;
    images_firt.value = props.haveImage;
    console.log("prop", props.haveImage);
    console.log("tttt", images_firt.value);
  }
});
</script>