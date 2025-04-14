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

  const jsAnimationValue = computed({
    get: () => props.modelValue.jsAnimation,
    set: (value) => {
      emit("update:modelValue", { ...props.modelValue, jsAnimation: value });
    },
  });

  const contactFormValue = computed({
    get: () => props.modelValue.contactForm,
    set: (value) => {
      emit("update:modelValue", { ...props.modelValue, contactForm: value });
    },
  });
</script>

<template>
  <h3>その他</h3>

  <div class="item">
    <label for="js-animation">JSアニメーション</label>
    <div class="item__checkbox">
      <input
        id="js-animation"
        v-model="jsAnimationValue"
        type="checkbox"
        :true-value="1"
        :false-value="0"
      />
    </div>
  </div>

  <div class="item">
    <label for="contact-form">お問い合わせフォーム</label>
    <div class="item__checkbox">
      <input
        id="contact-form"
        v-model="contactFormValue"
        type="checkbox"
        :true-value="1"
        :false-value="0"
      />
    </div>
  </div>

  <p class="total">合計: {{ price }} 円</p>
</template>

<style scoped>
  input {
    width: 100px;
    padding: 0.3rem;
  }
</style>
