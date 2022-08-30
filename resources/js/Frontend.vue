<template>
    <div>
        <Navbar></Navbar>
        <div class="container">

            
            <router-view></router-view>
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