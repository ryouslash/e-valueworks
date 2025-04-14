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

  const headerValue = computed({
    get: () => props.modelValue.header,
    set: (value) => {
      emit("update:modelValue", { ...props.modelValue, header: value });
    },
  });

  const megaMenuValue = computed({
    get: () => props.modelValue.megaMenu,
    set: (value) => {
      emit("update:modelValue", { ...props.modelValue, megaMenu: value });
    },
  });

  const sectionsValue = computed({
    get: () => props.modelValue.sections,
    set: (value) => {
      emit("update:modelValue", { ...props.modelValue, sections: value });
    },
  });

  const footerValue = computed({
    get: () => props.modelValue.footer,
    set: (value) => {
      emit("update:modelValue", { ...props.modelValue, footer: value });
    },
  });
</script>

<template>
  <h3>LP・トップページ料金</h3>

  <div class="item">
    <label for="header">ヘッダー</label>
    <div class="item__checkbox">
      <input
        id="header"
        v-model="headerValue"
        type="checkbox"
        :true-value="1"
        :false-value="0"
      />
    </div>
  </div>

  <template v-if="headerValue === 1">
    <div class="item">
      <label for="megaMenu">メガメニューの数</label>
      <input
        id="megaMenu"
        v-model.number="megaMenuValue"
        type="number"
        min="0"
        @input="megaMenuValue = Math.max(0, megaMenuValue)"
      />
    </div>
  </template>

  <div class="item">
    <label for="section">セクションの数</label>
    <input
      id="section"
      v-model.number="sectionsValue"
      type="number"
      min="0"
      @input="sectionsValue = Math.max(0, sectionsValue)"
    />
  </div>

  <div class="item">
    <label for="footer">フッター</label>
    <div class="item__checkbox">
      <input
        id="footer"
        v-model="footerValue"
        type="checkbox"
        :true-value="1"
        :false-value="0"
      />
    </div>
  </div>
  <p class="total">合計: {{ price }} 円</p>
</template>

<style lang="scss"></style>
