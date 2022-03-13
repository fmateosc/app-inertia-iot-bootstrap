<template>
  <table class="table table-bordered border text-nowrap mb-0">
    <thead>
      <tr>
        <slot name="header" />
      </tr>
    </thead>
    <tbody>
      <slot/>
    </tbody>
  </table>
</template>