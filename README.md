# PROJECT AKHIR DARI MATA KULIAH Back-end Web Development	

![demon-anime-girl-horn-glasses-katana-4k-wallpaper-uhdpaper com-837@3@a](https://github.com/MAhyarPratama/Comikku2/assets/147960017/a94d93ac-b355-4b43-9b22-35d6dcbd08ee)



#  MyComic

<img src="https://github.com/MAhyarPratama/Comikku2/assets/147960017/0d0adab4-4506-492a-b5a7-84dd2775c3e7" alt="Fox" width="150"> 

**Comikku2** adalah aplikasi web untuk mengelola koleksi komik. Aplikasi ini memungkinkan pengguna untuk melihat, menambah, mengedit, dan menghapus komik dari koleksi mereka. Proyek ini dibangun menggunakan PHP dan PDO untuk berinteraksi dengan database.

![License](https://img.shields.io/badge/license-MIT-blue.svg)
![Status](https://img.shields.io/badge/status-active-green.svg)


## Fitur


- 📚 Melihat Daftar Users
- 👥 Melihat Daftar Admin
- 📖 Melihat Daftar Comic
- ❌ Menghapus Pengguna
- ➕ Mendaftar Pengguna Baru
- 🔑 Login
- 🚪 Logout


## 🛠️ Langkah - Langkah
Disini Saya Menggunakan Postman, Jadi Untuk Semua Tolong Download Postman Terlebih dahulu.

[Link Download Postman](https://www.postman.com/downloads/)



- 📚 Melihat Daftar Users

Metode Yang digunakan adalah **GET** **http://localhost/Comikku2/api/users**

Maka Tampilannya Akan Seperti ini :

![Screenshot (700)](https://github.com/MAhyarPratama/Comikku2/assets/147960017/87704305-22a5-4ff4-a611-f73c945a9df2)



- 👥 Melihat Daftar Admin

Masih Sama Seperti, Melihat Daftar User. **GET**, EndPoint : "http://localhost/Comikku2/api/admin". hanya berbeda pada akhirannya saja

Maka Tampilannya Akan Seperti ini :

![Screenshot (701)](https://github.com/MAhyarPratama/Comikku2/assets/147960017/5630ee85-8f14-4055-9891-ea5f020bb8e7)



- 📖 Melihat Daftar Comic

Langkahnya Masih Sama Seperti Sebelumnya Menggunakan Metode **GET**, EndPointnya : "http://localhost/Comikku2/api/comics".

Maka Tampilannya Akan Seperti ini :

![Screenshot 2024-06-19 235554](https://github.com/MAhyarPratama/Comikku2/assets/147960017/ff960d69-1ca1-48bb-a403-3842892ca3c7)



- ❌ Menghapus Pengguna

Selanjutnya Untuk Menghapus Pengguna adalah menggunakan UserID dan Metodenya Adalah **DELETE** EndPointnya : "http://localhost/Comikku2/api/admin/users/{id}". "{id}" id yang dimaksud ialah UserID

⚠️ **Sebelum Anda Menggunakan EndPoint DELETE Users, Anda Harus Menggunakan EndPoint Login Menggunakan Login Dengan Akun ADMIN Terlebih Dahulu**

Jika Tidak Login (ADMIN) Terlebih Dahulu, Maka Tampilannya Akan Seperti ini :

![Screenshot 2024-06-20 235123](https://github.com/MAhyarPratama/Comikku2/assets/147960017/c7d615e2-b290-48d9-a59b-814bc3ddb269)


Dan Ini Adalah Menggunakan EndPoint Login (ADMIN) Terlebih Dahulu, Baru Bisa Menghapus Users Menggunakan UsersID :

![Screenshot 2024-06-20 234208](https://github.com/MAhyarPratama/Comikku2/assets/147960017/2372467b-74eb-497d-ab4f-9cf09e99c649)

📝 **Sebenarnya Users Itu Sudah Dihapus, Kalau Ingin Memastikan Berhasil Atau Tidaknya, Anda Bisa Menggunakan Endpoint Untuk Melihat Daftar Users Seperti Yang Diawal**



- ➕ Mendaftar Pengguna Baru

Selanjutnya Untuk Menambahkan Pengguna Adalah Menggunakan Metode **POST**, EndPointnya : "http://localhost/Comikku2/api/register".

Dengan Ada Penambahan Dibagian Body-RAW Seperti Gambar Dibawah Ini : 

![Screenshot 2024-06-20 233220](https://github.com/MAhyarPratama/Comikku2/assets/147960017/ad0209fc-7fad-4a38-a8ee-2bea7210ae09)

Sebagai Contoh Saya Memasukkan username dan passwordnya, Beserta Hasilnya :

![Screenshot 2024-06-20 233457](https://github.com/MAhyarPratama/Comikku2/assets/147960017/2c39f8a9-cda1-4425-8493-4a35f1e5cd0c)



- 🔑 Login

Login Kali Ini Menggunakan Metode **POST** Dengan EndPoint "http://localhost/Comikku2/api/login".

Untuk DIfitur Login Anda Perlu Menambahkan Dibagian Body-RAW, Seperti Gambar Dibawah Ini :

![Screenshot 2024-06-21 000627](https://github.com/MAhyarPratama/Comikku2/assets/147960017/23025a76-3d46-4143-a6f2-594f9e1a8c32)

📝 **Catatan** :

  1. Untuk Tau Username dan Password Anda Bisa Dicek Di EndPoint Daftar Users.
  2. Atau Juga Pada Saat Melalukan Mendaftarkan Pengguna Baru

Hasilnya :

![Screenshot 2024-06-21 000012](https://github.com/MAhyarPratama/Comikku2/assets/147960017/701e003e-80c6-4fe6-9519-4967cd7cca91)


- 🚪 Logout

Untuk Logout Menggunakan Metode **POST** Dengan EndPoint "http://localhost/Comikku2/api/logout"

Dengan Hasilnya :

![Screenshot 2024-06-21 000947](https://github.com/MAhyarPratama/Comikku2/assets/147960017/9a5743a3-8966-4b9b-9a72-ceb5cd4f070e)




**🏁 PENUTUP**

Terima Kasih Banyak Buat Bapak Dosen Pengajar Yaitu Bapak I NYOMAN RUDY HENDRAWAN, DiMata Kuliah BackEnd Web Development. Proyek Ini Adalah Hasil Kerja Keras Dan Dedikasi Yang Sangat Sungguh. Saya Sangat Senang Bisa Menyelesaikan Tugas Ini Dengan Kemampuan Saya, Dan Maaf Jika Ada Kekurang Pada Projek Akhir Ini. Saya Harap Bisa Ada Masukan Dari Semuanya 🙏.

📚 Selamat Mengelola Komik: Selamat Mengelola Koleksi Komik Anda Dan Semoga Pengalaman Anda Dengan Comikku2 Menyenangkan!

✨ Terima kasih,

<img src="https://github.com/MAhyarPratama/Comikku2/assets/147960017/0d0adab4-4506-492a-b5a7-84dd2775c3e7" alt="Fox" width="150"> 

(RYUU)

