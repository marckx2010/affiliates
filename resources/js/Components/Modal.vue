<script setup lang="ts">
import {onMounted, ref} from "vue";
import {Modal} from "bootstrap";

defineProps({
    title: {
        type: String,
        default: "<<Title goes here>>",
    },
});
let modalEle = ref(null);
let thisModalObj: Modal | null = null;

onMounted(() => {
    return thisModalObj = new Modal(modalEle.value);
});

function _show() {
    thisModalObj?.show();
}

defineExpose({show: _show});
</script>

<template>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby=""
         aria-hidden="true" ref="modalEle">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            id="closeModal"></button>
                </div>
                <div class="modal-body">
                    <slot name="body"/>
                </div>
                <div class="modal-footer">
                    <slot name="footer"></slot>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>
