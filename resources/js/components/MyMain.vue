<template>
    <div class="container">
        <div class="card text-center mt-5" v-for="(post, index) in posts" :key="index">
            <div class="card-header">
                {{post.title}}
            </div>
            <div class="card-body">
                <p class="card-text">{{post.content}}</p>
                <h6>{{post.category.name}}</h6>
                <a href="#" class="btn btn-primary">Leggi articolo</a>
            </div>
            <div class="card-footer text-muted">
                {{post.updated_at}}
            </div>
        </div>
    </div>
  
</template>

<script>
import Axios from 'axios';

export default {
    name: 'MyMain',
    data() {
        return {
            posts:[]
        }
    },

    methods:{
        getposts(){
            Axios.get('/api/posts')
            .then((response)=> {
                this.posts = response.data.results;
            });
        },
    },
    mounted(){
            this.getposts();
        }
}

</script>

<style>

</style>