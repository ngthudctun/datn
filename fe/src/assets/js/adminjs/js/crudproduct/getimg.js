// stores/imageSelect.js
import { defineStore } from "pinia";

export const useImageSelect = defineStore("imagegetselect", {
  state: () => ({
    extra_array: [],
  }),
  actions: {
    toggleExtraImage(img) {
      const index = this.extra_array.indexOf(img);
      document.getElementById("show_name_extra").value = img;
      if (index !== -1) {

        this.extra_array.splice(index, 1);
      } else {
        if (this.extra_array.length < 5) {
          this.extra_array.push(img);
        } else {
          alert("Bạn chỉ được chọn tối đa 5 ảnh phụ.");
        }
      }
      const hiddenExtraInput = document.getElementById("value_extra_img_hidden");
      if (hiddenExtraInput) {
        hiddenExtraInput.value = JSON.stringify(this.extra_array);
      }

      console.log(this.extra_array)

    }
  },
},
);
