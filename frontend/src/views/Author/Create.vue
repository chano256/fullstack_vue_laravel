<template>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h4>Create Author</h4>
            </div>
            <div class="card-body">
                <ul class="alert alert-warning" v-if="Object.keys(errorList).length > 0">
                    <li class="mb-0 ms-3" v-for="(error, index) in this.errorList" :key="index">{{ error[0] }}</li>
                </ul>
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
                    <button type="submit" class="btn btn-primary" @click="saveAuthor()">Save</button>
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
            errorList: '',
            author: {
                name: '',
                email: ''

            }
        }
    },
    methods: {
        saveAuthor() {
            var authorError = this
            axios.post('http://localhost:5003/api/authors', this.author)
                .then(response => {
                    console.log(response.data)

                    this.errorList = ''
                    alert('Author created');
                })
                .catch(error => {
                    if (error.response) {
                        if (error.response.status === 422) {
                            authorError.errorList = error.response.data.errors;                            
                        }
                        console.log(error.response.data);
                    }
                })
        }
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
