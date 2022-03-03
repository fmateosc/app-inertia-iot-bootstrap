<template>
  <table class="table border text-nowrap text-md-nowrap table-bordered mb-0 table-hover">
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