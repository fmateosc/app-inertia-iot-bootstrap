<template>
    <div
        class="flex flex-col items-center justify-center bg-white p-4 shadow rounded-lg"
    >
        <div>
            <i :class="icon"></i>
        </div>

        <h2 class="mt-4 font-bold text-xl">{{ title }}</h2>
        <h6 class="mt-2 text-xl">{{ message }}</h6>
    </div>
</template>

<script>
import { defineComponent } from "vue";

export default defineComponent({
    props: ["title", "message", "icon"],
});
</script>

<style scope>
.rounded-lg {
    border-radius: 0.5rem;
}

.p-4 {
    padding: 1rem;
}

.shadow {
    --tw-shadow: 0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1);
    --tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color),
        0 1px 2px -1px var(--tw-shadow-color);
    box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000),
        var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
}

.bg-white {
    --tw-bg-opacity: 1;
    background-color: rgb(255 255 255 / var(--tw-bg-opacity));
}

.flex {
    display: flex;
}

.flex-col {
    flex-direction: column;
}

.items-center {
    align-items: center;
}

.justify-center {
    justify-content: center;
}

.font-bold {
    font-weight: 700;
}

.text-xl {
    font-size: 1.25rem;
    line-height: 1.75rem;
}

.mt-2 {
    margin-top: 0.5rem;
}
.mt-4 {
    margin-top: 1rem;
}
</style>
