<template>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>List of Authors</h4>
            </div>
            <div class="card-body">
                <h1>Are you sure you want to delete this author ?</h1>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    name: 'deleteAuthor',
    data() {
        return {
            authorId: null,
        }
    },
    mounted() {
        this.authorId = this.$route.params.id
    },
    methods: {
        deleteAuthor(){
            if(confirm("Are you sure to delete this author ?")){
                axios.delete(`/api/authors/${this.authorId}`)
                    .then(response => {
                        console.log(response)
                    }).catch(error => {
                        if (error.response) {
                            if (error.response.status === 404) {
                                alert(error.response.data.message);
                            } else {
                                // research how to handle 500 errors
                                console.log('Something went wrong when deleting. Contact Support, 500 error');
                            }
                        }
                    })
            }
        }
    }
}
</script>
