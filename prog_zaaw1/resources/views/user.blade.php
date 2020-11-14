<div class="content">
    <h1>Informacje o użytkowniku</h1>
    {{-- @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}
    <form action="UserController1" method="post" novalidate>
        @csrf
        <input type="text" name="address" placeholder="Adres" autofocus>
        @error('address')
            <span>{{$message}}</span>
        @enderror
        <br><br>
        <input type="email" name="email" placeholder="Email @" autofocus>
        @error('email')
            <span>{{$message}}</span>
        @enderror
        <br><br>
        <input type="submit" value="Wyślij dane">
    </form>
</div>