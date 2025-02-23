<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10); //User::all();
        //dd($users);
        return  view('admin.users.index', compact('users'));
    }
    public function indexPaginado()
    {
        return User::paginate();
    }
    public function create()
    {
        return view('admin.users.create');
    }
    public function store(StoreUserRequest $request)
    {
        //dd($request->all());
        User::create($request->all());
        //Redirecionar para a listagem de usuários
        return redirect()
            ->route('users.index')
            ->with('success', 'Usuário criado com sucesso!')
        ;
    }

    public function edit(string $id)
    {
        //$user = User::findOrFail($user);
        //$user = User::where('id', $user)->first();
        if (!$user = User::find($id)) {
            return redirect()->route('users.index')->with('error', 'Usuário não encontrado!');
        }
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, string $id)
    {
        if (!$user = User::find($id)) {
            return back()->with('error', 'Usuário não encontrado!');
        }
        $user->update($request->only('name', 'email'));

        return redirect()
            ->route('users.index')
            ->with('success', 'Usuário atualizado com sucesso!')
        ;
    }

    public function show(string $id)
    {
        if (!$user = User::find($id)) {
            return redirect()->route('users.index')->with('error', 'Usuário não encontrado!');
        }
        return view('admin.users.show', compact('user'));
    }
    public function destroy(string $id)
    {

        // if (Gate::denies('is-admin')) {
        //    return back()->with('error', 'Acesso negado!');
        //} 

        if (!$user = User::find($id)) {
            return redirect()->route('users.index')->with('error', 'Usuário nao encontrado!');
        }

        if (Auth::check() && Auth::user()->id === $user->id) {
            return redirect()->route('users.index')->with('error', 'Não é possível excluir o próprio usuário!');
        }
        $userName = $user->name;
        $user->delete();

        return redirect()
            ->route('users.index')
            ->with('success', 'Usuário "' . $userName . '" excluido com sucesso!')
        ;
    }
}
