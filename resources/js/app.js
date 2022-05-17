require("./bootstrap");

import { createApp } from "vue";

createApp({
    data() {
        return {
            message: "Hello Vue!",
        };
    },
    // mounted(){
    //     alert()
    // }
}).mount("#app");
