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

Selanjutnya Untuk Menghapus Pengguna adalah menggunakan UserID dan Metodenya Adalah **DELETE** EndPointnya : "http://localhost/Comikku2/api/admin/users/{id}".

Maka Tampilannya Akan Seperti ini :



- ➕ Mendaftar Pengguna Baru

Selanjutnya Untuk Menambahkan Pengguna Adalah Menggunakan Metode **POST**, EndPointnya : "http://localhost/Comikku2/api/register".

Dengan Ada Penambahan Dibagian Body-RAW Seperti Gambar Dibawah Ini : 

![Screenshot 2024-06-20 233220](https://github.com/MAhyarPratama/Comikku2/assets/147960017/ad0209fc-7fad-4a38-a8ee-2bea7210ae09)

Sebagai Contoh Saya Memasukkan username dan passwordnya, Beserta Hasilnya :

![Screenshot 2024-06-20 233457](https://github.com/MAhyarPratama/Comikku2/assets/147960017/2c39f8a9-cda1-4425-8493-4a35f1e5cd0c)
