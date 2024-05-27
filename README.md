# case-4-poi-mysql

diminta untuk membuat sebuah halaman manajemen data yang digunakan untuk mengelola data point-of-intereset (POI) yang disimpan di dalam sebuah tabel database MySQL. Data yang disimpan dalam tabel tersebut adalah informasi terkait POI yang dapat ditampilkan di dalam sebuah peta digital menggunakan Leaflet.js

Untuk setiap row data yang disimpan di dalam tabel, setidaknya mengandung
attribut:
1. Koordinat latitude POI
2. Koordinat longitude POI
3. Nama lokasi/POI
4. Deskripsi POI

Instruksi
Tugas Anda adalah, merancang tabel yang dibuat untuk database MySQL untuk menyimpan data POI tersebut. Membangun aplikasi web yang digunakan untuk mengelola (Create, Read, Update, dan Delete / CRUD) atas data dalam tabel tersebut, dengan ketentuan:

1. Tambahkan setidaknya 4 atribut lainnya untuk tabel tersebut.
2. Setiap anggota kelompok menyelesaikan satu proses CRUD (Create, Read, Update, atau Delete) sedemikian rupa sehingga seluruh proses CRUD tersebut terpenuhi secara lengkap.
3. Satu anggota kelompok menguraikan satu proses CRUD dalam laporan untuk kemudian digabungkan sebelum laporan case-study ini di-submit.
4. Untuk proses Create, dilakukan dengan mengeklik suatu titik di atas peta Leaflet, menggambar marker di atas peta, kemudian muncul pop-up dialog untuk mengisikan informasi POI ke dalam tabel database.
5. Untuk proses Read, dilakukan secara otomatis ketika halaman dibuka, dan menampilkan seluruh POI yang ada di dalam tabel ke dalam peta Leaflet.
6. Untuk proses Update, dilakukan dengan menggeser marker yang ada pada peta Leaflet, kemudian memunculkan pop-up dialog yang digunakan untuk mengubah informasi POI yang digeser tersebut.
7. Untuk proses Delete, dilakukan dengan mengeklik kanan mouse pada sebuah marker, memunculkan dialog konfirmasi (bukan Alert) dan menghapus data POI dalam tabel setelah pengguna mengonfirmasinya.
8. Seluruh komunikasi data client-server terkait CRUD menggunaan AJAX.

Kami dari Kelompok 10 dengan nama anggota Kelompok :

1. Fadhly Andriawan Kairupan_225150407111031
2. Keith Evangel Samuel_225150407111100
3. Natanael Isaac Pardamean Pardede_225150401111036
