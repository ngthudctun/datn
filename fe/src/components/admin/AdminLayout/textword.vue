<template>
  <div id="editor"></div>
</template>

<script setup>
import { onMounted } from "vue";
const toolbarOptions = [
  ["bold", "italic", "underline"], // toggled buttons
  ["link", "image", "video"],
  [{ size: ["small", false, "large", "huge"] }], // custom dropdown
  [{ header: [1, 2, 3, 4, 5, 6, false] }],
  [{ color: [] }, { background: [] }], // dropdown with defaults from theme
  [{ align: [] }],
  // remove formatting button
];

// Khởi tạo Quill khi DOM đã sẵn sàng
onMounted(() => {
  Quill.register("modules/imageResize", window.ImageResize);

  const quill = new Quill("#editor", {
    theme: "snow",
    modules: {
      toolbar: [["bold", "italic", "underline"], ["image"], [{ align: [] }]],
      imageResize: {
        // Tuỳ chọn, có thể bỏ trống
        modules: ["Resize", "DisplaySize", "Toolbar"],
      },
    },
  });
});
</script>
