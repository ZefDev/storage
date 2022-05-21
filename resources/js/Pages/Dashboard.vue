<template>
  <app-layout title="Dashboard">
    <template #header>
      <h2 class="h4 font-weight-bold">
        Dashboard
      </h2>

    </template>
    <main-test :listFiles="listFiles" />

  </app-layout>
</template>

<script>
import { defineComponent } from "vue"
import AppLayout from "@/Layouts/AppLayout.vue"
import MainTest from "../Pages/MainTest.vue"

export default defineComponent({
  components: {
    AppLayout,
    MainTest
  },
  props: {
      listFiles: Array,
  },
});
</script>
