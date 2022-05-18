<template>
    <Pie :chart-data="data" css-classes="w-full h-full" />
</template>

<script>
import { Pie } from "vue-chartjs";
import { Chart as ChartJS, Title, Legend, Tooltip, ArcElement } from "chart.js";

ChartJS.register(Title, Tooltip, Legend, ArcElement);

export default {
    components: {
        Pie,
    },
    props: {
        categories: Object,
    },
    data() {
        return {
            data: {
                labels: Object.keys(this.categories),
                datasets: [
                    {
                        label: "Expenses",
                        data: Object.values(this.categories),
                        backgroundColor: [
                            "#51068f",
                            "#76b940",
                            "#4d7653",
                            "#5812f5",
                            "#c70f29",
                            "#765ff9",
                            "#bc9e4c",
                            "#fe74d0",
                            "#7c2098",
                            "#b1c8ca",
                        ],
                        hoverOffset: 4,
                    },
                ],
            },
            bgColors: [],
        };
    },
};
</script>
