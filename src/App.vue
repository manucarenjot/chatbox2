<template>
  <nav>
    <router-link to="/">Home</router-link> |
    <router-link to="/log" v-if="etat!== 'connected'">Connexion</router-link>
    <router-link to="/log" v-else @click="logout">Deconnexion</router-link> |
    <router-link to="/about">About</router-link>
  </nav>
  <router-view/>
  {{getCookie}}
</template>
<script>


export default {
  name: "app",
  data() {
    return {
      etat : ''
    }
  },

  methods: {
    logout() {
      sessionStorage.removeItem('Connected');
      sessionStorage.removeItem('user')
      this.etat = ''
    }
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
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-content: center;
  align-items: center;
}

nav {
  padding: 30px;
}

nav a {
  font-weight: bold;
  color: #2c3e50;
}

nav a.router-link-exact-active {
  color: #42b983;
}
</style>
