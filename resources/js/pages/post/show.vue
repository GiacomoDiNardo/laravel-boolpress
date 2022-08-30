<template>
    <div>
        <h1>Pagina Show post # {{ post.id }}</h1>

        <h2>{{ post.title }}</h2>
        <img :src="post.post_img" alt="">
        <p v-html="post.content"></p>
    </div>
</template>

<script>
import axios from 'axios';

    export default {
        data() {
            return {
                post: []
            }
        },
        
        mounted() {
            axios.get("/api/posts/" + this.$route.params.slug)
            .then((resp) => {
                const data = resp.data
                this.post = data;
            })
        }
    }
</script>