<h4 style="color: rgb(14, 142, 247)">RUMAH SAKIT UMUM HARAPAN IBU PURBALINGGA
</h4>
<p>JL. May. Jend. Soengkono KM.1, JL. Soekarno-Hatta No.2, Telp. (0281) 892222 /
    892277 Fax (0281) 893031 </p>
<p>Email : rsuhipbg@yahoo.co.id Website : <a href="http://www.rsuharapanibu.co.id/">www.rsuharapanibu.co.id</a></p>
<p>PURBALINGGA</p>
<br>
<p>DAFTAR SEMUA UNIT</p>
<br>
<table>
    <thead>
        <tr>
            <th>
                No
            </th>
            <th>
                Nama Unit
            </th>
            <th>
                Kepala/Koordinator Ruang
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($units as $u)
            <tr>
                <td>
                    {{ $i++ }}
                </td>
                <td>
                    {{ $u->nama }}
                </td>
                <td>
                    {{ $u->user->name }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
