<?php

class MahasiswaModel {
    /*
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
    */
    
    private $table = 'mahasiswa';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMahasiswa()
    {
        //return $this->mhs;
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getMahasiswaById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }
}