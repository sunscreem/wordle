<template>
  <div class="p-4 grid grid-cols-4 gap-12">
    <month v-for="month in [...Array(12).keys()]" :key="month.number" :month="month" :scores="scores"/>

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