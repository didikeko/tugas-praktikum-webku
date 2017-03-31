<?php
    //include('koneksi.php) berfungsi untuk mengkoneksikan kodingan dengan localhost
    include('koneksi.php');

    //menginisiasi variabel-variabel yang dikirimkan dari form-->input name
    //fix problem : undefined index...
    if( isset($_POST['username'])  &&
        isset($_POST['password'])
      )
    {
        //mendapatkan data dari masuk.php dan memasukkannya ke variabel
        $namapengguna   = $_POST['username'];
        $katasandi      = $_POST['password'];

    }else{

        //otomatis mengalihkan ke halaman masuk.php jika terjadi undefined index
        header("location:masuk.php");

    }

    if  (
        empty($namapengguna) || //jika username kosong
        empty($katasandi)       //jika password kosong
        )
    {

        //pernyataan yang keluar jika salah satu atau beberapa kemungkinan di atas terjadi
        echo "ada kolom yang belum diisi <a href='index.php'>Kembali ke halaman masuk sistem</a>";

    }else{

        //mengambil informasi dari nama tabel "login" pada kolom "namaPengguna"
        $ambilDataSql     = mysql_query("SELECT * FROM login WHERE username = '$namapengguna'");

        //mengambil informasi dari seluruh kolom namaPengguna
        $cek_namapengguna = mysql_num_rows($ambilDataSql);
        
        //mengecek ketersediaan identitas
        if($cek_namapengguna == 1){//jika nama pengguna sudah terdaftar
            
            //mengecek kecocokan kata sandi
            $ambil_data = mysql_fetch_assoc($ambilDataSql);//mengambil data berupa array
            $cek_password   = $ambil_data["pass"];//mengambil data array pada item "pass"
            
            if($katasandi == $cek_password){//jika kata sandi cocok dengan username database
               
                //memulai session
                session_start();

                //membuat variabel sesi "pengguna" dengan value $namapengguna
                $_SESSION['pengguna'] = $namapengguna;
				
				if($ambil_data["privilage"]==1)
				{
                //pindahkan user ke halaman index.php
					header("location:home_admin.php");
				}
				else
				{
					header("location:home_user.php");
				}
            }else{
                
                //jika kata sandi tidak cocok
                echo "kata sandi tidak cocok, ulangi kembali <a href='index.php'>Masuk</a>";
            }
        }else{

            //memberitahukan bahwa nama pengguna belum terdaftar
            echo "nama pengguna belum terdaftar, silahkan mendaftar dulu <a href='register.php'>Daftar</a>";

        }
    }
?>