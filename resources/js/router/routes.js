import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import RootAdmin from '../components/admin/rootAdmin.vue'
import HomeAdmin from '../components/admin/homeAdmin.vue'

import AdminJasaService from '../components/admin/jasa service/AdminJasaService.vue'
import CreateJasaService from '../components/admin/jasa service/CreateJasaService.vue'
import EditJasaService from '../components/admin/jasa service/EditJasaService.vue'

import AdminPegawai from '../components/admin/pegawai/AdminPegawai.vue'
import CreatePegawai from '../components/admin/pegawai/CreatePegawai.vue'
import EditPegawai from '../components/admin/pegawai/EditPegawai.vue'

import AdminSparepart from '../components/admin/sparepart/AdminSparepart.vue'
import CreateSparepart from '../components/admin/sparepart/CreateSparepart.vue'
import EditSparepart from '../components/admin/sparepart/EditSparepart.vue'

import AdminSupplier from '../components/admin/supplier/AdminSupplier.vue'
import CreateSupplier from '../components/admin/supplier/CreateSupplier.vue'
import EditSupplier from '../components/admin/supplier/EditSupplier.vue'

import AdminRole from '../components/admin/role/AdminRole.vue'
import CreateRole from '../components/admin/role/CreateRole.vue'
import EditRole from '../components/admin/role/EditRole.vue'

import AdminCabang from '../components/admin/cabang/AdminCabang.vue'
import CreateCabang from '../components/admin/cabang/CreateCabang.vue'
import EditCabang from '../components/admin/cabang/EditCabang.vue'

import AdminPelanggan from '../components/admin/pelanggan/AdminPelanggan.vue'
import CreatePelanggan from '../components/admin/pelanggan/CreatePelanggan.vue'
import EditPelanggan from '../components/admin/pelanggan/EditPelanggan.vue'

import AdminKendaraan from '../components/admin/kendaraan/AdminKendaraan.vue'
import CreateKendaraan from '../components/admin/kendaraan/CreateKendaraan.vue'
import EditKendaraan from '../components/admin/kendaraan/EditKendaraan.vue'

import transPenjualanIndex from '../components/admin/transaksiPenjualan/transPenjualanIndex.vue'
import CreateTransaksiPenjualan from '../components/admin/transaksiPenjualan/CreateTransaksiPenjualan.vue'
import EditTransaksiPenjualan from '../components/admin/transaksiPenjualan/EditTransPenjualan.vue'
import PrintSPK from '../components/admin/transaksiPenjualan/PrintSPK.vue'
import pembayaranIndex from '../components/admin/transaksiPenjualan/pembayaranIndex.vue'
import Pembayaran from '../components/admin/transaksiPenjualan/pembayaran.vue'

import detailTransJasaIndex from '../components/admin/detailTransJasa/detailTransJasaIndex.vue'
import CreateDetailTransJasa from '../components/admin/detailTransJasa/CreateDetailTransJasa.vue'
import EditDetailTransJasa from '../components/admin/detailTransJasa/EditDetailTransJasa.vue'

import detailTransSparepartIndex from '../components/admin/detailTransSparepart/detailTransSparepartIndex.vue'
import CreateDetailTransSparepart from '../components/admin/detailTransSparepart/CreateDetailTransSparepart.vue'
import EditDetailTransSparepart from '../components/admin/detailTransSparepart/EditDetailTransSparepart.vue'

import transPengadaanIndex from '../components/admin/transPengadaan/transPengadaanIndex.vue'
import detailTransPengadaanIndex from '../components/admin/transPengadaan/detailTransPengadaanIndex.vue'
import CreateTransPengadaan from '../components/admin/transPengadaan/CreateTransPengadaan.vue'
import CreateTransPengadaanV2 from '../components/admin/transPengadaan/CreateTransPengadaanV2.vue'
import CreateDetailPengadaan from '../components/admin/transPengadaan/CreateDetailPengadaan.vue'
import EditDetailPengadaan from '../components/admin/transPengadaan/EditDetailPengadaan.vue'





