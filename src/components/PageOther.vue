<script setup>
defineProps(["modelValue"]);
const emit = defineEmits(["update:modelValue"]);
</script>

<template>
  <p>その他の料金を入力</p>
  <input
    type="number"
    :value="modelValue"
    @input="emit('update:modelValue', Number($event.target.value))"
  />
</template>

<style scoped>
input {
  width: 100px;
  padding: 0.3rem;
}
</style>
