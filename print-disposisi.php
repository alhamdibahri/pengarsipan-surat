<?php 
include 'koneksi.php';


$sql = "SELECT * FROM mail m, disposition d WHERE m.ID_MAIL='".$_GET['ID_MAIL']."' AND d.ID_MAIL='".$_GET['ID_MAIL']."'";
$query = mysqli_query($conn,$sql);
$data = mysqli_fetch_array($query);

?>
<html lang="en"><!-- Include Head START --><head>

    <title>Aplikasi Disposisi Surat</title>

    <!-- Meta START -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="icon" href="dist/img/th.jpg" type="image/x-icon">    <!-- Meta END -->

    <!--[if lt IE 9]>
    <script src="./asset/js/html5shiv.min.js"></script>
    <![endif]-->

    <!-- Resources Hint START -->
    <link rel="preload" href="/assets/materialize.css" as="style">
    <link rel="preload" href="/asset/css/jquery-ui.css" as="font">
    <link rel="preload" href="/images/logo.jpg" as="image">
    <link rel="preload" href="/asset/js/jquery-2.1.1.min.js" as="script">
    <link rel="preload" href="/asset/js/materialize.min.js" as="script">
    <link rel="preload" href="/asset/js/bootstrap.min.js" as="script">
    <link rel="preload" href="/asset/js/pace.min.js" as="script">
    <link rel="preload" href="/asset/js/jquery-ui.min.js" as="script">
    <!-- Resources HintSTART -->

    <!-- Global style START -->
    <link type="text/css" rel="stylesheet" href="/asset/css/materialize.min.css">
    <link type="text/css" rel="stylesheet" href="/asset/css/jquery-ui.css">
    <style type="text/css">
        body {
            background: #fff;
        }
        .bg::before {
            content: '';
            background-image: url('/asset/img/background.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: scroll;
            position: fixed;
            z-index: -1;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            opacity: 0.10;
            filter:alpha(opacity=10);
        }
        #header-instansi {
            margin-top: 1%;
        }
        .ams {
            font-size: 1.8rem;
        }
        .grs {
            position: absolute;
            margin: 10px 0;
            background-color: #fff;
            height: 42px;
            width: 1px;
        }
        #menu {
            margin-left: 20px;
        }
        .title {
            background: #333;
            border-radius: 3px 3px 0 0;
            margin: -20px -20px 25px;
            padding: 20px;
        }
        .logo {
            border-radius: 50%;
            margin: 0 15px 15px 0;
            width: 90px;
            height: 90px;
        }
        .logoside {
            border-radius: 50%;
            margin: 0 auto;
            width: 125px;
            height: 125px;
        }
        .ins {
            font-size: 1.8rem;
        }
        .almt {
            font-size: 1.15rem;
        }
        .description {
            font-size: 1.4rem;
        }
        .jarak {
            height: 13.4rem;
        }
        .hidden {
            display: none;
        }
        .add {
            font-size: 1.45rem;
            padding: 0.1rem 0;
        }
        .jarak-card {
            margin-top: 1rem;
        }
        .jarak-filter {
            margin: -12px 0 5px;
        }
        #footer {
            background: #546e7a;
        }
        .warna {
            color: #444;
        }
        .agenda {
            font-size: 1.39rem;
            padding-left: 8px;
        }
        .hid {
            display: none;
        }
        .galeri {
            width: 100%;
            height: 26rem;
        }
        .gbr {
            float: right;
            width: 80%;
            height: auto;
        }
        .file {
            width: 70%;
            height: auto;
        }
        .kata {
            font-size: 1.04rem;
        }
        #alert-message {
            font-size: 0.9rem;
        }
        .notif {
            margin: -1rem 0!important;
        }
        .green-text, .red-text {
            font-weight: normal!important;
        }
        .lampiran {
            color: #444!important;
            font-weight: normal!important;
        }
        .waves-green {
            margin-bottom: -20px!important;
        }
        div.callout {
        	height: auto;
        	width: auto;
        	float: left;
        }
        div.callout {
        	position: relative;
        	padding: 13px;
        	border-radius: 3px;
        	margin: 25px;
        	min-height: 46px;
            top: -25px;
        }
        .callout::before {
        	content: "";
        	width: 0px;
        	height: 0px;
        	border: 0.8em solid transparent;
        	position: absolute;
        }
        .callout.bottom::before {
        	left: 25px;
        	top: -20px;
        	border-bottom: 10px solid #ffcdd2;
        }
        .pace {
            -webkit-pointer-events: none;
            pointer-events: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            -webkit-transform: translate3d(0, -50px, 0);
            -ms-transform: translate3d(0, -50px, 0);
            transform: translate3d(0, -50px, 0);
            -webkit-transition: -webkit-transform .5s ease-out;
            -ms-transition: -webkit-transform .5s ease-out;
            transition: transform .5s ease-out;
        }
        .pace.pace-active {
            -webkit-transform: translate3d(0, 0, 0);
            -ms-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }
        .pace .pace-progress {
            display: block;
            position: fixed;
            z-index: 2000;
            top: 0;
            right: 100%;
            width: 100%;
            height: 3px;
            background: #2196f3;
            pointer-events: none;
        }
        @media print{
            .side-nav,
            .secondary-nav,
            .jarak-form,
            .center,
            .hide-on-med-and-down,
            .dropdown-content,
            .button-collapse,
            .btn-large,
            .footer-copyright {
                display: none;
            }
            body {
                font-size: 12px;
                color: #212121;
            }
            .hid {
                display: block;
                font-size: 16px;
                text-transform: uppercase;
                margin-bottom: 0;
            }
            .add {
                font-size: 15px!important;
            }
            .agenda {
                font-size: 13px;
                text-align: center;
                color: #212121;
            }
            th, td{
                border: 1px solid #444 !important;
            }
            th{
                padding: 5px;
                display: table-cell;
                text-align: center;
                vertical-align: middle;
            }
            td{
                padding: 5px;
            }
            table {
              border-collapse: collapse;
              border-spacing: 0;
              font-size: 12px;
              color: #212121;
            }
            .container {
                margin-top: -20px !important;
            }
        }
        noscript{
            color: #fff;
        }
        @media only screen and (max-width: 701px) {
            #colres{
                width: 100%;
                overflow-x: scroll!important;
            }
            #tbl{
                width: 600px!important;
            }
        }
    </style>
    <!-- Global style END -->

