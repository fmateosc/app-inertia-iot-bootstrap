<template>
    <app-layout title="Estaciones">
        <template #header>
            <h2 class="h4 font-weight-bold">dispositivos</h2>
        </template>

        <!-- FORMULARIO -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ formTitle }}</h3>
            </div>
            <form @submit.prevent="submit">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4 col-md-4">
                            <div class="form-group">
                                <label class="form-label"
                                    >Id del dispositivo
                                    <span class="text-red">*</span></label
                                >
                                <input
                                    id="device-id"
                                    v-model="form.device_id"
                                    type="text"
                                    class="form-control"
                                    placeholder="Id del dispositivo"
                                    autofocus
                                />
                                <input-error
                                    class="mt-2"
                                    :message="form.errors.device_id"
                                >
                                </input-error>
                            </div>
                        </div>

                        <div class="col-sm-4 col-md-4">
                            <div class="form-group">
                                <label class="form-label"
                                    >Nombre
                                    <span class="text-red">*</span></label
                                >
                                <input
                                    id="device-name"
                                    v-model="form.name"
                                    class="form-control"
                                    type="text"
                                    placeholder="Nombre del dispositivo"
                                />
                                <input-error
                                    class="mt-2"
                                    :message="form.errors.name"
                                >
                                </input-error>
                            </div>
                        </div>

                        <div class="col-sm-4 col-md-4">
                            <div class="form-group">
                                <label class="form-label"
                                    >Tipo de dispositivo
                                    <span class="text-red">*</span></label
                                >
                                <input
                                    id="device-type"
                                    v-model="form.type"
                                    class="form-control"
                                    type="text"
                                    placeholder="Tipo de dispositivo"
                                />

                                <input-error
                                    class="mt-2"
                                    :message="form.errors.type"
                                >
                                </input-error>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label"> Notas </label>
                                <textarea
                                    class="form-control mb-4"
                                    v-model="form.notas"
                                    rows="4"
                                >
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-row-reverse">
                        <div>
                            <jet-button
                                :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing"
                            >
                                Guardar
                            </jet-button>
                        </div>

                        <div class="px-4">
                            <button class="btn btn-outline-success">
                                Reset
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

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
                        <div class="table-responsive">
                            <Table>
                                <template #header>
                                    <TableC
                                        @click="sortColumn('id_station')"
                                        :sortHeader="true"
                                        field="id"
                                        :sortBy="sortBy"
                                        :sort="sort"
                                    >
                                        ID
                                    </TableC>

                                    <TableC
                                        @click="sortColumn('device_id')"
                                        :sortHeader="true"
                                        field="device_id"
                                        :sortBy="sortBy"
                                        :sort="sort"
                                    >
                                        ID DISPOSITIVO
                                    </TableC>

                                    <TableC
                                        @click="sortColumn('name')"
                                        :sortHeader="true"
                                        field="name"
                                        :sortBy="sortBy"
                                        :sort="sort"
                                    >
                                        NOMBRE
                                    </TableC>

                                    <TableC
                                        @click="sortColumn('type')"
                                        :sortHeader="true"
                                        field="type"
                                        :sortBy="sortBy"
                                        :sort="sort"
                                    >
                                        Tipo
                                    </TableC>
                                    <TableC
                                        @click="sortColumn('created_ad')"
                                        :sortHeader="true"
                                        field="created_ad"
                                        :sortBy="sortBy"
                                        :sort="sort"
                                    >
                                        CREADO EL
                                    </TableC>
                                    <TableC>ACCIONES</TableC>
                                </template>

                                <tr
                                    class="hover:bg-gray-200"
                                    v-for="device in devices.data"
                                    :key="device.id"
                                >
                                    <!---------ID---------------------------->
                                    <TableC>{{ device.id }}</TableC>
                                    <!---------DEVICE ID---------------------------->
                                    <TableC>{{ device.device_id }}</TableC>
                                    <!---------DEVICE NAME---------------------------->
                                    <TableC>{{ device.name }}</TableC>
                                    <!---------DEVICE TYPE---------------------------->
                                    <TableC>{{ device.type }}</TableC>
                                    <!---------CREADO EL---------------------------->
                                    <TableC>{{
                                        formattedDate(device.created_at)
                                    }}</TableC>
                                    <!---------BOTONES DE ACCIONES---------------------------->
                                    {{device.selected}}
                                    <td class="bstable-actions">
                                        <div class="d-flex flex-row">
                                            <div                                                
                                                v-if="device.selected"
                                                class="material-switch mt-2 mr-1"
                                            >
                                                <input
                                                    @click="
                                                        changeSaveRuler(
                                                            device,
                                                            device.id
                                                        )
                                                    "                                                    v-bind:id="device.id"
                                                    v-bind:name="device.id"
                                                    type="checkbox"
                                                    checked
                                                />
                                                <label
                                                    v-bind:for="device.id"
                                                    class="label-primary"
                                                ></label>
                                            </div>
                                            <div
                                                v-else
                                                class="material-switch mt-2 mr-1"
                                            >
                                                <input
                                                    @click="
                                                        changeSaveRuler(
                                                            device,
                                                            device.id
                                                        )
                                                    "
                                                    v-bind:id="device.id"
                                                    v-bind:name="device.id"
                                                    type="checkbox"
                                                />
                                                <label
                                                    v-bind:for="device.id"
                                                    class="label-primary"
                                                ></label>
                                            </div>
                                            <div>
                                                <button
                                                    @click="editDevice(device)"
                                                    type="button"
                                                    class="btn btn-sm btn-primary"
                                                >
                                                    <span class="fe fe-edit">
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </Table>

                            <Paginator :pagination="devices"></Paginator>
                        </div>

                        <!-- PAGINACIÓN -->
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import moment from "moment";
import "moment/locale/es";

