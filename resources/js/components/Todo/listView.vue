<template>
    <div class="mt-4">
        <h4>List</h4>
        <hr class="w-50 m-auto mb-3" />
        <ul
            class="list-group m-auto drop-zone"
            @drop="onDrop($event, 1)"
            @dragover.prevent
            @dragenter.prevent
        >
            <!-- v-on:itemchanged="$emit('reloadlist')" -->
            <list-item
                :item="item"
                v-for="(item, index) in items"
                :key="item.id"
                :index="index++"
                :id="`list_${index + 1}`"
                class="m-auto my-1 text-justify text-wrap "
                ref:item
            />
        </ul>
    </div>
</template>

<script>
import listItem from "./listItem";
import draggable from "vuedraggable";
import Axios from "axios";
export default {
    components: {
        listItem,
        draggable
    },
    data() {
        return {
            temp: []
        };
    },
    props: ["items"],
    methods: {
        onDrop(evt, item) {
            const order = evt.path[0].__vue__.$attrs.index;
            Axios.put("api/items/updateOrder/" + this.temp.id, {
                order
            }).then(res => {
                this.$store.dispatch("allItems");
            });
        }
    }
};
</script>

<style scoped></style>
