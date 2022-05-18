require("./bootstrap");

import { createApp } from "vue";

import RoleList from "./components/RoleList";
import UserList from "./components/UserList";
import ExpenseCategoryList from "./components/ExpenseCategoryList";
import ExpenseList from "./components/ExpenseList";

createApp({
    components: {
        RoleList,
        UserList,
        ExpenseCategoryList,
        ExpenseList,
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
