<template>
    <div>
        <Head :title="title" />

        <jet-banner />

        <nav
            class="navbar navbar-expand-md navbar-light bg-white border-bottom sticky-top"
        >
            <div class="container">
                <!-- Logo -->
                <Link class="navbar-brand me-4" :href="route('dashboard')">
                    <jet-application-mark width="36" />
                </Link>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div
                    class="collapse navbar-collapse"
                    id="navbarSupportedContent"
                >
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <jet-nav-link
                            :href="route('dashboard')"
                            :active="route().current('dashboard')"
                        >
                            Dashboard
                        </jet-nav-link>

                        <jet-nav-link
                            :href="route('broker.index')"
                            :active="route().current('broker.index')"
                        >
                            Broker
                        </jet-nav-link>

                        <jet-nav-link
                            :href="route('estaciones.index')"
                            :active="route().current('estaciones.*')"
                        >
                            Estaciones meteorológicas
                        </jet-nav-link>

                        <jet-nav-link
                            :href="route('dispositivos.index')"
                            :active="route().current('dispositivos.*')"
                        >
                            Dispositivos
                        </jet-nav-link>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav align-items-baseline">
                        <!-- Authentication Links -->
                        <jet-dropdown id="settingsDropdown">
                            <template #trigger>
                                <img
                                    v-if="
                                        $page.props.jetstream
                                            .managesProfilePhotos
                                    "
                                    class="rounded-circle"
                                    width="32"
                                    height="32"
                                    :src="$page.props.user.profile_photo_url"
                                    :alt="$page.props.user.name"
                                />

                                <span v-else>
                                    {{ $page.props.user.name }}

                                    <svg
                                        class="ms-2"
                                        width="18"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20"
                                        fill="currentColor"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                </span>
                            </template>

                            <template #content>
                                <!-- Account Management -->
                                <h6 class="dropdown-header small text-muted">
                                    Manage Account
                                </h6>

                                <jet-dropdown-link
                                    :href="route('profile.show')"
                                >
                                    Profile
                                </jet-dropdown-link>

                                <hr class="dropdown-divider" />

                                <!-- Authentication -->
                                <form @submit.prevent="logout">
                                    <jet-dropdown-link as="button">
                                        Log out
                                    </jet-dropdown-link>
                                </form>
                            </template>
                        </jet-dropdown>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Page Heading -->
        <header class="d-flex py-3 bg-white shadow-sm border-bottom">
            <div class="container">
                <slot name="header"></slot>
            </div>
        </header>

        <!-- Page Content -->
        <main class="container my-5">
            <slot></slot>
        </main>
    </div>
</template>

<script>
import JetApplicationLogo from "@/Jetstream/ApplicationLogo.vue";
import JetBanner from "@/Jetstream/Banner.vue";
import JetApplicationMark from "@/Jetstream/ApplicationMark.vue";
import JetDropdown from "@/Jetstream/Dropdown.vue";
import JetDropdownLink from "@/Jetstream/DropdownLink.vue";
import JetNavLink from "@/Jetstream/NavLink.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";

export default {
    props: {
        title: String,
    },

    components: {
        Head,
        JetApplicationLogo,
        JetBanner,
        JetApplicationMark,
        JetDropdown,
        JetDropdownLink,
        JetNavLink,
        Link,
    },

    data() {
        return {
            showingNavigationDropdown: false,
        };
    },

    methods: {
        switchToTeam(team) {
            this.$inertia.put(
                route("current-team.update"),
                {
                    team_id: team.id,
                },
                {
                    preserveState: false,
                }
            );
        },

        logout() {
            this.$inertia.post(route("logout"));
        },
    },

    computed: {
        path() {
            return window.location.pathname;
        },
    },
};
</script>
