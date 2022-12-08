<template>
  <div class="container-fluid mt-lg-3">
    <div class="row  d-flex align-items-center ">
      <div class="col-md-6 ">
        <div class="card mx-lg-auto  text-center">
          <div class="card-header">
            <p>Şifrelemek istediğiniz veriyi aşağıda bulunan alana girip şifrele butonu aracılığıyla
              şifreleyebilirsiniz</p>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label >Şifrelemek istediğiniz metin</label>
              <input type="text" v-model="text" class="form-control" maxlength="16" placeholder="Lütfen Metni Giriniz">
            </div>
            <div class="form-group mt-3">
              <button @click="encrypt()"  class=" form-control btn btn-outline-primary">Şifrele</button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card text-center">
          <div class="card-header">
            <p>Cipher Text ve Şifrelemek İstediğiniz Metin</p>
          </div>
          <div class="card-body">
            <h6>Şifrelemek istedğiniz metin</h6>
            <p >{{ text }}</p>
            <h6>Girilen metinden oluşturulan ara metin</h6>
            <p  style="color: blue">{{data.subText ? data.subText : "Ara Metin Oluşturuluyor..."}}</p>
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
      text: "thisishomework",
      cipher :"cipher",
      data :{}
    }
  },
  methods:{
    encrypt:function (){
     this.axios.get('http://ahmetvuruskan.com.tr/api/api.php?text='+this.text.split(" ").join("")+'&cipher='+this.cipher+'&type=encrypt').then(response=>(this.data =response.data)).catch(function (error){
       this.Swal.fire(
           'ERROR',
           error.data,
           'error'
       );
     })
    },

  }
}
</script>

