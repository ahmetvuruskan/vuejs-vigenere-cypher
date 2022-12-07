<template>
  <div>
    <div class="container-fluid justify-content-center">
      <div class="row ">
        <div class="btn-group btn-group-toggle" data-toggle="buttons">
          <button ref="encryptButton" @click="setComponent('EncryptData')" class="btn btn-outline-success" :class="{ active : activeComponent === 'EncryptData' }"> Şifrele</button>
          <button ref="decryptButton" @click="setComponent('DecryptData')" class="btn btn-outline-danger" :class="{ active : activeComponent === 'DecryptData' }"> Deşifre Et</button>
        </div>
      </div>
    </div>
    <component  :is="activeComponent"></component>
  </div>
</template>

<script>
import EncryptData from "@/components/EncryptData";
import DecryptData from "@/components/DecryptData";
export default {
  name: "IndexComponent",
  components: {
    EncryptData: EncryptData,
    DecryptData: DecryptData,
  },
  data: function () {
    return {
      activeComponent : null,
    }
  },
  methods : {
    setComponent: function (component) {
      return this.activeComponent = component;
    },
  }
}
</script>
<style>
body{
  background-color: #E1D9D1;
}
</style>
