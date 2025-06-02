<template>
  <div class="mt-3">
    <div
      v-for="(group, groupIndex) in variantcontroll.prfitertrue"
      :key="groupIndex"
    >
      <div class="" v-if="group.length > 0">
        <div
          class="dropdown-handle"
          style="box-shadow: 0 0 2px rgba(0, 0, 0, 0.5)"
          data-bs-toggle="collapse"
          :data-bs-target="'#collapse-' + groupIndex"
          aria-expanded="false"
          :aria-controls="'collapse-' + groupIndex"
        >
          <div class="w-100 my-2 rounded">
            <div class="d-flex">
              <div class="" v-for="(item, itemIndex) in group" :key="itemIndex">
                <div
                  class="p-2 me-1 d-flex align-items-center justify-content-center"
                  style="box-sizing: border-box; border: 1px solid"
                >
                  Thuộc tính: {{ item.style_vari }} - Giá trị:
                  {{ item.variant_value }}
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="collapse" :id="'collapse-' + groupIndex">
          <div class="card card-body">
            <div class="row">
              <div class="col-2">
                <div class="">
                  <dragimg
                    type="post"
                    classify="variantpro"
                    :hideninp="'variant-' + groupIndex"
                  />
                </div>
                <div class="form-group mt-3"></div>
              </div>
              <div class="col-10">
                <div class="">
                  <div class="form-group">
                    <input
                      autocomplete="off"
                      placeholder="SKU"
                      type="text"
                      class="mt-1 form-control"
                      id="usr"
                      style="box-shadow: 0 0 2px rgba(0, 0, 0, 0.5)"
                    />
                  </div>

                  <div class="form-group mt-3">
                    <input
                      type="text"
                      placeholder="nhập tên sản phẩm"
                      class="mt-1 form-control"
                      id="usr"
                      style="box-shadow: 0 0 2px rgba(0, 0, 0, 0.5)"
                    />
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
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
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="">Giá mới sản phẩm:</label>
                  <input
                    type="text"
                    placeholder="nhập giá tiền khuyến mãi (nếu có)"
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
            <div class="" style="box-shadow: 0 0 2px rgba(0, 0, 0, 0.5)">
              <select class="form-select" aria-label="Default select example">
                <option selected value="1">Còn hàng</option>
                <option value="2">Hết Hàng</option>
                <option value="3">Đang nhập kho</option>
              </select>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<style>
.dropdown-handle {
  transition: all 0.2s;
}
.dropdown-handle:hover {
  background-color: rgb(241, 241, 241);
}
.dropdown-handle:active {
  background-color: rgb(203, 203, 203);
}
</style>

<script setup>
import { ref } from "vue";
import dragimg from "@/components/admin/AdminLayout/button/imagesupload/dragimg.vue";

import { variantcontrollerad } from "@/assets/js/adminjs/js/crudproduct/variantproad";
const variantcontroll = variantcontrollerad();
</script>

