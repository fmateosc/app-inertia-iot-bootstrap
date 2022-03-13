<template>
    <div v-show="message" class="has-error" role="alert">
        <strong>{{ message }}</strong>
    </div>
</template>

<script>
import { defineComponent } from "vue";

export default defineComponent({
    props: ["message"],
});
</script>

<style scope>
.has-error {
    margin-left: 1rem;
    width: 100%;
    margin-top: 0.25rem;
    font-size: 87.5%;
    color: #e23e3d;
}

strong {
    font-weight: bolder;
}
</style>
