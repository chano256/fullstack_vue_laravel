<template>
    <div class="container">
        <h1>Category List</h1>
        <ul class="list-group" v-for="(category, index) in this.categories" :key="index">
            <li class="list-group-item">{{ category.name }}</li>
        </ul>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    name: 'CategoryListView',
    data() {
        return {
            categories: []
        }
    },
    mounted() {
        this.getCategory()
    },
    methods: {
        getCategory() {
            axios.get('http://localhost:5003/api/categories')
                .then(response => {
                    this.categories = response.data
                })
                .catch(error => {
                    if (error.response) {
                        alert("no Categories Found")
                    }
                })
        }
    }
}
</script>

<style></style>