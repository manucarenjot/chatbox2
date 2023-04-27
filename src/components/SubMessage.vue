<template>
  <form method="post" action="http://localhost:8000/?c=new-message">
    <label for="usernameMessage" style="display: none">Username : </label>
    <input type="text" name="usernameMessage" id="usernameMessage" :value="username" style="display: none">
    <br>
    <input type="text" name="message" id="message" placeholder="Envoyer un message" v-model="messageData">
    <input type="color" name="color-message" v-model="messageColor">
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
      usernameData : '',
      messageColor : ''
    }
  },
  props: ['username'],


  methods: {
    sub: function() {


      if (this.messageData !== '' && this.usernameData !== '') {

        axios.post('http://localhost:8000/?c=new-message', {
          request: 1,
          username: this.usernameData,
          message: this.messageData,
          color : this.messageColor
        })
            .then((response)=> {
              if (response.data !== 0) {
                alert("envoi du message réussi");
              }
            })
            .catch(function(error) {
              console.log(error);
            });
      } else {
        alert('Erreur lors de l\'envoi du message');
      }
    }
  }
}
</script>

<style scoped>
form {
  width: 600px;
  border-radius: 0 0 25% 25%;
  border: #42b983 5px ridge;
  border-top: none;
  background-color: #2f4141;
  color: white;
}
input[name='message'] {
  width: 85%;
  margin-bottom: 10px;
}
input[type='color'] {
  width: 25px;
}
</style>