<template xmlns="http://www.w3.org/1999/html">
    <div>
        <div class="card " style="width: 18rem; display:inline-block; margin: 50px" v-for="image in images">

            <div v-if="image.image">
                <img v-bind:src="url + image.image.fullpath"  class="card-img-top" alt="...">
            </div>

            <div v-else>
                This gallery doesn't have any image
            </div>

            <div class="card-body">
                <p class="card-text">Gallery name: {{ image.name }}</p>
            </div>

            <button type="submit" class="btn btn-primary" @click.prevent="download(image.image.fullpath)">
                Download
            </button>

        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {

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
        download(fullpath){
            axios.get(this.url + fullpath, {
                responseType: 'blob',
            }).then( response =>{
                const url = window.URL.createObjectURL(new Blob([response.data]));
                const link = document.createElement('a');
                link.href = url;
                link.setAttribute('download', 'file.jpg');
                document.body.appendChild(link);
                link.click();
            })
        },

    }

}
</script>


<style scoped>

</style>
