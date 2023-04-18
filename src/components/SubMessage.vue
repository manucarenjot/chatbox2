<template>
  <form method="post" action="http://localhost:8000/?c=new-message">
    <label for="usernameMessage">Username : </label>
    <input type="text" name="username" id="usernameMessage" :value="username">
    <br>
    <label for="message">Message : </label>
    <input type="text" name="message" id="message" v-model="messageData">
    <br>
    <input type="submit" name="send">
  </form>
</template>

<script>
const axios = require('axios');

export default {
  name: "SubMessage",
  data() {
    return {
      messageData : '',
      usernameData : ''
    }
  },
  props: ['username'],


  methods: {
    sub() {
      axios.post('http://localhost:8000/?c=new-message', {
        message: this.messageData,
        username: this.usernameData
      })
          .then(function (response) {
            console.log(response);
          })
          .catch(function (error) {
            console.log(error);
          });
    }
  }
}
</script>

<style scoped>

</style>