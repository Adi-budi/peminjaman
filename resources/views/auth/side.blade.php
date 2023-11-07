<div class="card card-warning">
  <div class="card-header">
    <h3 class="card-title">Catatan</h3>
  </div>
  <div class="card-body">
    <p>Peminjam Hari ini</p>
    <table class="table table-head-fixed text-nowrap">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Peminjam</th>
                <th class="col-4">Status</th>
            </tr>
        </thead>
        <tbody>
          @forelse ($pengguna as $sis)
            <tr>
                <td>{{ ++$i }}</td>
                <td><a href="{{url('pengguna/detail',['nim' => $sis->nim])}}" class="text-secondary">{{ $sis->nama }}</a></td>
                @if ($sis->status =='0')
                    <td><span style="padding: 4px; background-color: red; border-radius:50px; color: white; font-size: 10px;">Belum Kembali</span></td>
                
                @else
                    <td><span style="padding: 5px; background-color: green; border-radius:50px; color: white; font-size: 10px;">Sudah Kembali</span></td>
                @endif
            </tr>
          @empty
            <tr>
                <td colspan="3">kotong</td>
            </tr>
          @endforelse
        </tbody>
    </table>
  </div>
</div>
</div>