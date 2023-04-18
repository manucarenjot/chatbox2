<template>
  <div id="log-page">
    <div id="login-card" v-bind:class="classeLogin" v-if="card === 'login'">
      <form action="">
        <h1>Connexion</h1>
        <label for="username"><b>Nom d'utilisateur :</b></label>
        <br>
        <input type="text" name="username" id="username">
        <br>
        <br>
        <label for="password"><b>Mot de passe :</b></label>
        <br>
        <input type="password" name="password" id="password">
        <br>
        <br>
        <input type="submit" name="send" value="Se connecter">
      </form>
      <br><br><br>
      <button @click="flip">Créer un compte</button>
    </div>
    <div id="register-card" v-bind:class="classeRegister" v-else>
      <form action="">
        <h1>Inscription</h1>
        <label for="username-register"><b>Nom d'utilisateur :</b></label>
        <br>
        <input type="text" name="username" id="username-register">
        <br>
        <br>
        <label for="password-register"><b>Mot de passe :</b></label>
        <br>
        <input type="password" name="password" id="password-register">
        <br>
        <br>
        <label for="password-repeat"><b>répéter le mot de passe :</b></label>
        <br>
        <input type="password" name="password-repeat" id="password-repeat">
        <br>
        <br>
        <input type="submit" name="send" value="S'inscrire">
      </form>
      <br><br><br>
      <button @click="flip">Se connecter</button>
    </div>


  </div>


</template>

<script>
export default {
  name: "LogPage",
  data() {
    return {
      classeLogin : 'front-face',
      classeRegister : 'flip',
      card : 'login'
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