<template>
  <div>
    <input v-model="searchTerm" @input="search" type="text" placeholder="Search...">
    <div v-for="post in posts" :key="post.id">
      <h2><a :href="post.link" target="_blank">{{ post.title.rendered }}</a></h2>
      <img :src="post.featured_image_url" alt="Post Thumbnail" v-if="post.featured_image_url">
      <p v-html="post.excerpt.rendered"></p>
    </div>
  </div>
</template>

<script>
import { ref } from "vue";

// 自作の debounce 関数
function debounce(func, delay) {
  let timer;
  return function (...args) {
    clearTimeout(timer);
    timer = setTimeout(() => {
      func.apply(this, args);
    }, delay);
  };
}

export default {
  setup() {
    const searchTerm = ref("");
    const posts = ref([]);

    // 自作 debounce を使って検索処理を遅延実行
    const search = debounce(() => {
      if (searchTerm.value.length < 3) {
        posts.value = [];
        return;
      }

      fetch(`https://e-valueworks.com/wp-json/wp/v2/posts?search=${searchTerm.value}`)
        .then(response => response.json())
        .then(data => {
          posts.value = data;
        });
    }, 500);

    return { searchTerm, posts, search };
  }
};
</script>