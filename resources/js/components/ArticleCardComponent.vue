<template>
    <div class="article-card">
        <img :src="card.image" class="article-image" />
        <h4>{{ card.title }}</h4>
        <p>{{ card.content }}</p>
    </div>
</template>
<script>
export default {
    props: {
        card: {
            image: { default: "", required: true },
            title: { default: "", required: true },
            content: { default: "", required: true },
        },
    },
};
</script>
