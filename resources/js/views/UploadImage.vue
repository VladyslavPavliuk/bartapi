<template>
    <div class="container">
        <div class="large-12 medium-12 small-12 cell">
            <div class="form-group">
                <label for="exampleFormControlInput1">Gallery name</label>
                <input type="email" v-model="name" class="form-control"
                       id="exampleFormControlInput1"
                       placeholder="Gallery name">
            </div>
            <label>File
                <input type="file" id="file" ref="file" v-on:change="handleFileUpload()"/>
            </label>
            <button v-on:click="submitFile()">Submit</button>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return {
            file: '',
            name: '',
            url: 'http://api.programator.sk/gallery/'
        }
    },
    methods: {
        submitFile(){
            let formData = new FormData();
            formData.append('file', this.file);
            axios.post( this.url + this.name,
                formData,
                {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }
            ).then(function(){
                console.log('SUCCESS!!');
            })
                .catch(function(){
                    console.log('FAILURE!!');
                });
        },
        handleFileUpload(){
            this.file = this.$refs.file.files[0];
        }
    }
}
</script>

<style scoped>

</style>
