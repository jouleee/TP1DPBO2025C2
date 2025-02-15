#include <bits/stdc++.h> // Mengimpor semua library standar
#include "Petshop.cpp" // Mengimpor file header kelas Petshop

using namespace std;

int main(){
    vector<Petshop> v; // Vector untuk menyimpan objek petshop

    // Inisialisasi beberapa objek Petshop dengan constructor
    Petshop WishkasKecil("1", "Wishkas", "Makanan", "5000");
    Petshop Brush("2", "SikatUcing", "AlatPembersih", "10000");

    // Inisialisasi objek lain menggunakan setter
    Petshop Pasir;
    Pasir.set_id("3");
    Pasir.set_nama("PasirUcing");
    Pasir.set_kategori("AlatPipis");
    Pasir.set_harga("12000");
    
    // Memasukkan objek-objek tersebut ke dalam vector
    v.push_back(WishkasKecil);
    v.push_back(Brush);
    v.push_back(Pasir);
    
    // Variabel tambahan untuk operasi menu
    int pilih, mark = 0, idx = 0;
    string id, nama, kategori, harga;
    Petshop temp; // Objek sementara untuk menampung input baru

    // Perulangan utama yang akan terus berjalan hingga user memilih keluar
    do{
        // Menampilkan menu utama program
        cout << "=====================================" << endl;
        cout << "|        ^^ MENU PETSHOP ^^         |" << endl;
        cout << "=====================================" << endl;
        cout << "| [1] Tampilkan Data yang Tersedia  |" << endl;
        cout << "| [2] Tambahkan Data Baru           |" << endl;
        cout << "| [3] Ubah Data yang Sudah Ada      |" << endl;
        cout << "| [4] Hapus Data yang Diinginkan    |" << endl;
        cout << "| [5] Cari Data Berdasarkan Nama    |" << endl;
        cout << "| [6] Keluar                        |" << endl;
        cout << "=====================================" << endl;
        cout << ">> Masukkan pilihan Anda: ";
        cin >> pilih;

        // Menampilkan seluruh data petshop yang tersimpan dalam vector
        if(pilih == 1){
            cout << "-------------------------------------" << endl;
            cout << "           DATA PETSHOP              " << endl;
            cout << "-------------------------------------" << endl;
            for(int i = 0; i < v.size(); i++){
                cout << v[i].get_id()  << " " << v[i].get_nama() << " " << v[i].get_kategori() << 
                " " << v[i].get_harga() << endl;
            }
            cout << endl;
        }
        // Menambahkan data baru ke dalam vector
        else if(pilih == 2){
            system("cls");
            cout << "Masukkan Id : ";
            cin >> id;
            cout << "Masukkan Nama : ";
            cin >> nama;
            cout << "Masukkan Kategori : ";
            cin >> kategori;
            cout << "Masukkan Harga : ";
            cin >> harga;

            // Mengisi objek sementara dengan input user
            temp.set_id(id);
            temp.set_nama(nama);
            temp.set_kategori(kategori);
            temp.set_harga(harga);

            // Menyimpan data ke dalam vector
            v.push_back(temp);
            cout << "-------------------------------------" << endl;
            cout << "      DATA BERHASIL DITAMBAHKAN!     " << endl;
            cout << "-------------------------------------" << endl << endl;
        }
        // Mengubah data yang sudah ada berdasarkan ID
        else if(pilih == 3){
            system("cls");
            cout << "Masukkan Id Data yang akan diubah : ";
            cin >> id;

            // Mencari data dengan ID yang sesuai
            for(int i = 0; i < v.size(); i++){
                if(v[i].get_id() == id){
                    mark = 1;
                    idx = i;
                }
            }

            // Jika data ditemukan, lakukan perubahan
            if(mark == 1){
                cout << "Masukkan Nama : ";
                cin >> nama;
                cout << "Masukkan Kategori : ";
                cin >> kategori;
                cout << "Masukkan Harga : ";
                cin >> harga;

                // Memperbarui data di dalam vector
                v[idx].set_nama(nama);
                v[idx].set_kategori(kategori);
                v[idx].set_harga(harga);

                cout << "-------------------------------------" << endl;
                cout << "         DATA BERHASIL DIUBAH!       " << endl;
                cout << "-------------------------------------" << endl << endl;

                mark = 0;
            }
        }
        // Menghapus data berdasarkan ID
        else if(pilih == 4){
            system("cls");
            cout << "Masukkan Id Data yang akan dihapus : ";
            cin >> id;

            // Mencari data yang cocok dengan ID yang diberikan
            for(int i = 0; i < v.size(); i++){
                if(v[i].get_id() == id){
                    mark = 1;
                    idx = i;
                }
            }

            // Jika data ditemukan, hapus dari vector
            if(mark == 1){
                v.erase(v.begin() + idx);
                cout << "-------------------------------------" << endl;
                cout << "        DATA BERHASIL DIHAPUS!       " << endl;
                cout << "-------------------------------------" << endl << endl;
                mark = 0;
            }
        }
        // Mencari data berdasarkan nama
        else if(pilih == 5){
            system("cls");
            cout << "Masukkan Nama Data yang akan dicari : ";
            cin >> nama;

            // Mencari data yang cocok dengan nama yang diberikan
            for(int i = 0; i < v.size(); i++){
                if(v[i].get_nama() == nama){
                    mark = 1;
                    idx = i;
                }
            }

            // Jika data ditemukan, tampilkan informasi
            if(mark == 1){
                cout << "-------------------------------------" << endl;
                cout << "       DATA BERHASIL DITEMUKAN!      " << endl;
                cout << "-------------------------------------" << endl << endl;

                cout << v[idx].get_id()  << " " << v[idx].get_nama() << " " << v[idx].get_kategori() << 
                " " << v[idx].get_harga() << endl << endl;  
                mark = 0;
            }
            // Jika tidak ditemukan, beri notifikasi
            else{
                cout << "-------------------------------------" << endl;
                cout << "    DATA TIDAK BERHASIL DITEMUKAN!   " << endl;
                cout << "-------------------------------------" << endl << endl;
            }
        }
        // Keluar dari program
        else if(pilih == 6){
            system("cls");
            cout << "DPBO MENYENANGKAN^^" << endl;
        }
        // Jika input tidak valid, beri peringatan
        else{
            cout << "Input pilihan tidak sesuai!" << endl;
        }
    }while(pilih != 6); // Perulangan akan terus berjalan sampai user memilih keluar
}