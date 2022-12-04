<template>
  <div>
    <!-- <h1 class="text-sm my-8 font-bold">Month - {{ props.month+1 }}</h1> -->
    <div class="grid grid-cols-7 gap-1">

      <div v-for="(day,i) in allDays" :key="i" :class="backgroundColour(day)" class=" h-8 w-8 flex justify-center items-center">
        <!-- {{ day.dayOfWeek }} - -->
        <span v-if="(day.day && day.score)">
          <!-- {{ day.day.toString() }} - {{ day.game_id }} - {{ day.score }} -->
          <!-- {{ day.score }} -->
        </span>
        <span v-else>
          &nbsp;
        </span>
      </div>
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
  scores: {
    type: Array,
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

  if (day.day) {

    // get the number of days since Jun 19,2021
    const daysSinceStart = Math.floor(day.day.diff(DateTime.fromObject({day:19, month:6, year:2021}), 'days').days);
    // game 1 was on Jun 19, 2021
    // console.log(daysSinceStart);

    // get the score for this day
    const scoreData = props.scores.find((score) => {
      return score.game_id == daysSinceStart;
    });

    const score = scoreData ? scoreData.score : null;

    console.log(score);

    return { day:day.day, dayOfWeek:days[dayCount], game_id: daysSinceStart, score: score }
  }
  return { day:day.day, dayOfWeek:days[dayCount] };
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

function backgroundColour(day){
  switch (day.score) {
    case 1:
      return 'bg-green-100';
    break;

    case 2:
      return 'bg-green-200';
    break;

    case 3:
      return 'bg-green-300';
    break;

    case 4:
      return 'bg-green-400';
    break;

    case 5:
      return 'bg-green-500';
    break;


    case 6:
      return 'bg-green-600';
    break;

    case 8:
      return 'bg-red-100';
    break;


    default:
      break;
  }
  return 'bg-white';
}

</script>