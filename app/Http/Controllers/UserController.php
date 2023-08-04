<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateUserFormRequest;
use App\Models\User;

class UserController extends Controller
{
    protected $modelUser;

    public function __construct(User $user)
    {
        $this->modelUser = $user;
    }

    public function index(Request $request)
    {
        $search = $request->search;
        $users = $this->modelUser
                    ->getUsers(search: $request->search ?? '');

        return view('users.index', compact('users'));
    }

    public function show($id)
    {
        // $user = $this->modelUser->where('id', $id)->first();
        if (!$user = $this->modelUser->find($id))
            return redirect()->route('users.index');

        return view('users.show', compact('user'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(StoreUpdateUserFormRequest $resquest)
    {
        $data = $resquest->all();
        $data['password'] = bcrypt($resquest->password);

        $user = $this->modelUser->create($data);

        //return return redirect()->route('users.show', $user->id);
        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        if (!$user = $this->modelUser->find($id))
            return redirect()->route('users.index');

        return view('users.edit', compact('user'));
    }

    public function update(StoreUpdateUserFormRequest $request, $id)
    {
        if (!$user = $this->modelUser->find($id))
            return redirect()->route('users.index');

        $data = $request->only('name', 'email');
        if ($request->password)
            $data['password'] = bcrypt($request->password);

        $user->update($data);

        return redirect()->route('users.index');
    }

    public function delete($id)
    {
        if (!$user = $this->modelUser->find($id))
            return redirect()->route('users.index');

        $user->delete();

        return redirect()->route('users.index');
    }
}
