<script setup lang="ts">
import Range from "@/Components/Range.vue";
import {PropType, ref} from "vue";
import Modal from "@/Components/Modal.vue";

const props = defineProps({
    radius: {type: Number as PropType<number>, default: 50},
})

const emit = defineEmits(['changed-radius']);


let radius = ref(props.radius)

const cardTitle = 'Who shall we invite?';
const cardSubTitle = 'Select' + ' a radius in kilometers from our Limerick, Ireland Office';
const defaultRadius = 100
const maxRadius = 200
const tickStep = 50

let thisModal = ref(null);

function showModal() {
    thisModal.value?.show()
}

function changeValue(newRadius) {
    radius.value = newRadius
}

function submit() {
    emit('changed-radius', radius.value)
    document.getElementById('closeModal').click();
}
</script>

<template>
    <button class="btn btn-primary bg-primary" @click="showModal">Change Radius</button>

    <Modal :title=cardTitle ref="thisModal">
        <template #body>
            <p>{{ cardSubTitle }}</p>
            <form class="">
                <Range label-text='Radius (km):' :default=defaultRadius :min=0 :max=maxRadius :tickStep=tickStep
                       @change-value="changeValue"/>
            </form>
        </template>
        <template #footer>
            <button id="submit" type="submit" @click="submit" class="btn btn-primary bg-primary">
                Select Invitees
            </button>
        </template>
    </Modal>

</template>

<style scoped>

.btn-primary {
    background-color: #6C757D;
    outline: none;
    border: 0px;
}

@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}

</style>
