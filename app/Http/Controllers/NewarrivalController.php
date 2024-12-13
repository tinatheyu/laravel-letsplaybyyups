<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Illuminate\Http\Request;
use App\Models\Newarrival; // Ensure you have this import to interact with the Newarrival model.

class NewarrivalController extends Controller
{
    public function newarrival(){
        $newArrivals = Newarrival::all();
        return view('newarrival.index',compact('newArrivals'));
    }
    public function generatePdf()
    {
        $newArrivals = Newarrival::all();

        // Menyusun HTML untuk PDF dengan sedikit styling
        $html = '<center><h3>Data Barang Masuk</h3></center><hr/><br>';
        $html .= '<table border="1" width="100%" cellspacing="0" cellpadding="5" style="border-collapse: collapse;">
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Tanggal Masuk</th>
                    </tr>';
        
        $no = 1;
        foreach ($newArrivals as $item) {
            // Konversi gambar ke Base64
            $fotoHtml = "No Image";
            if (!empty($item->foto) && file_exists(public_path('uploads/' . $item->foto))) {
                $type = pathinfo(public_path('uploads/' . $item->foto), PATHINFO_EXTENSION);
                $data = file_get_contents(public_path('uploads/' . $item->foto));
                $encodedImage = 'data:image/' . $type . ';base64,' . base64_encode($data);
                $fotoHtml = "<img src='$encodedImage' width='50' />";
            }

            // Tambahkan baris ke dalam tabel
            $html .= "<tr>
                        <td>{$no}</td>
                        <td>{$fotoHtml}</td>
                        <td>" . htmlspecialchars($item->nama_barang) . "</td>
                        <td>" . htmlspecialchars($item->kategori) . "</td>
                        <td>" . htmlspecialchars($item->tanggal_barang_masuk) . "</td>
                    </tr>";
            $no++;
        }

        $html .= '</table>';

        // Generate PDF menggunakan Dompdf
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Output file PDF
        return $dompdf->stream('laporan-barang-masuk.pdf');
    }
}
