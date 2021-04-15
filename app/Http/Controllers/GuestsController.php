<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Guest;
use App\Field;
use App\Organization;
use App\Service;
use App\Purpose;
use Illuminate\Http\Request;

class GuestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$data = ['Dinas Pendidikan', 'Dinas Kesehatan', 'Dinas Perumahan dan Kawasan Permukiman', 'Dinas Pemberdayaan Perempuan dan Perlindungan Anak', 'Dinas Ketahanan Pangan dan Peternakan', 'Dinas Lingkungan Hidup dan Pertanahan', 'Dinas Pemberdayaan Masyarakat dan Desa', 'Dinas Perhubungan', 'Dinas Komunikasi dan Informatika', 'Dinas Koperasi, Usaha Kecil dan Menengah', 'Dinas Perpustakaan', 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu', 'Dinas Perindustrian', 'Dinas Pemuda dan Olahraga', 'Dinas Kebudayaan dan Olahraga', 'Dinas Kearsipan', 'Dinas Kelautan dan Perikanan', 'Dinas Perkebunan', 'Dinas Kehutanan', 'Dinas Energi dan Sumber Daya Mineral', 'Dinas Perdagangan', 'Dinas Kependudukan dan Pencatatan Sipil', 'Dinas Pertanian Tanaman Pangan dan Hortikultura', 'Dinas Tenaga Kerja dan Transmigrasi', 'Dinas Pengelolaan Sumber Sumber Daya Air', 'Dinas Sosial', 'Badan Pengelola Keuangan dan Aset Daerah', 'Badan Kepegawaian Daerah', 'Badan Pengembangan Sumber Daya Manusia Daerah', 'Badan Kesatuan Bangsa dan Politik', 'Badan Perencanaan Pembangunan Daerah', 'Badan Penelitian dan Pengembangan Daerah', 'Badan Pelaksana Penanggulangan Bencana Daerah', 'Badan Pendapatan Daerah', 'Badan Penghubung', 'Biro Pemerintahan dan Otonomi Daerah', 'Biro Hukum dan HAM', 'Biro Administrasi Pembangunan', 'Biro Perekonomian', 'Biro Humas dan Protokol', 'Biro Kesejahteraan Rakyat', 'Biro Umum dan Perlengkapan', 'Biro Organisasi', 'Biro Pengadaan Barang / Jasa', 'Satuan Polisi Pamong Praja', 'Rumah Sakit Ernaldi Bahar', 'Inspektorat Daerah', 'Sekretariat DPRD', 'Dinas PU Bina Marga dan Tata Ruang'];
        $data = Organization::all();
        return view('guest', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addguest(Request $request)
    {
        $new = Guest::create($request->all());
        return redirect()->route('create-purpose', $new->id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createpurpose($id)
    {
        $idtamu = Guest::all();
        $data = $idtamu->find($id);
        $fields = DB::table('fields')->get();
        //return $fields[0]->nama;
        return view('purpose', compact('data', 'fields'));
    }
    public function GetSubCatAgainstMainCatEdit($id)
    {
        echo json_encode(DB::table('services')->where('field_id', $id)->get());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function storepurpose(Request $request)
    {
        $data = Purpose::create($request->all());
        return redirect()->route('create-rating', $data->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function createrating($id)
    {
        $data = Purpose::find($id);
        return view('rating', compact('data'));
    }
    public function storerating(Request $request)
    {
        //$req = $request->all();
        $data = Purpose::find($request->id);
        $data->kritik_saran = $request->kritik_saran;
        $data->save();
        return view('thank');
        //$data = Purpose::create($request->all());
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guest $guest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guest $guest)
    {
        //
    }
}
