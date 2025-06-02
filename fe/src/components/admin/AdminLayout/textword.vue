<template>
  <div>
    <div id="editor" style="height: 300px"></div>
    <div>
      <dragimg type="post" classify="postproduct" />
    </div>
  </div>
</template>

<script setup>
import { onMounted } from "vue";
import dragimg from "@/components/admin/AdminLayout/button/imagesupload/dragimg.vue";

onMounted(() => {

  const quill = new Quill("#editor", {
    theme: "snow",
    modules: {
      toolbar: {
        container: [
          ["bold", "italic", "underline"],
          ["link", "image", "video"],
          [{ header: [1, 2, 3, false] }],
          [{ list: "ordered" }, { list: "bullet" }],
          ["clean"],
        ],
        handlers: {
          image: function () {
            selectLocalImage();
          },
        },
      },
    },
  });
});
function selectLocalImage() {
  const input = document.getElementById("show-one-img");
  console.log(input);
  input.click();
}
</script>
