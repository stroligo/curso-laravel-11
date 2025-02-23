
@csrf()
<div class="flex flex-col gap-4 w-[400px] p-6 bg-gray-200"> 
<input type="text" name="name" placeholder="Nome" value="{{ $user->name ?? old('name') }}">
<input type="email" name="email" placeholder="Email" value="{{ $user->email ?? old('email') }}">
@if (!isset($user))
    <input type="password" name="password" placeholder="Senha">
    <button type="submit">Adicionar novo</button>
@else
    <button type="submit">Atualizar</button>
@endif
<x-alert />
</div>