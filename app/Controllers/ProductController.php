<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\UsersModel;
use CodeIgniter\API\ResponseTrait;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use CodeIgniter\HTTP\ResponseInterface;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class ProductController extends BaseController
{
    protected $model_product;

    public function __construct()
    {
        $this->model_product = new ProductModel();
    }

    public function index()
    {
        $category = $this->request->getGet('category');
        if ($category && $category !== 'Semua') {
            $products = $this->model_product->where('category_product', $category);
        } else {
            $products = $this->model_product;
        }

        // Terapkan pagination pada query sebelum mengambil data
        $data = [
            'title' => 'Daftar Produk',
            'product' => $products->paginate(10, 'product'),
            'pager' => $this->model_product->pager,
            'selectedCategory' => $category
        ];

        return view('product/v_index', $data);
    }

    public function create()
    {

        $data = [
            'title' => 'Tambah Produk',
            'breadcrumbs' => [
                'Daftar Produk' => base_url('/'),
                'Active Page' => 'Tambah Produk',
            ]
        ];

        return view('product/create_product', $data);
    }

    public function store()
    {

        // Validasi input
        if (!$this->validate([
            'name_product' => 'required|is_unique[product.name_product]',
            'category_product' => 'required',
            'buy_price' => 'required',
            'sell_price' => 'required',
            'stock' => 'required|numeric',
            'image' => 'uploaded[image]|max_size[image,100]|is_image[image]|ext_in[image,jpg,png]',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Hitung harga jual otomatis
        $buy_price = $this->request->getPost('buy_price');
        $sell_price = $buy_price + ($buy_price * 0.3);

        // Proses Upload Gambar
        $image = $this->request->getFile('image');
        if ($image->isValid()) {
            $imageName = $image->getRandomName();
            $image->move('uploads/product', $imageName);
        } else {
            return redirect()->back()->withInput()->with('errors', $image->getErrorString());
        }

        $data = [
            'name_product' => $this->request->getPost('name_product'),
            'category_product' => $this->request->getPost('category_product'),
            'buy_price' => $buy_price,
            'sell_price' => $sell_price,
            'stock' => $this->request->getPost('stock'),
            'image' => $imageName,
        ];

        $this->model_product->save($data);

        return redirect()->to('/')->with('success', 'Product add successfully');
    }

    function edit($id)
    {
        // // Cek apakah pengguna sudah login
        // $this->checkLogin();

        // Cari data produk berdasarkan ID
        $product = $this->model_product->find($id);
        if (!$product) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Produk dengan ID $id tidak ditemukan.");
        }

        $data = [
            'title' => 'Tambah Produk',
            'product' => $product,
            'breadcrumbs' => [
                'Daftar Produk' => base_url('/'),
                'Active Page' => 'Tambah Produk',
            ]
        ];
        return view('product/edit_product', $data);
    }

    public function update($id)
    {
        // Validasi input
        $validationRules = [
            'name_product' => [
                'rules' => "required|is_unique[product.name_product,id,{$id}]",
                'errors' => [
                    'required' => 'Nama produk wajib diisi.',
                    'is_unique' => 'Nama produk sudah digunakan.',
                ],
            ],
            'category_product' => [
                'rules' => 'required',
                'errors' => ['required' => 'Kategori produk wajib diisi.'],
            ],
            'buy_price' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Harga beli wajib diisi.',
                    'numeric' => 'Harga beli harus berupa angka.',
                ],
            ],
            'sell_price' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Harga jual wajib diisi.',
                    'numeric' => 'Harga jual harus berupa angka.',
                ],
            ],
            'stock' => [
                'rules' => 'required|integer',
                'errors' => [
                    'required' => 'Stok wajib diisi.',
                    'integer' => 'Stok harus berupa angka.',
                ],
            ],
            'image' => [
                'rules' => 'is_image[image]|ext_in[image,jpg,png]|max_size[image,1024]',
                'errors' => [
                    'is_image' => 'File harus berupa gambar.',
                    'ext_in' => 'Gambar hanya diperbolehkan dalam format jpg atau png.',
                    'max_size' => 'Ukuran gambar maksimal 1MB.',
                ],
            ],
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Hitung harga jual otomatis
        $buy_price = $this->request->getPost('buy_price');
        $sell_price = $buy_price + ($buy_price * 0.3);

        // Cari data produk lama
        $existingProduct = $this->model_product->find($id);

        // Proses upload gambar
        $image = $this->request->getFile('image');
        $imageName = $existingProduct->image;
        if ($image && $image->isValid()) {
            $imageName = $image->getRandomName();
            $image->move('uploads/product', $imageName);
        }

        // Data yang akan diupdate
        $data = [
            'name_product' => $this->request->getPost('name_product'),
            'category_product' => $this->request->getPost('category_product'),
            'buy_price' => $buy_price,
            'sell_price' => $sell_price,
            'stock' => $this->request->getPost('stock'),
            'image' => $imageName,
        ];

        // Update data
        $this->model_product->update($id, $data);

        return redirect()->to('/')->with('success', 'Produk berhasil diperbarui.');
    }

    public function delete($id)
    {
        // Cari data produk berdasarkan ID
        $product = $this->model_product->find($id);
        if (!$product) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Produk dengan ID $id tidak ditemukan.");
        }

        // Hapus gambar
        if ($product->image && file_exists('uploads/product/' . $product->image)) {
            unlink('uploads/product/' . $product->image);
        }

        // Hapus data produk
        $this->model_product->delete($id);

        return redirect()->to('/')->with('success', 'Produk berhasil dihapus.');
    }

    // Export Excel
    public function exportExcel()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set judul sheet
        $sheet->setTitle('Daftar Produk');

        // Buat header
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama Produk');
        $sheet->setCellValue('C1', 'Kategori');
        $sheet->setCellValue('D1', 'Harga Beli');
        $sheet->setCellValue('E1', 'Harga Jual');
        $sheet->setCellValue('F1', 'Stok');
        $sheet->setCellValue('G1', 'Gambar');

        // Ambil data produk
        $products = $this->model_product->findAll();

        // Buat isi data
        $no = 1;
        $row = 2;

        foreach ($products as $product) {
            $sheet->setCellValue('A' . $row, $no);
            $sheet->setCellValue('B' . $row, $product->name_product);
            $sheet->setCellValue('C' . $row, $product->category_product);
            $sheet->setCellValue('D' . $row, $product->buy_price);
            $sheet->setCellValue('E' . $row, $product->sell_price);
            $sheet->setCellValue('F' . $row, $product->stock);
            $sheet->setCellValue('G' . $row, $product->image);

            $row++;
        }

        // Set nama file dan header untuk download
        $filename = 'daftar_produk_' . date('YmdHis') . '.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        // Generate file
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }
}
