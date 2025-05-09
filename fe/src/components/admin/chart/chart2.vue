<template>
  <div>
    <canvas id="myChart"></canvas>
  </div>
</template>
  
  
  <script setup>
import "https://cdn.jsdelivr.net/npm/chart.js";
import { onMounted } from "vue";
/* const props = defineProps({
    orderStatusid: Number,
    orderStatusinfor: String,
  }); */
onMounted(() => {
  const ctx = document.getElementById("myChart");

  new Chart(ctx, {
    type: "doughnut",
    data: {
      labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
      datasets: [
        {
          label: "# of Votes",
          data: [12, 19, 3, 5, 2, 3],
          borderWidth: 1,
        },
      ],
    },
    options: {
      plugins: {
        legend: {
          display: false, // ẩn chú thích màu
        },
        tooltip: {
          enabled: false, // ẩn tooltip khi rê chuột
        },
      },
    },
  });
});
</script>
   