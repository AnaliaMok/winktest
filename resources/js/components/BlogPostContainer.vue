<template>
  <div class="blog">
    <section>
      <blog-post-card
        class="blog__post blog__post--featured"
        :post="featuredPost"
        :is-featured="true"
        :key="featuredPost.id">
      </blog-post-card>
    </section>
    <blog-post-card
      class="blog__post"
      v-for="post in posts"
      :key="post.id"
      :is-featured="false"
      :post="post">
    </blog-post-card>
  </div>
</template>

<script>
export default {
  data() {
    return {
      featuredPost: {},
      posts: []
    }
  },
  beforeMount() {
    this.fetchPost();
  },
  methods: {
    fetchPost: function(){
      var self = this;
      console.log("Getting posts");
      axios.get('/api/posts')
        .then(function(response){
          var data = response.data.data;

          // Pull of latests
          if(data.length > 0){
            self.featuredPost = data[0];
          }

          // Grab Remaining Posts
          if(data.length > 1){
            self.posts = data.slice(1);
          }
        })
        .catch(function(error){
          console.log(error);
        })
    }
  }
}
</script>
