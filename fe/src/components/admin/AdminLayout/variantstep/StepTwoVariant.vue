<template>
  <div class="mt-3">
    <!-- Select attribute -->
    <select
      class="form-select"
      aria-label="Default select example"
      v-model="selectedIndex"
    >
      <option
        v-for="(item, index) in variantcontroll?.inputvariant"
        :key="index"
        :value="index"
      >
        {{ item.name }}
      </option>
    </select>

    <!-- Input value -->
    <div class="form-group mt-3">
      <label for="usr">Tùy chọn biến thể</label>
      <input
        type="text"
        autocomplete="off"
        class="form-control"
        id="usr"
        v-model="inputValue"
        placeholder="Nhập giá trị thuộc tính"
        style="box-shadow: 0 0 2px rgba(0, 0, 0, 0.5)"
      />

      <!-- Button thêm -->
      <div class="mt-3">
        <div
          @click="submitVariants3()"
          style="box-shadow: 0 0 2px rgba(0, 0, 0, 0.5)"
          id="sumbit_img"
          type="button"
          class="btn btn-outline-secondary"
        >
          + Thêm Thuộc tính
        </div>
        <div
          style="box-shadow: 0 0 2px rgba(0, 0, 0, 0.5)"
          id=""
          type="button "
          class="btn mx-2"
          @click="sumbitThisStep(3)"
          :class="{
            'btn-outline-secondary': variantcontroll?.inputvariant?.some(
              (item) => item.value.length >= 1
            ),
          }"
        >
          Lưu thuộc tính
        </div>
      </div>

      <div class="mt-1">
        <div
          class="py-1"
          v-for="(item, index) in variantcontroll.inputvariant"
          :key="index"
        >
          <div class="" v-show="item.value.length >= 1">
            <div
              class="py-2 d-flex align-items-center"
              style="border-top: 1px solid #e1e1e1"
            >
              <div class="">Thuộc tính {{ item.name }}:</div>
            </div>
            <div class="mb-2 box-variantpr d-flex flex-wrap mt-1">
              <div
                class="me-2 p-1 rounded d-flex align-items-center"
                style="background-color: #e1e1e1"
                v-for="(itemvari, subIndex) in item.value"
                :key="subIndex"
              >
                <i
                  class="fa-solid fa-trash px-2 link-secondary"
                  style="border-right: 1px solid"
                  @click="deleteVariantValue(index, subIndex)"
                ></i>
                <div class="px-2">{{ itemvari.variant_value }}</div>
              </div>
            </div>
            <div class="d-flex align-items-center">
              <label class="m-0" for="">Dùng cho nhiều biến thể</label>
              <input
                type="checkbox"
                v-on:change="getcheckedValue(index, true)"
                class="ms-2 btn"
              />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>


<script setup>
import { ref } from "vue";
import { variantcontrollerad } from "@/assets/js/adminjs/js/crudproduct/variantproad";
const variantcontroll = variantcontrollerad();
const selectedName = ref("");
const inputValue = ref("");
const storevari = ref([]);
const selectedIndex = ref(null);
let b = storevari.value?.some((item) => item.value.length >= 1);

console.log(b);
const deleteVariantValue = (variantIndex, valueIndex) => {
  variantcontroll.inputvariant[variantIndex].value.splice(valueIndex, 1);
};
const submitVariants3 = () => {
  if (selectedIndex.value == null) {
    alert("vui long them thuoc tinh");
    return;
  } else {
    if (inputValue.value === "") {
      alert("vui long them gia tri thuoc tinh");
      return;
    }
  }
  try {
    variantcontroll.inputvariant[selectedIndex.value].value.push({
      style_vari: variantcontroll.inputvariant[selectedIndex.value].name,
      variant_value: inputValue.value,
    });
    console.log(variantcontroll.inputvariant);
    //map check
    inputValue.value = "";
  } catch (error) {
    console.log(error);
  }
};

const getcheckedValue = (index, status) => {
  const statusvari = variantcontroll.inputvariant[index].checkall;
  if (statusvari == true) {
    variantcontroll.inputvariant[index].checkall = false;
  } else {
    variantcontroll.inputvariant[index].checkall = true;
  }
  console.log(variantcontroll.inputvariant[index]);
};

const sumbitThisStep = (value) => {
  try {
    const filteredtrue = variantcontroll.inputvariant.filter(
      (item) => item.checkall === true
    );

    const prfiterflase = variantcontroll.inputvariant
      .filter((item) => item.checkall == false && item.value.length > 0)
      .map((item) =>
        item.value.map((v) => ({
          style_vari: item.name,
          variant_value: v.variant_value,
        }))
      );
    console.log(prfiterflase);
    const prfitertrue = filteredtrue.map((item) =>
      item.value.map((v) => ({
        style_vari: v.style_vari,
        variant_value: v.variant_value,
      }))
    );
    /*   if */
    variantcontroll.prfitertrue = cartesianProduct(prfitertrue);

    if (prfiterflase.some((arr) => arr.length > 0)) {
      prfiterflase.forEach((item) => {
        for (let index = 0; index < item.length; index++) {
          variantcontroll.prfitertrue.push([item[index]]);
        }
      });

      console.log(variantcontroll.prfitertrue);
    }
    /*     console.log(variantcontroll.prfitertrue, "true"); */
    variantcontroll.upstepvariant(value);
  } catch (error) {
    console.log(error);
  }
};
function cartesianProduct(arrays) {
  return arrays.reduce(
    (acc, curr) => {
      const res = [];
      acc.forEach((a) => {
        curr.forEach((b) => {
          res.push(a.concat([b]));
        });
      });
      return res;
    },
    [[]]
  );
}
// biến thể cho tất
</script>

