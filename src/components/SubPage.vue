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

const height8000Value = computed({
  get: () => props.modelValue.height8000,
  set: (value) => {
    emit("update:modelValue", { ...props.modelValue, height8000: value });
  },
});

const height11000Value = computed({
  get: () => props.modelValue.height11000,
  set: (value) => {
    emit("update:modelValue", { ...props.modelValue, height11000: value });
  },
});

const height14000Value = computed({
  get: () => props.modelValue.height14000,
  set: (value) => {
    emit("update:modelValue", { ...props.modelValue, height14000: value });
  },
});

const height17000Value = computed({
  get: () => props.modelValue.height17000,
  set: (value) => {
    emit("update:modelValue", { ...props.modelValue, height17000: value });
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
    <label for="height8000">下層ページ（〜8,000px）</label>
    <input
      id="height8000"
      v-model="height8000Value"
      type="number"
      min="0"
      @input="height8000Value = Math.max(0, height8000Value)"
    />
  </div>

  <div class="item">
    <label for="height11000">下層ページ（〜11,000px）</label>
    <input
      id="height11000"
      v-model="height11000Value"
      type="number"
      min="0"
      @input="height11000Value = Math.max(0, height11000Value)"
    />
  </div>

  <div class="item">
    <label for="height14000">下層ページ（〜14,000px）</label>
    <input
      id="height14000"
      v-model="height14000Value"
      type="number"
      min="0"
      @input="height14000Value = Math.max(0, height14000Value)"
    />
  </div>

  <div class="item">
    <label for="height17000">下層ページ（〜17,000px）</label>
    <input
      id="height17000"
      v-model="height17000Value"
      type="number"
      min="0"
      @input="height17000Value = Math.max(0, height17000Value)"
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
