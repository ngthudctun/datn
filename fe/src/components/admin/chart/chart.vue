<template>
  <div>
    <canvas id="myChart3"></canvas>
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
  const ctx = document.getElementById("myChart3");

  new Chart(ctx, {
    type: "bar",
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
      scales: {
        y: {
          beginAtZero: true,
        },
      },
    },
  });
});
</script>
 