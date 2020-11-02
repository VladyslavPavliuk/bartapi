<template>

    <ul class="nav justify-content-center">
        <li class="nav-item" v-for="link in links">
            <router-link class="nav-link active" :to="link.href">{{ link.title }}</router-link>
        </li>
    </ul>
</template>

<script>
export default {
    data() {
        return {
            links: [
                {
                    title: "Galleries",
                    href: "/"
                },
                {
                    title: "Create Gallery",
                    href: "/create"
                },
                {
                    title: "Delete Gallery",
                    href: "/delete"
                },
                {
                    title: "Upload Image",
                    href: "/upload"
                },
            ]
        }
    }
}
</script>

<style scoped>

</style>
