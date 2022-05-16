<template>
    <li class="list-group-item d-flex justify-content-between w-50" 
    draggable
    @dragstart="startDrag($event, item)"
  >
        <input
            type="checkbox"
            @change="updateCheck()"
            v-model="item.completed"
            class="mr-3"
        />
        <span :class="[item.completed ? 'completed' : '', 'item']">{{
            item.name
        }}</span>
        <router-link :to="`/edit-item/${item.id}`" ><button class="btn btn-primary btn-sm text-white"> Edit</button></router-link>
        <button class="btn-danger ml-3" @click="removeItem()">X</button>
    </li>
</template>

<script>
export default {
    props: ["item"],
    methods: {
        updateCheck() {
            axios
                .put(`api/items/${this.item.id}`, {
                    item: this.item
                })
                .then(res => {
                    if (res.status == 200) {
                        // this.$emit("itemchanged"); // event handler without vuex
                        this.$store.dispatch('allItems')

                    }
                })
                .catch(error => {
                    console.log("error from axios put", errors);
                });
        },
        removeItem() {
            axios
                .delete(`api/items/${this.item.id}`)
                .then(res => {
                    if (res.status == 200) {
                        // this.$emit("itemchanged"); // event handler without vuex
                        this.$store.dispatch('allItems')
                    }
                })
                .catch(error => {
                    console.log("error from axios delte ", error);
                });
        },
        startDrag (evt, item) {
        this.$parent.temp = item;
        evt.dataTransfer.dropEffect = 'move'
        evt.dataTransfer.effectAllowed = 'move'
        // evt.dataTransfer.setData('order', item.order)
  		}
    }
};
</script>

<style>
.completed {
    text-decoration: line-through;
    color: gray;
}
.item {
    word-break: break-all;
}
</style>