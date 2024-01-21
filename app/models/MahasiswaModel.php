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

    private $dbh; //database handler
    private $stmt; //statement

    public function __construct()
    {
        // data source name
        $dsn = 'mysql:host=localhost;dbname=phpmvc';

        try {
            $this->dbh = new PDO($dsn, 'root', '');
        } catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getAllMahasiswa()
    {
        //return $this->mhs;
        $this->stmt = $this->dbh->prepare('SELECT * FROM mahasiswa');
        $this->stmt->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}