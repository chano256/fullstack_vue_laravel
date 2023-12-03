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
                                <RouterLink :to="{path : '/authors/' + author.id + '/update'}" class="btn btn-success mx-2">Edit</RouterLink>
                                <button type="button" class="btn btn-danger float-end">Delete</button>
                                <!-- <td><button @click="deleteAuthor(author.id)">Delete</td> -->
                            </td>
                        </tr>
                    </tbody>
                    <tbody v-else>
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
    name: 'listAuthors',
    data() {
        return {
            authors: []
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
                        console.log(response)
                    }).catch(error=>{
                        console.log(error)
                    })
            }
        }
    }
}
</script>
