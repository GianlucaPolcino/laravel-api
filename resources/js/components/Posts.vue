<template>
    <main class="container">
        <h1>
            Tutti i post
        </h1>

        <PostItem
        v-for="post in posts"
        :key="post.id"
        :post='post'
         />
    </main>
</template>

<script>

import PostItem from "./partials/PostItem.vue";

export default {
    name: 'Posts',

    components:{
        PostItem,
    },

    data(){
        return{
            apiUrl: 'http://127.0.0.1:8000/api/posts',
            posts: null,
        }
    },

    methods:{

        getPosts(){
            axios.get(this.apiUrl)
            .then(res => {
                this.posts = res.data
                console.log(this.posts);
            })
        }
    },

    mounted(){
        this.getPosts();
    }
}
</script>

<style lang="scss" scoped>
    h1{
        padding: 30px 0;
        text-align: center;
    }
</style>