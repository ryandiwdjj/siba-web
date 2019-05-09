Transaksi Penjualan
1. untuk status pembayaran dan status pengerjaan pilihannya antara "sudah" dan "belum" (kecil semua)

Report
1. pengerjaan report semua di reportController
2. report bagian pendapatan bulanan sudah diupdate.
formatnya setiap nama bulan jadi parent dari JSON nya, nanti child nya itu setiap transaksi 
di bulan tersebut


		$februari = $total
		->whereMonth('trans_penjualan.tanggal_penjualan', '2');
		
		$februari_grand = $februari->sum('grand_total');
		$februari_jasa = $februari->sum('total_harga_jasa');
		$februari_spare = $februari->sum('total_harga_spare');

		$maret = $total
		->whereMonth('trans_penjualan.tanggal_penjualan', '3');
		
		$maret_grand = $maret->sum('grand_total');
		$maret_jasa = $maret->sum('total_harga_jasa');
		$maret_spare = $maret->sum('total_harga_spare');

		$april = $total
		->whereMonth('trans_penjualan.tanggal_penjualan', '4');
		
		$april_grand = $april->sum('grand_total');
		$april_jasa = $april->sum('total_harga_jasa');
		$april_spare = $april->sum('total_harga_spare');

		$mei = $total
		->whereMonth('trans_penjualan.tanggal_penjualan', '5');
		
		$mei_grand = $mei->sum('grand_total');
		$mei_jasa = $mei->sum('total_harga_jasa');
		$mei_spare = $mei->sum('total_harga_spare');

		$juni = $total
		->whereMonth('trans_penjualan.tanggal_penjualan', '6');
		
		$juni_grand = $juni->sum('grand_total');
		$juni_jasa = $juni->sum('total_harga_jasa');
		$juni_spare = $juni->sum('total_harga_spare');

		$juli = $total
		->whereMonth('trans_penjualan.tanggal_penjualan', '7');
		
		$juli_grand = $juli->sum('grand_total');
		$juli_jasa = $juli->sum('total_harga_jasa');
		$juli_spare = $juli->sum('total_harga_spare');

		$agustus = $total
		->whereMonth('trans_penjualan.tanggal_penjualan', '8');
		
		$agustus_grand = $agustus->sum('grand_total');
		$agustus_jasa = $agustus->sum('total_harga_jasa');
		$agustus_spare = $agustus->sum('total_harga_spare');

		$september = $total
		->whereMonth('trans_penjualan.tanggal_penjualan', '9');
		
		$september_grand = $september->sum('grand_total');
		$september_jasa = $september->sum('total_harga_jasa');
		$september_spare = $september->sum('total_harga_spare');

		$oktober = $total
		->whereMonth('trans_penjualan.tanggal_penjualan', '10');
		
		$oktober_grand = $oktober->sum('grand_total');
		$oktober_jasa = $oktober->sum('total_harga_jasa');
		$oktober_spare = $oktober->sum('total_harga_spare');

		$november = $total
		->whereMonth('trans_penjualan.tanggal_penjualan', '11');
		
		$november_grand = $november->sum('grand_total');
		$november_jasa = $november->sum('total_harga_jasa');
		$november_spare = $november->sum('total_harga_spare');

		$desember = $total
		->whereMonth('trans_penjualan.tanggal_penjualan', '12');
		
		$desember_grand = $desember->sum('grand_total');
		$desember_jasa = $desember->sum('total_harga_jasa');
		$desember_spare = $desember->sum('total_harga_spare');

		$januari_json = [
			"bulan" => "januari",
			"grand_total" => $januari_grand, 
			"total_jasa" => $januari_jasa, 
			"total_spare" => $januari_spare];

		$februari_json = [
			"bulan" => "februari",
			"grand_total" => $februari_grand, 
			"total_jasa" => $februari_jasa, 
			"total_spare" => $februari_spare];
			
		$maret_json = [
			"bulan" => "maret",
			"grand_total" => $maret_grand, 
			"total_jasa" => $maret_jasa, 
			"total_spare" => $maret_spare];

		$april_json = [
			"bulan" => "april",
			"grand_total" => $april_grand, 
			"total_jasa" => $april_jasa, 
			"total_spare" => $april_spare];

		$mei_json = [
			"bulan" => "mei",
			"grand_total" => $mei_grand, 
			"total_jasa" => $mei_jasa, 
			"total_spare" => $mei_spare];

		$juni_json = [
			"bulan" => "juni",
			"grand_total" => $juni_grand, 
			"total_jasa" => $juni_jasa, 
			"total_spare" => $juni_spare];
			
		$juli_json = [
			"bulan" => "juli",
			"grand_total" => $juli_grand, 
			"total_jasa" => $juli_jasa, 
			"total_spare" => $juli_spare];
		$agustus_json = [
			"bulan" => "agustus",
			"grand_total" => $agustus_grand, 
			"total_jasa" => $agustus_jasa, 
			"total_spare" => $agustus_spare];

		$september_json = [
			"bulan" => "september",
			"grand_total" => $september_grand, 
			"total_jasa" => $september_jasa, 
			"total_spare" => $september_spare];
			
		$oktober_json = [
			"bulan" => "oktober",
			"grand_total" => $oktober_grand, 
			"total_jasa" => $oktober_jasa, 
			"total_spare" => $oktober_spare];

		$november_json = [
			"bulan" => "november",
			"grand_total" => $november_grand, 
			"total_jasa" => $november_jasa, 
			"total_spare" => $november_spare];
