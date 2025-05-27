<template>
  <div class="">
    <div class="" id="boxinputvariant">
      <div
        v-show="variantcontroll.inputvariant.length > 1"
        v-for="(item, index) in variantcontroll.inputvariant"
        :key="index"
        class="form-group mt-3 d-flex align-items-center justify-content-between"
        id="inputbtnvari"
      >
        <input
          autocomplete="off"
          v-model="variantcontroll.inputvariant[index].name"
          placeholder="nhập biến thể sản phẩm"
          type="text"
          class="mt-1 form-control"
          id="usr"
          style="box-shadow: 0 0 2px rgba(0, 0, 0, 0.5); width: 95%"
        />
        <div class="d-flex">
          <i
            class="fa-solid fa-trash"
            @click="deleteVariant(index)"
            v-if="variantcontroll.inputvariant.length > 1"
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
        class="btn btn-outline-secondary"
      >
        + Thêm Biến thể
      </div>
      <div
        style="box-shadow: 0 0 2px rgba(0, 0, 0, 0.5)"
        id=""
        type="button "
        class="btn mx-2"
        @click="submitVariants()"
        :class="{
          'btn-outline-secondary': variantcontroll?.inputvariant?.some(
            (item) => item.value.length >= 1
          ),
        }"
      >
        Lưu thuộc tính
      </div>
    </div>
  </div>
</template>

<script setup>
import { onMounted, ref } from "vue";
import { variantcontrollerad } from "@/assets/js/adminjs/js/crudproduct/variantproad";

// Dùng store
const variantcontroll = variantcontrollerad();
const arrvariant = ref([]);

// Load từ localStorage khi component được mounted

onMounted(() => {
  variantcontroll.inputvariant.push({
    name: "",
    value: [],
    checkall: false,
  });
});

// Thêm biến thể mới
const addInputVariant = () => {
  variantcontroll.inputvariant.push({ name: "", value: [], checkall: false });
};

// Xóa biến thể
const deleteVariant = (index) => {
  if (variantcontroll.inputvariant.length > 1) {
    variantcontroll.inputvariant.splice(index, 1);
  }
};

// Lưu biến thể
const submitVariants = () => {
  // Lọc những biến thể có 'name' không rỗng
  const filtered = variantcontroll.inputvariant.filter(
    (item) => item.name.trim() !== ""
  );

  if (filtered.length === 0) {
    alert("Vui lòng nhập ít nhất một biến thể.");
    return;
  }

  console.log("Các biến thể:", filtered);

  variantcontroll.inputvariant = filtered; // Cập nhật lại cho chắc
  variantcontroll.upstepvariant(2);
};
</script>
