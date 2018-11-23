<template>
  <div class="blog">
    <blog-post v-for="post in posts" v-bind:key="post.id"></blog-post>
  </div>
</template>

<script>
export default {
  data() {
    return {
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
          self.posts = response.data.data;
        })
        .catch(function(error){
          console.log(error);
        })
    }
  }
}
</script>
