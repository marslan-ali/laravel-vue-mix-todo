<template>
    <div class="mt-3">
        <h2>Edit item form</h2>
        <div class="container m-2 w-100">
            <input
                type="test"
                placeholder="update item"
                class="border"
                v-model="item.name"
            />
            <button
                :class="[item.name ? 'active' : 'notactive']"
                @click="updateItem()"
            >
                 update
            </button>
        </div>
    </div>
</template>
<script>
    export default {
        
        name: "Edit",
         data: function() {
            return {
                item: {
                    name: ""
                }
            };
        },
        mounted(){
            // axios.get('editCategory/'+id)  //or,
            axios.get(`/api/item/edit/${this.$route.params.itemid}`)   //here 'itemid' from routes.js
            .then((response)=>{
                console.log(response.data.name);
                this.item['name'] = response.data.name; 
            })
        },
        methods:{
            updateItem(){
                axios.put(`/api/item/updateItem/${this.$route.params.itemid}`, {
                    item: this.item
                })
                    .then((response)=>{
                        this.$router.push('/todo-list')   //redirect to item-list component after save
                        alert('Item Updated Successfully');
                    })
                    .catch(()=>{

                    })
            }
        }
    }
</script>
<style scoped>
.active {
    color: white;
    background-color: blue;
}
.inactive {
    color: gray;
}
</style>