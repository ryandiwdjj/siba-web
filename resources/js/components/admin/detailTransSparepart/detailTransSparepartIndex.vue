<template>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                  <div class="card-header">
                    <h3 class="card-header-title">Daftar Transaksi Penjualan Sparepart</h3>
                  </div>
                  <div class="card-tools">
                     <router-link to = "/trans_penjualan" class="button is-warning"> <i class="fas fa-arrow-left"></i></router-link>
                  </div>
                    
                    <div class="card-body table-responsive p-0">
                    
                    <div align="right">
                      <i class="fas fa-search"></i> 
                      <input class = "input is-rounded" type="text" placeholder="cari berdasarkan kode sparepart" v-bind:style="{width: '25%' }" v-model="pencarian" />
                    </div>
                    <br>
                    <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
                    <thead>
                        <th>Nomor Transaksi Penjualan</th>
                        <th>Sparepart</th>
                        <th>Jumlah Sparepart</th>
                        <th>Total Harga Sparepart</th>
                        <th>Modify</th>
                        
                    </thead>
                    <tbody>
                      <tr v-for="(detail_trans_sparepart,index) in filteredList" :key ="detail_trans_sparepart.id">
                        <td>{{ detail_trans_sparepart.id_trans_penjualan }}</td>
                        <td>{{ detail_trans_sparepart.sparepart.kode_sparepart }}</td>
                        <td>{{ detail_trans_sparepart.jumlah_barang }}</td>
                        <td>{{ detail_trans_sparepart.total_harga_spare }}</td>
                        <td>
                        <router-link 
                          :to="{name:'editTransaksiSparepart' ,params:{id: detail_trans_sparepart.id}}" 
                          class="button is-primary">
                          <i class="fa fa-edit"></i>
                       </router-link>
                        <button 
                          class="button is-danger" 
                          v-on:click="konfirmasiHapus(detail_trans_sparepart.id,index)">
                          <i class="fa fa-trash"></i>
                        </button>
                        </td>
                      </tr>
                    </tbody>
                    </table>                 
                   </div>     
                    <div class="card-footer">
                      
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
        detail_transsparepart: [],
        
        pencarian: '',
        //loading: true,
        detailTransSparepartId: null,
      }
    },
    mounted()  {
     var app = this;
     app.getResults();
    },
    computed: {
       filteredList: function(){
         return this.detail_transsparepart.filter((detail_trans_sparepart) => {
           return detail_trans_sparepart.sparepart.kode_sparepart.toLowerCase().match(this.pencarian.toLowerCase());
         });
       }
    },
    methods: {
      getResults(){
        this.detailTransSparepartId = this.$route.params.id;
        axios.get('/siba-web/public/api/trans_penjualan/showDetailSparepart/'+this.detailTransSparepartId)
          .then((resp) => {
            this.detail_transsparepart =  resp.data;
        })
          .catch((resp) => {
          alert("Gagal memuat detail transaksi sparepart");    
        });
      },
      
      deleteEntry(id,index){
          axios.delete('./api/trans_penjualan/detail_spare/' + id)
          .then((resp) => {
            this.getResults();
            this.alert("Berhasil Menghapus","Berhasil Menghapus Detail Transaksi Sparepart ");
          })
          .catch((resp) =>{
            alert("Gagal Menghapus Detail Transaksi Sparepart")
            console.log(resp);
          })
      },
      konfirmasiHapus(id,index){
      
        this.$swal({
          title: "Yakin Ingin Menghapus Detail Transaksi Sparepart ?",
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
