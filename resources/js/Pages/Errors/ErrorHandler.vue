<script setup lang="ts">
import {PropType} from "vue";

const props = defineProps({
    affiliates: { String, required: false },
    row: { String, required: false },
    resources: { String, required: false}
})

const affiliates = props.affiliates
const row = props.row

function timeUntilMidnight() {
    const now = new Date(); // Current date and time
    const midnight = new Date(now); // Clone current date
    midnight.setHours(24, 0, 0, 0); // Set time to next midnight

    const diff = midnight - now; // Difference in milliseconds
    const hours = Math.floor(diff / 1000 / 60 / 60); // Convert to hours
    const minutes = Math.floor((diff / 1000 / 60) % 60); // Remaining minutes

    return { hours, minutes };
}

const { hours, minutes } = timeUntilMidnight();
</script>

<template>
<div v-if="resources">

    <div class="bigBoldDiv">
        <div class="bigBold">
            <h1>Sorry!</h1>
            <p>It was wonderful hosting you, even for a short time. I hope you enjoyed what you saw.</p>
            <p>We are sorry, however there are limited resources at this time for previewing this application.</p>

            <p>You or someone from your IP address has used up all resources available today.</p>
            <p>You may return in about {{hours}} hours and {{minutes}} minutes (after midnight GMT).</p>
        </div>
    </div>
</div>

<div v-if="affiliates">
    <h1>Error!</h1>
    <h2>Problem with affiliates file</h2>
    <div><pre>{{ affiliates }}</pre></div>
    <div v-if="row">
        <h3>Problem detected in row:</h3>
        <pre>{{ row }}</pre>
    </div>
</div>

</template>

<style scoped>
.bigBold {
    font-size: 30px;
    font-family: "Helvetica Neue", Arial, Helvetica, sans-serif;
    background-color: dodgerblue;
    color: ghostwhite;
    padding: 10px 20px;
    border-radius: 10px;
}
.bigBoldDiv {
    margin: 0 auto;
    height: 200px;
    width: 600px;
}
</style>
