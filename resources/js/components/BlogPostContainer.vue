<template>
  <div class="blog container">
    <section class="row">
      <blog-post-card
        class="blog__post blog__post--featured"
        :post="featuredPost"
        :is-featured="true"
        :key="featuredPost.id">
      </blog-post-card>
    </section>
    <section class="row d-flex flex-row justify-content-flex-start flex-wrap">
      <blog-post-card
        class="blog__post"
        v-for="post in posts"
        :key="post.id"
        :is-featured="false"
        :post="post">
      </blog-post-card>
      <!-- TODO: Implement load more button -->
    </section>
  </div>
</template>

<script>
export default {
  props: {
    containerType: String,
    containerArg: String
  },
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
      let url = '/api/posts';

      // Determine api route
      // posts - All Posts
      // author - Author Posts
      // category - Category Posts
      if(self.containerType !== undefined){

        switch(self.containerType.toLowerCase()){
          case 'posts':
          url = '/api/posts';
          break;
        case 'author':
          '/api/posts/author/' + self.containerArg;
          break;
        case 'category':
          url = '/api/posts/' + self.containerArg.toLowerCase();
          break;
        default:
          // Display all posts by default
          url = '/api/posts';
          break;
        }
      }

      axios.get(url)
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
