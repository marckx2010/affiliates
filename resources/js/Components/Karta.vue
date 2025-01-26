<script setup lang="ts">
import {onMounted, PropType, watch, ref} from "vue";
import {useStore} from "vuex";

import shamrock from '@/assets/images/shamrock256.png'
import miniIcon from '@/assets/images/andandand1000.jpg'
import miniLogo from '@/assets/images/share_and_and.png'

const props = defineProps({
    radius: {type: Number as PropType<number>, default: 100},
});

let map;

let circle;

let reactiveRadius = ref(props.radius)

let initialZoom = 8;

// function onMounted(callback: () => void): void

// try and set a reasonable view depending on window width
function setInitialZoom(): number {
    let windowWidth = ref(window.innerWidth)
    if (windowWidth.value < 550) return 4
    if (windowWidth.value >= 550 && windowWidth.value < 1200) return 6
    if (windowWidth.value >= 1200) return 8
    return 8
}

onMounted(() => {
    const store = useStore()
    const affiliates = store.getters['getAffiliates']
    const centerHome = store.getters['getHomeOfficeLatLng']

    initialZoom = setInitialZoom()

    watch(() => store.getters.getRadius, function() {
        reactiveRadius.value = store.getters['getRadius']
        circle.removeFrom(map)
        drawCircle(reactiveRadius.value)
        addMarkers(reactiveRadius.value)
    });

    let map = L.map('map', {editable: false}).setView(centerHome, initialZoom);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 18,
        attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
        format: 'image/png',
        transparent: true
    }).addTo(map);

    L.control.mousePosition().addTo(map);

    let worldMiniMap = L.control.worldMiniMap({
        position: 'bottomleft',
        style: {opacity: 0.8, borderRadius: '0px', backgroundColor: 'lightblue'}
    }).addTo(map);

    //console.log(centerHome);

    // home marker
    L.marker(centerHome, {
        icon: L.divIcon({
            html: '&nbsp;<img alt="mini icon" src=' + miniIcon + ' style="width: 50px; height: 50px;">' + '&nbsp;',
            popupAnchor: [20, 10]
        })
    }).addTo(map)
        .bindPopup('<img alt="mini logo" src=' + miniLogo + ' style="background-color: pink; padding: 2px; height: 30px"><br/>Home office of<br/> And And! And in Limerick!');

    function addMarkers(radius) {
        // a marker for everyone
        affiliates.forEach(entry => {
            let popupText = entry.name + '<br>'
            if (entry.distance <= radius) {
                popupText += '&nbsp;<img alt="lucky shamrock" src=' + shamrock + ' style="width: 20px; height: 20px;">' + '&nbsp;'
            }
            popupText += entry.distance + ' km'
            //console.log("latLng", entry.latLng)
            L.marker(entry.latLng).addTo(map)
                .bindPopup(popupText);
        });
    }
    addMarkers(props.radius)

    function drawCircle(radius) {
        // the lucky inside circle
        circle = L.circle(centerHome, {
            color: 'green',
            fillColor: 'lightgreen',
            fillOpacity: 0.25,
            radius: radius * 1000
        }).addTo(map);
    }
    drawCircle(props.radius)

})

</script>

<template>
    <div>
        <div class="text-center display-6">{{ reactiveRadius }} kilometers</div>
        <span class="float-end text-info">Click on a marker for more detail</span>
        <div id="map" class="img-fluid"></div>
    </div>

</template>

<style scoped>
#map {
    height: 300px;
    width: 100%;
    border: 1px solid #ccc;
}

@media (max-width: 576px) {
    #map {
        height: 450px;
    }
}

@media (max-width: 576px) {
    #map {
        height: 550px;
    }
}

@media (max-width: 800px) {
    #map {
        height: 650px;
    }
}

@media (min-width: 1024px) {
    #map {
        height: 750px;
    }
}
</style>
