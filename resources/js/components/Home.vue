<template>
    <div class="container w-100 m-auto text-center mt-3">
        <Navbar/>
        <h1>Home Page</h1>
    </div>
</template>

<script>
import Navbar from "./Navbar.vue";

export default{
    created(){
        console.log('i created');
    },
    components:{
        Navbar
    }
};
</script>