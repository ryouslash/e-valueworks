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

const basicValue = computed({
  get: () => props.modelValue.basic,
  set: (value) => {
    emit("update:modelValue", { ...props.modelValue, basic: value });
  },
});

const customPostValue = computed({
  get: () => props.modelValue.customPost,
  set: (value) => {
    emit("update:modelValue", { ...props.modelValue, customPost: value });
  },
});

const visualEditorValue = computed({
  get: () => props.modelValue.visualEditor,
  set: (value) => {
    emit("update:modelValue", { ...props.modelValue, visualEditor: value });
  },
});

const emit = defineEmits(["update:modelValue"]);
</script>

<template>
  <h3>WordPress導入料金</h3>

  <div class="item">
    <label for="basic">基本機能導入</label>
    <div class="item__checkbox">
      <input
        id="basic"
        v-model="basicValue"
        type="checkbox"
        :true-value="1"
        :false-value="0"
      />
    </div>
  </div>

  <template v-if="basicValue === 1">
    <div class="item">
      <label for="custom-post">カスタム投稿追加</label>
      <input
        id="custom-post"
        v-model="customPostValue"
        type="number"
        min="0"
        @input="customPostValue = Math.max(0, customPostValue)"
      />
    </div>

    <div class="item">
      <label for="visual-editor">固定ページビジュアル編集対応</label>
      <input
        id="visual-editor"
        v-model="visualEditorValue"
        type="number"
        min="0"
        @input="visualEditorValue = Math.max(0, visualEditorValue)"
      />
    </div>
  </template>

  <p class="total">合計: {{ price }} 円</p>
</template>

<style scoped></style>
