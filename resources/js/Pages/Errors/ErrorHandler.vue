<script setup lang="ts">
import {PropType} from "vue";

const props = defineProps({
    affiliates: { String, required: false },
    row: { String, required: false }
})

const affiliates = props.affiliates
const row = props.row

</script>

<template>
<h1>Error!</h1>

<div v-if="affiliates">
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
