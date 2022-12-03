<template>
  <div>
    Scores for: {{ name }}
    <pre>{{ scores }}</pre>
  </div>
</template>

<script setup>

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