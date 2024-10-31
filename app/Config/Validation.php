<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var list<string>
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------

    public $barang = [
        'kd_barang'     => 'required',
        'nm_barang'     => 'required',
        'merk'     => 'required',
        'tahun'     => 'required',
        'asal_usul'     => 'required',
        'jumlah'     => 'required',
        // 'foto'     => 'uploaded[foto]|mime_in[foto,image/jpg, image/jpeg, image/gif, image/png]|max_size[foto,1000]',
        'deskripsi'     => 'required',
        'status'     => 'required'
    ];

    public $barang_errors = [
        'kd_barang' => [
            'required'    => 'Kode barang wajib diisi.',
        ],
        'nm_barang' => [
            'required'    => 'Nama barang wajib diisi.',
        ],
        'merk' => [
            'required'    => 'Merk barang wajib diisi.',
        ],
        'tahun' => [
            'required'    => 'Tahun barang wajib diisi.',
        ],
        'asal_usul' => [
            'required'    => 'Asal - usul barang wajib diisi.',
        ],
        'jumlah' => [
            'required'    => 'Jumlah barang wajib diisi.',
        ],
        // 'foto' => [
        //     'mime_in'    => 'Foto Barang hanya boleh diisi jpg, jpeg, png atau gif.',
        //     'max_size'   => 'Foto Barang maksimal 1mb',
        //     'uploaded'   => 'Foto Barang wajib diisi'
        // ],
        'deskripsi' => [
            'required'    => 'deskripsi barang wajib diisi.',
        ],
        'status'    => [
            'required' => 'Status barang wajib diisi.'
        ]
    ];

    public $transaksi = [
        'kd_barang'     => 'required',
        'jml'     => 'required',
        'total_harga'     => 'required',
        'tgl_trans'     => 'required',
        'mtd_pembayaran'     => 'required',
        'stts_pembayaran'     => 'required'
    ];

    public $transaksi_errors = [
        'kd_barang' => [
            'required'    => 'Kode barang wajib diisi.',
        ],
        'jml' => [
            'required'    => 'Nama barang wajib diisi.',
        ],
        'total_harga' => [
            'required'    => 'Merk barang wajib diisi.',
        ],
        'tgl_trans' => [
            'required'    => 'Tahun barang wajib diisi.',
        ],
        'mtd_pembayaran' => [
            'required'    => 'Asal - usul barang wajib diisi.',
        ],
        'stts_pembayaran' => [
            'required'    => 'Jumlah barang wajib diisi.',
        ]
    ];
}
