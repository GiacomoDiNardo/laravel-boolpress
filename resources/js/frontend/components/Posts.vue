<template>
    <div class="row row-cols-2">
        <div class="col mb-3" v-for="post in posts" :key="post.id">
            <div class="card">
                <img :src="'/storage/' + post.post_img" class="card-img-top" style="height: 200px">
                <div class="card-body">
                    <h5 class="card-title">{{ post.title }}</h5>
                    <p class="card-text" v-html="post.content"></p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            posts: []
        }
    },

    methods: {
        fetchPosts() {
            axios.get("/api/posts")
                .then((resp) => {
                    this.posts = resp.data
                })
        }
    },
    mounted() {
        this.fetchPosts()
    }
}
</script>