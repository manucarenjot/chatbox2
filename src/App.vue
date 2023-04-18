<template>
  <BoxMessage/>
  <SubMessage/>
</template>

<script>
import BoxMessage from "@/components/BoxMessage";
import SubMessage from "@/components/SubMessage";

export default {
  name: 'App',
  components: {
    BoxMessage,
    SubMessage
  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
