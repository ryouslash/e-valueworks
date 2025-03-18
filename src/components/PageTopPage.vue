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
    <label for="header">ヘッダーあり:</label>
    <input
      id="header"
      v-model="headerValue"
      type="checkbox"
      :true-value="1"
      :false-value="0"
    />
  </div>

  <template v-if="headerValue === 1">
    <div class="item">
      <label for="megaMenu">メガメニューの数: </label
      ><input id="megaMenu" v-model.number="megaMenuValue" type="number" />
    </div>
  </template>

  <div class="item">
    <label for="section">セクションの数: </label
    ><input id="section" v-model.number="sectionsValue" type="number" />
  </div>

  <div class="item">
    <label for="footer">フッターあり:</label>
    <input
      id="footer"
      v-model="footerValue"
      type="checkbox"
      :true-value="1"
      :false-value="0"
    />
  </div>
  <p class="total">合計: {{ price }} 円</p>
</template>

<style scoped lang="scss">
@use "@scss/foundation/variables.scss" as *;

.item {
  display: flex;
  margin-bottom: 0.5em;
  padding-bottom: 0.5em;
  border-bottom: 0.1rem dotted #333;
  label {
    width: 25%;
    flex-shrink: 0;
  }
}

.total {
  margin-top: 6rem;
  text-align: right;
  font-weight: 700;
  font-size: $fontM;
}
</style>
