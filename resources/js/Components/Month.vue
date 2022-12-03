<template>
  <div>
    <h1 class="text-sm mb-8">Month - {{ month }}</h1>
  </div>
</template>

<script setup>

defineProps({
  month: {
    type: Number,
    required: true,
  },
});

</script>