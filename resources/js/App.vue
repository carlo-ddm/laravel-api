<template>
  <div class="container">Home VJS</div>
</template>

<script>
import Axios from 'axios';

export default {
    name: 'App',
    data(){
        return{
            apiUrl: 'http://127.0.0.1:8000/api/posts',
            post: null
        }
    },

    methods: {
        getApi(){
            Axios.get(this.apiUrl)
            .then(res => {

                this.posts = res.data
                console.log(this.posts);
            })
        }
    },

    mounted() {
        this.getApi();
    },
}
</script>

<style>

</style>
