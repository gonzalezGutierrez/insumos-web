<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        $like = $request->like;
        $user = new User();
        $users = $user->getUsers($like)->paginate(10);
        return view('admin.users.index',['users'=>$users,'like'=>$like]);
    }

    public function create()
    {
        return view('admin.users.create',['user'=>new User()]);
    }

    public function store(UserStoreRequest $request)
    {
        User::create($request->all());
        return redirect('/usuarios');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return view('admin.users.edit',['user'=>User::findOrFail($id)]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->fill($request->all())->save();
        return redirect('usuarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
