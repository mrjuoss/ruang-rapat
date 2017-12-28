# PROBLEM
Aplikasi yang dapat mencatat
1. Penggunaan Ruang Rapat terjadwal dan termonitor secara online
2. Jumlah ruang Rapat dengan kapasitas yang berbeda



# SOLUTION
Sistem Informasi Pemesanan Ruang Rapat

# PENGGUNA
Internal Biro Kepegawaian
Eksternal Biro Kepegawaian

# TODO
1. Master Ruang Rapat
- id (int)
- nama_ruang (varchar)
- lokasi_ruang (varchar)
- kapasitas (int)

2. Master Jadwal
- id (int)
- id_ruang (int)
- id_pengguna (int)
- tgl_usul (Date)
- tgl_mulai (DateTime)
- tgl_selesai (DateTime) // Default + 2
- judul_rapat (varchar)
- deskripsi_rapat (text)
- pimpinan_rapat (varchar)
- peserta_rapat (text)
- kontak_person (varchar)
- file_permohonan (varchar)
- status (0,1)

3. Master User
- id (int)
- username (varchar)
- password (varchar)
- nama_lengkap (varchar)
- unit_kerja (varchar)
- akses (0,1,2) // 0 = Admin, 1 = Operator, 2 = Pengguna
