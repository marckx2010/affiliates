<script setup lang="ts">
import {PropType, ref} from "vue";

const props = defineProps({
    labelText: {type: String as PropType<string>, required: true},
    default: {type: Number as PropType<number>, default: 50},
    min: {type: Number as PropType<number>, default: 0},
    max: {type: Number as PropType<number>, default: 100},
    tickStep: {type: Number as PropType<number>, default: 5},
})

let value = ref(props.default.valueOf())

let tickMarks = []
for (let x = props.min; x <= props.max; x += props.tickStep) {
    tickMarks.push(x);
}

const emit = defineEmits(['change-value'])

</script>

<template>
    <label for="range" class="me-4 text-black">{{ labelText.valueOf() }}</label>
    <div class="row ms-1">
        <input id="range" type="number" class="radiusInput me-2 mb-1" v-model.number="value"
               :min="props.min" :max="max" @change="$emit('change-value', value)">
        <input type="range" class="radius-range ps-0 pe-0" v-model.number="value" :min="props.min"
               :max="props.max" step="1" @change="$emit('change-value', value)">
        <div class="ticks">
            <span class="tick" v-for="ticks in tickMarks">{{ ticks }}</span>
        </div>
    </div>
</template>

<style scoped lang="scss">
// Tick width & range thumb width need to be in sync
$radiusRangeWidth: 380px;
$unit: 75px;

$radiusInputWidth: 80px;
$leftPad: $radiusInputWidth + 10;

.radius-range {
    position: relative;
    top: -15px;
    width: $radiusRangeWidth - $radiusInputWidth;
}

.radiusInput {
    width: $radiusInputWidth;
}

// The ticks
.ticks {
    display: flex;
    justify-content: space-between;

    // We need left & right padding that's half the width of the range thumb, so all ticks align with the center of the thumb
    padding: 0 $leftPad;
}

.tick {
    position: relative;
    top: -20px;
    display: flex;
    justify-content: center;
    width: 1px;
    background: gray;

    // Cap the height of the tick & push text down, so the tick renders as a little line and the text doesn't overlap the line.
    // Also add margin, so the container expands enough that the next element to add won't overlap the ticks.
    height: calc($unit / 8);
    line-height: calc($unit / 2);
    margin-bottom: calc($unit / 2);
}

@media (max-width: 576px) {
    .radius-range, .ticks {
        display: none;
    }
}
</style>
