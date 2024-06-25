<form action="{{ route('user.store') }}" method="post">
    @csrf
    @method('POST')
    <div>
        <label for="#pengajuan">Pengajuan</label>
        <input type="text" id="pengajuan" name="pengajuan" required>
    </div>
    <div>
        <label for="#level">Jenis Pelanggaran</label>
        <select name="level" id="level">
            <option value="ringan">ringan</option>
            <option value="sedang">sedang</option>
            <option value="berat">berat</option>
        </select>
    </div>
    <div>
        <button type="submit">Adukan</button>
    </div>
</form>
<hr>

@foreach ($pengajuan as $item)
    <div>
        <p>Pengajuan: {{ $item->pengajuan }}</p>
        <p>Tingkat: {{ $item->level }}</p>
        <p>{{ $item->created_at->format('d' . '-' . 'F' . '-' . 'Y') }}</p>
        <p>Has Seen:
            @if ($item->status == false)
                Hasn't Seen ❌
            @else
                Have Seen ✅
            @endif
        </p>
        <p>reply: {{ $item->reply }}</p>
    </div>
    <hr>
@endforeach
