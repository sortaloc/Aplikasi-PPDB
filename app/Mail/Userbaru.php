<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Userbaru extends Mailable
{
    use Queueable, SerializesModels;
    private $nama;
    private $nisn;
    
    public function __construct($nama, $nisn)
    {
        $this->nama = $nama;
        $this->nisn = $nisn;
    }

   
    public function build()
    {
        return $this->from('firgiawanbagus@gmail.com')
                   ->view('admin.mail.pesan')
                   ->with(
                    [
                        'nama' => $this->nama,
                        'nisn' => $this->nisn
                    ]);
    }
}