const routes = [
    {
        path: '/',
        component: RootAdmin,
        children : [
            {
                path: '/',
                component: HomeAdmin,
            },

            {
                path:'/jasa_service',
                component: AdminJasaService
            },
            {
                path:'/tambah_jasa',
                component: CreateJasaService
            },
            {
                name: 'editJasaService',
                path:'/edit_jasa/:id',
                component: EditJasaService
            },
            
            {
                path:'/pegawai',
                component: AdminPegawai
            },
            {
                path:'/tambah_pegawai',
                component: CreatePegawai
            },
            {
                name: 'editPegawai',
                path:'/edit_pegawai/:id',
                component: EditPegawai
            },

            {
                path:'/sparepart',
                component: AdminSparepart
            },
            {
                path:'/tambah_sparepart',
                component: CreateSparepart
            },
            {
                name: 'editSparepart',
                path:'/edit_sparepart/:id',
                component: EditSparepart
            },

            {
                path:'/supplier',
                component: AdminSupplier
            },
            {
                path:'/tambah_supplier',
                component: CreateSupplier
            },
            {
                name: 'editSupplier',
                path:'/edit_supplier/:id',
                component: EditSupplier
            },

            {
                path:'/role',
                component: AdminRole
            },
            {
                path:'/tambah_role',
                component: CreateRole
            },
            {
                name: 'editRole',
                path:'/edit_role/:id',
                component: EditRole
            },

            {
                path:'/cabang',
                component: AdminCabang
            },
            {
                path:'/tambah_cabang',
                component: CreateCabang
            },
            {
                name: 'editCabang',
                path:'/edit_cabang/:id',
                component: EditCabang
            },

            {
                path:'/pelanggan',
                component: AdminPelanggan
            },
            {
                path:'/tambah_pelanggan',
                component: CreatePelanggan
            },
            {
                name: 'editPelanggan',
                path:'/edit_pelanggan/:id',
                component: EditPelanggan
            },

            {
                path:'/kendaraan',
                component: AdminKendaraan
            },
            {
                path:'/tambah_kendaraan',
                component: CreateKendaraan
            },
            {
                name: 'editKendaraan',
                path:'/edit_kendaraan/:id',
                component: EditKendaraan
            },

            {
                path:'/trans_penjualan',
                component: transPenjualanIndex
            },
            {
                path:'/tambah_trans_penjualan',
                component: CreateTransaksiPenjualan
            },
            {   name: 'editTransaksi',
                path:'/edit_trans_penjualan/:id',
                component: EditTransaksiPenjualan
            },
            {
                name: 'printSPK',
                path:'/print_spk',
                component: PrintSPK
            },
            {
                path:'/trans_penjualan_pembayaran',
                component: pembayaranIndex
            },
            {
                name: 'bayarTransaksi',
                path:'/trans_penjualan_bayar/:id',
                component: Pembayaran
            },

            {
                path:'/detail_trans_jasa',
                component: detailTransJasaIndex
            },
            {
                path:'/tambah_trans_jasa',
                component: CreateDetailTransJasa
            },
            {
                name: 'editDetailTransJasa',
                path:'/edit_trans_jasa/:id',
                component: EditDetailTransJasa
            },

            {
                name: 'showDetailSparepart',
                path:'/detail_trans_sparepart/:id',
                component: detailTransSparepartIndex
            },
            {
                path:'/tambah_trans_sparepart',
                component: CreateDetailTransSparepart
            },
            {
                name: 'editTransaksiSparepart',
                path:'/edit_trans_sparepart/:id',
                component: EditDetailTransSparepart
            },

            {
                path:'/trans_pengadaan',
                component: transPengadaanIndex
            },
            {
                name:'showDetail',
                path:'/detail_trans_pengadaan/:id',
                component: detailTransPengadaanIndex
            },
            {
                path:'/tambah_trans_pengadaan',
                component: CreateTransPengadaan
            },
            {
                path:'/tambah_trans_pengadaanv2',
                component: CreateTransPengadaanV2
            },
            {
                path:'/tambah_detail_pengadaan',
                component: CreateDetailPengadaan
            },
            {
                name: 'editDetailPengadaan',
                path:'/edit_detail_pengadaan/:id',
                component: EditDetailPengadaan
            },
            
            
           
            
        ]
    }
    
        
    
]

const router = new VueRouter({mode: 'history', routes: routes});
export default router