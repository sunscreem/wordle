<template>
  <div class="p-4">
    <month v-for="month in [...Array(12).keys()]" :key="month.number" :month="month"/>

  </div>
</template>

<script setup>

import Month from "@/Components/Month";

defineProps({
  name: {
    type: String,
    required: true,
  },
  scores: {
    type: Array,
    required: true,
  },

});
</script>