// jika sudah siap, jalankan function
$(function() {

    $('.tombolTambahData').on('click', function() {
        $('#judulModal').html('Tambah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Tambah Data');
    });

    $('.tombolUbahData').on('click', function() {
        $('#judulModal').html('Ubah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-content form').attr('action', 'http://localhost:8088/phpmvc/public/mahasiswa/ubah');

        const id = $(this).data('id'); // from attribute data-[id]

        $.ajax({
            url: 'http://localhost:8088/phpmvc/public/mahasiswa/getubah',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(result) {
                $('#id').val(result.id);
                $('#nama').val(result.nama);
                $('#nim').val(result.nim);
                $('#jurusan').val(result.jurusan);
            }
        });
    });
});