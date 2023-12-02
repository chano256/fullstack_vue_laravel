<template>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <!-- <td>{{ author.id }}</td>
                <td>{{ author.name }}</td> -->
            </tr>
        </tbody>
    </table>
</template>

<script>
import axios from 'axios'

export default {
    name: 'author',
    data() {
        return {
            author: []
        }
    },
    mounted() {
        this.getAuthor()
        console.log('I have the author here')
    },
    methods: {
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
        async getAuthors() {
            await this.axios.get('/api/authors')
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
