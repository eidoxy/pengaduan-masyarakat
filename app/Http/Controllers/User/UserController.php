<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\VerifikasiEmailUntukRegistrasiPengaduanMasyarakat;
use App\Models\Kategori;
use App\Models\Masyarakat;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        // Menghitung jumlah pengaduan yang ada di table
        $pengaduan = Pengaduan::all()->count();

        // Arahkan ke file user/landing.blade.php
        return view('User.homeNew', ['pengaduan' => $pengaduan]);
    }

    public function lapor()
    {
        // Menghitung jumlah pengaduan yang ada di table
        $pengaduan = Pengaduan::all()->count();

        $kategori = Kategori::orderBy('id_kategori', 'desc')->get();

        // Arahkan ke file user/landing.blade.php
        return view('User.lapor', ['pengaduan' => $pengaduan, 'kategori' => $kategori]);
    }

    public function formLogin()
    {
        // Arahkan ke file user/register.blade.php
        return view('user.login');
    }


    public function login(Request $request)
    {
        // Pengecekan $request->username isinya email atau username
        if (filter_var($request->username, FILTER_VALIDATE_EMAIL))
        {
            // jika isinya string email, cek email nya di table masyarakat
            $email = Masyarakat::where('email', $request->username)->first();

            // Pengecekan variable $email jika tidak ada di table masyarakat
            if (!$email)
            {
                return redirect()->back()->with(['pesan' => 'Email tidak terdaftar']);
            }

            // jika email ada, langsung check password yang dikirim di form dan di table, hasilnya sama atau tidak
            $password = Hash::check($request->password, $email->password);

            // Pengecekan variable $password jika password tidak sama dengan yang dikirimkan
            if (!$password)
            {
                return redirect()->back()->with(['pesan' => 'Password tidak sesuai']);
            }

            // Jalankan fungsi auth jika berjasil melewati validasi di atas
            if (Auth::guard('masyarakat')->attempt(['email' => $request->username, 'password' => $request->password]))
            {
                // Jika login berhasil
                return redirect()->route('pekat.lapor');
            }
            else
            {
                // Jika login gagal
                return redirect()->back()->with(['pesan' => 'Akun tidak terdaftar!']);
            }
        }
        else
        {
            // jika isinya string username, cek username nya di table masyarakat
            $username = Masyarakat::where('username', $request->username)->first();

            // Pengecekan variable $username jika tidak ada di table masyarakat
            if (!$username)
            {
                return redirect()->back()->with(['pesan' => 'Username tidak terdaftar']);
            }

            // jika username ada, langsung check password yang dikirim di form dan di table, hasilnya sama atau tidak
            $password = Hash::check($request->password, $username->password);

            // Pengecekan variable $password jika password tidak sama dengan yang dikirimkan
            if (!$password)
            {
                return redirect()->back()->with(['pesan' => 'Password tidak sesuai']);
            }

            // Jalankan fungsi auth jika berjasil melewati validasi di atas
            if (Auth::guard('masyarakat')->attempt(['username' => $request->username, 'password' => $request->password]))
            {
                // Jika login berhasil
                return redirect()->route('pekat.lapor')->with(['pesan' => 'Anda sudah login ke akun']);
            }
            else
            {
                // Jika login gagal
                return redirect()->back()->with(['pesan' => 'Akun tidak terdaftar!']);
            }
        }
    }

    public function formRegister()
    {
        // Arahkan ke file user/register.blade.php
        return view('user.registerNew');
    }

    public function register(Request $request)
    {
        // Masukkan semua data yg dikirim ke variable $data 
        $data = $request->all();

        // Membuat custom error message
        $errors = [
            'nik.required' => 'NIK tidak boleh kosong',
            'nik.min' => 'NIK harus berisi 16 angka',
            'nik.max' => 'NIK harus berisi 16 angka',
            'nik.unique' => 'NIK sudah terdaftar',
            'nama.required' => 'Nama tidak boleh kosong',
            'nama.regex' => 'Nama tidak boleh mengandung angka',
            'email.required' => 'Email tidak boleh kosong',
            'email.unique' => 'Email sudah terdaftar',
            'username.required' => 'Username tidak boleh kosong',
            'username.unique' => 'Username sudah terdaftar',
            'password.required' => 'Password tidak boleh kosong',
            'password.min' => 'Password minimal 6 karakter',
            'password.regex' => 'Password harus mengandung 1 huruf kecil, 1 huruf kapital, 1 angka, dan 1 spesial karakter',
            'telp.required' => 'Telepon tidak boleh kosong',
            'telp.min' => 'Telepon minimal 12 angka',
            'telp.max' => 'Telepon maximal 13 angka',
            'g-recaptcha-response.recaptcha' => 'Captcha harus di isi',
        ];

        // Buat variable $validate kemudian isinya Validator::make(datanya, [nama_field => peraturannya])
        $validate = Validator::make($data, [
            'nik' => ['required', 'max:16', 'min:16', 'unique:masyarakat'],
            'nama' => ['required', 'string', 'regex:/^[a-zA-Z]+$/u'],
            'email' => ['required', 'email', 'string', 'unique:masyarakat'],
            'username' => ['required', 'string', 'regex:/^\S*$/u', 'unique:masyarakat'],
            'password' => [
                            'required',
                            'min:6',
                            'regex:/[a-z]/',      // must contain at least one lowercase letter
                            'regex:/[A-Z]/',      // must contain at least one uppercase letter
                            'regex:/[0-9]/',      // must contain at least one digit
                            'regex:/[@$!%*#?&]/'  // must contain a special character
                        ],
            'telp' => ['required', 'min:12', 'max:13'],
            'g-recaptcha-response' => 'recaptcha'
        ], $errors);

        // Pengecekan jika validate fails atau gagal
        if ($validate->fails())
        {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        // Mengecek email
        $email = Masyarakat::where('email', $request->username)->first();

        // Pengecekan jika email sudah terdaftar
        if ($email)
        {
            return redirect()->back()->with(['pesan' => 'Email sudah terdaftar'])->withInput(['email' => 'asd']);
        }

        // Mengecek username
        $username = Masyarakat::where('username', $request->username)->first();

        // Pengecekan jika username sudah terdaftar
        if ($username)
        {
            return redirect()->back()->with(['pesan' => 'Username sudah terdaftar'])->withInput(['username' => null]);
        }

        // Memasukkan data kedalam table Masyarakat
        Masyarakat::create([
            'nik' => $data['nik'],
            'nama' => $data['nama'],
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'telp' => $data['telp'],
        ]);

        // Kirim link verifikasi email
        $link = URL::temporarySignedRoute('pekat.verify', now()->addMinutes(30), ['nik' => $data['nik']]);
        Mail::to($data['email'])->send(new VerifikasiEmailUntukRegistrasiPengaduanMasyarakat($data['nama'], $link));

        // Arahkan ke route pekat.index
        return redirect()->route('pekat.formLogin')->with(['pesan_daftar' => 'Akun telah dibuat, silahkan login']);
    }

    public function logout()
    {
        // Fungsi logout dengan guard('masyarakat')
        Auth::guard('masyarakat')->logout();

        // Arahkan ke route pekat.index
        return redirect()->route('pekat.lapor');
    }

    public function storePengaduan(Request $request)
    {
        // Pengecekan jika tidak ada masyarakat yang sedang login
        if (!Auth::guard('masyarakat')->user())
        {
            return redirect()->route('pekat.formLogin')->with(['pesan' => 'Login dibutuhkan!']);
        }

        // Masukkan semua data yg dikirim ke variable $data 
        $data = $request->all();

        // Buat variable $validate kemudian isinya Validator::make(datanya, [nama_field => peraturannya])
        $validate = Validator::make($data, [
            'judul_laporan' => ['required'],
            'isi_laporan' => ['required'],
            'tgl_kejadian' => ['required'],
            'lokasi_kejadian' => ['required'],
            'id_kategori' => ['required'],
        ]);

        // Pengecekan jika validate fails atau gagal
        if ($validate->fails())
        {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        // Pengecekan jika ada file foto yang dikirim
        if ($request->file('foto'))
        {
            $data['foto'] = $request->file('foto')->store('assets/pengaduan', 'public');
        }

        // Set timezone waktu ke Asia/Bangkok
        date_default_timezone_set('Asia/Bangkok');

        // Membuat variable $pengaduan isinya Memasukkan data kedalam table Pengaduan
        $pengaduan = Pengaduan::create([
            'tgl_pengaduan' => date('Y-m-d h:i:s'),
            'nik' => Auth::guard('masyarakat')->user()->nik,
            'judul_laporan' => $data['judul_laporan'],
            'isi_laporan' => $data['isi_laporan'],
            'tgl_kejadian' => $data['tgl_kejadian'],
            'lokasi_kejadian' => $data['lokasi_kejadian'],
            'id_kategori' => $data['id_kategori'],
            'foto' => $data['foto'] ?? '',
            'status' => '0',
        ]);

        // Pengecekan variable $pengaduan
        if ($pengaduan)
        {
            // Jika mengirim pengaduan berhasil
            return redirect()->route('pekat.laporan', 'me')->with(['pengaduan' => 'Berhasil terkirim!', 'type' => 'success']);
        }
        else
        {
            // Jika mengirim pengaduan gagal
            return redirect()->back()->with(['pengaduan' => 'Gagal terkirim!', 'type' => 'danger']);
        }
    }

    public function laporan($siapa = '')
    {
        // Membuat variable $pending isinya menghitung pengaduan status pending
        $pending = Pengaduan::where([['nik', Auth::guard('masyarakat')->user()->nik], ['status', '0']])->get()->count();
        // Membuat variable $pending isinya menghitung pengaduan status proses
        $proses = Pengaduan::where([['nik', Auth::guard('masyarakat')->user()->nik], ['status', 'proses']])->get()->count();
        // Membuat variable $pending isinya menghitung pengaduan status selesai
        $selesai = Pengaduan::where([['nik', Auth::guard('masyarakat')->user()->nik], ['status', 'selesai']])->get()->count();

        $kategori = Kategori::orderBy('id_kategori', 'desc')->get();

        // Masukkan 3 variable diatas ke dalam variable array $hitung
        $hitung = [$pending, $proses, $selesai];

        // Pengecekan jika ada parameter $siapa yang dikirimkan di url
        if ($siapa == 'me')
        {
            // Jika $siapa isinya 'me'
            $pengaduan = Pengaduan::where('nik', Auth::guard('masyarakat')->user()->nik)->orderBy('tgl_pengaduan', 'desc')->get();

            // Arahkan ke file user/laporan.blade.php sebari kirim data pengaduan, hitung, siapa
            return view('user.laporan.index', ['pengaduan' => $pengaduan, 'hitung' => $hitung, 'siapa' => $siapa, 'kategori' => $kategori]);
        }
        else
        {
            // Jika $siapa kosong
            $pengaduan = Pengaduan::where([['nik', '!=', Auth::guard('masyarakat')->user()->nik], ['status', '!=', '0']])->orderBy('tgl_pengaduan', 'desc')->get();

            // Arahkan ke file user/laporan.blade.php sebari kirim data pengaduan, hitung, siapa
            return view('user.laporan.index', ['pengaduan' => $pengaduan, 'hitung' => $hitung, 'siapa' => $siapa, 'kategori' => $kategori]);
        }
    }
}