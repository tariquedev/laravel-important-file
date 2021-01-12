if ($request->hasFile('profile_photo')) {

    $get_db_img = Employee::findOrFail($request->id)->profile_photo;
    $img_location = public_path('images/employee/'.$get_db_img);

    if (file_exists($img_location != '/images/default.png')){
        unlink($img_location);
    }

    $image = $request->file('profile_photo');
    //$get_image = Str::random(5) . '-' . strtolower(str_replace('', '-', $image->getClientOriginalExtension()));
    $get_image = Str::random(5) . '-' . strtolower(str_replace('', '-', $image->getClientOriginalName()));
    Image::make($image)->resize(220, 174)->save($img_location, 80);

  }
