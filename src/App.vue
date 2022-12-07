<template>
<IndexComponent></IndexComponent>
</template>

<script>
import IndexComponent from "@/components/IndexComponent";

export default {
  name: 'App',
  components: {
    // eslint-disable-next-line vue/no-unused-components
    IndexComponent
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
