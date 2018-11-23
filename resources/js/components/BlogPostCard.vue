<template>
  <div>
    <div class="blog__post__col blog__post__col--img">
      <img :src="post.featured_image" :alt="imageCaption">
    </div>
    <div class="blog__post__col blog__post__col--content">
      <strong v-if="isFeatured">FEATURED</strong>
      <h5><a :href="'/blog/' + post.slug">{{ post.title }}</a></h5>
      <p v-html="excerpt"></p>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    post: Object,
    isFeatured: false,
    featuredImageCaption: String
  },
  computed: {
    imageCaption: function(){
      let post = this.post;

      if(post.featured_image_caption && post.featured_image_caption.length > 0){
        return post.featured_image_caption;
      } else {
        return post.title;
      }
    },
    excerpt: function(){
      let excerpt = this.post.excerpt;
      let body = this.post.body;

      if(excerpt != undefined && excerpt.length > 0){
        // If excerpt exists, return it. Clamp within 250 characters
        excerpt = excerpt.replace(/<\/?[^>]+(>|$)/g, "");

        if(excerpt.length >= 250){
          return excerpt.substring(0, 250) + "...";
        }

        return excerpt;
      } else if(body != undefined){
        body = body.replace(/<\/?[^>]+(>|$)/g, "");

        return body.substring(0, 250) + "...";
      }

    }
  }
}
</script>
