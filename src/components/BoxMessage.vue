<template>
  <div id="box" ref="chatbox" >
    <div class="message" v-for="data in datas.reverse()" :key="data.id"
         :style="{ color: data.color_message }">
      {{ actualiser }}
      <p><b><span style="color: #ffffff">{{ data.hours}}</span> {{ data.username }} :
        </b> <span style="color: #fff6f6; word-break: break-word;
    white-space: normal;">{{ data.message }}</span></p>
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
        {username: 'Hector',  date : 'samedi', hours : '', message: 'Hola la casa', color: ''},
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
  width: 580px;
  height: 450px;
  border: #42b983 5px ridge;
  border-bottom: none;
  border-radius: 4% 4% 0 0;
  overflow-y: scroll;
  overscroll-behavior-y: auto;
  display: flex;
  flex-direction: column;
  justify-content: start;
  align-content: start;
  align-items: start;
  background-color: #2f4141;
  padding: 10px;
}
#box::-webkit-scrollbar {
  width: 10px;
}

/* Track */
#box::-webkit-scrollbar-track {
  box-shadow: inset 0 0 5px grey;
  border-radius: 10px;
}

/* Handle */
#box::-webkit-scrollbar-thumb {
  background: #3bad81;
  border-radius: 10px;
}

.message {
  transform: translateY(0%);
}
</style>