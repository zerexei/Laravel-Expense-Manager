require("./bootstrap");

import { createApp } from "vue";

import RoleList from "./components/RoleList";
import UserList from "./components/UserList";

createApp({
    components: {
        RoleList,
        UserList,
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
