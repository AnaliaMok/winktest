<template>
  <p style="display:block;border: 1px solid black;">
    <span v-if="isFeatured">FEATURED</span>
    <strong>{{ post.title }}</strong>
  </p>
</template>

<script>
export default {
  props: {
    post: Object,
    isFeatured: false
  }
}
</script>
