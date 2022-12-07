<template>
  <div>

    <div class="container-fluid justify-content-center">
      <div class="row ">
        <div class="btn-group btn-group-toggle" data-toggle="buttons">
          <button ref="encryptButton" @click="setComponent('EncryptData')" class="btn btn-outline-success"
                  :class="{ active : activeComponent === 'EncryptData' }"> Şifrele
          </button>
          <button ref="decryptButton" @click="setComponent('DecryptData')" class="btn btn-outline-danger"
                  :class="{ active : activeComponent === 'DecryptData' }"> Deşifre Et
          </button>
        </div>
      </div>
    </div>
    <div v-if="activeComponent ==null" class="container-fluid ">
      <div class="row justify-content-center mt-5">
        <h1>Vigenere Algoritması Şifreleme Sistemine Hoş Geldiniz.</h1>
        <p id="description">Yukarıdaki butonları kullanarak şifleme/şifre çözme yapabilirsiniz...</p>
        <h5 class="fw-bold ">Vigenere Nedir ?</h5>
        <p class="px-5 mt-1 fs-9">Vigenere şifresi çoklu alfabeli (Polyalphabetic) özellikte birblok şifreleme yöntemidir. İlkel bir yöntem olmasına rağmençoklu alfabeli oluşuve bu sayede şifrenin harf bloklarına uygulanması onu güçlü kılmıştır. Vigenere şifresi, verileri şifrelemek için ‘anahtar(key)’ kavramını kullanmıştır. Bu anahtar, şifreleme dünyasına yeni bir boyut getirmiştir, çünkü şifrenin çözülmesinde(decrypt) frekans analizine (harflerin tekrar etme sıklığına göre yapılan şifre çözme yöntemi) direnmeyi başarmıştır.Ancak yine de şifreli mesajın anahtar boyu kadar bloklarına frekans analizi yapılarak mesaja ulaşılması mümkündür.</p>
      </div>
    </div>
    <component :is="activeComponent"></component>
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
      activeComponent: null,
    }
  },
  methods: {
    setComponent: function (component) {
      return this.activeComponent = component;
    },
  },
}
</script>
<style>
#description{
  color: red;
}
body {
  background-color: #E1D9D1;
}
</style>
