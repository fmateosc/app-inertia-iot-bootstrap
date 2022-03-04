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
                                    <TableC
                                        @click="sortColumn('id_station')"
                                        :sortHeader="false"
                                        field="id_station"
                                        :sortBy="sortBy"
                                        :sort="sort"
                                    >
                                        ID ESTACIÓN
                                    </TableC>

                                    <TableC
                                        @click="sortColumn('name')"
                                        :sortHeader="true"
                                        field="name"
                                        :sortBy="sortBy"
                                        :sort="sort"
                                    >
                                        NOMBRE ESTACIÓN
                                    </TableC>

                                    <TableC
                                        @click="sortColumn('country_name')"
                                        :sortHeader="false"
                                        field="country_name"
                                        :sortBy="sortBy"
                                        :sort="sort"
                                    >
                                        PAÍS
                                    </TableC>

                                    <TableC
                                        @click="sortColumn('lat')"
                                        :sortHeader="false"
                                        field="lat"
                                        :sortBy="sortBy"
                                        :sort="sort"
                                    >
                                        LATITUD
                                    </TableC>
                                    <TableC
                                        @click="sortColumn('lon')"
                                        :sortHeader="false"
                                        field="lon"
                                        :sortBy="sortBy"
                                        :sort="sort"
                                    >
                                        LONGITUD
                                    </TableC>
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
                                    <td class="p-2 whitespace-nowrap"></td>
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
        sortBy: String,
        sort: String
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
    methods: {
        sortColumn(col){
            let sort = this.sort;

            if (this.sort == "ASC") {
                sort = "DESC";
            } else {
               sort = "ASC"; 
            }
            
            this.$inertia.get(route('estaciones.index'), {
                'sortBy': col,
                sort: sort,
                page: this.stations.current_page,        
            }, {preserveScroll: true});
        }
    },
    mounted() {
        this.serch = "";
    },
});
</script>
