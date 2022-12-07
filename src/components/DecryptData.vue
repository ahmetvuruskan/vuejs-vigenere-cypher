<template>
  <div class="container-fluid mt-lg-3">
    <div class="row  d-flex align-items-center ">
      <div class="col-md-6 ">
        <div class="card mx-lg-auto  text-center">
          <div class="card-header">
            <p>Şifresini çözmek istedğiniz veriyi aşağıda bulunan alana girip şifre çöz butonu aracılığıyla çözebilirsiniz.</p>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label >Şifre çözmek istediğiniz metin</label>
              <input type="text"  :value="decryptKey" class="form-control" maxlength="16" placeholder="Lütfen Metni Giriniz">
            </div>
            <div class="form-group mt-3">
              <button @click="decrypt()"  class=" form-control btn btn-outline-primary">Şifre Çöz</button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card text-center">
          <div class="card-header">
            <p>Şifresini Çözmek İstediğiniz Metin</p>
          </div>
          <div class="card-body">
            <h6>Şifresini çözmek istedğiniz metin</h6>
            <p >{{ decryptText }}</p>
            <div v-if="data.encrypted">
              <h6>Şifrelenen Metin</h6>
              <p  style="color: red">{{data.encrypted}}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>


export default {
  name: "EncryptData",
  data: () => {
    return {
      decryptText: null,
      cipher :"cipher",
      data :{}
    }
  },
  props :['decryptKey'],
  methods:{
    decrypt:function (){
      this.axios.get('http://localhost/kriptoloji/encrypt.php?text='+this.text.split(" ").join("")+'&cipher='+this.cipher+'&type=decrypt').then(response=>(this.data =response.data)).catch(function (error){
        console.log(error)
      })
    }
  }
}
</script>

