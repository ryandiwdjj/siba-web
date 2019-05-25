<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\trans_penjualan;
use App\trans_pengadaan;
use App\sparepart;
use App\detail_trans_sparepart;
use App\detail_trans_jasa;

class reportController extends Controller
{
	public function pendapatan_bul() {
		for($i = 0; $i<=12; $i++) {
			$month = trans_penjualan::
			join('detail_transjasa', 'detail_transjasa.id_trans_penjualan', 'trans_penjualan.id')
			->join('detail_transsparepart','detail_transsparepart.id_trans_penjualan', 'trans_penjualan.id')
			->select('trans_penjualan.grand_total', 'trans_penjualan.tanggal_penjualan'
			, 'detail_transjasa.total_harga_jasa', 'detail_transsparepart.total_harga_spare')
			->where('trans_penjualan.status_transaksi', '=', 'sudah')
			->where('trans_penjualan.status_pembayaran', '=', 'sudah')
			->whereMonth('trans_penjualan.tanggal_penjualan', $i);
		

			if($i == 1) {
				$grand = $month->sum('grand_total');
				$jasa = $month->sum('total_harga_jasa');
				$spare = $month->sum('total_harga_spare');

				$januari_json = [
					"bulan" => "Januari",
					"grand_total" => $grand, 
					"total_jasa" => $jasa, 
					"total_spare" => $spare];
			}
			else if($i == 2) {
				$grand = $month->sum('grand_total');
				$jasa = $month->sum('total_harga_jasa');
				$spare = $month->sum('total_harga_spare');

				$februari_json = [
					"bulan" => "Februari",
					"grand_total" => $grand, 
					"total_jasa" => $jasa, 
					"total_spare" => $spare];
			}
			else if($i == 3) {
				$grand = $month->sum('grand_total');
				$jasa = $month->sum('total_harga_jasa');
				$spare = $month->sum('total_harga_spare');

				$maret_json = [
					"bulan" => "Maret",
					"grand_total" => $grand, 
					"total_jasa" => $jasa, 
					"total_spare" => $spare];
			}
			else if($i == 4) {
				$grand = $month->sum('grand_total');
				$jasa = $month->sum('total_harga_jasa');
				$spare = $month->sum('total_harga_spare');

				$april_json = [
					"bulan" => "April",
					"grand_total" => $grand, 
					"total_jasa" => $jasa, 
					"total_spare" => $spare];
			}
			else if($i == 5) {
				$grand = $month->sum('grand_total');
				$jasa = $month->sum('total_harga_jasa');
				$spare = $month->sum('total_harga_spare');

				$mei_json = [
					"bulan" => "Mei",
					"grand_total" => $grand, 
					"total_jasa" => $jasa, 
					"total_spare" => $spare];
			}
			else if($i == 6) {
				$grand = $month->sum('grand_total');
				$jasa = $month->sum('total_harga_jasa');
				$spare = $month->sum('total_harga_spare');

				$juni_json = [
					"bulan" => "Juni",
					"grand_total" => $grand, 
					"total_jasa" => $jasa, 
					"total_spare" => $spare];
			}
			else if($i == 7) {
				$grand = $month->sum('grand_total');
				$jasa = $month->sum('total_harga_jasa');
				$spare = $month->sum('total_harga_spare');

				$juli_json = [
					"bulan" => "Juli",
					"grand_total" => $grand, 
					"total_jasa" => $jasa, 
					"total_spare" => $spare];
			}
			else if($i == 8) {
				$grand = $month->sum('grand_total');
				$jasa = $month->sum('total_harga_jasa');
				$spare = $month->sum('total_harga_spare');

				$agustus_json = [
					"bulan" => "Agustus",
					"grand_total" => $grand, 
					"total_jasa" => $jasa, 
					"total_spare" => $spare];
			}
			else if($i == 9) {
				$grand = $month->sum('grand_total');
				$jasa = $month->sum('total_harga_jasa');
				$spare = $month->sum('total_harga_spare');

				$september_json = [
					"bulan" => "September",
					"grand_total" => $grand, 
					"total_jasa" => $jasa, 
					"total_spare" => $spare];
			}
			else if($i == 10) {
				$grand = $month->sum('grand_total');
				$jasa = $month->sum('total_harga_jasa');
				$spare = $month->sum('total_harga_spare');

				$oktober_json = [
					"bulan" => "Oktober",
					"grand_total" => $grand, 
					"total_jasa" => $jasa, 
					"total_spare" => $spare];
			}
			else if($i == 11) {
				$grand = $month->sum('grand_total');
				$jasa = $month->sum('total_harga_jasa');
				$spare = $month->sum('total_harga_spare');

				$november_json = [
					"bulan" => "November",
					"grand_total" => $grand, 
					"total_jasa" => $jasa, 
					"total_spare" => $spare];
			}
			else if($i == 12) {
				$grand = $month->sum('grand_total');
				$jasa = $month->sum('total_harga_jasa');
				$spare = $month->sum('total_harga_spare');

				$desember_json = [
					"bulan" => "Desember",
					"grand_total" => $grand, 
					"total_jasa" => $jasa, 
					"total_spare" => $spare];
			}
		}
	
			return response()->json([
				$januari_json,
				$februari_json,
				$maret_json,
				$april_json,
				$mei_json,
				$juni_json,
				$juli_json,
				$agustus_json,
				$september_json,
				$oktober_json,
				$november_json,
				$desember_json
				]);
	}

