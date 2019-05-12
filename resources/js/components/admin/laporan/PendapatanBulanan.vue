<template>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                  <div class="card-header">
                    <h2 class="card-header-title">Laporan Pendapatan Bulanan</h2>
                  </div>

                  <div class="card-tools">
                      <router-link to="/laporan/cetak/pendapatan_bulanan" class="button is-success">Cetak</router-link>
                      <h6 class="card-tools" id="tanggal">Tanggal dan waktu generate</h6>
                  </div>
                    
                    <div class="card-body table-responsive p-0">
                    
                    <br>
                    <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth" >
                    <thead>
                        <th>No</th>
                        <th>Bulan</th>
                        <th>Jasa Service</th>
                        <th>Sparepart</th>
                        <th>Total</th>
                        
                    </thead>
                    <tbody>
                      <tr v-for="(trans_penjualan,index) in filteredList" :key ="trans_penjualan.id">
                        <td>{{ index+1 }}</td>
                        <td>{{ trans_penjualan.bulan }}</td>
                        <td>{{ trans_penjualan.total_jasa }}</td>
                        <td>{{ trans_penjualan.total_spare }}</td>
                        <td>{{ trans_penjualan.grand_total }}</td>
                      </tr>
                    </tbody>
                    </table>     
                    <vue-simple-spinner v-if="loading"></vue-simple-spinner>     
                    <canvas id="myChart" width="1092" height="400"></canvas>       
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
        transaksiPenjualan: {},
        bulan_trans: {},
        loading: true
      }
    },
    function :{
      timeNow(i) {
        var d = new Date(),
          h = (d.getHours()<10?'0':'') + d.getHours(),
          m = (d.getMinutes()<10?'0':'') + d.getMinutes();
        i.value = h + ':' + m;
      }
    },
    created() {
      var app = this;
      
    },
    mounted()  {
     var app = this;
    app.getResults();

    var jan = app.getGrandTotalChartData(0);

    console.log(jan);

    this.$nextTick(function() {
      window.chart = require('chart.js');

      var ctx = document.getElementById("myChart").getContext("2d");

var data = {
  labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
  datasets: [{
    label: "Service",
    backgroundColor: "blue",
    data: [3, 4, 5, 3, 9, 7, 8, 4, 8, 3, 5, 1] //data nya urutan dari jan sampe des
  }, {
    label: "Spareparts",
    backgroundColor: "red",
    data: [4, 3, 5, 5, 7, 3, 8, 5, 2, 6, 4, 9]
  }, {
    label: "Total",
    backgroundColor: "grey",
    data: [7, 2, 6, 6, 2, 4, 8, 6, 4, 6, 9, 3]
  }]
};

var myBarChart = new Chart(ctx, {
  type: 'bar',
  data: data,
  options: {
  	legend: {
    	position: 'right'
    },
    barValueSpacing: 20,
    scales: {
      yAxes: [{
        ticks: {
          min: 0,
        }
      }]
    }
  }
});

    })

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
        app.transaksiPenjualan = resp.data;
        app.loading = false;
        // console.log(app.transaksiPenjualan);
        })
        .catch(function(resp){
          console.log(resp);
          app.loading = false;
         
        })
      },
      getGrandTotalChartData(month){
        var app = this;
        axios.get('/api/report/pendapatan_bulanan')
        .then(function(resp){
        app.grand_total_trans = resp.data[month].grand_total;
        app.loading = false;
        console.log(app.grand_total_trans);
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
