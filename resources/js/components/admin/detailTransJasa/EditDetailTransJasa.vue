
<template>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                 <div class="card-header">
                    <h3 class="card-header-title">Ubah Transaksi Service</h3>
                  </div>

                <div class="card-body">
                  
                    <form v-on:submit.prevent="saveForm()" class="form-horizontal" >
                      <div class="form-group">
                        <label for="name" class="col-md-2 control-label" >Jasa Service</label>
                        <br>
                        <div class="select is-primary">
                        <div class="col-md-4">
                          <select
                          v-model="detail_trans_jasa.id_jasa"
                          class="form-control"
                          required="" >
                            <option value="">Pilih Jasa Service</option>
                            <option v-for="jasa_service in jasa_services" :value="jasa_service.id">{{ jasa_service.nama_jasa }}</option>
                          </select>
                        <span v-if="errors.id_jasa" class="help is-danger"> {{ errors.id_jasa[0]}}</span>
                        </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="name" class="col-md-2 control-label" >Pegawai</label>
                        <br>
                        <div class="select is-primary">
                        <div class="col-md-4">
                          <select
                          v-model="detail_trans_jasa.id_pegawai"
                          class="form-control"
                          required="" >
                            <option value="">Pilih Pegawai</option>
                            <option v-for="pegawai in pegawais" :value="pegawai.id">{{ pegawai.nama_pegawai }}</option>
                          </select>
                        <span v-if="errors.id_pegawai" class="help is-danger"> {{ errors.id_pegawai[0]}}</span>
                        </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="name" class="col-md-2 control-label" >Kendaraan</label>
                        <br>
                        <div class="select is-primary">
                        <div class="col-md-4">
                          <select
                          v-model="detail_trans_jasa.id_kendaraan"
                          class="form-control"
                          required="" >
                            <option value="">Pilih Kendaraan</option>
                            <option v-for="kendaraan in kendaraans" :value="kendaraan.id">{{ kendaraan.tipe_kendaraan }}</option>
                          </select>
                        <span v-if="errors.id_kendaraan" class="help is-danger"> {{ errors.id_kendaraan[0]}}</span>
                        </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="name" class="col-md-2 control-label" >Jumlah Jasa</label>
                        <div class="col-md-4">
                          <input type="text" v-bind:style="{width: '35%' }" class="input is-primary" required="" placeholder="Jumlah Jasa" v-model="detail_trans_jasa.jumlah_jasa" autofocus=""/>
                        <span v-if="errors.jumlah_jasa" class="help is-danger"> {{ errors.jumlah_jasa[0]}}</span>
                        </div>
                      </div>
                      
                      <br>
                      <div class="form-group">
                        <div class="col-md-4 col-md-offset-2">
                          <button class="button is-success" type="submit">Ubah  &nbsp; <i class="fa fa-edit"></i></button>
                          <button class="button is-warning" type="button" @click="kembali">Batal  &nbsp; <i class="fas fa-window-close"></i></button>
                        </div>
                      </div>
                      <br>
                    </form>
                  
                </div>
            </div>
        </div>
    </div>
</div>
</template>


<script>
  export default {
    data: function() {
      return {
        detail_trans_jasa: {
            id_trans_penjualan: '',
            id_jasa: '',
            id_pegawai: '',
            id_kendaraan: '',
            jumlah_jasa: '',
        },
        transaksiPenjualan: [],
        jasa_services: [],
        pegawais: [],
        kendaraans: [],
        transJasaId : null,
        errors: [],
        message: ''
      }
    },
    mounted()  {
     var app = this;
     this.transJasaId = this.$route.params.id;
     axios.get('/siba-web/public/api/trans_penjualan/detail_jasa/'+this.transJasaId)
     .then((resp) => {
       this.detail_trans_jasa =  resp.data;
     })
     .catch((resp) => {
        alert("Gagal memuat transaksi service");    
     });
     
     app.getTransaksiPenjualan();
     app.getJasas();
     app.getPegawais();
     app.getKendaraans();
    },
    methods: {
      alert(pesan){
        this.$swal({
          title: "Berhasil Mengubah Transaksi Service",
          text: pesan,
          icon: "success"
        });
      },
      getTransaksiPenjualan(){
        var app = this;
        axios.get('/siba-web/public/api/trans_penjualan' + '/all')
        .then(function(resp){
          app.transaksiPenjualan = resp.data;
        })
        .catch(function(resp){
          console.log(resp);
        })
      },
      getJasas(){
        var app = this;
        axios.get('/siba-web/public/api/jasa_service' + '/all')
        .then(function(resp){
          app.jasa_services = resp.data;
        })
        .catch(function(resp){
          console.log(resp);
        })
      },
      getPegawais(){
        var app = this;
        axios.get('/siba-web/public/api/pegawai' + '/all')
        .then(function(resp){
          app.pegawais = resp.data;
        })
        .catch(function(resp){
          console.log(resp);
        })
      },
      getKendaraans(){
        var app = this;
        axios.get('/siba-web/public/api/kendaraan' + '/all')
        .then(function(resp){
          app.kendaraans = resp.data;
        })
        .catch(function(resp){
          console.log(resp);
        })
      },
      saveForm(){
        var newDetailTransJasa = this.detail_trans_jasa;
        axios.put('./api/trans_penjualan/detail_jasa/update/' + this.transJasaId ,newDetailTransJasa)
        .then((resp) => {
          this.alert('Berhasil Mengubah Transaksi Service ');
          //this.$router.replace('/detail_trans_jasa');
          this.$router.go(-1);
        })
        .catch((resp) =>{
          if(resp.response.status == 500) alert('Gagal Mengubah Transaksi Service');
          this.errors = resp.response.data.errors;
          console.log(resp);
        });
      },
    //   onlyNumbers: function() {
    //    this.transaksiPenjualan.tanggal_penjualan = this.transaksiPenjualan.tanggal_penjualan.replace(/[^0-9-]/g,'');
    //   }
      kembali(){
        this.$router.go(-1);
      }
    }
  }

</script>
