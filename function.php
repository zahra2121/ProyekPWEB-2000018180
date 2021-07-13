<?php
	session_start();
	//membuat koneksi ke database
	$conn = mysqli_connect("localhost", "root", "", "stockproyek");

	//Menambah barang baru
	if(isset($_POST['addnewbarang'])){
		$namabarang = $_POST['namabarang'];
		$deskripsi = $_POST['deskripsi'];
		$stock = $_POST['stock'];

		$addtotable = mysqli_query($conn, "insert into labstock (namabarang, deskripsi, stock) values('$namabarang', '$deskripsi', '$stock')");
		if($addtotable){
			header('location:index.php');
		}
		else{
			echo "gagal";
			header('location:index.php');
		};
	};


	//Manambah barang masuk
	if(isset($_POST['barangmasuk'])){
		$barangnya = $_POST['barangnya'];
		$penerima = $_POST['penerima'];
		$qty = $_POST['qty'];

		$cekstocksekarang = mysqli_query($conn, "select * from labstock where idbarang='$barangnya'");
		$ambildata = mysqli_fetch_array($cekstocksekarang);

		$stocksekarang = $ambildata['stock'];
		$tambahkan = $stocksekarang+$qty;

		$addtomasuk = mysqli_query($conn, "insert into labmasuk (idbarang, keterangan, qty) values('$barangnya', '$penerima', '$qty')");
		$updatestockmasuk = mysqli_query($conn, "update labstock set stock='$tambahkan' where idbarang='$barangnya'");

		if($addtomasuk&&$updatestockmasuk){
			header('location:masuk.php');
		}
		else{
			echo "gagal";
			header('location:masuk.php');
		}
	}

	//Manambah barang keluar
	if(isset($_POST['addbarangkeluar'])){
		$barangnya = $_POST['barangnya'];
		$penerima = $_POST['penerima'];
		$qty = $_POST['qty'];

		$cekstocksekarang = mysqli_query($conn, "select * from labstock where idbarang='$barangnya'");
		$ambildata = mysqli_fetch_array($cekstocksekarang);

		$stocksekarang = $ambildata['stock'];

		if($stocksekarang >= $qty){
			//Jika barang cukup
			$kurangkan = $stocksekarang-$qty;
			$addtomasuk = mysqli_query($conn, "insert into labkeluar (idbarang, penerima, qty) values('$barangnya', '$penerima', '$qty')");
			$updatestockmasuk = mysqli_query($conn, "update labstock set stock='$kurangkan' where idbarang='$barangnya'");

			if($addtomasuk&&$updatestockmasuk){
				header('location:keluar.php');
			}
			else{
				echo "gagal";
				header('location:keluar.php');
			}
		}
		else{
			//Barang tidak cukup
			echo '
			<script>
				alert("Stock saat ini Tidak mencukupi, Proses Dibatalkan.");
				window.location.href="keluar.php";
			</script>
			';
		}
	}


	//Update barang (Menekan Tombol edit)
	if(isset($_POST['updatebarang'])){
		$idb = $_POST['idb'];
		$namabarang = $_POST['namabarang'];
		$deskripsi = $_POST['deskripsi'];
		$stock = $_POST['stock'];

		$update = mysqli_query($conn, "update labstock set namabarang='$namabarang', deskripsi='$deskripsi', stock='$stock' where idbarang='$idb'");
		if($update){
			header('location:index.php');
		}
		else{
			echo "gagal";
			header('location:index.php');
		}
	}

	//Delete barang dari stock
	if(isset($_POST['hapusbarang'])){
		$idb = $_POST['idb'];

		$hapus = mysqli_query($conn, "delete from labstock where idbarang='$idb'");
		if($hapus){
			header('location:index.php');
		}
		else{
			echo "gagal";
			header('location:index.php');
		}
	}

	//Mengubah data barang masuk
	if(isset($_POST['updatebarangmasuk'])){
		$idb = $_POST['idb'];
		$idm = $_POST['idm'];
		$keterangan = $_POST['keterangan'];
		$qty = $_POST['qty'];

		$lihatstock = mysqli_query($conn, "select * from labstock where idbarang='$idb'");
		$stocknya =  mysqli_fetch_array($lihatstock);
		$stockskrg = $stocknya['stock']; 

		$qtyskrg = mysqli_query($conn, "select * from labmasuk where iduser='$idm'");
		$qtynya = mysqli_fetch_array($qtyskrg);
		$qtyskrg = $qtynya['qty'];

		if($qty > $qtyskrg){
			$selisih = $qty-$qtyskrg;
			$kurangi = $stockskrg+$selisih;
			$kurangistocknya = mysqli_query($conn, "update labstock set stock='$kurangi' where idbarang='$idb'");
			$updatenya = mysqli_query($conn, "update labmasuk set qty='$qty', keterangan='$keterangan' where iduser='$idm'");

			if($kurangistocknya&&$updatenya){
				header('location:masuk.php');
			}
			else{
				echo "gagal";
				header('location:masuk.php');
			}
		}
		else{
			$selisih = $qtyskrg-$qty;
			$kurangi = $stockskrg-$selisih;
			$kurangistocknya = mysqli_query($conn, "update labstock set stock='$kurangi' where idbarang='$idb'");
			$updatenya = mysqli_query($conn, "update labmasuk set qty='$qty', keterangan='$keterangan' where iduser='$idm'");

			if($kurangistocknya&&$updatenya){
				header('location:masuk.php');
			}
			else{
				echo "gagal";
				header('location:masuk.php');
			}
		}
		
	}


	//Hapus barang masuk
	if(isset($_POST['hapusbarangmasuk'])){
		$idb = $_POST['idb'];
		$qty = $_POST['kty'];
		$idm = $_POST['idm'];

		$getdatastock = mysqli_query($conn, "select * from labstock where idbarang='$idb'");
		$data = mysqli_fetch_array($getdatastock);
		$stok = $data['stock'];

		$hasilhapus = $stok-$qty;

		$updatemasuk = mysqli_query($conn, "update labstock set stock='$hasilhapus' where idbarang='$idb'");
		$hapusdatamasuk = mysqli_query($conn, "delete from labmasuk where iduser='$idm'");

		if($updatemasuk&&$hapusdatamasuk){
			header('location:masuk.php');
		}
		else{
			echo "gagal";
			header('location:masuk.php');
		}
	}


	//Mengubah data barang keluar
	if(isset($_POST['updatebarangkeluar'])){
		$idb = $_POST['idb'];
		$idk = $_POST['idk'];
		$penerima = $_POST['penerima'];
		$qty = $_POST['qty'];

		$lihatstock = mysqli_query($conn, "select * from labstock where idbarang='$idb'");
		$stocknya =  mysqli_fetch_array($lihatstock);
		$stockskrg = $stocknya['stock']; 

		$qtyskrg = mysqli_query($conn, "select * from labkeluar where idkeluar='$idk'");
		$qtynya = mysqli_fetch_array($qtyskrg);
		$qtyskrg = $qtynya['qty'];

		if($qty>$qtyskrg){
			$selisih = $qty-$qtyskrg;
			$kurangi = $stockskrg-$selisih;
			$kurangistocknya = mysqli_query($conn, "update labstock set stock='$kurangi' where idbarang='$idb'");
			$updatenya = mysqli_query($conn, "update labkeluar set qty='$qty', penerima='$penerima' where idkeluar='$idk'");

			if($kurangistocknya&&$updatenya){
				header('location:keluar.php');
			}
			else{
				echo "gagal";
				header('location:keluar.php');
			}
		}
		else{
			$selisih = $qtyskrg-$qty;
			$kurangi = $stockskrg+$selisih;
			$kurangistocknya = mysqli_query($conn, "update labstock set stock='$kurangi' where idbarang='$idb'");
			$updatenya = mysqli_query($conn, "update labkeluar set qty='$qty', penerima='$penerima' where idkeluar='$idk'");

			if($kurangistocknya&&$updatenya){
				header('location:keluar.php');
			}
			else{
				echo "gagal";
				header('location:keluar.php');
			}
		}
		
	}


	//Hapus barang keluar
	if(isset($_POST['hapusbarangkeluar'])){
		$idb = $_POST['idb'];
		$qty = $_POST['kty'];
		$idk = $_POST['idk'];
	
		$getdatastock = mysqli_query($conn, "select * from labstock where idbarang='$idb'");
		$data = mysqli_fetch_array($getdatastock);
		$stok = $data['stock'];
	
		$selisih = $stok+$qty;
	
		$update = mysqli_query($conn, "update labstock set stock='$selisih' where idbarang='$idb'");
		$hapusdata = mysqli_query($conn, "delete from labkeluar where idkeluar='$idk'");
	
		if($update&&$hapusdata){
			header('location:keluar.php');
		}
		else{
			echo "gagal";
			header('location:keluar.php');
		}
	}

	//Menambah Admin Baru
	if(isset($_POST['addnewadmin'])){
		$email = $_POST['email'];
		$password = $_POST['password'];

		$addadmin = mysqli_query($conn, "insert into llogin (email, password) values('$email', '$password')");
		if($addadmin){
			header('location:admin.php');
		}
		else{
			echo "gagal";
			header('location:admin.php');
		};
	};

	//edit data admin
	if(isset($_POST['updateadmin'])){
		$emailbaru = $_POST['emailbaru'];
		$passwordbaru = $_POST['passwordbaru'];
		$idnya = $_POST['id'];

		$adminupdate = mysqli_query($conn, "update llogin set email='$emailbaru', password='$passwordbaru' where iduser='$idnya'");
		if($adminupdate){
			header('location:admin.php');
		}
		else{
			echo "gagal";
			header('location:admin.php');
		};
	}

	//delete admin
	if(isset($_POST['hapusadmin'])){
		$idnya = $_POST['id'];

		$adminhapus = mysqli_query($conn, "delete from llogin where iduser='$idnya'");
		if($adminhapus){
			header('location:admin.php');
		}
		else{
			echo "gagal";
			header('location:admin.php');
		};
	}


?>