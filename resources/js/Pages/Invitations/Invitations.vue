<script setup lang="ts">

import {computed, onMounted, ref, watch} from 'vue'
import {Head} from '@inertiajs/vue3'
import Karta from '@/Components/Karta.vue'
import Table from "@/Components/Table.vue";
import {useStore} from "vuex";
import InviteRadius from "@/Pages/Invitations/InviteRadius.vue";

// const props = defineProps({})

function submit() {
    alert('Hi ' + radius.value)
}

const defaultRadius = 100

let mapChecked = ref(true)

let radius = ref(defaultRadius)
let subRadius = 22

let fields = [
    {field: 'affiliate_id', name: 'Affiliate ID'},
    {field: 'name', name: 'Name'},
    {field: 'distance', name: 'Distance (km)'},
]

onMounted(() => {

});

const store = useStore()
const affiliates = store.getters['getAffiliates']
let invitedAffiliates

let preinvitedAffiliates = affiliates.filter(entry => {
    return (entry.distance <= radius.value)
});

invitedAffiliates = computed(() => {
    return affiliates.filter(entry => {
        return (entry.distance <= radius.value)
    })
});

function mapToggleClicked() {
    // console.log('checked!', mapChecked)
}

const changeRadius = (newRadius) => {
    radius.value = newRadius
    store.commit("setRadius", radius.value)
}

//const emit = defineEmits(['changed-radius']);
//emit('changed-radius', 200)

//myWindow.dispatchEvent('changed-radius', 20)

</script>

<template>
    <div>
        <Head title="Invitations"/>

        {{ radius.value }}

        <InviteRadius :radius=radius @changed-radius="changeRadius"/>

        <div class="float-end">
            <span class="">Show map: </span>
            <label class="switch">
                <input type="checkbox" @click="mapToggleClicked" v-model="mapChecked">
                <span class="slider round"></span>
            </label>
        </div>

        <div v-if="mapChecked">
            <Karta :radius=100 />
        </div>

        <Table :data=invitedAffiliates :fields=fields />

    </div>
</template>

<style scoped>
.card {
    width: 36rem;
}

.form-holder {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    background: whitesmoke;
    align-content: center;
}

.form-content .form-items {
    border: 3px solid #fff;
    padding: 40px;
    display: inline-block;
    width: 100%;
    min-width: 540px;
    -webkit-border-radius: 10px;
    -moz-border-radius: 10px;
    border-radius: 10px;
    text-align: left;
    -webkit-transition: all 0.4s ease;
    transition: all 0.4s ease;
}

.form-content h3 {
    color: dodgerblue;
    text-align: left;
    font-size: 28px;
    font-weight: 600;
    margin-bottom: 5px;
}

.form-content p {
    color: teal;
    text-align: left;
    font-size: 17px;
    font-weight: 300;
    line-height: 20px;
    margin-bottom: 30px;
}

.btn-primary {
    background-color: #6C757D;
    outline: none;
    border: 0px;
}

.form-content textarea:hover, .form-content textarea:focus {
    border: 0;
    background-color: #ebeff8;
    color: #8D8D8D;
}

@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}

@media (max-width: 840px) {
    .card {
        width: 20rem;
    }

    .form-content .form-items {
        border: 3px solid #fff;
        padding: 5px;
        width: 100%;
        min-width: 100%;
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        border-radius: 2px;
    }

    .form-content h3 {
        font-size: 12px;
        font-weight: 600;
        margin-bottom: 2px;
    }

    .form-content p {
        font-size: 9px;
        font-weight: 300;
        line-height: 10px;
        margin-bottom: 3px;
    }
}

@media (max-width: 576px) {
    .card {
        width: 20rem;
    }

    .form-content .form-items {
        border: 3px solid #fff;
        padding: 5px;
        width: 100%;
        min-width: 100%;
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        border-radius: 2px;
    }

    .form-content h3 {
        font-size: 12px;
        font-weight: 600;
        margin-bottom: 2px;
    }

    .form-content p {
        font-size: 9px;
        font-weight: 300;
        line-height: 10px;
        margin-bottom: 3px;
    }
}

</style>
