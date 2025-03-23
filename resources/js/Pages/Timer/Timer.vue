<script setup lang="ts">

import {PropType, ref} from "vue";
import Modal from "@/Components/Modal.vue";

const props = defineProps({
    helloText: {type: String as PropType<string>, required: false, default: "Preview is timed due to high resource usage."},
    goodbyeText: {type: String as PropType<string>, required: false, default: "Thank you for previewing this application!"},
    min: {type: Number as PropType<number>, default: 0},
    max: {type: Number as PropType<number>, default: 100},
})

const message = ref(props.helloText)

const showObscure = ref(false);

const min = ref(0);
const max = ref(120)
const secondsLeft = ref(120)

const rangeWidthPercent = ref(100) // Initial width of the range (assuming container is 100px wide)
const rangeClass = ref("rangeGreen")

let interval = setInterval(() => {
    if (secondsLeft.value >= 0) {
        secondsLeft.value -= 1

        rangeWidthPercent.value = (secondsLeft.value / max.value) * 100;

        if (rangeWidthPercent.value < 25) {
            rangeClass.value = 'rangeYellow'
        }

        if (rangeWidthPercent.value < 10) {
            rangeClass.value = 'rangeRed'
        }
    } else {
        clearInterval(interval);
        secondsLeft.value = 0;
        rangeClass.value = "rangeOver"
        rangeWidthPercent.value = 0
        showObscure.value = true
        message.value = props.goodbyeText
    }
}, 1000); // Update every second (1000 milliseconds)

function timeIsUp() {
    console.log('timeIsUp')
    message.value = props.goodbyeText
    showObscure.value = true;
}

</script>

<template>
    <div class="message">{{ message }} <span v-if="secondsLeft > 0">{{ secondsLeft}} seconds remaining</span></div>
    <div :class=rangeClass :style="{ width: rangeWidthPercent + '%' }"></div>

<!--    <div class="progress" :class=rangeClass role="progressbar" aria-label="Basic example" :aria-valuenow=rangeWidthPercent.value aria-valuemin="0" aria-valuemax="100">
        <div class="progress-bar"></div>
    </div>-->

    <div v-if="showObscure" class="modal-overlay">
        <div class="modal">

        </div>
    </div>
</template>

<style scoped lang="scss">
.timer {
    position: absolute;
    bottom: -100px;
    right: 20px;
}

.message {
    font-family: Arial, Helvetica, sans-serif;
    font-size: 24px;
}

.rangeGreen {
    height: 20px;
    background-color: #58eb34;
}

.rangeYellow {
    height: 20px;
    background-color: #b734eb;
}

.rangeRed {
    height: 20px;
    background-color: #eb3434;
}

.rangeOver {
    height: 1px;
    background-color: white;
}

$radiusInputWidth: 800px;

.radiusInput {
    width: $radiusInputWidth
}

.modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5); /* Opacity 50% */
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1000;
}

.modal {
    background-color: pink;
    color: white;
    padding: 20px;
    border-radius: 5px;
}
</style>
