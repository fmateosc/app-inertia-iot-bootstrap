<template>
    <div
        v-if="pagination.links.length > 3"
        class="bg-white pt-4 pb-2 flex items-center justify-between border-t border-gray-200"
    >
        <div
            class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between"
        >
            <div v-if="dataPagination" class="mt-3">
                <p class="text-sm text-gray-700">
                    Mostrando
                    <span class="font-medium">{{ pagination.from }}</span>
                    hasta
                    <span class="font-medium">{{ pagination.to }}</span>
                    de
                    <span class="font-medium">97</span>
                    resultados
                </p>
            </div>
            <div>
                <nav
                    class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px"
                    aria-label="Pagination"
                >
                    <template v-for="(link, key) in pagination.links">
                        <div
                            v-if="link.url == null"
                            :key="key"
                            class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium"
                            v-html="link.label"
                        ></div>

                        <Link
                            v-else
                            :key="'link-' + key"
                            :href="link.url"
                            class="relative inline-flex items-center px-4 py-2 border text-sm font-medium"
                            :class="
                                link.active
                                    ? 'z-10 bg-indigo-50 border-indigo-500 text-indigo-600'
                                    : 'bg-white border-gray-300 text-gray-500 hover:bg-gray-50'
                            "
                            v-html="link.label"
                        ></Link>
                    </template>

                    <!-- Current: "z-10 bg-indigo-50 border-indigo-500 text-indigo-600", Default: "bg-white border-gray-300 text-gray-500 hover:bg-gray-50" -->
                    <!-- <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium"> 2 </a> -->
                </nav>
            </div>
        </div>
    </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
export default {
    components: {
        Link,
    },
    props: {
        pagination: Object,
        dataPagination: {
            type: Boolean,
            default: false,
        }
    },
};
</script>

<style></style>

<style scope>
.font-medium {
    font-weight: 500;
}

.text-sm {
    font-size: 0.875rem;
    line-height: 1.25rem;
}

.text-gray-500 {
    --tw-text-opacity: 1;
    color: rgb(107 114 128 / var(--tw-text-opacity));
}

.text-gray-700 {
    --tw-text-opacity: 1;
    color: rgb(55 65 81 / var(--tw-text-opacity));
}

.relative {
    position: relative;
}

.hidden {
    display: none;
}

.bg-white {
    --tw-bg-opacity: 1;
    background-color: rgb(255 255 255 / var(--tw-bg-opacity));
}

.px-4 {
    padding-left: 1rem;
    padding-right: 1rem;
}

.py-2 {
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
}

.py-3 {
    padding-top: 0.75rem;
    padding-bottom: 0.75rem;
}

.flex {
    display: flex;
}

.inline-flex {
    display: inline-flex;
}

.flex-1 {
    flex: 1 1 0%;
}

.items-center {
    align-items: center;
}

.justify-between {
    justify-content: space-between;
}

.border {
    border-width: 1px;
}

.border-t {
    border-top-width: 1px;
}

.border-gray-200 {
    --tw-border-opacity: 1;
    border-color: rgb(229 231 235 / var(--tw-border-opacity));
}

.border-gray-300 {
    --tw-border-opacity: 1;
    border-color: rgb(209 213 219 / var(--tw-border-opacity));
}

.rounded-md {
    border-radius: 0.375rem;
}

.hover\:bg-gray-50:hover {
    --tw-bg-opacity: 1;
    background-color: rgb(249 250 251 / var(--tw-bg-opacity));
}

.shadow-sm {
    --tw-shadow: 0 1px 2px 0 rgb(0 0 0 / 0.05);
    --tw-shadow-colored: 0 1px 2px 0 var(--tw-shadow-color);
    box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000),
        var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
}

.z-0 {
    z-index: 0;
}

.-space-x-px > :not([hidden]) ~ :not([hidden]) {
    --tw-space-x-reverse: 0;
    margin-right: calc(-1px * var(--tw-space-x-reverse));
    margin-left: calc(-1px * calc(1 - var(--tw-space-x-reverse)));
}

@media (min-width: 640px) {
    .sm\:flex {
        display: flex;
    }

    .sm\:flex-1 {
        flex: 1 1 0%;
    }

    .sm\:items-center {
        align-items: center;
    }

    .sm\:justify-between {
        justify-content: space-between;
    }
}
</style>
