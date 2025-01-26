<script setup lang="ts">
import {PropType} from "vue";

const props = defineProps({
    affiliates: { String, required: false },
    row: { String, required: false },
    resources: { String, required: false}
})

const affiliates = props.affiliates
const row = props.row

</script>

<template>

<div v-if="resources">
    <h1>Sorry!</h1>
    <h2>Due to limited resources the Affiliates sample application may only be used once per 24 hours.</h2>
    <h2>Please try again at a later time</h2>
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

</style>
