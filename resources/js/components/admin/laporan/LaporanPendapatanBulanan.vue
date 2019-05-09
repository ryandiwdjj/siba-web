<template>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                  <div class="card-header">
                    <h3 class="card-header-title">Laporan Pendapatan Bulanan</h3>
                  </div>

                  <div class="card-tools">
                      <router-link to="/cetak_pendapatan_bulanan" class="button is-success">Cetak</router-link>
                  </div>
                    
                    <div class="card-body table-responsive p-0">
                    
                    <br>
                    <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth" >
                    <thead>
                        <th>No</th>
                        <th>Bulan</th>
                        <th>Service</th>
                        <th>Sparepart</th>
                        <th>Total</th>
                        
                    </thead>
                    <tbody>
                      <tr v-for="(trans_penjualan,index) in filteredList" :key ="trans_penjualan.id">
                        <td>{{ index+1 }}</td>
                        <td>{{ trans_penjualan.status_pembayaran }}</td>
                        <td>{{ trans_penjualan.status_transaksi }}</td>
                        <td>{{ trans_penjualan.created_at }}</td>
                      </tr>
                    </tbody>
                    </table>     
                    <vue-simple-spinner v-if="loading"></vue-simple-spinner>            
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
        transaksiPenjualan: [],
        bulan_trans: {},
        loading: true
      }
    },
    mounted()  {
     var app = this;
    app.getResults();
    },
    computed: {
       filteredList: function(){
         return this.transaksiPenjualan;
       }
    },
    methods: {
      getResults(){
        var app = this;
        axios.get('/api/report/pendapatan_bulanan')
        .then(function(resp){
        //app.bulan_trans = resp.data;
        //app.trans_penjualan = resp.data.data;
        app.transaksiPenjualan = resp.data;
        app.loading = false;
        })
        .catch(function(resp){
          console.log(resp);
          app.loading = false;
         
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
