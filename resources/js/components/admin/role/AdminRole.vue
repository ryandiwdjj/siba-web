<template>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                  <div class="card-header">
                    <h3 class="card-header-title">List Role</h3>
                  </div>
                  <div class="card-tools">
                      <router-link to="/tambah_role" class="button is-success">Tambah Role &nbsp; <i class="fas fa-user-plus fa-fw"></i></router-link>
                  </div>
                    
                    <div class="card-body table-responsive p-0">
                    
                    <div align="right">
                      <i class="fas fa-search"></i> 
                      <input class = "input is-rounded" type="text" placeholder="cari berdasarkan nama" v-bind:style="{width: '20%' }" v-model="pencarian" />
                    </div>
                    <br>
                    <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth" >
                    <thead>
                        <th>Nama Role</th>
                        <th>Modify</th>
                        
                    </thead>
                    <tbody>
                      <tr v-for="(role,index) in filteredList" :key ="role.id">
                        <td>{{ role.nama_role }}</td>
                        <td>
                        <router-link 
                          :to="{name:'editRole' ,params:{id: role.id}}" 
                          class="button is-primary">
                          <i class="fa fa-edit"></i>
                       </router-link>
                        <button 
                          class="button is-danger" 
                          v-on:click="konfirmasiHapus(role.id,index,role.nama_role)">
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
                        :data="rolesData" @pagination-change-page="getResults" :limit="4">
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
        roles: [],
        rolesData: {},
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
         return this.roles.filter((role) => {
           return role.nama_role.toLowerCase().match(this.pencarian.toLowerCase());
         });
       }
    },
    methods: {
      getResults(page){
        var app = this;
        if(typeof page == 'undefined'){
          page = 1;
        }
        axios.get('/siba-web/public/api/role?page=' + page)
        .then(function(resp){
          app.roles = resp.data.data;
          app.rolesData = resp.data;
          app.loading = false;
        })
        .catch(function(resp){
          console.log(resp);
          app.loading = false;
         
        })
      },
      getHasilPencarian(page){
          
        var app = this;
        if(typeof page == 'undefined'){
          page = 1;
        }
        axios.get('/siba-web/public/api/role/search?q='+app.pencarian+'&page=' + page)
        .then(function(resp){
          app.roles = resp.data.data;
          app.rolesData = resp.data;
          app.loading = false;
        })
        .catch(function(resp){
          console.log(resp);
          app.loading = false;
         
        })
      },
      deleteEntry(id,index,namaRole){
          axios.delete('./api/role/' + id)
          .then((resp) => {
            this.getResults();
            this.alert("Berhasil Menghapus","Berhasil Menghapus Role " + namaRole);
          })
          .catch((resp) =>{
            alert("Gagal Menghapus Role")
            console.log(resp);
          })
      },
      konfirmasiHapus(id,index,namaRole){
      
        this.$swal({
          title: "Yakin Ingin Menghapus Role " + namaRole + "?",
          text: "Data yang di hapus tidak akan bisa di kembalikan lagi",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            this.deleteEntry(id,index,namaRole);
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
