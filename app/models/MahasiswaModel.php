<?php

class MahasiswaModel {
    private $mhs = [
        [
            'nama'  => 'Taufik',
            'nim'   => 123,
            'jurusan'   => 'teknik informatika'
        ],
        [
            'nama'  => 'Herjannto',
            'nim'   => 432,
            'jurusan'   => 'manajemen informatika'
        ],
        [
            'nama'  => 'Rahmat',
            'nim'   => 454,
            'jurusan'   => 'sistem informasi'
        ]
    ];

    public function getAllMahasiswa()
    {
        return $this->mhs;
    }
}