<script setup lang="ts">

import {reactive} from "vue";

const props = defineProps({
    data: reactive({type: Object, required: true}), // as PropType<Array<>,
    fields: {type: Array, required: true}, // as PropType<Array<>,
})

</script>

<template>
    <div>
        <div class="display-6 jumbotron mt-2">Invitees</div>
        <table id="tableComponent" class="table table-bordered table-striped" fields="">
            <thead>
            <tr class="bg-success">
                <!-- loop through each value of the fields to get the table header -->
                <th class="bg-success-subtle" v-for="field in props.fields" :key='field'>
                    {{ field.name }}
                </th>
            </tr>
            </thead>
            <tbody>
            <!-- Loop through the list get the each  data -->
            <tr v-for="item in data" :key='item'>
                <td v-for="field in fields" :key='field'>{{ item[field.field] }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<style scoped>

</style>
