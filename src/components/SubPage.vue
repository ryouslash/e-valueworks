<script setup>
import { computed } from "vue";

const props = defineProps({
  modelValue: {
    type: Object,
    required: true,
  },
  price: {
    type: Number,
    required: true,
  },
});

const emit = defineEmits(["update:modelValue"]);

const height5000Value = computed({
  get: () => props.modelValue.height5000,
  set: (value) => {
    emit("update:modelValue", { ...props.modelValue, height5000: value });
  },
});

const height10000Value = computed({
  get: () => props.modelValue.height10000,
  set: (value) => {
    emit("update:modelValue", { ...props.modelValue, height10000: value });
  },
});

const height15000Value = computed({
  get: () => props.modelValue.height15000,
  set: (value) => {
    emit("update:modelValue", { ...props.modelValue, height15000: value });
  },
});

const height20000Value = computed({
  get: () => props.modelValue.height20000,
  set: (value) => {
    emit("update:modelValue", { ...props.modelValue, height20000: value });
  },
});
</script>

<template>
  <h3>下層ページ料金</h3>

  <div class="item">
    <label for="height5000">下層ページ（〜5,000px）</label>
    <input
      id="height5000"
      v-model="height5000Value"
      type="number"
      min="0"
      @input="height5000Value = Math.max(0, height5000Value)"
    />
  </div>

  <div class="item">
    <label for="height10000">下層ページ（〜10,000px）</label>
    <input
      id="height10000"
      v-model="height10000Value"
      type="number"
      min="0"
      @input="height10000Value = Math.max(0, height10000Value)"
    />
  </div>

  <div class="item">
    <label for="height15000">下層ページ（〜15,000px）</label>
    <input
      id="height15000"
      v-model="height15000Value"
      type="number"
      min="0"
      @input="height15000Value = Math.max(0, height15000Value)"
    />
  </div>

  <div class="item">
    <label for="height20000">下層ページ（〜20,000px）</label>
    <input
      id="height20000"
      v-model="height20000Value"
      type="number"
      min="0"
      @input="height20000Value = Math.max(0, height20000Value)"
    />
  </div>

  <p class="total">合計: {{ price }} 円</p>
</template>

<style scoped></style>
