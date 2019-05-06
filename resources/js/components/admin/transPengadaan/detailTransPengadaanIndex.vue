<template>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                  <div class="card-header">
                    <h3 class="card-header-title">Detail Pengadaan Sparepart</h3>
                  </div>
                  <div class="card-tools">
                      
                  </div>
                    
                    <div class="card-body table-responsive p-0">
                    
                    <div align="right">
                      <i class="fas fa-search"></i> 
                      <input class = "input is-rounded" type="text" placeholder="cari sparepart" v-bind:style="{width: '25%' }" v-model="pencarian" />
                    </div>
                    <br>
                    <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
                    <thead>
                        <th>Nomor Transaksi Pengadaan</th>
                        <th>Sparepart</th>
                        <th>Jumlah Pengadaan</th>
                        <th>Modify</th>
                        
                    </thead>
                    <tbody>
                      <tr v-for="(detail_trans_pengadaan,index) in filteredList" :key ="detail_trans_pengadaan.id">
                        <td>{{ detail_trans_pengadaan.id_trans_pengadaan }}</td>
                        <td>{{ detail_trans_pengadaan.sparepart.kode_sparepart }}</td>
                        <td>{{ detail_trans_pengadaan.jumlah_pengadaan }}</td>
                        <td>
                        <router-link 
                          :to="{name:'editDetailPengadaan' ,params:{id: detail_trans_pengadaan.id}}" 
                          class="button is-primary">
                          <i class="fa fa-edit"></i>
                       </router-link>
                        <button 
                          class="button is-danger" 
                          v-on:click="konfirmasiHapus(detail_trans_pengadaan.id,index)">
                          <i class="fa fa-trash"></i>
                        </button>
                        </td>
                      </tr>
                    </tbody>
                    </table>     
                    <vue-simple-spinner v-if="loading"></vue-simple-spinner>            
                   </div>     
                    <div class="card-footer">
                      <pagination class="card-footer-item"
                        :data="detail_pengadaanData" @pagination-change-page="getResults" :limit="4">
                        <span slot="prev-nav">&lt; Previous</span>
	                      <span slot="next-nav">Next &gt;</span>
                      </pagination>
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
        detail_pengadaan: [],
        detail_pengadaanData: {},
        pencarian: '',
        loading: true
      }
    },
    mounted()  {
     var app = this;
    app.getResults();
    },
    computed: {
       filteredList: function(){
         return this.detail_pengadaan.filter((detail_trans_pengadaan) => {
           return detail_trans_pengadaan.sparepart.kode_sparepart.toLowerCase().match(this.pencarian.toLowerCase());
         });
       }
    },
    methods: {
      getResults(page){
        var app = this;
        if(typeof page == 'undefined'){
          page = 1;
        }
        axios.get('/api/detail_trans_pengadaan?page=' + page)
        .then(function(resp){
          app.detail_pengadaan = resp.data.data;
          app.detail_pengadaanData = resp.data;
          app.loading = false;
        })
        .catch(function(resp){
          console.log(resp);
          app.loading = false;
         
        })
      },
      
      deleteEntry(id,index){
          axios.delete('/api/detail_trans_pengadaan/' + id)
          .then((resp) => {
            this.getResults();
            this.alert("Berhasil Menghapus","Berhasil Menghapus Transaksi Pengadaan ");
          })
          .catch((resp) =>{
            alert("Gagal Menghapus Transaksi Pengadaan")
            console.log(resp);
          })
      },
      konfirmasiHapus(id,index){
      
        this.$swal({
          title: "Yakin Ingin Menghapus Transaksi Pengadaan ?",
          text: "Data yang di hapus tidak akan bisa di kembalikan lagi",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            this.deleteEntry(id,index);
          }
        })  
      },
      alert(title,pesan){
        this.$swal({
          title: title,
          text: pesan,
          icon: "success"
        });
      }
    }
  }

</script>
