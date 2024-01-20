<?php

class About {
    public function index($nama = 'Taufik', $pekerjaan = 'IT Support')
    {
        echo "Halo, nama saya $nama, saya adalah $pekerjaan";
    }

    public function page()
    {
        echo 'About/page';
    }
}