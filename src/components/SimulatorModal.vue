<script setup>
import { ref, computed } from "vue";
import TopPage from "@components/TopPage.vue";
import SubPage from "@components/SubPage.vue";
import WordPressImplement from "@components/WordPressImplement.vue";
import OtherFunctions from "@components/OtherFunctions.vue";
import TotalPrice from "@components/TotalPrice.vue";

// モーダルの表示状態
const showModal = ref(true);

const buttonText = computed(() =>
  showModal.value
    ? "見積もりシミュレーターを閉じる"
    : "見積もりシミュレーターを開く"
);

// 現在のページ番号
const currentPage = ref(1);

// 各ページのデータ
const topPage = ref({
  header: 0,
  megaMenu: 0,
  footer: 0,
  sections: 0,
});

const subPage = ref({
  height5000: 0,
  height8000: 0,
  height11000: 0,
  height14000: 0,
  height17000: 0,
  height20000: 0,
});

const wordPressImplement = ref({
  basic: 0,
  customPost: 0,
  visualEditor: 0,
});

const otherFunctions = ref({
  jsAnimation: 0,
  contactForm: 0,
});

// トップページの料金計算
const topPagePrice = computed(() => {
  return (
    topPage.value.header * 5000 +
    topPage.value.megaMenu * 3000 +
    topPage.value.footer * 5000 +
    topPage.value.sections * 5000
  );
});

// 下層ページの料金計算
const subPagePrice = computed(() => {
  return (
    subPage.value.height5000 * 15000 +
    subPage.value.height8000 * 20000 +
    subPage.value.height11000 * 25000 +
    subPage.value.height14000 * 30000 +
    subPage.value.height17000 * 35000 +
    subPage.value.height20000 * 40000
  );
});

// WordPress導入の料金計算
const wordPressImplementPrice = computed(() => {
  return (
    wordPressImplement.value.basic * 20000 +
    wordPressImplement.value.customPost * 10000 +
    wordPressImplement.value.visualEditor * 3000
  );
});

// その他の料金計算
const otherFunctionsPrice = computed(() => {
  return (
    otherFunctions.value.jsAnimation *
      (topPagePrice.value + subPagePrice.value) *
      0.1 +
    otherFunctions.value.contactForm * 5000
  );
});

// 合計金額の計算
const totalPrice = computed(() => {
  return (
    topPagePrice.value +
    subPagePrice.value +
    wordPressImplementPrice.value +
    otherFunctionsPrice.value
  );
});

// ページを進める
const nextPage = () => {
  if (currentPage.value < 5) {
    currentPage.value++;
  }
};

// ページを戻る
const prevPage = () => {
  if (currentPage.value > 1) {
    currentPage.value--;
  }
};

const resetSimulator = () => {
  // 各データを初期状態にリセット
  topPage.value = {
    header: 0,
    megaMenu: 0,
    footer: 0,
    sections: 0,
  };

  subPage.value = {
    height5000: 0,
    height8000: 0,
    height11000: 0,
    height14000: 0,
    height17000: 0,
    height20000: 0,
  };

  wordPressImplement.value = {
    basic: 0,
    customPost: 0,
    visualEditor: 0,
  };

  otherFunctions.value = {
    jsAnimation: 0,
    contactForm: 0,
  };

  currentPage.value = 1;
};
</script>

