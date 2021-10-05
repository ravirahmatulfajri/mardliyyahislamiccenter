<?php
include "./incl/connect.inc.php";
include_once("./incl/function.php");

$kueri = "select * from tb_kamar_tipe where id_tipe = $_GET[id]";
$qr  = mysqli_query($connect, $kueri);
while ($data = mysqli_fetch_array($qr)) {
  $id_tipe = $data['id_tipe'];
  $tipe_kamar = $data['tipe_kamar'];
}

?>

<div class="text-center pt-40">
  <h2>
    Mardliyyah Islamic Centre UGM
  </h2>
  <span>
    YOGYAKARTA - INDONESIA
  </span>
</div>

<!-- Booking Room Start-->
<div class="booking-area" style="margin-top: 40px !important;">
  <div class="container">
    <div class="row ">
      <div class="col-12">
        <h4 class="pb-10"><strong>Cek Status Kamar </strong></h4>
        <form onSubmit="return checkrequired(this)" id="form1" name="form1" method="post" action="functions.php">
          <div class="booking-wrap d-flex justify-content-between align-items-center">

            <!-- select in date -->
            <div class="single-select-box mb-30">
              <!-- select out date -->
              <div class="boking-tittle">
                <span> Check In Date:</span>
              </div>
              <div class="boking-datepicker">

                <input id="datepicker1" name="tgl_cekin" autocomplete="off" placeholder="<?= date('d/m/Y', strtotime($Date . ' + 1 days')); ?>" data-date-format="d/m/Y" />
              </div>
            </div>




            <!-- Single Select Box -->
            <div class="single-select-box mb-30">
              <!-- select out date -->
              <div class="boking-tittle">
                <span>Check OutDate:</span>
              </div>
              <div class="boking-datepicker">
                <input id="datepicker2" name="tgl_cekout" autocomplete="off" placeholder="<?= date('d/m/Y', strtotime($Date . ' + 2 days')); ?>" data-date-format="d/m/Y" />
              </div>
            </div>

            <!-- Single Select Box -->
            <div class="single-select-box mb-30">
              <div class="boking-tittle">
                <span>Rooms:</span>
              </div>
              <div class="select-this">
                <?= $tipe_kamar ?> <input name="id_tipe" type="hidden" value="<?php echo "$id_tipe" ?>">
              </div>
            </div>
            <!-- Single Select Box -->
            <div class="single-select-box pt-45 mb-30">
              <input name="checking_room" type="submit" class="btn select-btn" id="kirim" value="Cek Kamar">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Booking Room End-->

<div class="booking-area" style="margin-top: 40px !important;">
  <div class="container">
    <div class="row ">
      <div class="col-12">

        <h4 class="pb-10"><strong>Cek Status Kamar </strong></h4>

        <form onSubmit="return checkrequired(this)" id="form1" name="form1" method="post" action="functions.php">
          <div class="booking-wrap d-flex flex-md-column justify-content-between align-items-center align-items-md-start">

            <div class="d-flex flex-column flex-md-row row container-fluid pt-45 mb-30">

              <div class="col-12 col-md-6 mb-30">

                <div class="boking-tittle">
                  <span>Tgl Chek In</span>
                </div>

                <style>
                  .nice-select.mx-2 {
                    padding: 0 2rem 0 1rem;
                  }
                </style>

                <div class="d-flex">
                  <select name="required_tgl_cekin" size="1" class="mx-2">
                    <?php
                    for ($i = 1; $i <= 31; $i++) {
                      if ($i == $indate) {
                        $selectdate = "selected";
                      } else {
                        $selectdate = "";
                      }
                      echo "<option value=\"$i\" $selectdate>$i</option>" . "\n";
                    }
                    ?>
                  </select>

                  <select name="required_bln_cekin" size="1" id="bln" class="mx-2">
                    <?php
                    for ($i = 1; $i <= 12; $i++) {
                      if ($i == $inmonth) {
                        $selectmonth = "selected";
                      } else {
                        $selectmonth = "";
                      }
                      echo "<option value=\"$i\" $selectmonth>$bulan[$i]</option>" . "\n";
                    }
                    ?>
                  </select>
                  <select name="required_thn_cekin" size="1" id="thn" class="mx-2">
                    <?php
                    for ($i = $inyear; $i <= $inyear + 1; $i++) {
                      if ($i == $inyear) {
                        $selectyear = "selected";
                      } else {
                        $selectyear = "";
                      }
                      echo "<option value=\"$i\" $selectyear>$i</option>" . "\n";
                    }
                    ?>
                  </select>
                </div>

              </div>

              <div class="col-12 col-md-6 mb-30">

                <div class="boking-tittle">
                  <span>Tgl Cek Out</span>
                </div>

                <div class="d-flex">
                  <select name="required_tgl_cekout" size="1" id="tgl_cekout" class="mx-2">
                    <?php
                    for ($i = 1; $i <= 31; $i++) {
                      if ($i == $outdate) {
                        $selectdate = "selected";
                      } else {
                        $selectdate = "";
                      }
                      echo "<option value=\"$i\" $selectdate>$i</option>" . "\n";
                    }
                    ?>
                  </select>
                  <select name="required_bln_cekout" size="1" id="select" class="mx-2">
                    <?php
                    for ($i = 1; $i <= 12; $i++) {
                      if ($i == $outmonth) {
                        $selectmonth = "selected";
                      } else {
                        $selectmonth = "";
                      }
                      echo "<option value=\"$i\" $selectmonth>$bulan[$i]</option>" . "\n";
                    }
                    ?>
                  </select>
                  <select name="required_thn_cekout" size="1" id="select2" class="mx-2">
                    <?php
                    for ($i = $outyear; $i <= $outyear + 1; $i++) {
                      if ($i == $outyear) {
                        $selectyear = "selected";
                      } else {
                        $selectyear = "";
                      }
                      echo "<option value=\"$i\" $selectyear>$i</option>" . "\n";
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div>

            <div class="row container-fluid pt-45 mb-30">
              <div class="single-select-box col-md-6 mb-30">
                <div class="boking-tittle">
                  <span>Tipe</span>
                </div>
                <div class="select-this">
                  <div>
                    <h5><?= $tipe_kamar ?></h5>
                    <input name="id_tipe" type="hidden" value="<?php echo "$id_tipe" ?>">
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <input name="checking_room" type="submit" class="btn select-btn" id="kirim" value="Cek Kamar">
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>