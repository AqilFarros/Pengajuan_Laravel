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
        <p>{{ $item->reply }}</p>
        <form action="{{ route('admin.status', $item->id) }}" method="post">
            @csrf
            @method('PUT')
            <button type="submit">Have Seen</button>
        </form>
        <form action="{{ route('admin.reply', $item->id) }}" method="post">
            @csrf
            @method('PUT')
            <div>
                <label for="#reply">Reply</label>
                <textarea name="reply" id="reply"></textarea>
            </div>

            <div>
                <button type="submit">reply</button>
            </div>
        </form>
        <form action="{{ route('admin.delete', $item->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit ">Delete</button>
        </form>
    </div>
    <hr>
@endforeach
