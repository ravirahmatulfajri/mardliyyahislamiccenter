<?php
include "incl/connect.inc.php";


if (isset($_GET['no_pesan'])) {

  $kueri = "select a.*, b.tipe_kamar from tb_pesan a, tb_kamar_tipe b where a.id_tipe = b.id_tipe and a.no_pesan = '$_GET[no_pesan]'";
  $qry  = mysqli_query($connect, $kueri);

  while ($data = mysqli_fetch_array($qry)) {
    $id_pesan = $data['id_pesan'];
    $no_pesan = $data['no_pesan'];
    $tgl_pesan = date("j/n/Y | H:i", $data['tgl_pesan']);
    $nama = $data['nama'];
    $email = $data['email'];
    $phone = $data['phone'];
    $kota = $data['kota'];
    $alamat = $data['alamat'];
    $tgl_cekin = date("j/n/Y", $data['tgl_cekin']);
    $tgl_cekout = date("j/n/Y", $data['tgl_cekout']);
    $id_tipe = $data['id_tipe'];
    $tipe_kamar = $data['tipe_kamar'];
  }


  // query mendapatkan nomor kamar yang di pilih
  $no = 0;
  $kueri1 = "select a.no_pesan, a.id_kamar, b.nm_kamar from tb_pesan_kamar a, tb_kamar b 
                    where a.id_kamar = b.id_kamar and a.no_pesan = '$no_pesan' order by id_kamar";
  $qr1  = mysqli_query($connect, $kueri1);

  $kamar = [];

  while ($data1 = mysqli_fetch_array($qr1)) {
    $no_pesan = $data1['no_pesan'];
    $id_kamar = $data1['id_kamar'];
    $nm_kamar = $data1['nm_kamar'];
    $no++;

    // kamar di push yang nantinya akan di implute
    array_push($kamar, $no . ' ' . $nm_kamar);
  }
}

?>
<?php
require __DIR__ . '/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

$html2pdf = new Html2Pdf('P', 'A4', 'fr', true, 'UTF-8', array(15, 15, 15, 15), false);
$cetak = '
</html>
<head>
  <title></title>
</head>
  <body>
  <h1 style="color: black; font-size: 32px; font-weight: bold; line-height: 36px; margin: 0 0 30px 0">
  Pesanan Hotel Berhasil
  </h1>

  <h3>Detail Pesanan</h3>

  <table style="width: 60%;">
    <tr>
        <td>Tanggal Pesan</td>
        <td> ' . $tgl_pesan . '</td>
    </tr>
    <tr>
        <td>Nomor Pesan</td>
        <td> ' . $no_pesan . '</td>
    </tr>
    <tr>
        <td>Nama</td>
        <td> ' . $nama . '</td>
    </tr>
    <tr>
        <td>Email</td>
        <td> ' . $email . '</td>
    </tr>
    <tr>
        <td>Phone</td>
        <td> ' . $phone . '</td>
    </tr>
    <tr>
        <td>Kota</td>
        <td> ' . $kota . '</td>
    </tr>
    <tr>
        <td>City</td>
        <td> ' . $alamat . '</td>
    </tr>
    <tr>
        <td>Tanggal Check In</td>
        <td> ' . $tgl_cekin . '</td>
    </tr>
    <tr>
        <td>Tanggal Check Out</td>
        <td> ' . $tgl_cekout . '</td>
    </tr>
    <tr>
        <td>Tipe Kamar</td>
        <td> ' . $tipe_kamar . '</td>
    </tr>
    <tr>
        <td>Nomor Kamar</td>
        <td>' . implode(" | ", $kamar) . '</td>
    </tr>
  </table>

  </body>
</html>
';




$html2pdf->writeHTML($cetak);
$html2pdf->output();  //manual download
// $html2pdf->output("Bukti pesanan-Homestay.pdf","D"); //auto download
// $html2pdf->output(__DIR__."/contoh_laporan.pdf","F"); //download di direktori folder
