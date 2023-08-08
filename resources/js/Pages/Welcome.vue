<script setup lang="ts">
import type {PropType} from 'vue'
import {computed} from 'vue'
import {Head} from '@inertiajs/vue3'
import Invitations from "@/Pages/Invitations/Invitations.vue";
import {useStore} from 'vuex'

const props = defineProps({
    affiliates: Object as PropType<object>,
    homeOfficeLatLng: {type: Array, required: true}
})

const store = useStore()

Object.keys(props.affiliates).forEach(key => {
    let entry = props.affiliates[key]
    store.commit("addAffiliate", entry)
});

store.commit("setHomeOfficeLatLng", props.homeOfficeLatLng)

const affiliates = computed(() => {
    let c = store.getters['getAffiliates']
    return c
})

</script>

<template>

    <Head><title>Affiliate Invitations</title></Head>

    <legend class="jumbotron display-4 title mb-0 bg-success-subtle text-center">
        <h1>Welcome to Affiliate Invitations!</h1>
    </legend>
    <div class="page p-4">
        <Invitations :homeOfficeLatLng=props.homeOfficeLatLng />
    </div>

</template>

<style scoped>
.page {
    background: whitesmoke;
}

body {
    font-weight: 400;
    -webkit-font-smoothing: antialiased;
    text-rendering: optimizeLegibility;
    -moz-osx-font-smoothing: grayscale;
}

html, body {
    height: 100%;
    background-color: #152733;
    overflow: hidden;
}

.title {
    color: dodgerblue;
    font-family: 'Poppins', sans-serif, Arial, serif;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    padding: 5px;
}

@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}
</style>
