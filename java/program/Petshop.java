// Kelas Petshop yang merepresentasikan entitas barang di petshop
class Petshop {
    private String id;        // ID unik dari barang
    private String nama;      // Nama barang
    private String kategori;  // Kategori barang (misal: Makanan, Alat Pembersih, dll.)
    private String harga;     // Harga barang dalam bentuk string

    // Konstruktor default tanpa parameter
    Petshop() {
    }

    // Konstruktor dengan parameter untuk inisialisasi objek langsung
    public Petshop(String id, String nama, String kategori, String harga) {
        this.id = id;
        this.nama = nama;
        this.kategori = kategori;
        this.harga = harga;
    }

    // Getter untuk mengambil nilai ID
    public String getId() {
        return id;
    }

    // Setter untuk mengatur nilai ID
    public void setId(String id) {
        this.id = id;
    }

    // Getter untuk mengambil nama barang
    public String getNama() {
        return nama;
    }

    // Setter untuk mengatur nama barang
    public void setNama(String nama) {
        this.nama = nama;
    }

    // Getter untuk mengambil kategori barang
    public String getKategori() {
        return kategori;
    }

    // Setter untuk mengatur kategori barang
    public void setKategori(String kategori) {
        this.kategori = kategori;
    }

    // Getter untuk mengambil harga barang
    public String getHarga() {
        return harga;
    }

    // Setter untuk mengatur harga barang
    public void setHarga(String harga) {
        this.harga = harga;
    }
}