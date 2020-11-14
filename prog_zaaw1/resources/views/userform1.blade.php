<div class="content">
    <h1>Informacje o użytkowniku</h1>
    <form action="UserController" method="post">
        @csrf
        <input type="text" name="email" placeholder="Email @" autofocus><br><br>
        <input type="password" name="password" placeholder="Hasło"><br><br>
        <input type="submit" value="Wyślij dane">
    </form>
</div>