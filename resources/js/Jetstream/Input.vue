<template>
    <input
        class="input100 border-start-0 form-control ms-0"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
        ref="input"
    />
</template>

<script>
import { defineComponent } from "vue";

export default defineComponent({
    props: ["modelValue"],

    emits: ["update:modelValue"],

    methods: {
        focus() {
            this.$refs.input.focus();
        },
    },
});
</script>
