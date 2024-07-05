class KabKota {
  final int id;
  final String kabupatenKota;
  final String pusatPemerintahan;
  final String bupatiWalikota;
  final String tanggalBerdiri;
  final double luasWilayah;
  final int jumlahPenduduk;
  final int jumlahKecamatan;
  final int jumlahKelurahan;
  final int jumlahDesa;
  final String urlPetaWilayah;
  final String deskripsi;
  final String logo;

  KabKota({
    required this.id,
    required this.kabupatenKota,
    required this.pusatPemerintahan,
    required this.bupatiWalikota,
    required this.tanggalBerdiri,
    required this.luasWilayah,
    required this.jumlahPenduduk,
    required this.jumlahKecamatan,
    required this.jumlahKelurahan,
    required this.jumlahDesa,
    required this.urlPetaWilayah,
    required this.deskripsi,
    required this.logo,
  });

  factory KabKota.fromJson(Map<String, dynamic> json) {
    return KabKota(
      id: json['id'],
      kabupatenKota: json['kabupaten_kota'],
      pusatPemerintahan: json['pusat_pemerintahan'],
      bupatiWalikota: json['bupati_walikota'],
      tanggalBerdiri: json['tanggal_berdiri'],
      luasWilayah:
          json['luas_wilayah'] != null ? json['luas_wilayah'].toDouble() : 0.0,
      jumlahPenduduk: json['jumlah_penduduk'] ?? 0,
      jumlahKecamatan: json['jumlah_kecamatan'] ?? 0,
      jumlahKelurahan: json['jumlah_kelurahan'] ?? 0,
      jumlahDesa: json['jumlah_desa'] ?? 0,
      urlPetaWilayah: json['url_peta_wilayah'],
      deskripsi: json['deskripsi'],
      logo: json['logo'],
    );
  }
}
