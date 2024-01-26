<?php

class Mahasiswa extends Controller {
    public function index()
    {
        $data['judul'] = 'Daftar Mahasiswa';
        $data['mhs'] = $this->model('MahasiswaModel')->getAllMahasiswa();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Mahasiswa';
        $data['mhs'] = $this->model('MahasiswaModel')->getMahasiswaById($id);
        $this->view('templates/header', $data);
        $this->view('mahasiswa/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $rowCountTambah = $this->model('MahasiswaModel')->tambahDataMahasiswa($_POST);
        if( $rowCountTambah > 0) {

            // set flash message
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');

            // direct ke mahasiswa
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        } else {
            // set flash message
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');

            // direct ke mahasiswa
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }

    public function hapus($id)
    {
        $rowCountHapus = $this->model('MahasiswaModel')->hapusDataMahasiswa($id);
        if( $rowCountHapus > 0) {

            // set flash message
            Flasher::setFlash('berhasil', 'dihapus', 'success');

            // direct ke mahasiswa
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        } else {
            // set flash message
            Flasher::setFlash('gagal', 'dihapus', 'danger');

            // direct ke mahasiswa
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }
}