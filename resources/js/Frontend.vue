<template>
    <div>
        <Navbar></Navbar>
        <div class="container">

            <h1>QUESTA È LA HOME PAGE PUBBLICA FATTA CON VUE </h1>
            <h2>Lista post</h2>
            <Posts></Posts>
        </div>

    </div>
</template>

<script>
import Navbar from './frontend/components/Navbar.vue';
import Posts from './frontend/components/Posts.vue';
export default {
    components: { Navbar, Posts },
}
</script>