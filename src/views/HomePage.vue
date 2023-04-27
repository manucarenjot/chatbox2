<template>


  <BoxMessage></BoxMessage>
  <SubMessage :username="user" v-if="etat === 'connected'"></SubMessage>
  <div id="not-connected" v-if="etat !== 'connected'">Veuillez vous connecter pour intéragir avec le chat</div>
  {{getCookie}}
</template>

<script>

import BoxMessage from "@/components/BoxMessage";
import SubMessage from "@/components/SubMessage";
import axios from "axios";

let cookie = (sessionStorage['user']);
console.log(cookie)
export default {
  name: "HomePage",
  data(){
    return {
        user : [
          (sessionStorage['user'])
        ],
        classeLogin : 'front-face',
        classeRegister : 'flip',
        card : 'login',
        etat : '',
        usernameData : '',
        passwordData : ''
    }
  },

  components: {
    BoxMessage,
    SubMessage
  },

  created() {


  },

  computed: {
    // eslint-disable-next-line vue/return-in-computed-property
      getCookie() {
        if (this.etat ==='') {
          // eslint-disable-next-line vue/no-async-in-computed-properties
          setInterval(()=> {

            if (sessionStorage['user']) {
              this.etat = sessionStorage['Connected']
            }
          }, 100)
        }

      }
  },

  methods: {
    flip() {
      if (this.card === 'login') {
        this.classeLogin = 'flip';
        setTimeout(()=> {
          this.card = 'register'
          this.classeRegister = 'front-face'
        }, 400)
      }
      if (this.card === 'register') {
        this.classeRegister = 'flip';
        setTimeout(()=> {
          this.card = 'login'
          this.classeLogin = 'front-face'
        }, 400)
      }
    },

    login: function() {
      if (this.usernameData !== '' && this.passwordData !== '') {
        let usernameData = this.usernameData;
        axios.post('http://localhost:8000/?c=user-connect', {
          request: 1,
          username: this.usernameData,
          password: this.passwordData
        })
            .then((response)=> {
              if (response.data === usernameData) {
                sessionStorage['user'] = response.data
                sessionStorage['Connected'] = 'connected'
              }
              else {
                alert('Please enter username & password');
              }
            })
            .catch(function(error) {
              console.log(error);
            });
      }
    }
  }
}
</script>

<style scoped>

#log-page {
  width: 100%;
  display: flex;
  flex-wrap: wrap;
  flex-direction: row;
  justify-content: center;
  align-items: center;
}

#login-card {
  width: 25%;
  height: 250px;
  border: #014d50 5px solid;
  border-radius: 10%;
  padding: 10%;
  background-color: #00af8f;

  transition: transform 1s;
  transform-style: preserve-3d;
}

button {
  background-color: #548181;
  color: white;
  font-weight: bold;
  padding: 5px;
  border-radius: 20px;
  cursor: pointer;
}

.flip form {
  animation-name: flip;
  animation-duration: 600ms;
}

#register-card {
  width: 25%;
  height: 250px;
  border: #00f3b7 5px solid;
  color: white;
  border-radius: 10%;
  padding: 10%;
  background-color: #046464;

  transition: transform 1s;
  transform-style: preserve-3d;
}


.front-face {
  backface-visibility: hidden;
}

.flip{
  transform: rotatey(360deg);

}

@keyframes flip {
  from {opacity: 100%}
  to {opacity: 0;}
}

#not-connected {
  width: 30%;
  background-color: #ff5900;
  border: #ff5900 5px solid;
  border-radius: 3px;
  color: white;
}

</style>