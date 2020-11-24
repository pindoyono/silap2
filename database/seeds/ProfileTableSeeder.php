<?php

use Illuminate\Database\Seeder;

class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user=DB::table('profiles')->insert([
            'dasar_hukum' => '
                                1.	Undang-Undang Nomor 20 Tahun 2003 tentang Sistem Pendidikan Nasional Undang-Undang Nomor 14 Tahun 2005 tentang Guru dan dosen
                                2.	Undang-Undang Nomor 23 Tahun 2014 tentang Pemerintahan Daerah
                                3.	Undang-Undang Nomor 5 Tahun 2014 tentang Aparatur Sipil Negara
                                4.	Peraturan Pemerintah Nomor 53 Tahun 2010 tentang Disiplin Pegawai Negeri Sipil
                                5.	Peraturan Presiden Nomor 14 Tahun 2015 tentang Kementerian Pendidikan dan Kebudayaan
                                6.	Peraturan Menteri Pendidikan Nasional Nomor 12 Tahun 2007 tentang Standar Pengawas Sekolah/Madrasah
                                7.	Peraturan Menteri Pendidikan Nasional Nomor 63 Tahun 2009 tentang Sistem Penjaminan Mutu Pendidikan
                                Peraturan Pemerintah Nomor 19 Tahun 2005 sebagaimana diubah terakhir dengan Peraturan Pemerintah Nomor 13 Tahun 2015 tentang Perubahan Kedua Atas Peraturan Pemerintah Nomor 19 Tahun 2005 tentang Standar Nasional Pendidikan Peraturan Pemerintah Nomor 74 Tahun 2008 tentang Guru, Peraturan Pemerintah Nomor 17 Tahun 2010 sebagaimana telah diubah dengan Peraturan Pemerintah Nomor 66 Tahun 2010 tentang Perubahan Atas Peraturan Pemerintah Nomor 17 Tahun 2010 tentang Pengelolaan dan Penyelenggaraan Pendidikan
                                Peraturan Menteri Pendidikan Nasional Nomor 39 Tahun 2009 sebagaimana telah diubah dengan Peraturan Menteri Pendidikan Nasional Nomor 30 Tahun 2011 tentang Perubahan Atas Peraturan Menteri Pendidikan Nasional Nomor 39 Tahun 2009 tentang Beban Kerja Guru dan Pengawas Sekolah.
            ',

            'sejarah' => '
                Sejarah pengawas
		        Peraturan Pemerintah Nomor 74 Tahun 2008 tentang Guru Pasal 54 ayat (8) butir d menyatakan bahwa guru yang diangkat dalam jabatan Pengawas Satuan Pendidikan melakukan tugas pembimbingan dan pelatihan profesional guru dan tugas pengawasan. Tugas pengawasan yang dimaksud adalah melaksanakan kegiatan pengawasan akademik dan manajerial. Hal ini seiring dengan Permen PAN dan RB nomor 14 Tahun 2016 Tentang Perubahan atas Peraturan Menteri Pendayagunaan Aparatur Negara dan Reformasi Birokrasi Nomor 21 Tahun 2010 tentang Jabatan Fungsional Pengawas Sekolah dan Angka Kreditnya Bab II Pasal 5 yang menyatakan bahwa tugas pokok Pengawas Sekolah adalah melaksanakan tugas pengawasan akademik dan manajerial pada satuan pendidikan yang meliputi penyusunan program pengawasan, pelaksanaan pembinaan, pemantauan, pelaksanaan.
            ',
            'visi_misi' => '
                            visi
                            a.	Meningkatkan ketersediaan pendidikan dan perluasan akses pendidikan yang merata, terjangkau, setara, berkelanjutan serta berkeadilan bagi seluruh lapisan masyarakat.
                            b.	Mewujudkan kualitas/mutu dan relevansi pendidikan yang memiliki keunggulan serta memberdayakan lembaga pendidikan formal dan non formal.
                            c.	Mewujudkan dukungan sustainabilitas (keberlanjutan) lulusan anak didik jenjang PAUD, dan Pendidikan Dasar (SD dan SMP).
                            d.	Mewujudkan pendidikan kecakapan hidup (life skill) yang mencakup kecakapan personal, sosial, akademik dan vocasional dalam meningkatkan sumber daya manusia yang cerdas, produktif, berkarakter dan berwawasan lingkungan serta memahami nilai-nilai luhur.
                            e.	Mewujudkan kreatifitas, daya saing dan prestasi kepemudaan dan keolahragaan.
                            f.	Mewujudkan tata kelola dan tata nilai penyelenggaraan layanan prima pendidikan
            ',
            'visi_misi2' => '
                            Misi
                            a.	Mewujudkan pemerataan pendidikan dengan meningkatkan angka partisipasi murni dan nilai transisi dan menurunkan angka putus sekolah dan luar sekolah
                            b.	Mewujudkan program wajib belajar 16 tahun.
                            c.	Mensosialisasikan Jam Wajib Belajar Masyarakat (JAMBELMAS)
                            d.	Meningkatkan peran serta pendidikan dalam pembangunan daerah dan pengentasan kemiskinan dan pengangguran
                            e.	Memfasilitasi perencanaan pemenuhan kebutuhan pendidikan dan tenaga kependidikan pada semua jenjang pendidikan di seluruh wilayah Kabupaten Malinau.
                            f.	Mewujudkan internalisasi nilai budaya kepada pelajar melalui kegiatan pergelaran, festival, pameran, parade dan bentuk sajian seni budaya yang positif
            ',
        ]);

    }
}
