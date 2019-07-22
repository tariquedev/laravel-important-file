if ($request->hasFile('profile_photo')) {

    $get_db_img = Employee::findOrFail($request->id)->profile_photo;

    if (file_exists(public_path($get_db_img) != '/images/teachers_stuff/default.png')){
        unlink(public_path($get_db_img));
    }

    $image = $request->file('profile_photo');
    $get_image = Str::random(5) . '-' . strtolower(str_replace('', '-', $image->getClientOriginalName()));
    Image::make($image)->resize(220, 174)->save(base_path('public/images/teachers_stuff/' . $get_image));

  }
