<script setup>
import { onMounted } from "vue";
import ScrollHint from "scroll-hint";
import SimulatorModal from "@components/SimulatorModal.vue";

onMounted(() => {
  new ScrollHint(".js-scrollable", {
    i18n: {
      scrollable: "スクロールできます",
    },
  });
});
</script>

<template>
  <SimulatorModal />
</template>

<style scoped></style>
