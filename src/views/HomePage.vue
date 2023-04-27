<template>
  <div id="log-page" v-if="etat === ''">
    <div id="login-card" v-bind:class="classeLogin" v-if="card === 'login'">
      <form method="post" action="http://localhost:8000/?c=user-connect">
        <h1>Connexion</h1>
        <label for="username"><b>Nom d'utilisateur :</b></label>
        <br>
        <input type="text" name="username" id="username" v-model="usernameData">
        <br>
        <br>
        <label for="password"><b>Mot de passe :</b></label>
        <br>
        <input type="password" name="password" id="password" v-model="passwordData">
        <br>
        <br>
        <input type="button" @click="login" title="Se connecter" value="Se connecter">
      </form>
      <br><br><br>
      <button @click="flip">Créer un compte</button>
    </div>
    <div id="register-card" v-bind:class="classeRegister" v-else>
      <form method="post" action="http://localhost:8000/?c=new-user">
        <h1>Inscription</h1>
        <label for="username-register"><b>Nom d'utilisateur :</b></label>
        <br>
        <input type="text" name="new-username" id="username-register">
        <br>
        <br>
        <label for="password-register"><b>Mot de passe :</b></label>
        <br>
        <input type="password" name="new-password" id="password-register">
        <br>
        <br>
        <label for="password-repeat"><b>répéter le mot de passe :</b></label>
        <br>
        <input type="password" name="password-repeat" id="password-repeat">
        <br>
        <br>
        <input type="submit" name="send" title="S'inscrire">
      </form>
      <br><br><br>
      <button @click="flip">Se connecter</button>
    </div>
  </div>


  <BoxMessage v-if="etat === 'connected'" ></BoxMessage>
  <SubMessage :username="user" v-if="etat === 'connected'"></SubMessage>
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

</style>