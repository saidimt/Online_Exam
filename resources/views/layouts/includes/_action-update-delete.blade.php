<!-- resources/views/layouts/includes/_action-update-delete.blade.php -->
<!-- resources/views/layouts/includes/_action-update-delete.blade.php -->
<div class="d-flex">
    <a class="btn btn-info btn-sm me-1" href="{{ $updateLink }}">
        <i class="bi bi-pencil"></i>
    </a>
    <form action="{{ $deleteLink }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm">
            <i class="bi bi-trash"></i>
        </button>
    </form>
</div>
