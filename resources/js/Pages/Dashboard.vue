<template>
  <app-layout title="Dashboard">
    <template #header>
      <h2 class="h4 font-weight-bold">
        Dashboard
      </h2>

    </template>
    <main-test/>

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
  }
});
</script>
