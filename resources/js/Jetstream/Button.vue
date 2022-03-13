<template>
    <button 
      :type="type" 
      class="flex inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
        <slot></slot>
    </button>
</template>

<script>
    import { defineComponent } from 'vue'

    export default defineComponent({
        props: {
            type: {
                type: String,
                default: 'submit',
            },
        }
    })
</script>

<style scope>
.inline-flex {
  display: inline-flex;
}

.items-center {
  align-items: center;
}

.px-4 {
  padding-left: 1rem;
  padding-right: 1rem;
}
.py-2 {
  padding-top: 0.5rem;
  padding-bottom: 0.5rem;
}

.bg-gray-800 {
  background-color: rgb(31 41 55);
}

.border {
  border-width: 1px;
}

.border-transparent {
  border-color: transparent;
}

.rounded-md {
  border-radius: 0.375rem;
}

.font-semibold {
  font-weight: 600;
}

.text-xs {
  font-size: 0.75rem;
  line-height: 1rem;
}

.flex {
  display: flex;
}
</style>