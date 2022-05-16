<template>
    <div class="container w-100 m-auto text-center mt-3">
        <Navbar/>
        <h1 class="text-success">Todo list</h1>
        <!-- v-on:reloadlist="getItems" -->
        <add-item-form  /> 
        <!-- v-on:reloadlist="getItems" -->
        <list-view 
            :items="getAllItems"
            class="text-center"
        />
    </div>
</template>

<script>
import addItemForm from "./addItemForm";
import listView from "./listView";
import Navbar from "../Navbar.vue";
import {  mapGetters } from "vuex";

export default {
    components: {
        addItemForm,
        listView,
        Navbar
    },
    computed: {
        // ...mapGetters['getAllItems']
        getAllItems(){
            return this.$store.getters.getAllItems;
        }
    },
    methods:{
        // allItems(){
        //    return this.$store.getters.allItems;
        // }
    },
    mounted() {
        this.$store.dispatch('allItems')
    },
};
</script>

<style scoped></style>