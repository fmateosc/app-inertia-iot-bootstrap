<template>
    <app-layout title="Broker">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Broker
            </h2>
        </template>

        <div class="card">
            <div
                class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-3 gap-4"
            >
                <CardBroker
                    title="Nombre del sistema"
                    :message="broker.systemName"
                    icon="fa fa-file fa-8x"
                >
                </CardBroker>

                <CardBroker
                    title="Versión"
                    :message="broker.version"
                    icon="fab fa-buffer fa-8x"
                >
                </CardBroker>

                <CardBroker
                    title="Tiempo de funcionamiento"
                    :message="broker.uptime"
                    icon="fa fa-clock fa-8x"
                >
                </CardBroker>
            </div>
        </div>
    </app-layout>
</template>

<script>
import { defineComponent } from "vue";

import AppLayout from "@/Layouts/AppLayout.vue";

import { Inertia } from "@inertiajs/inertia";

import CardBroker from "@/Components/Cards/CardBroker";

export default defineComponent({
    props: {},
    data() {
        return {
            broker: {
                systemName: "",
                version: "",
                uptime: "",
            },
        };
    },
    components: {
        AppLayout,
        CardBroker,
    },
    computed: {},
    methods: {
        async getBrokerInfo() {
            try {
                const res = await axios.get(
                    "http://iotspain.xyz:3000/api/get-broker-info"
                );

                if (res.data.status == "success") {
                    this.broker.systemName = res.data.data.data[0].sysdescr;
                    this.broker.version = res.data.data.data[0].version;

                    let uptime = res.data.data.data[0].uptime;
                    uptime = uptime.split(",");

                    this.broker.uptime =
                        uptime[0].replace("days", "dias") +
                        ", " +
                        uptime[1].replace("hours", "horas") +
                        ", " +
                        uptime[2].replace("minutes", "minutos");
                }

                //Actualizamos la información del broker cada minuto
                setTimeout(() => {
                    this.getBrokerInfo();
                }, 60000);
            } catch (error) {}
        },
    },
    mounted() {
        this.getBrokerInfo();
    },
});
</script>

<style scope>
.grid {
    display: grid;
}

.grid-cols-1 {
    grid-template-columns: repeat(1, minmax(0, 1fr));
}

.sm\:grid-cols-2 {
    grid-template-columns: repeat(2, minmax(0, 1fr));
}

.md\:grid-cols-3 {
    grid-template-columns: repeat(3, minmax(0, 1fr));
}

.xl\:grid-cols-3 {
    grid-template-columns: repeat(3, minmax(0, 1fr));
}

.gap-4 {
    gap: 1rem;
}
</style>
