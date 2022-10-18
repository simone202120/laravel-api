<template>
    <div class="container">
        <div v-if="loading" class="d-flex justify-content-center">
            <div class="spinner-border" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>

        <div v-else class="card text-center mt-5" v-for="(post, index) in posts" :key="index">
            <div class="card-header">
                <H5>TITOLO</H5>
                <H5>{{post.title}}</H5>
            </div>
            <div v-if="loading">
                <div class="spinner-border text-warning" role="status">
                 <span class="sr-only">Loading...</span>
                </div>
            </div>
            <div class="card-body">
                <p class="card-text">{{trocatetext(post.content, 50)}}</p>
                <P>CATEGORY:{{post.category.name}}</P>
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
            posts:[],
            loading: true
        }
    },

    methods:{
        getposts(){
            Axios.get('/api/posts')
            .then((response)=> {
                this.posts = response.data.results;
                this.loading=false;
            });
        },

        trocatetext(text, maxlength){

            if (text.length < maxlength) {
                return text;
            } else {
                return text.substring(0,maxlength) + '...';
            }
            
        }
    },
    mounted(){
            this.getposts();
        }
}

</script>

<style>

</style>