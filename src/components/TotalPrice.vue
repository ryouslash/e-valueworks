<script setup>
  import { onMounted, getCurrentInstance } from "vue";

  const { proxy } = getCurrentInstance();

  onMounted(() => {
    proxy.$initScrollHint();
  });

  defineProps({
    total: {
      type: Number,
      required: true,
    },
    topPagePrice: {
      type: Number,
      required: true,
    },
    subPage: {
      type: Object,
      required: true,
    },
    subPagePrice: {
      type: Object,
      required: true,
    },
    wordPressImplementPrice: {
      type: Number,
      required: true,
    },
    otherFunctions: {
      type: Object,
      required: true,
    },
  });
</script>

<template>
  <h3>概算見積</h3>

  <div class="js-scrollable">
    <table>
      <thead>
        <tr>
          <th>項目</th>
          <th>金額</th>
        </tr>
      </thead>
      <tbody>
        <!-- トップページ料金 -->
        <template v-if="topPagePrice !== 0">
          <tr>
            <td>トップページ</td>
            <td>{{ topPagePrice.toLocaleString() }}円</td>
          </tr>
        </template>

        <!-- 下層ページ（〜5,000px）の料金 -->
        <template v-if="subPage.height5000 !== 0">
          <tr>
            <td>下層ページ（〜5,000px）{{ subPage.height5000 }}頁</td>
            <td>{{ (subPage.height5000 * 15000).toLocaleString() }}円</td>
          </tr>
        </template>

        <!-- 下層ページ（〜10,000px）の料金 -->
        <template v-if="subPage.height10000 !== 0">
          <tr>
            <td>下層ページ（〜10,000px）{{ subPage.height10000 }}頁</td>
            <td>{{ (subPage.height10000 * 20000).toLocaleString() }}円</td>
          </tr>
        </template>

        <!-- 下層ページ（〜15,000px）の料金 -->
        <template v-if="subPage.height15000 !== 0">
          <tr>
            <td>下層ページ（〜15,000px）{{ subPage.height15000 }}頁</td>
            <td>{{ (subPage.height15000 * 25000).toLocaleString() }}円</td>
          </tr>
        </template>

        <!-- 下層ページ（〜20,000px）の料金 -->
        <template v-if="subPage.height20000 !== 0">
          <tr>
            <td>下層ページ（〜20,000px）{{ subPage.height20000 }}頁</td>
            <td>{{ (subPage.height20000 * 30000).toLocaleString() }}円</td>
          </tr>
        </template>

        <!-- WordPress 導入料金 -->
        <template v-if="wordPressImplementPrice !== 0">
          <tr>
            <td>WordPress導入</td>
            <td>{{ wordPressImplementPrice.toLocaleString() }}円</td>
          </tr>
        </template>

        <!-- JSアニメーション -->
        <template
          v-if="
            otherFunctions.jsAnimation !== 0 &&
            topPagePrice + subPagePrice !== 0
          "
        >
          <tr>
            <td>JSアニメーション</td>
            <td>
              {{ ((topPagePrice + subPagePrice) * 0.1).toLocaleString() }}円
            </td>
          </tr>
        </template>

        <!-- お問い合わせフォーム -->
        <template v-if="otherFunctions.contactForm !== 0">
          <tr>
            <td>お問い合わせフォーム</td>
            <td>
              {{ (otherFunctions.contactForm * 10000).toLocaleString() }}円
            </td>
          </tr>
        </template>

        <tr>
          <td class="has-no-border is-text-right">小計</td>
          <td>{{ total.toLocaleString() }}円</td>
        </tr>
        <tr>
          <td class="has-no-border is-text-right">税込合計</td>
          <td>{{ (total * 1.1).toLocaleString() }}円</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<style scoped lang="scss">
  table {
    width: 100%;
    min-width: 80rem;
    border-collapse: collapse;
    table-layout: fixed;

    th,
    td {
      border: 0.1rem solid #ccc;
      padding: 0.5em;

      &.is-text-right {
        text-align: right;
      }

      &.has-no-border {
        border: none;
      }
    }

    th {
      background-color: #eeeeee;
    }
  }
</style>
