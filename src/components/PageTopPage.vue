<script setup>
defineProps(["modelValue", "price"]);
defineEmits(["update:modelValue"]);
</script>

<template>
  <p>トップページの設定</p>
  <label
    >ヘッダーの数: <input type="number" v-model.number="modelValue.header"
  /></label>
  <label
    >フッターの数: <input type="number" v-model.number="modelValue.footer"
  /></label>
  <label
    >セクションの数: <input type="number" v-model.number="modelValue.sections"
  /></label>
  <p>トップページの料金: {{ price }} 円</p>
</template>

<style scoped>
label {
  display: block;
  margin: 0.5rem 0;
}
</style>
