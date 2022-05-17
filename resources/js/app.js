require("./bootstrap");

import { createApp } from "vue";

import RoleList from "./components/RoleList";

createApp({
    components: {
        RoleList,
    },
    data() {
        return {
            message: "Hello Vue!",
        };
    },
    // mounted(){
    //     alert()
    // }
}).mount("#app");
