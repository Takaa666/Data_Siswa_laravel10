<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,700;1,800&display=swap" rel="stylesheet">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Data Jurusan</title>
</head>

<body class="font-[poppins]">
  <nav class="bg-[#6F61C0] p-2">
    <div class="container mx-auto flex justify-between items-center">
      <div class="flex items-center">
        <img src="data.svg" alt="" class="w-12 h-12 mr-2">
        <h1 class="text-xl font-bold text-white">Data <span class="text-[#8BE8E5]">Siswa</span></h1>
      </div>
      <div>
        <a href="" class="text-white mr-6 font-semibold hover:text-gray-800">Data Jurusan</a>
        <a href="" class="text-white font-semibold hover:text-gray-800">Data Siswa</a>
      </div>
    </div>
  </nav>

  <form method="POST" action="{{ route('jurusan.store') }}">
    @csrf
    <div class="absolute bottom-0 right-0 mb-1 mr-4 w-36">
        <input type="text" name="nama_jurusan" placeholder="Nama Jurusan" required>
        <button type="submit" class="bg-[#A084E8] hover:bg-[#6F61C0] text-white font-semibold py-2 px-4 rounded-lg">
            Simpan Data
        </button>
    </div>
</form>

  <div class="container mx-auto" style="margin-left: 1cm;">
    <div style="margin-left: 3cm; margin-top: 2rem;">
      <div class="bg-white shadow-md h-56 mb-4 max-w-4xl relative">
        <div class="bg-[#A084E8] h-10 flex items-center text-lg justify-center font-semibold text-white">
          Data Jurusan
        </div>
        <div class="mb-4 m-3 flex flex-wrap">
          <table class="w-full">
            <thead>
                <tr class="bg-[#D5FFE4]">
                    <th class="py-2 px-4 text-[#363062]">No</th>
                    <th class="py-2 px-4 text-[#363062]">Nama Jurusan</th>
                    <th class="py-2 px-4 text-[#363062]">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jurusans as $jurusan)
                    <tr>
                        <td class="py-2 px-4">{{ $jurusan->id_jurusan }}</td>
                        <td class="py-2 px-4">{{ $jurusan->nama_jurusan }}</td>
                        <td class="py-2 px-4">
                            <a href="{{ route('jurusan.edit', $jurusan->id_jurusan) }}" class="bg-[#A084E8] hover:bg-[#6F61C0] text-white font-semibold py-2 px-4 rounded-lg">Edit</a>
                            <form method="POST" action="{{ route('jurusan.destroy', $jurusan->id_jurusan) }}">
                              @csrf
                              @method('DELETE')
                              <button type="submit">Delete</button>
                          </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
      </div>
    </div>
  </div>
</body>

</html>