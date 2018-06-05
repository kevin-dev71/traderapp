<form action="{{ route('trades.destroy', ['trade_id' => $trade->id]) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger text-white">
        <i class="fa fa-trash"></i> {{ __("Eliminar") }}
    </button>
</form>