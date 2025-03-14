<script setup>
defineProps(["modelValue", "price"]);
defineEmits(["update:modelValue"]);
</script>

<template>
  <p>下層ページの高さを入力</p>
  <label
    >高さ(px): <input type="number" v-model.number="modelValue.height"
  /></label>
  <p>下層ページの料金: {{ price }} 円</p>
</template>

<style scoped>
label {
  display: block;
  margin: 0.5rem 0;
}
</style>
