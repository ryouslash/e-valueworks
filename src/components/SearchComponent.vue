<script setup>
import { ref } from "vue";
import debounce from "@js/utils/debounce";

const searchTerm = ref("");
const posts = ref([]);

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
</script>

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