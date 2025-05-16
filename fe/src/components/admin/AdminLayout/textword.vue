<template>
  <div>
    <div id="editor" style="height: 300px;"></div>
  </div>
</template>

<script setup>
import { onMounted } from 'vue'

onMounted(() => {
  // Quill đã được load qua CDN trong index.html rồi nên dùng trực tiếp
  const quill = new Quill('#editor', {
    theme: 'snow',
    modules: {
      toolbar: [
        ['bold', 'italic', 'underline'],
        ['link', 'image', 'video'],
        [{ header: [1, 2, 3, false] }],
        [{ list: 'ordered'}, { list: 'bullet' }],
        ['clean']
      ]
    }
  })
})
</script>