	// public function pendapatan_bul($month) {
	//     $results = trans_penjualan::where('status_transaksi', '=', 'sudah')
	//                 ->where('status_pembayaran', '=', 'sudah')
	//                 ->whereMonth('created_at', $month)->get();

	//     return response()->json($results, 200);
	// }
	public function pengeluaran_bul() {
		for($i = 0; $i<=12; $i++) {
			$bulanan = trans_pengadaan::
			select('trans_pengadaan.total_harga_pengadaan')
			->where('trans_pengadaan.status_pengadaan', '=', 'sudah')
			->whereMonth('trans_pengadaan.tanggal_pengadaan', $i);
			$bulanan_total = $bulanan->sum('trans_pengadaan.total_harga_pengadaan');

			if($i === 1) {
				$januari_json = [
					'bulan' => "Januari",
					'total_harga_pengadaan' => $bulanan_total];
			}
			else if($i === 2) {
				$februari_json = [
					'bulan' => "Februari",
					'total_harga_pengadaan' => $bulanan_total];
			}
			else if($i === 3) {
				$maret_json = [
					'bulan' => "Maret",
					'total_harga_pengadaan' => $bulanan_total];
			}
			else if($i === 4) {
				$april_json = [
					'bulan' => "April",
					'total_harga_pengadaan' => $bulanan_total];
			}
			else if($i === 5) {
				$mei_json = [
					'bulan' => "Mei",
					'total_harga_pengadaan' => $bulanan_total];
			}
			else if($i === 6) {
				$juni_json = [
					'bulan' => "Juni",
					'total_harga_pengadaan' => $bulanan_total];
			}
			else if($i === 7) {
				$juli_json = [
					'bulan' => "Juli",
					'total_harga_pengadaan' => $bulanan_total];
			}
			else if($i === 8) {
				$agustus_json = [
					'bulan' => "Agustus",
					'total_harga_pengadaan' => $bulanan_total];
			}
			else if($i === 9) {
				$september_json = [
					'bulan' => "September",
					'total_harga_pengadaan' => $bulanan_total];
			}
			else if($i === 10) {
				$oktober_json = [
					'bulan' => "Oktober",
					'total_harga_pengadaan' => $bulanan_total];
			}
			else if($i === 11) {
				$november_json = [
					'bulan' => "November",
					'total_harga_pengadaan' => $bulanan_total];
			}
			else if($i === 12) {
				$desember_json = [
					'bulan' => "Desember",
					'total_harga_pengadaan' => $bulanan_total];
			}
		}
		return response()->json([
			$januari_json,
			$februari_json,
			$maret_json,
			$april_json,
			$mei_json,
			$juni_json,
			$juli_json,
			$agustus_json,
			$september_json,
			$oktober_json,
			$november_json,
			$desember_json
			]);
	}

	
	public function spare_terlaris() {
		$results = detail_trans_sparepart::
		join('trans_penjualan', 'detail_transsparepart.id_trans_penjualan', 'trans_penjualan.id')
					->whereMonth('trans_penjualan.created_at', '1')
					->where('trans_penjualan.status_transaksi', '=', 'sudah')
					->where('trans_penjualan.status_pembayaran', '=', 'sudah')
					->get();
					//->orderBy('jumlah_barang', 'desc');

		return response()->json($results, 200);
	}