</head>

<!-- Include Head END -->

<!-- Body START -->
<body onLoad="window.print()">

<!-- Header END -->

<!-- Main START -->
<main>

    <!-- container START -->
    <div class="container">

    
        <style type="text/css">
            table {
                background: #fff;
                padding: 5px;
            }
            tr, td {
                border: table-cell;
                border: 1px  solid #444;
            }
            tr,td {
                vertical-align: top!important;
            }
            #right {
                border-right: none !important;
            }
            #left {
                border-left: none !important;
            }
            .isi {
                height: 300px!important;
            }
            .disp {
                text-align: center;
                padding: 1.5rem 0;
                margin-bottom: .5rem;
            }
            .logodisp {
                float: left;
                position: relative;
                width: 110px;
                height: 110px;
                margin: 0 0 0 1rem;
            }
            #lead {
                width: auto;
                position: relative;
                margin: 25px 0 0 75%;
            }
            .lead {
                font-weight: bold;
                text-decoration: underline;
                margin-bottom: -10px;
            }
            .tgh {
                text-align: center;
            }
            #nama {
                font-size: 2.1rem;
                margin-bottom: -1rem;
            }
            #alamat {
                font-size: 16px;
            }
            .up {
                margin: 0;
                line-height: 2.2rem;
                font-size: 1.5rem;
            }
            .status {
                margin: 0;
                font-size: 1.3rem;
                margin-bottom: .5rem;
            }
            #lbr {
                font-size: 20px;
                font-weight: bold;
            }
            .separator {
                border-bottom: 2px solid #616161;
                margin: -1.3rem 0 1.5rem;
            }
            @media print{
                body {
                    font-size: 12px;
                    color: #212121;
                }
                table {
                    width: 100%;
                    font-size: 12px;
                    color: #212121;
                }
                tr, td {
                    border: table-cell;
                    border: 1px  solid #444;
                    padding: 8px!important;

                }
                tr,td {
                    vertical-align: top!important;
                }
                #lbr {
                    font-size: 20px;
                }
                .isi {
                    height: 200px!important;
                }
                .tgh {
                    text-align: center;
                }
                .disp {
                    text-align: center;
                    margin: -.5rem 0;
                }
                .logodisp {
                    float: left;
                    position: relative;
                    width: 80px;
                    height: 80px;
                    margin: .5rem 0 0 .5rem;
                }
                #lead {
                    width: auto;
                    position: relative;
                    margin: 15px 0 0 75%;
                }
                .lead {
                    font-weight: bold;
                    text-decoration: underline;
                    margin-bottom: -10px;
                }
                #nama {
                    font-size: 20px!important;
                    font-weight: bold;
                    text-transform: uppercase;
                    margin: -10px 0 -20px 0;
                }
                .up {
                    font-size: 17px!important;
                }
                .status {
                    font-size: 17px!important;
                    font-weight: normal;
                    margin-bottom: -.1rem;
                }
                #alamat {
                    margin-top: -15px;
                    font-size: 13px;
                }
                #lbr {
                    font-size: 17px;
                    font-weight: bold;
                }
                .separator {
                    border-bottom: 2px solid #616161;
                    margin: -1rem 0 1rem;
                }

            }
        </style>

        

        <!-- Container START -->
        <div class="container">
            <div id="colres">
                <div class="disp"><img class="logodisp" src="dist/img/th.jpg"><h6 class="up">PEMERINTAH PROVINSI JAWA TIMUR</h6><h6 class="up" id="nama">DINAS PENDIDIKAN</h6><br><h5 class="status">SEKOLAH MENENGAH KEJURUAN NEGERI 1 SUMENEP </h5><span id="alamat">Jl Trunojoyo No. 298 Patean Telp.(0328)664107, Fax (0328)673517</span><br><span id="alamat" style="margin-left:80px;">Website : http://www.smk1smn.sch.id Email: info@smk1smn.sch.id</span>
                </div>
                <div class="separator"></div>
                    <table class="bordered" id="tbl">
                        <tbody>
                            <tr>
                                <td class="tgh" id="lbr" colspan="5">LEMBAR DISPOSISI</td>
                            </tr>
                            <tr>
                                <td  id="right" width="18%"><strong>Surat Dari</strong></td>
                                <td colspan="2" id="left" style="border-right: none;" width="72%">: <?php echo $data['MAIL_FROM'] ?></td>
                            </tr>
                            <tr>
