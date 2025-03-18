<script setup>
import { ref, computed } from "vue";
import PageTopPage from "@components/PageTopPage.vue";
import PageSubPage from "@components/PageSubPage.vue";
import PageOther from "@components/PageOther.vue";
import PageTotal from "@components/PageTotal.vue";

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
  height: 1000,
});

const otherCosts = ref(0);

// トップページの料金計算
const topPagePrice = computed(() => {
  return (
    topPage.value.header * 5000 +
    topPage.value.megaMenu * 5000 +
    topPage.value.footer * 5000 +
    topPage.value.sections * 5000
  );
});

// 下層ページの料金計算
const subPagePrice = computed(() => {
  return subPage.value.height * 10;
});

// 合計金額の計算
const totalPrice = computed(() => {
  return topPagePrice.value + subPagePrice.value + otherCosts.value;
});

// ページを進める
const nextPage = () => {
  if (currentPage.value < 4) {
    currentPage.value++;
  }
};

// ページを戻る
const prevPage = () => {
  if (currentPage.value > 1) {
    currentPage.value--;
  }
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
      <PageTopPage
        v-if="currentPage === 1"
        v-model="topPage"
        :price="topPagePrice"
      />
      <PageSubPage
        v-if="currentPage === 2"
        v-model="subPage"
        :price="subPagePrice"
      />
      <PageOther v-if="currentPage === 3" v-model="otherCosts" />
      <PageTotal v-if="currentPage === 4" :total="totalPrice" />

      <div class="simulator__btns">
        <button @click="prevPage" v-if="currentPage > 1">戻る</button>
        <button @click="nextPage" v-if="currentPage < 4">次へ</button>
        <button @click="currentPage = 1" v-if="currentPage === 4">
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
    padding: 3rem;
    margin-top: 4rem;
    background-color: #f4f4f4;

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
      background-color: #f29949;
      color: #fff;
      cursor: pointer;
      appearance: none;
    }
  }
}
</style>
