<?php

namespace App\Console\Commands;

use App\Lelang;
use Illuminate\Console\Command;

class LelangCheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lelang:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mengecek kadaluarsa lelang setiiap menit, lalu merubah statusnya menjadi nol';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->line("<fg=cyan>Memulai pengecekan waktu kadaluarsa lelang");
        while (true) {
            Lelang::where('waktu_berakhir', '<=', now()->format('Y-m-d H:i:s'))->update(['status' => 0]);
            \sleep(60);
            $this->line("<fg=green>Pengechekan selesai");
            $this->line('<fg=blue>Memulai Kembali');
        }
    }
}
