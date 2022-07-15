<template>
  <div class="container">
    <h1>Post</h1>
    <ul>
        <li v-for="post in posts" :key="post.id" >
            <h3>{{post.title}}</h3>
            <h2>{{post.content}}</h2>
        </li>
    </ul>
  </div>
</template>

<script>
import Axios from 'axios';

export default {
    name: 'App',
    data(){
        return{
            apiUrl: '/api/posts',
            posts: null
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
