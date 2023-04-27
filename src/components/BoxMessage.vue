<template>
  <div id="box" ref="chatbox" >
    <div class="message" v-for="data in datas.reverse()" :key="data.id"
         :style="{ color: data.color_message }">
      {{ actualiser }}
      <p><b>{{ data.username }} à {{ data.date }}</b></p>
      <p>{{ data.message }}</p>
    </div>

  </div>
</template>

<script>

const axios = require('axios');


export default {
  name: "BoxMessage",
  data() {
    return {
      datas: [
        {username: 'Hector', date: 'samedi', message: 'Hola la casa', color: ''},
      ],

      username: '',
    }
  },
  computed: {
    // eslint-disable-next-line vue/return-in-computed-property
    actualiser() {
      // eslint-disable-next-line vue/no-async-in-computed-properties
      setInterval(() => {
        axios.get("http://localhost:8000?c=get-messages")
            .then((response) => {
              this.datas = response.data
            })
      }, 1000)
    },

  },

  methods: {
    scrollToBottom() {
      // eslint-disable-next-line vue/no-async-in-computed-properties
      this.$nextTick(() => {
        const chatbox = this.$refs.chatbox;
        chatbox.scrollTop = chatbox.scrollHeight;
      });
    }
  },


  created() {
    axios.get("http://localhost:8000?c=get-messages")
        .then((response) => {
          console.log(response.data)
          this.datas = response.data
          this.scrollToBottom()
        })
  },





}


</script>

<style scoped>
#box {
  height: 500px;
  overflow-y: scroll;
  overscroll-behavior-y: auto;
}

.message {
  transform: translateY(0%);
}
</style>