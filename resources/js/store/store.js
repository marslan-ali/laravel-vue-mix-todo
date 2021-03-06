export default {
    state: {
        items: []
    },

    getters: {
        getAllItems(state) {
            return state.items;
        }
    },

    actions: {
        allItems(context) {
            axios.get("api/items/").then(response => {
                context.commit("getItems", response.data.data);
            });
        }
    },

    mutations: {
        getItems(state, data) {
            return (state.items = data);
        }
    }
};
