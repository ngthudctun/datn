// stores/imageSelect.js
import { defineStore } from "pinia";

export const useImageSelect = defineStore("imagegetselect", {
  state: () => ({ 
    selectedImage: null,
    extra_array: [],
  }),
  actions: {
    toggleImageSelect(img) {
      const hiddenInput = document.getElementById("value_img-hiden");

      if (this.selectedImage === img) {
        this.selectedImage = null;
        if (hiddenInput) hiddenInput.value = "";
      } else {
        this.selectedImage = img;
        if (hiddenInput) hiddenInput.value = img;
      }
    },
    toggleExtraImage(img) {
      const index = this.extra_array.indexOf(img);
      document.getElementById("show_name_extra").value = img;
      if (index !== -1) {

        this.extra_array.splice(index, 1);
      } else {
        if (this.extra_array.length < 4) {
          this.extra_array.push(img);
        } else {
          alert("Bạn chỉ được chọn tối đa 4 ảnh phụ.");
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
