<template>
  <div>
    <h1 class="text-sm my-8 font-bold">Month - {{ props.month+1 }}</h1>
    <div v-for="(day,i) in allDays" :key="i" >
      {{ day.dayOfWeek }} -
       <span v-if="day.day">
        {{ day.day.toString() }}
      </span>
      <span v-else>
        null
      </span>
    </div>
    <!-- <week v-for="week in weeksInMonth" :key="week.start" :week="week"></week> -->
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
const endOfMonth = DateTime.fromObject({day:1, month:props.month+1, year: 2022}).plus({months:1});

const daysInMonth = Interval.fromDateTimes(
  startOfMonth, endOfMonth
);

// console.log(daysInMonth.start);

// console.log(daysInMonth.end.minus({days:1}));

const startOfMonthPaddingNeeded = daysInMonth.start.weekday-1;
const endOfMonthPaddingNeeded = 7-daysInMonth.end.minus({days:1}).weekday;

// construct the weeks
let allDays = [...Array(startOfMonthPaddingNeeded).keys()].map((i) => {
  return { day:null }
})
.concat(daysInMonth.splitBy({ days: 1 }).map((day) => {
  // rob you are here. Check the console log.
  // I think you don't need to be returning the days now. I think you maybe just replace this with the worlde score for the day.
  return { day:day.start } ;
}))
.concat([...Array(endOfMonthPaddingNeeded).keys()].map((i) => {
  return { day:null }
}));

let dayCount = -1;
const days = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat','Sun'];

allDays = allDays.map((day) => {
  dayCount++;
  if (dayCount == 7) { dayCount = 0; }
  return { day:day.day, dayOfWeek:days[dayCount] }
})

// const weeks = [...Array(Math.ceil(allDays.length / 7))].map(_ => allDays.splice(0,7))

// console.log(weeks);

// maybe you don't even need to faff with weeks if this is in a 7x grid?
// console.log(allDays);



  // return {
  //   start: daysInMonth.start.minus({days: startOfMonthPaddingNeeded-i}),
  //   end: daysInMonth.start.minus({days: startOfMonthPaddingNeeded-i}),
  // }
// }).concat(daysInMonth.splitBy({days:1})).concat([...Array(endOfMonthPaddingNeeded).keys()].map((i) => {
//   return {
//     start: daysInMonth.end.plus({days: i+1}),
//     end: daysInMonth.end.plus({days: i+1}),
//   }
// }));

// console.log(daysInMonth.end,daysInMonth.end.weekday,endOfMonthPaddingNeeded);
// const days = daysInMonth.map((day) => {
//   return day.start;
// });

// console.log(days);
// rob you are here. days In Month is an interval.
// maybe find out what day of the week the first day is
// and pad it out with empty days
// then then same for the end of the month
// then split that into weeks.



</script>