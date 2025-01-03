<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Orders;
use App\Models\Product;
use App\Models\User;
use DataTables;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    /**
     * Show the users dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): View
    {
        return view('users');
    }

    /**
     * Show User List
     *
     * @param Request $request
     * @return mixed
     */
    public function getUserList(Request $request): mixed
    {
        $data = User::get();
        $hasManageUser = Auth::user()->can('manage_user');

        return Datatables::of($data)
            ->addColumn('roles', function ($data) {
                $roles = $data->getRoleNames()->toArray();
                $badge = '';
                if ($roles) {
                    $badge = implode(' , ', $roles);
                }

                return $badge;
            })
            ->addColumn('permissions', function ($data) {
                $roles = $data->getAllPermissions();
                $badges = '';
                foreach ($roles as $key => $role) {
                    $badges .= '<span class="badge badge-dark m-1">' . $role->name . '</span>';
                }

                return $badges;
            })
            ->addColumn('action', function ($data) use ($hasManageUser) {
                $output = '';
                if ($data->name == 'Super Admin') {
                    return '';
                }
                if ($hasManageUser) {
                    $output = '<div class="table-actions">
                                <a href="' . url('user/' . $data->id) . '" ><i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>
                                <a href="' . url('user/delete/' . $data->id) . '"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                            </div>';
                }

                return $output;
            })
            ->rawColumns(['roles', 'permissions', 'action'])
            ->make(true);
    }

    /**
     * User Create
     *
     * @return mixed
     */
    public function create(): mixed
    {
        try {
            $roles = Role::pluck('name', 'id');

            return view('create-user', compact('roles'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Store User
     *
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request): RedirectResponse
    {
        // dd($request->all());

        try {
            // store user information

            $imageName = time().'.'.$request->image->extension();  
     
            $request->image->move(public_path('assets/images/members'), $imageName);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'portfolio' => $request->portfolio,
                'details' => $request->details,
                'order_num' => $request->order_num,
                'image' => $imageName,
                'password' => $request->password,
            ]);

            
            if ($user) {
                // assign new role to the user
                $user->syncRoles($request->role);
                return redirect('users')->with('success', 'New user created!');
            }

            return redirect('users')->with('error', 'Failed to create new user! Try again.');
        } catch (\Exception $e) {
            $bug = $e->getMessage();

            return redirect()->back()->with('error', $bug);
        }
    }

    /**
     * Edit User
     *
     * @param int $id
     * @return mixed
     */
    public function edit($id): mixed
    {
        try {
            $user = User::with('roles', 'permissions')->find($id);

            if ($user) {
                $user_role = $user->roles->first();
                $roles = Role::pluck('name', 'id');

                return view('user-edit', compact('user', 'user_role', 'roles'));
            }

            return redirect('404');
        } catch (\Exception $e) {
            $bug = $e->getMessage();

            return redirect()->back()->with('error', $bug);
        }
    }

    /**
     * Update User
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request): RedirectResponse
    {
        // update user info
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'name' => 'required | string ',
            'email' => 'required | email',
            'role' => 'required',
            'portfolio' => 'nullable',
            'details' => 'nullable',
            // 'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // check validation for password match
        if (isset($request->password)) {
            $validator = Validator::make($request->all(), [
                'password' => 'required | confirmed',
            ]);
        }

        if ($validator->fails()) {
            return redirect()->back()->withInput()->with('error', $validator->messages()->first());
        }

        try {


            if ($user = User::find($request->id)) {

                if($request->hasFile('image')) {
                    $imageName = time().'.'.$request->image->extension();  
                    $request->image->move(public_path('assets/images/members'), $imageName);
                    Storage::delete("assets/images/members/$user->image");
                    
                    $payload = [
                        'name' => $request->name,
                        'email' => $request->email,
                        'portfolio' =>$request->portfolio,
                        'details' =>$request->details,
                        'order_num' => $request->order_num,
                        'image' => $imageName,
                    ];

                    }else{
                        $payload = [
                            'name' => $request->name,
                            'email' => $request->email,
                            'portfolio' =>$request->portfolio,
                            'order_num' => $request->order_num,
                            'details' =>$request->details,
                            
                        ];
                    }

               
                // update password if user input a new password
                if (isset($request->password) && $request->password) {
                    $payload['password'] = $request->password;
                }

                $update = $user->update($payload);
                // sync user role
                $user->syncRoles($request->role);

                return redirect()->back()->with('success', 'User information updated succesfully!');
            }

            return redirect()->back()->with('error', 'Failed to update user! Try again.');
        } catch (\Exception $e) {
            $bug = $e->getMessage();

            return redirect()->back()->with('error', $bug);
        }
    }

    function profile_update(Request $request){
         // update user info

         dd($request->all());
        
    }
    /**
     * Delete User
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id): RedirectResponse
    {
        if ($user = User::find($id)) {
            $user->delete();

            return redirect('users')->with('success', 'User removed!');
        }

        return redirect('users')->with('error', 'User not found');
    }

    public function get_pdf($id)
    {
       
        $pdf = Product::where("id",$id)->first();

    if (!$pdf) {
        abort(404);
    }

    // Assume the files are stored in the 'public' directory under 'assets/pdfs'
    $path = public_path('assets/magazine/uploads/' . $pdf->file);

    if (!file_exists($path)) {
        abort(404);
    }

    return response()->file($path, [
        'Content-Type' => 'application/pdf',
        'Content-Disposition' => 'inline; filename="'.$pdf->file.'"'
    ]);
    }

    public function read_pdf($id){
        $pdf = Product::where("id",$id)->first();
        return view("userType.user.viewmagazine",compact("pdf"));
    }
}
