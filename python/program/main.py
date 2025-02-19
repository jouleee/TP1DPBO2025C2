# Mengimpor kelas Petshop dari modul Petshop
from Petshop import Petshop

# Inisialisasi list untuk menyimpan objek Petshop
l = []

# Menambahkan beberapa data awal ke dalam list
l.append(Petshop("1", "Wishkas", "Makanan", "5000"))
l.append(Petshop("2", "SikatUcing", "AlatPembersih", "10000"))

# Menambahkan data menggunakan metode setter
pasir = Petshop()
pasir.set_id("3")
pasir.set_nama("PasirUcing")
pasir.set_kategori("AlatPipis")
pasir.set_harga("12000")
l.append(pasir)

# Variabel untuk menyimpan pilihan pengguna
pilih = ""

# Loop utama untuk menampilkan menu dan menerima input pengguna
while pilih != "6":
    # Menampilkan menu utama
    print("=====================================")
    print("|        ^^ MENU PETSHOP ^^         |")
    print("=====================================")
    print("| [1] Tampilkan Data yang Tersedia  |")
    print("| [2] Tambahkan Data Baru           |")
    print("| [3] Ubah Data yang Sudah Ada      |")
    print("| [4] Hapus Data yang Diinginkan    |")
    print("| [5] Cari Data Berdasarkan Nama    |")
    print("| [6] Keluar                        |")
    print("=====================================")
    
    # Menerima input pilihan pengguna
    pilih = input(">> Masukkan pilihan Anda: ")

    if pilih == "1":
        # Menampilkan semua data yang tersedia
        print("-------------------------------------")
        print("           DATA PETSHOP              ")
        print("-------------------------------------")
        for item in l:
            print(item.get_id(), item.get_nama(), item.get_kategori(), item.get_harga())
        print()
    
    elif pilih == "2":
        # Menambahkan data baru
        id = input("Masukkan Id: ")
        nama = input("Masukkan Nama: ")
        kategori = input("Masukkan Kategori: ")
        harga = input("Masukkan Harga: ")
        l.append(Petshop(id, nama, kategori, harga))
        print("-------------------------------------")
        print("      DATA BERHASIL DITAMBAHKAN!     ")
        print("-------------------------------------\n")
    
    elif pilih == "3":
        # Mengubah data berdasarkan ID
        id = input("Masukkan Id Data yang akan diubah: ")
        for item in l:
            if item.get_id() == id:
                nama = input("Masukkan Nama: ")
                kategori = input("Masukkan Kategori: ")
                harga = input("Masukkan Harga: ")
                item.set_nama(nama)
                item.set_kategori(kategori)
                item.set_harga(harga)
                print("-------------------------------------")
                print("         DATA BERHASIL DIUBAH!       ")
                print("-------------------------------------\n")
                break  # Keluar dari loop setelah data ditemukan dan diubah
    
    elif pilih == "4":
        # Menghapus data berdasarkan ID
        id = input("Masukkan Id Data yang akan dihapus: ")
        l = [item for item in l if item.get_id() != id]  # Membuat list baru tanpa data yang dihapus
        print("-------------------------------------")
        print("        DATA BERHASIL DIHAPUS!       ")
        print("-------------------------------------\n")
    
    elif pilih == "5":
        # Mencari data berdasarkan nama
        nama = input("Masukkan Nama Data yang akan dicari: ")
        found = False
        for item in l:
            if item.get_nama() == nama:
                print("-------------------------------------")
                print("       DATA BERHASIL DITEMUKAN!      ")
                print("-------------------------------------\n")
                print(item.get_id(), item.get_nama(), item.get_kategori(), item.get_harga())
                found = True
                break  # Keluar dari loop setelah data ditemukan
        if not found:
            print("-------------------------------------")
            print("    DATA TIDAK BERHASIL DITEMUKAN!   ")
            print("-------------------------------------\n")
    
    elif pilih == "6":
        # Keluar dari program
        print("DPBO MENYENANGKAN^^")
        break
    
    else:
        # Menampilkan pesan jika input tidak valid
        print("Input pilihan tidak sesuai!")