	public function jumlah_jasa_perMotor() {
		$results = detail_trans_jasa::
		join('trans_penjualan', 'detail_transjasa.id_trans_penjualan', 'trans_penjualan.id')
		->join('kendaraans', 'detail_transjasa.id_kendaraan', 'kendaraans.id')
		->where('trans_penjualan.status_transaksi', '=', 'sudah')
		->where('trans_penjualan.status_pembayaran', '=', 'sudah')
		->where('kendaraans.id', '=', 1)
		->get();

		return response()->json($results, 200);
	}

	public function sisa_stok_bulanan() {
		$results = sparepart::
		orderBy('jumlah_stok_sparepart', 'asc')
		->get();

		return response()->json($results, 200);
	}

	public function tahunan_perCabang() {
		// $results = trans_penjualan::whereYear('created_at', $year)
		// 			->where('id_cabang', '=', $branch)
		// 			->get();

		// return response()->json($results, 200);

		$tahun2016 = trans_penjualan::
		join('cabangs', 'cabangs.id', '=', 'trans_penjualan.id_cabang')
		->select('trans_penjualan.grand_total','trans_penjualan.id_cabang')
		->where('trans_penjualan.status_transaksi', '=', 'sudah')
		->where('trans_penjualan.status_pembayaran', '=', 'sudah')
		->whereYear('trans_penjualan.tanggal_penjualan', '2016');
		
		$tahun2016_total = $tahun2016->sum('trans_penjualan.grand_total');
		$tahun2016_cabang = $tahun2016->get();
		// ->select('cabangs.alamat_cabang')

		$tahun2017 = trans_penjualan::
		join('cabangs', 'cabangs.id', '=', 'trans_penjualan.id_cabang')
		->select('trans_penjualan.grand_total','trans_penjualan.id_cabang')
		->where('trans_penjualan.status_transaksi', '=', 'sudah')
		->where('trans_penjualan.status_pembayaran', '=', 'sudah')
		->whereYear('trans_penjualan.tanggal_penjualan', '2017');
		
		$tahun2017_total = $tahun2017->sum('trans_penjualan.grand_total');
		$tahun2017_cabang = $tahun2017->select('cabangs.nama_cabang');

		$tahun2018 = trans_penjualan::
		join('cabangs', 'cabangs.id', '=', 'trans_penjualan.id_cabang')
		->select('trans_penjualan.grand_total','trans_penjualan.id_cabang')
		->where('trans_penjualan.status_transaksi', '=', 'sudah')
		->where('trans_penjualan.status_pembayaran', '=', 'sudah')
		->whereYear('trans_penjualan.tanggal_penjualan', '2018');
		
		$tahun2018_total = $tahun2018->sum('trans_penjualan.grand_total');
		$tahun2018_cabang = $tahun2018->select('cabangs.nama_cabang');

		$tahun2019 = trans_penjualan::
		join('cabangs', 'cabangs.id', '=', 'trans_penjualan.id_cabang')
		->select('trans_penjualan.grand_total','trans_penjualan.id_cabang')
		->where('trans_penjualan.status_transaksi', '=', 'sudah')
		->where('trans_penjualan.status_pembayaran', '=', 'sudah')
		->whereYear('trans_penjualan.tanggal_penjualan', '2019');
		
		$tahun2019_total = $tahun2019->sum('trans_penjualan.grand_total');
		$tahun2019_cabang = $tahun2019->select('cabangs.nama_cabang')->get();


		$tahun2016_json = [
			'tahun' => "2016",
			'cabang' => $tahun2016_cabang,
			'grand_total' => $tahun2016_total];

		$tahun2017_json = [
			'tahun' => "2017",
			'cabang' => $tahun2017_cabang,
			'grand_total' => $tahun2017_total];
			
		$tahun2018_json = [
			'tahun' => "2018",
			'cabang' => $tahun2018_cabang,
			'grand_total' => $tahun2018_total];

		$tahun2019_json = [
			'tahun' => "2019",
			'cabang' => $tahun2019_cabang,
			'grand_total' => $tahun2019_total];


			return response()->json([
				$tahun2016_json,
				$tahun2017_json,
				$tahun2018_json,
				$tahun2019_json,
				]);
	}
}
