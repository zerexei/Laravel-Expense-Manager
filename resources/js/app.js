require("./bootstrap");

import { createApp } from "vue";

import RoleList from "./components/RoleList";
import UserList from "./components/UserList";
import ExpenseCategoryList from "./components/ExpenseCategoryList";

createApp({
    components: {
        RoleList,
        UserList,
        ExpenseCategoryList,
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
