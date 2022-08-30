<template>
    <div>
        <h1>Pagina Home</h1>
            <h2>Lista post</h2>
            <Posts></Posts>
    </div>
</template>

<script>
import Posts from '../frontend/components/Posts.vue';
    export default {
    components: { Posts }
}
</script>