<template>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h4>Create Author</h4>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    name: 'authors',
    data() {
        return {
            authors: []
        }
    },
    mounted() {
        this.getAuthors()
        console.log('Authors create mounted')
    },
    methods: {
        getAuthors() {
            axios.get('http://localhost:5003/api/authors')
                .then(response => {
                    this.authors = response.data
                })
                .catch((error) => {
                    console.log(error)
                })
        },
    }
}
</script>
