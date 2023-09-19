@if ($errors->any())
    <ul class="alert mx-16 text-red-600">
        @foreach ($errors->all() as $error)
            <li>・{{ $error }}</li>
        @endforeach
    </ul>
@endif