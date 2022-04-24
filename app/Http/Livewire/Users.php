<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\User;

use Livewire\Component;

class Users extends Component
{
    public $users, $name, $email, $users_id;
    // protected $posts;
    public $posts = 'posts';
    public $UpdateMode = false;

    public function render()
    {
        $this->users = User::all();
        return view('livewire.users');
    }
    private function resetInputFileds()
    {

        $this->name = '';
        $this->email = '';
    }
    public function store()
    {

        $validateDate = $this->validate([
            'name' => 'required',
            'email' => 'required|email',

        ]);
        User::create($validateDate);

        session()->flash('message', 'Users Created successfully');
        $this->resetInputFileds();
    }
    public function edit($id)
    {
        $this->UpdateMode = true;
        $user = User::where('id', $id)->first();
        $this->users_id = $id;
        $this->name = $user->name;
        $this->email = $user->email;
    }
    public function posts($id)
    {
        $this->UpdateMode = 'test';
        // $posts = Post::where('user_id', $id);
        $this->posts = Post::all()->where('user_id', $id);
        return view('livewire.posts', ['posts' => $this->posts]);
    }
    public function cancel()
    {
        $this->UpdateMode = false;
        $this->resetInputFileds();
    }

    public function update()
    {
        $validateDate = $this->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        if ($this->users_id) {
            $user = User::find($this->users_id);
            $user->update([
                'name' => $this->name,
                'email' => $this->email,
            ]);
            $this->UpdateMode = false;
            session()->flash('message', ' Users Updatted successfully');
            $this->resetInputFileds();
        }
    }
    public function delete($id)
    {

        if ($id) {
            User::where('id', $id)->delete();
            session()->flash('message', 'Users Deleted successfully');
        }
    }
}
