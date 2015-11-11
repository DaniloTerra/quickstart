<?php

Route::get('/', function () {
    return view('tasks');
});

Route::post('/task', function (Request $request) {
  $validator = Validator::make($request->all(), ['name' => 'required|max:255']);

  if ($validator->fails()) {
    return redirect('/')
           ->withInput()
           ->withErros($validator);
  }

  // Create the task
  $task = new Task();
  $task->name = $request->name;
  $task->save();

  return redirect('/');
});

Route::delete('/task/{id}', function ($id) {
  //
});
