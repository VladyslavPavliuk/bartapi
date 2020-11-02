import vueRouter from 'vue-router';
import Vue from 'vue';

Vue.use(vueRouter);

import Index from "./views/Index";
import CreateGallery from "./views/CreateGallery";
import DeleteGallery from "./views/DeleteGallery";
import UploadImage from "./views/UploadImage";


const routes = [
    {
        path: "/",
        component: Index
    },
    {
        path: "/create",
        component: CreateGallery
    },
    {
        path: "/delete",
        component: DeleteGallery
    },
    {
        path: "/upload",
        component: UploadImage
    },
];

export default new vueRouter (
    {
        mode: "history",
        routes
    }
);

