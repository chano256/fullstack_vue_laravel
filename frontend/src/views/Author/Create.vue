<template>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h4>Create Author</h4>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" v-model="author.name" />
                    <p>{{ author.name }}</p>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" v-model="author.email" />
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    name: 'createAuthor',
    data() {
        return {
            author: {
                name: '',
                email: ''

            }
        }
    },
    mounted() {
        this.getAuthors()
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
    },
    watch: {
        // watches for changes in name input
        'author.name'(newName) {
            if (newName.length > 3) {
                console.log('Name changed:', newName);   
            }
        }
    }
}
</script>
