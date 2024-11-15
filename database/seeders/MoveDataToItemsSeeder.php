<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Item; // Pastikan Item model sudah ada
use Illuminate\Support\Facades\DB;

class MoveDataToItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Ambil data dari tabel book
        $books = DB::table('books')->get();
        foreach ($books as $book) {
            Item::create([
                'judul' => $book->{'judul'},
                'type' => 'book',
                'halaman' => $book->{'halaman'},
                'deskripsi' => $book->{'deskripsi'},
                'tahun_terbit' => $book->{'tahun_terbit'},
                'penulis' => $book->{'penulis'},
            ]);
        }

        // Ambil data dari tabel cd_s
        $cds = DB::table('c_d_s')->get();
        foreach ($cds as $cd) {
            Item::create([
                'judul' => $cd->{'judul'},
                'type' => 'cd',
                'halaman' => null,
                'genre' => $cd->{'genre'}, 
                'tahun_terbit' => $cd->{'tahun_terbit'},
                'artis' => $cd->{'artis'},
            ]);
        }

        // Ambil data dari tabel journal
        $journals = DB::table('journals')->get();
        foreach ($journals as $journal) {
            Item::create([
                'judul' => $journal->{'judul'},
                'type' => 'journal',
                'halaman' => $journal->{'halaman'},
                'deskripsi' => $journal->{'deskripsi'},
                'tahun_terbit' => $journal->{'tahun_terbit'},
                'penulis' => $journal->{'penulis'},
            ]);
        }

        // Ambil data dari tabel skripsi
        $skripsis = DB::table('skripsis')->get();
        foreach ($skripsis as $skripsi) {
            Item::create([
                'judul' => $skripsi->{'judul'},
                'type' => 'skripsi',
                'halaman' => $skripsi->{'halaman'},
                'deskripsi' => $skripsi->{'deskripsi'},
                'tahun_terbit' => $skripsi->{'tahun_terbit'},
                'penulis' => $skripsi->{'penulis'},
            ]);
        }

        // Ambil data dari tabel paper
        $papers = DB::table('papers')->get();
        foreach ($papers as $paper) {
            Item::create([
                'judul' => $paper->{'judul'},
                'type' => 'paper',
                'halaman' => $paper->{'halaman'},
                'deskripsi' => $paper->{'deskripsi'},
                'tahun_terbit' => $paper->{'tahun_terbit'},
                'penulis' => $paper->{'penulis'},
            ]);
        }

        $ebooks = DB::table('ebooks')->get();
        foreach ($ebooks as $ebook) {
            Item::create([
                'judul' => $ebook->{'judul'},
                'type' => 'ebook',
                'halaman' => $ebook->{'halaman'},
                'deskripsi' => $ebook->{'deskripsi'},
                'tahun_terbit' => $ebook->{'tahun_terbit'},
                'penulis' => $ebook->{'penulis'},
            ]);
        }
    }
}
