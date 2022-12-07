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
              <input type="text" v-model="text" class="form-control" maxlength="16" placeholder="Lütfen Metni Giriniz">
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
            <p >{{ text }}</p>
            <h6>Şifrenin çözülmesi için kullanılan ara metin</h6>
            <p  style="color: blue">{{data.subText ? data.subText : "Ara Metin.."}}</p>
            <div v-if="data.decrypted">
              <h6>Şifresi Çözülmüş Metin</h6>
              <p  style="color: red">{{data.decrypted}}</p>
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
      text: null,
      cipher :"cipher",
      data :{}
    }
  },
  methods:{
    decrypt:function (){
      this.axios.get('http://localhost/kriptoloji/encrypt.php?text='+this.text+'&cipher='+this.cipher+'&type=decrypt').then(response =>(this.data =response.data)).catch(function (error){
        console.log(error)
      })
    }
  }
}
</script>

