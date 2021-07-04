{{-- <form action="{{ route('admin.posts.destroy', $post->id) }}" method="post"> --}}

    @csrf
    @method('DELETE')

    <button type="submit" class="btn btn-danger" title="Delete">
        <i class="far fa-trash-alt"></i>
        
    </button>
    {{-- <input type="submit" value="Delete"> --}}


{{-- </form> --}}