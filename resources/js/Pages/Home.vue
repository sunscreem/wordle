<template>
  <div>
    hello world {{ test }}
  </div>
</template>

<script setup>

defineProps({
  test: {
    type: String,
    required: true,
  },
});
</script>