// Sweet alert Flashdata
const flashData = $('.flash-data').data('flashdata');
// Sweet alert login admin error
const loginAdmin = $('.flash-data').data('loginadmin');
// Sweet alert password error
const passwordError = $('.flash-data').data('passworderror');
// Sweet alert email salah
const emailError = $('.flash-data').data('emailerror');
// Sweet alert kirim email
const sendEmail = $('.flash-data').data('sendemail');
// Sweet alert ubah password
const ubahPassword = $('.flash-data').data('ubahpassword');
// Sweet alert ubah akun tidak aktif
const nonActive = $('.flash-data').data('nonactive');
// Sweet alert nim tidak terdaftr
const nimEmpty = $('.flash-data').data('nimempty');
// Sweet alert registrasi berhasil
const registrasi = $('.flash-data').data('registrasi');
// Sweet alert aktivasi akun
const activeAccount = $('.flash-data').data('activeakun');
// Sweet alert loginsuccess
const loginSuccess = $('.flash-data').data('loginsuccess');
// Sweet alert nonaktifkan status
const nonaktifkanStatus = $('.flash-data').data('nonaktif');
// Sweet alert nonaktifkan status
const aktifkanStatus = $('.flash-data').data('aktif');
// Sweet alert tambah keranjang
const tambahKeranjang = $('.flash-data').data('tambahkeranjang');


// Sweet alert flashData
if (flashData) {
    Swal.fire({
        title: 'Sukses',
        text: flashData,
        type: 'success',
    });
}

// Sweet alert password error
if (passwordError) {
    Swal.fire({
        title: 'Password Salah',
        text: passwordError,
        type: 'error',
    });
}

// Sweet alert login admin error
if (loginAdmin) {
    Swal.fire({
        title: 'Tidak terdaftar',
        text: loginAdmin,
        type: 'error',
    });
}

// Sweet alert email salah
if (emailError) {
    Swal.fire({
        title: 'Tidak terdaftar',
        text: emailError,
        type: 'error',
    });
}

// Sweet alert email terkirim
if (sendEmail) {
    Swal.fire({
        title: 'Terkirim',
        text: sendEmail,
        type: 'success',
    });
}

// Sweet alert ubah password
if (ubahPassword) {
    Swal.fire({
        title: 'Sukses',
        text: ubahPassword,
        type: 'success',
    });
}

// Sweet alert akun tidak aktif
if (nonActive) {
    Swal.fire({
        title: 'Akun tidak aktif',
        text: nonActive,
        type: 'error',
    });
}

// Sweet alert nim tidak terdaftar
if (nimEmpty) {
    Swal.fire({
        title: 'NIM Belum Terdaftar',
        text: nimEmpty,
        type: 'error',
    });
}

// Sweet alert registrasi berhasil
if (registrasi) {
    Swal.fire({
        title: 'Registrasi Berhasil',
        text: registrasi,
        type: 'success',
    });
}

// Sweet alert aktivasi akun
if (activeAccount) {
    Swal.fire({
        title: 'Akun Diaktifkan',
        text: activeAccount,
        type: 'success',
    });
}

// Sweet alert login sukses
if (loginSuccess) {
    Swal.fire({
        title: 'Login Berhasil',
        text: loginSuccess,
        type: 'success',
    });
}

// Sweet alert nonaktifkan status
if (nonaktifkanStatus) {
    Swal.fire({
        title: 'Nonaktif',
        text: nonaktifkanStatus,
        type: 'success',
    });
}

// Sweet alert aktifkan status
if (aktifkanStatus) {
    Swal.fire({
        title: 'Di Aktifkan',
        text: aktifkanStatus,
        type: 'success',
    });
}

// Sweet alert tambahkan keranjang
if (tambahKeranjang) {
    Swal.fire({
        title: 'Di tambahkan',
        text: tambahKeranjang,
        type: 'success',
    });
}

//Sweet alert hapus
$('.tombol-hapus').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Hapus Data?',
        text: 'Data tidak akan kembali setelah terhapus',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085D6',
        cancelButtonColor: '#D33',
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Kembali'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    });
});

//Sweet alert nonaktifkan status akun
$('.tombol-nonaktif').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Nonaktifkan',
        text: 'Anda yakin ingin menonaktifkan akun ini?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085D6',
        cancelButtonColor: '#D33',
        confirmButtonText: 'Nonaktifkan',
        cancelButtonText: 'Kembali'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    });
});

//Sweet alert nonaktifkan status produk
$('.tombol-nonaktifproduk').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Nonaktifkan',
        text: 'Anda yakin ingin menonaktifkan produk ini?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085D6',
        cancelButtonColor: '#D33',
        confirmButtonText: 'Nonaktifkan',
        cancelButtonText: 'Kembali'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    });
});

//Sweet alert aktifkan status akun
$('.tombol-aktif').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Aktifkan',
        text: 'Anda yakin ingin mengaktifkan akun ini?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085D6',
        cancelButtonColor: '#D33',
        confirmButtonText: 'Aktifkan',
        cancelButtonText: 'Kembali'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    });
});

//Sweet alert aktifkan status produk
$('.tombol-aktifproduk').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Aktifkan',
        text: 'Anda yakin ingin mengaktifkan produk ini?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085D6',
        cancelButtonColor: '#D33',
        confirmButtonText: 'Aktifkan',
        cancelButtonText: 'Kembali'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    });
});