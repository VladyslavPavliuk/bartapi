<template>
    <div class="card " style="width: 18rem;" v-for="image in images">

        <div v-if="image.image">
            <img :src="url + image.image.fullpath" class="card-img-top" alt="...">
        </div>

        <div v-else>
            This gallery don't have any image
        </div>

        <div class="card-body">
            <p class="card-text">Gallery name: {{ image.name }}</p>
        </div>

    </div>
</template>

<script>
export default {
    props: {
        src: {
            type: String,
            default: "NULL"
        }
    },
    data: () => ({
        images: [],
        url: 'http://api.programator.sk/images/720x480/',
    }),

    mounted() {
        this.loadImage();
    },
    methods: {
        loadImage() {
            axios.get('http://api.programator.sk/gallery')
                .then(response => {
                    this.images = response.data.galleries;
                })
        },
    }

}
</script>

<style scoped>

</style>
