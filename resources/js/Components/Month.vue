<template>
  <div>
    <h1 class="text-sm mb-8 font-bold">Month - {{ props.month+1 }}</h1>
    <week v-for="week in weeksInMonth" :key="week.start" :week="week"></week>
  </div>
</template>

<script setup>

import Week from "@/Components/Week";
import { DateTime, Interval } from "luxon";

const props = defineProps({
  month: {
    type: Number,
    required: true,
  },
});

// create an array of this months days
const startOfMonth = DateTime.local().set({ day: 1, month: props.month + 1, year: 2022 });
const endOfMonth = DateTime.fromObject({day:1, month:props.month+1, year: 2022}).plus({months:1});//.
const weeksInMonth = Interval.fromDateTimes(
  startOfMonth, endOfMonth
).splitBy({ weeks: 1 });


</script>