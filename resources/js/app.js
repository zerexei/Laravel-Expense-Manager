require("./bootstrap");

import { createApp } from "vue";

createApp({
    data() {
        return {
            message: "Hello Vue!",
        };
    },
}).mount("#app");
