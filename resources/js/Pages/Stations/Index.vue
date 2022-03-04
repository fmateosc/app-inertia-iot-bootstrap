<template>
    <app-layout title="Estaciones">
        <template #header>
            <h2 class="h4 font-weight-bold">Estaciones meteorológicas</h2>
        </template>

        <div class="row justify-content-center my-5">
            <div class="col-md-12">
                <div class="card shadow bg-light">
                    <div
                        class="card-body bg-white px-5 py-3 border-bottom rounded-top"
                    >
                        <!-- BUSCADOR -->
                        <div class="my-3">
                            <div
                                class="wrap-input100 validate-input input-group"
                            >
                                <div
                                    class="input-group-text bg-white text-muted"
                                >
                                    <i
                                        class="fe fe-search text-muted"
                                        aria-hidden="true"
                                    ></i>
                                </div>

                                <Input
                                    v-model="search"
                                    type="text"
                                    placeholder="¿Qué quiere buscar?"
                                />
                            </div>
                        </div>

                        <!-- TABLA -->  
                        <div class="table-responsive mt-5">
                            <Table>
                                <template #header>
                                    <TableC>ID ESTACIÓN</TableC>
                                    <TableC>NOMBRE ESTACIÓN</TableC>
                                    <TableC>PAÍS</TableC>
                                    <TableC>LATITUD</TableC>
                                    <TableC>LONGITUD</TableC>
                                    <TableC>ACCIONES</TableC>
                                </template>

                                <tr
                                    class="hover:bg-gray-200"
                                    v-for="station in stations.data"
                                    :key="station.id"
                                >
                                    <!---------STATION ID---------------------------->
                                    <TableC>{{ station.id_station }}</TableC>
                                    <!---------STATION NAME---------------------------->
                                    <TableC>{{ station.name }}</TableC>
                                    <!---------COUNTRY---------------------------->
                                    <TableC>{{ station.country_name }}</TableC>
                                    <!---------LATITUD---------------------------->
                                    <TableC>{{ station.lat }}</TableC>
                                    <!---------LONGITUD---------------------------->
                                    <TableC>{{ station.lon }}</TableC>
                                    <!---------BOTONES DE ACCIONES---------------------------->
                                    <td class="p-2 whitespace-nowrap">
                                        
                                    </td>
                                </tr>
                            </Table>                            
                        </div>

                        <!-- PAGINACIÓN -->
                        <Paginator 
                            :pagination="stations"
                            :dataPagination="false"
                        >
                        </Paginator>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import Input from "@/Jetstream/Input";

import Table from "@/Components/Table/Table.vue";
import TableC from "@/Components/Table/TableColumn.vue";

import Paginator from "@/Components/Paginator/Paginator";

import pickBy from "lodash/pickBy";

export default defineComponent({
    props: {
        stations: Object,
    },
    components: {
        AppLayout,
        Input,
        Table,
        TableC,
        Paginator,
    },
    data() {
        return {
            search: "",
        };
    },
    watch: {
        search($value) {
            this.$inertia.get("estaciones", pickBy({ search: $value }), {
                preserveState: true,
            });
        },
    },
    mounted() {
        this.serch = "";
    },
});
</script>

