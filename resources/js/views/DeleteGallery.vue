<template>
    <div>
        <form>
            <div class="form-group">
                <label for="exampleFormControlInput1">Input gallery name for delete a new gallery</label>
                <input type="text" v-model="name" class="form-control"
                       id="exampleFormControlInput1"
                       placeholder="Gallery name">
            </div>
            <button type="submit" class="btn btn-danger" @click.prevent="trash">
                Delete
            </button>
        </form>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data: () =>
        ({
            name: "",
            url: 'http://api.programator.sk/gallery/'

        }),

    methods:
        {
            trash() {
                axios.delete(this.url + this.name)
                    .then(response => {
                        if (response.data.status) {
                            console.log(response.data)
                            this.$router.push('/');

                        }
                    })

            }
        }

}
</script>

<style scoped>

</style>
