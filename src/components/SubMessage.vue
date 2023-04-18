<template>
  <form method="post" action="http://localhost:8000/?c=new-message">
    <label for="usernameMessage" style="display: none">Username : </label>
    <input type="text" name="usernameMessage" id="usernameMessage" :value="username" style="display: none">
    <br>
    <label for="message">Message : </label>
    <input type="text" name="message" id="message" v-model="messageData">
    <input type="submit" name="send" value="➤">
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