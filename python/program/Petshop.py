class Petshop:
    def __init__(self, id="", nama="", kategori="", harga=""):
        self.__id = id
        self.__nama = nama
        self.__kategori = kategori
        self.__harga = harga

    # Getter dan Setter untuk id
    def get_id(self):
        return self.__id

    def set_id(self, id):
        self.__id = id

    # Getter dan Setter untuk nama
    def get_nama(self):
        return self.__nama

    def set_nama(self, nama):
        self.__nama = nama

    # Getter dan Setter untuk kategori
    def get_kategori(self):
        return self.__kategori

    def set_kategori(self, kategori):
        self.__kategori = kategori

    # Getter dan Setter untuk harga
    def get_harga(self):
        return self.__harga

    def set_harga(self, harga):
        self.__harga = harga
