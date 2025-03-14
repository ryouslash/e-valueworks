<script setup>
import { ref, computed } from "vue";
import PageTopPage from "@components/PageTopPage.vue";
import PageSubPage from "@components/PageSubPage.vue";
import PageOther from "@components/PageOther.vue";
import PageTotal from "@components/PageTotal.vue";

// モーダルの表示状態
const showModal = ref(false);

// 現在のページ番号
const currentPage = ref(1);

// 各ページのデータ
const topPage = ref({
  header: 1,
  footer: 1,
  sections: 3,
});

const subPage = ref({
  height: 1000,
});

const otherCosts = ref(0);

// トップページの料金計算
const topPagePrice = computed(() => {
  return (
    topPage.value.header * 1000 +
    topPage.value.footer * 1000 +
    topPage.value.sections * 3000
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
    <p>ざっくりな費用感を掴みたい方は見積もりシミュレーターをご活用下さい。</p>
    <button class="btn" @click="showModal = true">
      見積もりシミュレーターを開く
    </button>

    <div v-if="showModal" class="modal-overlay">
      <div class="modal-content">
        <h2>料金シミュレーター</h2>

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

        <div class="buttons">
          <button @click="prevPage" v-if="currentPage > 1">戻る</button>
          <button @click="nextPage" v-if="currentPage < 4">次へ</button>
          <button @click="showModal = false">閉じる</button>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped lang="scss">
.simulator {
  margin-bottom: 8rem;

  &:hover {
    margin-top: 10rem;
  }
}

/* CSSは省略（元のコードをそのまま使用） */
.btn {
  padding: 1rem 2rem;
  border: none;
  border-radius: 2rem;
  font-size: 2rem;
  font-weight: bold;
  color: #fff;
  background-color: #f29949;
  box-shadow: 0.3rem 0.5rem #b96921;
  cursor: pointer;
  appearance: none;
}

.modal-overlay {
  background-color: rgba(51, 51, 51, 0.6);
}
</style>
