
<template>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                 <div class="card-header">
                    <h3 class="card-header-title">Tambah Transaksi Pengadaan Sparepart</h3>
                  </div>

                <div class="card-body">
                  
                    <form v-on:submit.prevent="saveForm()" class="form-horizontal" >
                      <div class="form-group">
                        <label for="name" class="col-md-2 control-label" >Supplier</label>
                        <br>
                        <div class="select is-primary">
                        <div class="col-md-4">
                          <select
                          v-model="transaksiPengadaan.id_supplier"
                          class="form-control"
                          required="" >
                            <option value="">Pilih Supplier</option>
                            <option v-for="supplier in suppliers" :value="supplier.id">{{ supplier.nama_supplier }}</option>
                          </select>
                        <span v-if="errors.id_supplier" class="help is-danger"> {{ errors.id_supplier[0]}}</span>
                        </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="name" class="col-md-2 control-label" >Cabang</label>
                        <br>
                        <div class="select is-primary">
                        <div class="col-md-4">
                          <select
                          v-model="transaksiPengadaan.id_cabang"
                          class="form-control"
                          required="" >
                            <option value="">Pilih Cabang</option>
                            <option v-for="cabang in cabangs" :value="cabang.id">{{ cabang.nama_cabang }}</option>
                          </select>
                        <span v-if="errors.id_cabang" class="help is-danger"> {{ errors.id_cabang[0]}}</span>
                        </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="name" class="col-md-2 control-label" >Tanggal Pengadaan</label>
                        <div class="col-md-4">
                          <input type="date" v-bind:style="{width: '35%' }" class="input is-primary" required="" placeholder="" v-model="transaksiPengadaan.tanggal_pengadaan" autofocus=""/>
                        <span v-if="errors.tanggal_pengadaan" class="help is-danger"> {{ errors.tanggal_pengadaan[0]}}</span>
                        </div>
                      </div>   
                      <br>
                      <div class="form-group">
                        <div class="col-md-4 col-md-offset-2">
                          <button class="button is-success" type="submit">Tambah  &nbsp; <i class="fas fa-plus-circle"></i></button>
                          <router-link to = "/trans_pengadaan" class="button is-warning">Batal  &nbsp; <i class="fas fa-window-close"></i></router-link>
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
        transaksiPengadaan: {
            id_supplier: '',
            id_cabang: '',
            tanggal_pengadaan: '',   
        },
        suppliers: [],
        cabangs: [],
        errors: [],
        message: ''
      }
    },
    mounted()  {
     var app = this;
     app.getSuppliers();
     app.getCabangs();
    },
    methods: {
      alert(pesan){
        this.$swal({
          title: "Berhasil Menambah Transaksi Pengadaan",
          text: pesan,
          icon: "success"
        });
      },
      getSuppliers(){
        var app = this;
        axios.get('/siba-web/public/api/supplier' + '/all')
        .then(function(resp){
          app.suppliers = resp.data;
        })
        .catch(function(resp){
          console.log(resp);
        })
      },
      getCabangs(){
        var app = this;
        axios.get('/siba-web/public/api/cabang' + '/all')
        .then(function(resp){
          app.cabangs = resp.data;
        })
        .catch(function(resp){
          console.log(resp);
        })
      },
      saveForm(){
        var newTransPengadaan = this.transaksiPengadaan;
        axios.post('./api/trans_pengadaan/store',newTransPengadaan)
        .then((resp) => {
          this.alert('Berhasil Menambah Transaksi Pengadaan ');
          this.$router.replace('/trans_pengadaan');
        })
        .catch((resp) =>{
          if(resp.response.status == 500) alert('Gagal Menambah Transaksi Pengadaan');
          this.errors = resp.response.data.errors;
          console.log(resp);
        });
      },
    }
  }

</script>


