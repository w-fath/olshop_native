<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Simulasi | TecnoCode</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" href="asset/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="asset/css/index.css">
    <link rel="stylesheet" href="asset/css/styles.min.css">
    <link rel="icon" href="asset/img/logo.jpeg">
    <script type="text/javascript" src="asset/js/main.min.js"></script>
</head>

<body>
    <!-- Navbar -->
    <div class="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <a class="navbar-brand" href="#"><i class="fas fa-laptop-code"></i> Tecno<span>Code</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownSourceCode" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Produk
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownSourceCode">
                            <a class="dropdown-item" href="#">Handphone Android</a>
                            <a class="dropdown-item" href="#">Laptop</a>
                            <a class="dropdown-item" href="#">Aksesoris</a>
                            <a class="dropdown-item" href="#">Semua Produk</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="promo.php">Promo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="kalkulator.php">Kalkulator Kredit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact_us.php">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"></a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="private/index.php" style="color: #ffc400;"><b>Login</b></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <section class="ctnwp" style="margin-top: 50px;">
        <div class="wrap-sm">
            <style>
                input[type=number]::-webkit-outer-spin-button,
                input[type=number]::-webkit-inner-spin-button {
                    -webkit-appearance: none;
                    margin: 0;
                }

                input[type=number] {
                    -moz-appearance: textfield;
                }

                .error {
                    color: red;
                    font-size: 12px;
                }
            </style>

            <h3 class="tblue">KALKULATOR KREDIT</h3>

            <div class="career-form box-form">
                <div class="left">
                    <form>
                        <div class="row">
                            <label>Tenor</label>
                            <select id="tenor">
                                <option value="1">1 bulan</option>
                                <option value="3">3 bulan</option>
                                <option value="6">6 bulan</option>
                                <option value="12">12 bulan</option>
                            </select>
                        </div>
                        <div class="row">
                            <label>Harga Barang</label>
                            <input type="text" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" name="harga" class="i" placeholder="Masukan Nominal">
                        </div>
                        <div class="row">
                            <label>Uang Muka</label>
                            <input type="text" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" id="dpx" class="i" placeholder="Min. 250.000">
                            <div id="error-msg" class="error"></div>
                        </div>
                        <div class="row submit">
                            <input type="button" onclick="simulasi()" class="btn-box btn-lg" value="Hitung">
                        </div>
                    </form>
                </div>
                <div class="right">
                    <div class="address-box a-center">
                        <h4 class="reg">Angsuran Perbulan</h4>
                        <h3 id="angsuran"></h3>
                        <br>
                        <h4 class="reg">Angsuran Awal</h4>
                        <h3 id="dp_awal"></h3>
                    </div>
                    <div class="notsim"><i>*Harga sewaktu-waktu bisa berubah.</i></div>
                </div>
            </div>
            <script type="text/javascript" src="https://www.kreditplus.com/a.js"></script>
            <script>
                $(document).ready(function() {});

                function simulasi() {
                    var i = 0;
                    $('.i:input').each(function(k, v) {
                        if ($(v).val() == "") {
                            $(this).css({
                                'border-color': 'red'
                            });
                            i++;
                        }
                    });
                    if ($("#tenor").val() == "") {
                        $("#tenor").css({
                            'border-color': 'red'
                        });
                        i++;
                    }
                    var dp = $("#dpx").val();
                    dp = replaceTitik(dp);
                    if (parseInt(dp) < 250000) {
                        $("#error-msg").text("Uang Muka minimal Rp 250.000");
                        $("#dpx").css({
                            'border-color': 'red'
                        });
                        i++;
                    } else {
                        $("#error-msg").text("");
                        $("#dpx").css({
                            'border-color': ''
                        });
                    }
                    if (i == 0) {
                        var tenor = $("#tenor").val();
                        var harga = $('[name="harga"]').val();
                        harga = replaceTitik(harga);

                        dp = parseInt(dp) - 50000;
                        var bunga = 12;
                        var cicilan = (parseInt(harga) - dp) / parseInt(tenor);
                        var persen = bunga / 100;
                        var bunga_cicilan = (parseInt(harga) * persen) / 5;
                        var angsuran = cicilan + bunga_cicilan;

                        var angsuran_bulat = Math.ceil(angsuran / 1000) * 1000;
                        $("#angsuran").html(rupiah(angsuran_bulat));
                        $("#dp_awal").html(rupiah(dp + 50000));
                        $("#btns").show();
                    }
                }

                function replaceTitik(v) {
                    return v.replace(/\./g, '');
                }

                function rupiah(val) {
                    var number_string = val.toString();
                    number_string = number_string.replace("-", "");
                    var sisa = number_string.length % 3,
                        rupiah = number_string.substr(0, sisa),
                        ribuan = number_string.substr(sisa).match(/\d{3}/g);

                    if (ribuan) {
                        separator = sisa ? '.' : '';
                        rupiah += separator + ribuan.join('.');
                    }
                    return "Rp. " + rupiah;
                }
            </script>
        </div>
    </section>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="asset/js/script.js"></script>
</body>

</html>