<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{

    private function getAllTodos() {
        return Todo::all();
    }

    private function taskExists($desc) {
        return Todo::where('description', "=", $desc)->exists();
    }

    public function add(Request $req) {        
        // dd($req);
        $todo = new Todo();
        $todo->description = $req->description;
        
        if ($this->taskExists($todo->description)) {
            return redirect()->route('todo.index')
                        ->with('status', 
                        ['type' => 'danger', 'message' => 'Tarefa já existe']);
        }

        $todo->save();

        return redirect()
            ->route('todo.index')
            ->with('status', 
            ['type' => 'success', 'message' => 'Adicionado com sucesso']);
    }

    public function list() {
        $todos = $this->getAllTodos();
        return view('list')->with('todos', $todos);
    }

    public function delete($id) {
        $todo = Todo::find($id);
        $todo->delete();
        return redirect()
                ->route('todo.list')
                ->with('status', 
                ['type' => 'success', 'message' => 'Deletado com sucesso']);
    }

    public function edit($id) {
        $todo = Todo::find($id);
        return view('update')->with('todo', $todo);
    }

    public function update(Request $req) {
        $todo = Todo::find($req->id);
        $todo->update([
            'description' => $req->description
        ]);
        return redirect()
                ->route('todo.list')
                ->with(['todos' => $this->getAllTodos(),
                'status' => 
                ['type' => 'success', 'message' => 'Atualizado com sucesso']]);        
    }


    public function login() {
        validator(
                request()->all(),
                [
                    'email' => ['required', 'email'],
                    'password' => ['required']
                ], [
                    'email.required' => 'Campo de e-mail obrigatório',
                    'email.email' => 'Forneça um e-mail válido',
                    'password.required' => 'Campo de senha obrigatório'
                ])->validate();
        
        if (auth()->attempt(request()->only(['email', 'password']))) {
            return redirect()->route('todo.list')->with('status', ['type' => 'success', 'message' => 'Bem vindo']);
        }
        return redirect()->back()->withErrors(['Login ou senha incorretos']);        
    }

    public function logout() {
        auth()->logout();
        return redirect()->route('login');
    }
}
