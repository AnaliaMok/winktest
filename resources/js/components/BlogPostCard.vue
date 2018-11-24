<template>
  <div>
    <a :href="'/blog/' + post.slug" class="blog__post__col blog__post__col--img">
      <img :src="post.featured_image" :alt="imageCaption">
    </a>
    <div class="blog__post__col blog__post__col--content">
      <strong v-if="isFeatured">FEATURED</strong>
      <h5><a :href="'/blog/' + post.slug">{{ post.title }}</a></h5>
      <p v-html="excerpt" class="blog__post__excerpt"></p>
      <div class="blog__post__col__bottom">
        <p v-if="post.author" class="blog__post__author">
          By <span><a :href="'/blog/author/' + author">{{ post.author.name }}</a>
          </span>
        </p>
        <p class="blog__post__date">{{ publishDate }}
          <span v-if="post.tags !== undefined && post.tags.length > 0">|
            <a :href="'/blog/category/' + post.tags[0].name">{{ post.tags[0].name }}</a>
          </span>
        </p>
      </div>
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
    },
    publishDate: function(){
      let months = [
        'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August',
        'September', 'October', 'November', 'December'
      ];

      let date = new Date();

      if (this.post.publish_date !== undefined) {
        date = new Date(this.post.publish_date);
      }

      let month = parseInt(date.getMonth());
      let day = date.getDate();
      let year = date.getFullYear();

      return `${months[month]} ${day}, ${year}`;
    },
    author: function(){
      if(this.post.author !== undefined && this.post.author.name !== undefined){
        return this.post.author.name.toLowerCase().replace(' ', '-')
      }
      return '';
    }
  }
}
</script>
