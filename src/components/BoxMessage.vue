<template>
  <div id="box">
    <div class="message" v-for="data in datas" :key="data.id">
        {{actualiser}}
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
        {username : 'Hector', date: 'samedi', message: 'Hola la casa'},

      ]
    }
  },
  computed: {
    // eslint-disable-next-line vue/return-in-computed-property
    actualiser() {
      // eslint-disable-next-line vue/no-async-in-computed-properties
      setInterval(()=> {
        axios.get("http://localhost:8000?c=get-messages")
            .then((response) => {
              this.datas = response.data
            })
      }, 1000)

    }

  },


  created() {
    axios.get("http://localhost:8000?c=get-messages")
        .then((response) => {
          console.log(response.data)
          this.datas = response.data
        })

  },


}
</script>

<style scoped>

</style>