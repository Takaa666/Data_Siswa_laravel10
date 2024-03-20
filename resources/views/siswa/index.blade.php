<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,700;1,800&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Data Siswa</title>
</head>

<body class="font-[poppins]">
    <nav class="bg-[#6F61C0] p-2">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center">
                <img src="data.svg" alt="" class="w-12 h-12 mr-2">
                <h1 class="text-xl font-bold text-white">Data <span class="text-[#8BE8E5]">Siswa</span></h1>
            </div>
            <div>
                <a href="data_jurusan.html" class="text-white mr-6 font-semibold hover:text-gray-800">Data Jurusan</a>
                <a href="data_siswa.html" class="text-white font-semibold hover:text-gray-800">Data Siswa</a>
            </div>
        </div>
    </nav>
    <form action="{{ route('siswa.store') }}" method="POST">
        @csrf
        <div class="container mx-auto" style="margin-left: 1cm;">
            <div style="margin-left: 3cm; margin-top: 2rem;">
                <div class="bg-white shadow-md h-auto mb-4 max-w-4xl relative">
                    <div class="bg-[#8BE8E5] h-10 flex items-center text-lg justify-center font-semibold text-[#363062]">
                        Buat Data Siswa
                    </div>
                    <div class="mb-4 m-3 flex flex-wrap">
                        <div class="mx-auto mb-4">
                            <label class="block text-gray-700 text-base font-semibold mb-2 font-[poppins]" for="nisn">
                                NISN
                            </label>
                            <input class="shadow appearance-none border rounded w-96 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nisn" type="text" placeholder="NISN">
                        </div>
                    </div>
                    <!-- Tambahkan dropdown untuk memilih jurusan -->
                    <div class="mb-4 m-3 flex flex-wrap">
                        <div class="mx-auto mb-4">
                            <label class="block text-gray-700 text-base font-semibold mb-2 font-[poppins]" for="jurusan">
                                Jurusan
                            </label>
                            <select id="jurusan" name="id_jurusan" class="shadow appearance-none border rounded w-96 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="" disabled selected>Pilih Jurusan</option>
                                @foreach ($jurusans as $id => $nama)
                                    <option value="{{ $id }}">{{ $nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- Akhir bagian dropdown -->
                    <div class="absolute bottom-0 right-0 mb-1 mr-4">
                        <button type="submit" class="bg-[#A084E8] hover:bg-[#6F61C0] text-white font-semibold py-2 px-4 rounded-lg">
                            Simpan Data
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Tambahkan bagian tabel untuk menampilkan data siswa -->
    <div class="container mx-auto" style="margin-left: 1cm;">
        <div style="margin-left: 3cm; margin-top: 2rem;">
            <div class="bg-white shadow-md h-auto mb-4 max-w-4xl relative">
                <div class="bg-[#A084E8] h-10 flex items-center text-lg justify-center font-semibold text-white">
                    Data Siswa
                </div>
                <div class="mb-4 m-3 flex flex-wrap">
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NISN</th>
                                <th>Nama Siswa</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>Jurusan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Tampilkan data siswa menggunakan foreach loop -->
                            @foreach ($siswas as $siswa)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $siswa->nisn }}</td>
                                    <td>{{ $siswa->nama_siswa }}</td>
                                    <td>{{ $siswa->jenis_kelamin }}</td>
                                    <td>{{ $siswa->alamat }}</td>
                                    <td>{{ $siswa->nama_jurusan }}</td>
                                    <td>
                                        <!-- Add action buttons here -->
                                        <button class="bg-red-700 w-16 text-white font-semibold py-1 px-2 rounded-lg">Hapus</button>
                                    </td>
                                </tr>
                            @endforeach
                            <!-- Akhir bagian foreach loop -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir bagian tabel -->
</body>

</html>
