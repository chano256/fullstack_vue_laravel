<template>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>List of Authors</h4>
            </div>
            <div class="card-body">
                <table>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody v-if="this.authors.length > 0">
                        <tr v-for="(author, index) in this.authors" :key="index">
                            <td>{{ author.id }}</td>
                            <td>{{ author.name }}</td>
                            <td>{{ author.email }}</td>
                            <td>
                                <button type="button" class="btn btn-success">Edit</button>
                                <button type="button" class="btn btn-danger float-end">Delete</button>
                                <!-- <td><button @click="deleteAuthor(author.id)">Delete</td> -->
                            </td>
                        </tr>
                    </tbody>
                    <tbody v-else="this.authors.length === 0">
                        <tr colspan="3">{{this.authors.length}} Authors Found</tr>
                    </tbody>
                </table>
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
        console.log('Authors view mounted')
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
        getAuthor() {
            this.axios.get('/api/authors')
                .then((response) => {
                    console.log(response)
                    this.author = response 
                })
                .catch((error) => {
                    console.log(error)
                })
            console.log('Get Author')
        },
        deleteAuthor(id){
            if(confirm("Are you sure to delete this author ?")){
                this.axios.delete(`/api/authors/${id}`)
                    .then(response => {
                        this.getCategories()
                    }).catch(error=>{
                        console.log(error)
                    })
            }
        }
    }
}
</script>
