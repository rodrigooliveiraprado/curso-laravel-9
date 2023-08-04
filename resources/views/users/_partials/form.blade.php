@csrf
<input type="text" name="name" id="name" placeholder="Nome:" value="{{ $user->name ?? old('name') }}">
<br><br>
<input type="email" name="email" id="email" placeholder="E-mail:" value="{{ $user->email ?? old('email')  }}">
<br><br>
<input type="password" name="password" id="password" placeholder="Senha:">
<br><br>
<button type="submit">Enviar</button>