<template>
  <div class="simulator">
    <div class="simulator__btnBox">
      <p>
        <span class="u-inline-block">ざっくりな費用感を掴みたい方向けに</span>
        <span class="u-inline-block"
          >見積もりシミュレーターを用意しています。</span
        >
      </p>
      <button @click="showModal = !showModal">
        {{ buttonText }} <i class="fa-solid fa-calculator"></i>
      </button>
    </div>

    <div v-if="showModal" class="simulator__inner">
      <h2>見積もりシミュレーター</h2>

      <!-- ページコンポーネントの切り替え -->
      <TopPage
        v-if="currentPage === 1"
        v-model="topPage"
        :price="topPagePrice"
      />
      <SubPage
        v-if="currentPage === 2"
        v-model="subPage"
        :price="subPagePrice"
      />
      <WordPressImplement
        v-if="currentPage === 3"
        v-model="wordPressImplement"
        :price="wordPressImplementPrice"
      />
      <OtherFunctions
        v-if="currentPage === 4"
        v-model="otherFunctions"
        :price="otherFunctionsPrice"
      />
      <TotalPrice
        v-if="currentPage === 5"
        :total="totalPrice"
        :top-page-price="topPagePrice"
        :sub-page="subPage"
        :sub-page-price="subPagePrice"
        :word-press-implement-price="wordPressImplementPrice"
        :other-functions="otherFunctions"
      />

      <div class="simulator__btns">
        <button v-if="currentPage > 1" @click="prevPage">戻る</button>
        <button v-if="currentPage < 5" @click="nextPage">次へ</button>
        <button v-if="currentPage === 5" @click="resetSimulator">
          最初からやり直す
        </button>
      </div>
    </div>
  </div>
</template>

<style lang="scss">
@use "@scss/foundation/variables.scss" as *;

.simulator {
  &__inner {
    h3 {
      margin-bottom: 1.5rem;
      font-size: $fontM;
    }

    .item {
      display: flex;
      margin-bottom: 0.5em;
      padding-bottom: 0.5em;
      border-bottom: 0.1rem dotted #333;

      label {
        width: 24rem;
        flex-shrink: 0;
      }

      input[type="checkbox"] {
        width: 1.6rem;
        height: 1.6rem;
        border: 0.1rem solid red;
        margin: 0;
        vertical-align: middle;
      }

      input[type="number"] {
        max-width: 10rem;
        width: 100%;
        padding-block: 0.1rem;
        padding-inline: 0.2rem;
      }
    }

    .total {
      margin-top: 6rem;
      text-align: right;
      font-weight: 700;
      font-size: $fontM;
    }
  }
}
</style>

<style scoped lang="scss">
@use "@scss/foundation/variables.scss" as *;

.simulator {
  margin-bottom: 8rem;

  &__btnBox {
    position: relative;
    z-index: 1;
    padding: 6rem;
    border: 0.2rem solid #f6f3c1;
    background-image: url("@img/male-teacher.png");
    background-size: auto 80%;
    background-position: right 3rem bottom 0;
    background-repeat: no-repeat;
    text-align: center;
    background-color: #fffef1;

    > p {
      margin-bottom: 3rem;
      font-weight: bold;
    }

    > button {
      position: relative;
      top: 0;
      right: 0;
      padding: 1.5rem 4rem;
      border: 0.1rem solid #f29949;
      font-size: 2rem;
      font-weight: bold;
      color: #fff;
      background-color: #f29949;
      cursor: pointer;
      appearance: none;
      transition:
        color 0.3s,
        background-color 0.3s;

      &:hover {
        color: #f29949;
        background-color: #ffffff;
      }
    }
  }

  &__inner {
    position: relative;
    z-index: 1;
    padding: 6rem;
    margin-top: 4rem;

    &::before,
    &::after {
      position: absolute;
      z-index: -1;
      width: 10rem;
      height: 100%;
      border-top: 0.1rem solid $keyColor;
      border-bottom: 0.1rem solid $keyColor;
      content: "";
    }

    &::before {
      top: 0;
      left: 0;
      border-left: 0.1rem solid $keyColor;
    }

    &::after {
      bottom: 0;
      right: 0;
      border-right: 0.1rem solid $keyColor;
    }

    h2 {
      font-size: clamp(2rem, 1.8rem + 0.625vw, 2.6rem);
      font-weight: 700;
      background-color: #98daec;
      color: #ffffff;
      padding: 1.5rem 1rem;
      margin-bottom: 3rem;
      text-align: center;
      border-radius: 0.5rem;
      text-shadow: 0.1rem 0.2rem 0.5rem rgba(112, 180, 199, 0.4980392157);
    }
  }

  &__btns {
    display: flex;
    gap: 1.5rem;
    margin-top: 4rem;

    button {
      padding: 0.5rem 1rem;
      border: none;
      font-size: 1.6rem;
      background-color: #f29949;
      color: #fff;
      cursor: pointer;
      appearance: none;
    }
  }
}
</style>
