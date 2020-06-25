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