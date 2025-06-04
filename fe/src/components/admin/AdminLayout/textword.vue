<template>
  <div>
    <div id="editor" style="height: 300px"></div>
    <div>
      <dragimg
        type="post"
        classify="postdetailspr"
        inputshowimg="postpro"
        hideninp="postproduct"
        @returnimg="reimg"
      />
    </div>
  </div>
</template>

<script setup>
import { onMounted, ref } from "vue";
import dragimg from "@/components/admin/AdminLayout/button/imagesupload/dragimg.vue";
import Quill from "quill";
import "quill/dist/quill.snow.css";

let quillInstance = null;
const emit = defineEmits(["getpost"]);
const returnimage = ref(null);

onMounted(() => {
  const editorEl = document.getElementById("editor");
  if (!editorEl) {
    console.error("Không tìm thấy #editor");
    return;
  }

  // ✅ Khởi tạo Quill
  quillInstance = new Quill(editorEl, {
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
          image: () => {
            selectLocalImage();
          },
        },
      },
    },
  });
  quillInstance.on("text-change", () => {
    const html = quillInstance.root.innerHTML;
    emit("getpost", html);
  });
});

function selectLocalImage() {
  const input = document.getElementById("postpro");
  if (input) {
    input.click();
  } else {
    console.warn("Không tìm thấy input postpro");
  }
}

function reimg(img) {
  const range = quillInstance.getSelection();
  const position = range ? range.index : 0;
  quillInstance.insertEmbed(position, "image", img);
  returnimage.value = img;
}
</script>
