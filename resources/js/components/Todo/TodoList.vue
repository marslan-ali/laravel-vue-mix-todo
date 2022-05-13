<template>
    <div class="container w-100 m-auto text-center mt-3">
        <Navbar/>
        <h1 class="text-success">Todo list</h1>
        <add-item-form v-on:reloadlist="getItems()" />
        <list-view
            :items="items"
            v-on:reloadlist="getItems()"
            class="text-center"
        />
    </div>
</template>

<script>
import addItemForm from "./addItemForm";
import listView from "./listView";
import Navbar from "../Navbar.vue";

export default {
    components: {
        addItemForm,
        listView,
        Navbar
    },

    data: function() {
        return {
            items: []
        };
    },
    methods: {
        getItems() {
            axios
                .get("api/items")
                .then(res => {
                    this.items = res.data.data;
                })
                .catch(error => {
                    console.log(error);
                });
        }
    },
    created() {
        this.getItems();
    }
};
</script>

<style scoped></style>