<td id="right" width="18%"><strong>Tanggal Surat</strong></td>
                                <td id="left" style="border-right: none;" width="50%">: <?php echo $data['MAIL_DATE'] ?></td>
                                <td id="left" width="50%"><strong>Diterima Tanggal</strong> : <?php echo $data['INCOMING_AT'] ?></td>
                            </tr>
                            <tr>
 <td  id="right" width="18%"><strong>Nomor Surat</strong></td>
                                <td colspan="2" id="left" style="border-right: none;" width="72%">: <?php echo $data['MAIL_CODE'] ?></td>
                            </tr>
                            <tr>
                                <td id="right"><strong>Isi Ringkas</strong></td>
                                <td id="left" colspan="2">: <?php echo $data['DESKRIPSI'] ?></td>
                            </tr>
                            <tr>
                            </tr><tr class="isi">
                                <td colspan="2">
                                    <strong>Isi Disposisi :</strong><br><?php echo $data['DESKRIPSI_DIS'] ?>
                                    <div style="height: 50px;"></div>
                                    <strong>Sifat</strong> : <?php echo $data['STATUS'] ?><br>
                                    <strong>Catatan</strong> :<br> <?php echo $data['NOTIFICATION'] ?>
                                    <div style="height: 25px;"></div>
                                </td>
                                <td><strong>Kepada</strong> : <br><?php echo $data['REPLY_AT'] ?></td>
                            </tr>
                </tbody>
            </table>
            <div id="lead">
                <p>Kepala Sekolah</p>
                <div style="height: 50px;"></div><p class="lead">ISHAK, S.Pd</p>
                <p>NIP. 19641012 198903 1 011</p>
            </div>
        </div>
        <div class="jarak2"></div>
    </div>
    <!-- Container END -->

        </div>
    <!-- container END -->

</main>
<!-- Main END -->

<!-- Include Footer START -->

<noscript>
    &lt;meta http-equiv="refresh" content="0;URL='/enable-javascript.html'" /&gt;
</noscript>

<!-- Javascript START -->
<script type="text/javascript" src="/asset/js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="/asset/js/materialize.min.js"></script>
<script type="text/javascript" src="/asset/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="/asset/js/bootstrap.min.js"></script>
<script data-pace-options="{ &quot;ajax&quot;: false }" src="/asset/js/pace.min.js"></script>
<script type="text/javascript">

//jquery dropdown
$(".dropdown-button").dropdown({ hover: false });

//jquery sidenav on mobile
$('.button-collapse').sideNav({
    menuWidth: 240,
    edge: 'left',
    closeOnClick: true
});

//jquery datepicker
$('#tgl_surat,#batas_waktu,#dari_tanggal,#sampai_tanggal').pickadate({
    selectMonths: true,
    selectYears: 10,
    format: "yyyy-mm-dd"
});

//jquery teaxtarea
$('#isi_ringkas').val('');
$('#isi_ringkas').trigger('autoresize');

//jquery dropdown select dan tooltip
$(document).ready(function(){
    $('select').material_select();
    $('.tooltipped').tooltip({delay: 10});
});

//jquery autocomplete
$(function() {
    $( "#kode" ).autocomplete({
        source: 'kode.php'
    });
});

//jquery untuk menampilkan pemberitahuan
$("#alert-message").alert().delay(5000).fadeOut('slow');

//jquery modal
$(document).ready(function(){
   $('.modal-trigger').leanModal();
 });

</script>
<!-- Javascript END -->

<!-- Include Footer END -->


<!-- Body END -->



<div class="hiddendiv common"></div></body></html>