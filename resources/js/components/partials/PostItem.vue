<template>
    <article>
        <h3>{{post.title}}</h3>
        <p>{{post.created_at}}</p>
        <p>{{post.content}}</p>
    </article>
</template>

<script>
export default {
    name: "PostItem",

    props: {
        'post': Object,
    }
}
</script>

<style lang="scss" scoped>
    article{
        padding: 14px;

        h3{
            padding-bottom: 8px;
            color: blue;
            text-decoration: underline;
        }
    }
</style>