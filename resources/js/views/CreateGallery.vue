<template>
    <div>
        <div class="alert alert-danger"  v-if="!name" role="alert">
            Gallery name is required
        </div>
        <form>
            <div class="form-group">
                <label for="exampleFormControlInput1">Input gallery name for create a new gallery</label>
                <input type="email" v-model="form.name" class="form-control"
                       id="exampleFormControlInput1"
                       placeholder="Gallery name" required>
            </div>
            <button type="submit" class="btn btn-primary" @click.prevent="store">
                Submit
            </button>
        </form>
    </div>
</template>

<script>
import axios from "axios";

export default {

    data: () =>
        ({
            form: {
                name: "",
            },
            // error: false,
            url: 'http://api.programator.sk/gallery'

        }),

    methods:
        {
            store() {
                axios.post(this.url, this.form, {
                    headers: {
                        "Content-Type": "application/json"
                    }
                })
                    .then(response => {
                        if (response.data.status) {
                            this.$router.push('/');
                        }
                    })

            }
        }

}
</script>

<style scoped>

</style>
