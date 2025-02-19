import java.util.ArrayList;
import java.util.Scanner;

// Kelas utama Main yang berfungsi sebagai entry point program
class Main{
    public static void main(String[] args) {
        // Membuat objek Scanner untuk membaca input dari pengguna
        Scanner scanner = new Scanner(System.in);
        
        // Membuat ArrayList untuk menyimpan daftar barang di Petshop
        ArrayList<Petshop> v = new ArrayList<>();

        // Menambahkan beberapa data awal ke dalam daftar
        v.add(new Petshop("1", "Wishkas", "Makanan", "5000"));
        v.add(new Petshop("2", "SikatUcing", "AlatPembersih", "10000"));
        
        // Menambahkan data menggunakan setter
        Petshop pasir = new Petshop();
        pasir.setId("3");
        pasir.setNama("PasirUcing");
        pasir.setKategori("AlatPipis"); 
        pasir.setHarga("12000");
        v.add(pasir);

        String pilih;
        
        // Loop utama program yang menampilkan menu dan menerima input dari pengguna
        do {
            // Menampilkan menu pilihan
            System.out.println("=====================================");
            System.out.println("|        ^^ MENU PETSHOP ^^         |");
            System.out.println("=====================================");
            System.out.println("| [1] Tampilkan Data yang Tersedia  |");
            System.out.println("| [2] Tambahkan Data Baru           |");
            System.out.println("| [3] Ubah Data yang Sudah Ada      |");
            System.out.println("| [4] Hapus Data yang Diinginkan    |");
            System.out.println("| [5] Cari Data Berdasarkan Nama    |");
            System.out.println("| [6] Keluar                        |");
            System.out.println("=====================================");
            System.out.print(">> Masukkan pilihan Anda: ");
            pilih = scanner.next();

            // Menjalankan fungsi sesuai dengan pilihan pengguna
            switch (pilih) {
                case "1":
                    // Menampilkan semua data yang tersedia
                    System.out.println("-------------------------------------");
                    System.out.println("           DATA PETSHOP              ");
                    System.out.println("-------------------------------------");
                    for (Petshop item : v) {
                        System.out.println(item.getId() + " " + item.getNama() + " " + item.getKategori() + " " + item.getHarga());
                    }
                    System.out.println();
                    break;
                case "2":
                    // Menambahkan data baru ke dalam daftar
                    System.out.print("Masukkan Id: ");
                    String id = scanner.next();
                    System.out.print("Masukkan Nama: ");
                    String nama = scanner.next();
                    System.out.print("Masukkan Kategori: ");
                    String kategori = scanner.next();
                    System.out.print("Masukkan Harga: ");
                    String harga = scanner.next();
                    v.add(new Petshop(id, nama, kategori, harga));
                    System.out.println("DATA BERHASIL DITAMBAHKAN!\n");
                    break;
                case "3":
                    // Mengubah data yang sudah ada berdasarkan Id
                    System.out.print("Masukkan Id Data yang akan diubah: ");
                    id = scanner.next();
                    for (Petshop item : v) {
                        if (item.getId().equals(id)) {
                            System.out.print("Masukkan Nama: ");
                            item.setNama(scanner.next());
                            System.out.print("Masukkan Kategori: ");
                            item.setKategori(scanner.next());
                            System.out.print("Masukkan Harga: ");
                            item.setHarga(scanner.next());
                            System.out.println("DATA BERHASIL DIUBAH!\n");
                            break;
                        }
                    }
                    break;
                case "4":
                    // Menghapus data berdasarkan Id
                    System.out.print("Masukkan Id Data yang akan dihapus: ");
                    id = scanner.next();
                    v.removeIf(item -> item.getId().equals(id));
                    System.out.println("DATA BERHASIL DIHAPUS!\n");
                    break;
                case "5":
                    // Mencari data berdasarkan Nama
                    System.out.print("Masukkan Nama Data yang akan dicari: ");
                    nama = scanner.next();
                    boolean found = false;
                    for (Petshop item : v) {
                        if (item.getNama().equals(nama)) {
                            System.out.println("DATA BERHASIL DITEMUKAN!\n");
                            System.out.println(item.getId() + " " + item.getNama() + " " + item.getKategori() + " " + item.getHarga());
                            found = true;
                            break;
                        }
                    }
                    if (!found) {
                        System.out.println("DATA TIDAK DITEMUKAN!\n");
                    }
                    break;
                case "6":
                    // Keluar dari program
                    System.out.println("DPBO MENYENANGKAN^^");
                    break;
                default:
                    // Menampilkan pesan jika input tidak valid
                    System.out.println("Input pilihan tidak sesuai!");
            }
        } while (!pilih.equals("6")); // Loop akan berjalan sampai pengguna memilih keluar

        // Menutup Scanner untuk mencegah kebocoran sumber daya
        scanner.close();
    }
}