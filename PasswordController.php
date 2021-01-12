public function password_update(Request $request){

        $this->validate($request, [
            'old_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;

        if (Hash::check($request->old_password , $hashedPassword )) {

            if (!Hash::check($request->new_password , $hashedPassword)) {

                $users =User::find(Auth::user()->id);
                $users->password = bcrypt($request->new_password);
                User::where( 'id' , Auth::user()->id)->update( array( 'password' =>  $users->password));

                return back()->with('message','Password Updated Successfully');
            }

            else{
                return back()->with('danger2','New Password can not be the old password!');
            }
        }

        else{
            return back()->with('danger',"Old Password Doesn't Matched ");
        }
    }
