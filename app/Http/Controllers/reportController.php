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
		$results = trans_penjualan::where('status_transaksi', '=', 'sudah')
					->where('status_pembayaran', '=', 'sudah')
					->get();

		$januari = trans_penjualan::where('status_transaksi', '=', 'sudah')
			->where('status_pembayaran', '=', 'sudah')
			->whereMonth('created_at', '1')
			->get();

		$februari = trans_penjualan::where('status_transaksi', '=', 'sudah')
			->where('status_pembayaran', '=', 'sudah')
			->whereMonth('created_at', '2')
			->get();

		$maret = trans_penjualan::where('status_transaksi', '=', 'sudah')
			->where('status_pembayaran', '=', 'sudah')
			->whereMonth('created_at', '3')
			->get();

		$april = trans_penjualan::where('status_transaksi', '=', 'sudah')
			->where('status_pembayaran', '=', 'sudah')
			->whereMonth('created_at', '4')
			->get();

		$mei = trans_penjualan::where('status_transaksi', '=', 'sudah')
			->where('status_pembayaran', '=', 'sudah')
			->whereMonth('created_at', '5')
			->get();

		$juni = trans_penjualan::where('status_transaksi', '=', 'sudah')
			->where('status_pembayaran', '=', 'sudah')
			->whereMonth('created_at', '6')
			->get();

		$juli = trans_penjualan::where('status_transaksi', '=', 'sudah')
			->where('status_pembayaran', '=', 'sudah')
			->whereMonth('created_at', '7')
			->get();

		$agustus = trans_penjualan::where('status_transaksi', '=', 'sudah')
			->where('status_pembayaran', '=', 'sudah')
			->whereMonth('created_at', '8')
			->get();

		$september = trans_penjualan::where('status_transaksi', '=', 'sudah')
			->where('status_pembayaran', '=', 'sudah')
			->whereMonth('created_at', '9')
			->get();

		$oktober = trans_penjualan::where('status_transaksi', '=', 'sudah')
			->where('status_pembayaran', '=', 'sudah')
			->whereMonth('created_at', '10')
			->get();

		$november = trans_penjualan::where('status_transaksi', '=', 'sudah')
			->where('status_pembayaran', '=', 'sudah')
			->whereMonth('created_at', '11')
			->get();

		$desember = trans_penjualan::where('status_transaksi', '=', 'sudah')
			->where('status_pembayaran', '=', 'sudah')
			->whereMonth('created_at', '12')
			->get();
		
		return response()
		->json([
			"Januari" => $januari,
			"Februari" => $februari,
			"Maret" => $maret,
			"April" => $april,
			"Mei" => $mei,
			"Juni" => $juni,
			"Juli" => $juli,
			"Agustus" => $agustus,
			"September" => $september,
			"Oktober" => $oktober,
			"November" => $november,
			"Desember" => $desember
		], 200);
	}

	// public function pendapatan_bul($month) {
	//     $results = trans_penjualan::where('status_transaksi', '=', 'sudah')
	//                 ->where('status_pembayaran', '=', 'sudah')
	//                 ->whereMonth('created_at', $month)->get();

	//     return response()->json($results, 200);
	// }

	public function pengeluaran_bul($month) {
		$results = trans_pengadaan::whereMonth('created_at', $month)->get();

		return response()->json($results, 200);
	}

	public function spare_terlaris($month) {
		$results = detail_trans_sparepart::
		join('trans_penjualan', 'detail_transsparepart.id_trans_penjualan', 'trans_penjualan.id')
					->whereMonth('trans_penjualan.created_at', $month)
					->where('trans_penjualan.status_transaksi', '=', 'sudah')
					->where('trans_penjualan.status_pembayaran', '=', 'sudah')
					->get();
					//->orderBy('jumlah_barang', 'desc');

		return response()->json($results, 200);
	}

	public function jumlah_jasa_perMotor($id_motor) {
		$results = detail_trans_jasa::
		join('trans_penjualan', 'detail_transjasa.id_trans_penjualan', 'trans_penjualan.id')
		->join('kendaraans', 'detail_transjasa.id_kendaraan', 'kendaraans.id')
		->where('trans_penjualan.status_transaksi', '=', 'sudah')
		->where('trans_penjualan.status_pembayaran', '=', 'sudah')
		->where('kendaraans', '=', $id_motor)
		->get();

		return response()->json($results, 200);
	}

	public function sisa_stok_bulanan() {
		$results = sparepart::
		orderBy('jumlah_stok_sparepart', 'asc')
		->get();

		return response()->json($results, 200);
	}

	public function tahunan_perCabang($branch, $year) {
		$results = trans_penjualan::whereYear('created_at', $year)
					->where('id_cabang', '=', $branch)
					->get();

		return response()->json($results, 200);
	}
}
