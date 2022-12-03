<template>
  <div class="mb-4">
    <h1 class="text-sm mb-8">Week</h1>
    <div v-for="day in daysInWeek" :key="day">
      {{ day.start.weekday}} - {{ day.start.toString() }}
    </div>

  </div>
</template>

<script setup>

// import Day from "@/Components/Day";

const props = defineProps({
  week: {
    type: Object,
    required: true,
  },
});

// get the days for this week
const daysInWeek = props.week.splitBy({ days: 1 });

console.log(daysInWeek);

</script>