<template>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h4>Edit Author</h4>
            </div>
            <div class="card-body">
                <ul class="alert alert-warning" v-if="Object.keys(errorList).length > 0">
                    <li class="mb-0 ms-3" v-for="(error, index) in this.errorList" :key="index">{{ error[0] }}</li>
                </ul>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" v-model="author.name" />
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
    name: 'editAuthor',
    data() {
        return {
            authorId: '',
            errorList: '',
            author: {
                name: '',
                email: ''

            }
        }
    },
    mounted() {
        this.authorId = this.$route.params.id
        this.getAuthor(this.$route.params.id)
    },
    methods: {
        getAuthor(id) {
            axios.get(`http://localhost:5003/api/authors/${id}`)
                .then(response => {
                    this.author = response.data
                })
                .catch(error => {
                    if (error.response) {
                        if (error.response.status === 404) {
                            alert(error.response.data.methods);
                        }
                    }
                })
        },
        saveAuthor() {
            var authorError = this
            axios.patch(`http://localhost:5003/api/authors/${this.authorId}`, this.author)
                .then(response => {
                    this.errorList = ''
                    alert(response.data);
                })
                .catch(error => {
                    if (error.response) {
                        if (error.response.status === 422) {
                            authorError.errorList = error.response.data.errors;
                        }

                        if (error.response.status === 404) {
                            alert(error.response.data.message);
                        }

                        // research how to handle 500 errors
                        console.log('Something went wrong. Contact Support, 500 error');
                    }
                })
        }
    }
}
</script>