import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import Input from "@/Jetstream/Input";
import JetButton from "@/Jetstream/Button";
import InputError from "@/Jetstream/InputError";
import { useForm } from "@inertiajs/inertia-vue3";

import Table from "@/Components/Table/Table.vue";
import TableC from "@/Components/Table/TableColumn.vue";

import Paginator from "@/Components/Paginator/Paginator";

import pickBy from "lodash/pickBy";

export default defineComponent({
    props: {
        devices: Object,
        sortBy: String,
        sort: String,
    },
    components: {
        AppLayout,
        Input,
        Table,
        TableC,
        Paginator,
        InputError,
        JetButton,
    },
    data() {
        return {
            search: "",
            formTitle: "",
            insertMode: true,
        };
    },
    setup() {
        const form = useForm({
            id: "",
            device_id: "",
            type: "",
            name: "",
            notas: "",
            selected: 0,
        });

        return { form };
    },
    watch: {
        search($value) {
            this.$inertia.get("dispositivos", pickBy({ search: $value }), {
                preserveState: true,
            });
        },
    },
    computed: {},
    methods: {
        formattedDate(date) {
            return moment(date).format("d/M/YYYY");
        },
        changeSaveRuler(device, id) {
            console.log(id)
            this.$inertia.put(
                route("dispositivos.activar-desactivar", { device: device }),
                {
                    id,
                    page: this.devices.current_page,
                },
                { preserveScroll: true }
            );
        },
        submit() {
            if (this.insertMode) {
                this.form.post(route("dispositivos.store"));

                not1();

                this.insertMode = true;
                this.form.clearErrors();
                this.form.reset();
            } else {
                this.form.put(route("dispositivos.update", this.form.id));

                not2();

                this.formTitle = "Nuevo Dispositivo";
                this.insertMode = true;
                this.form.clearErrors();
                this.form.reset();

                document.getElementById("device-id").focus();
            }
        },
        editDevice(device) {
            this.form.id = device.id;
            this.form.device_id = device.device_id;
            this.form.name = device.name;
            this.form.type = device.type;
            this.form.notas = device.notas;

            this.formTitle = "Editar Dispositivo";
            this.insertMode = false;
        },
        sortColumn(col) {
            let sort = this.sort;

            if (this.sort == "ASC") {
                sort = "DESC";
            } else {
                sort = "ASC";
            }

            this.$inertia.get(
                route("dispositivos.index"),
                {
                    sortBy: col,
                    sort: sort,
                    page: this.devices.current_page,
                },
                { preserveScroll: true }
            );
        },
    },
    mounted() {
        this.formTitle = "Nuevo Dispositivo";
        this.insertMode = true;
    },
});
</script>

<style scope>
.mr-1 {
    margin-right: 1rem !important;
}

.px-4 {
    padding-left: 1rem;
    padding-right: 1rem;
}

.ml-3 {
    margin-left: 0.75rem;
}
</style>
