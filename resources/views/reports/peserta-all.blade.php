<h4 style="color: rgb(14, 142, 247)">RUMAH SAKIT UMUM HARAPAN IBU PURBALINGGA
</h4>
<p>JL. May. Jend. Soengkono KM.1, JL. Soekarno-Hatta No.2, Telp. (0281) 892222 /
    892277 Fax (0281) 893031 </p>
<p>Email : rsuhipbg@yahoo.co.id Website : <a href="http://www.rsuharapanibu.co.id/">www.rsuharapanibu.co.id</a></p>
<p>PURBALINGGA</p>
<br>
<p>DAFTAR {{ \Str::upper($type) }}</p>
<br>
<table>
    <thead>
        <tr>
            <th>
                No
            </th>
            <th>
                Nama
            </th>
            <th>
                Nama Lengkap
            </th>
            <th>
                Jenis Kelamin
            </th>
            <th>
                Tempat, Tanggal Lahir
            </th>
            <th>
                Agama
            </th>
            <th>
                Alamat KTP
            </th>
            <th>
                Alamat Domisili
            </th>
            <th>
                No Hp
            </th>
            <th>
                Email
            </th>
            <th>
                Pendidikan
            </th>
            <th>
                Jurusan
            </th>
            <th>
                Sekolah/Universutas
            </th>
            <th>
                Tahun Lulus
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($peserta as $p)
            <tr>
                <td>
                    {{ $i++ }}
                </td>
                <td>
                    {{ $p->name }}
                </td>
                <td>
                    {{ $p->nama_lengkap }}
                </td>
                <td>
                    @if ($p->jk == 1)
                        Laki-laki
                    @else
                        Perempuan
                    @endif
                </td>
                <td>
                    {{ $p->tempat_lahir }}, {{ Carbon\Carbon::parse($p->tgl_lahir)->translatedFormat('d F Y') }}
                </td>
                <td>
                    {{ $p->agama }}
                </td>
                <td>
                    {{ $p->alamat_ktp }}
                </td>
                <td>
                    {{ $p->alamat_sekarang }}
                </td>
                <td>
                    {{ $p->no_hp }}
                </td>
                <td>
                    {{ $p->email }}
                </td>
                <td>
                    {{ $p->pendidikan }}
                </td>
                <td>
                    {{ $p->jurusan }}
                </td>
                <td>
                    {{ $p->instansi }}
                </td>
                <td>
                    {{ $p->tahun_lulus }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
