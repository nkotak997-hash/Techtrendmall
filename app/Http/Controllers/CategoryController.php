<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function edit($id)
{
    // Fetch the category by ID
    $category = Category::findOrFail($id);

    // Fetch all categories for the dropdown
    $allCategories = Category::all();

    // Return the edit view with the category and all categories
    return view('admin.edit_cat', compact('category', 'allCategories'));
}


    // Handle the update request
    public function update(Request $request, $id)
{
    // Validate the request
    $request->validate([
        'name' => 'required|regex:/^[a-zA-Z\s]*$/',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'video' => 'nullable|mimes:mp4,mov,ogg,qt|max:20000', // Adjust validation as needed
    ], [
        'name.regex' => 'The category name must only contain letters and spaces.',
    ]);

    // Fetch the category
    $category = Category::findOrFail($id);

    // Handle image file upload
    if ($request->hasFile('image')) {
        // Delete the old image if it exists
        if ($category->img && file_exists(public_path('images/' . $category->img))) {
            unlink(public_path('images/' . $category->img));
        }

        // Save the new image
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $category->img = $imageName;
    }

    // Handle video file upload
    if ($request->hasFile('video')) {
        // Delete the old video if it exists
        if ($category->video && file_exists(public_path('images/' . $category->video))) {
            unlink(public_path('videos/' . $category->video));
        }

        // Save the new video
        $videoName = time() . '.' . $request->video->extension();
        $request->video->move(public_path('videos'), $videoName);
        $category->video = $videoName;
    }

    // Update category name
    $category->name = $request->name;

    // Save changes
    $category->save();

    // Redirect back with a success message
    return redirect()->route('category')->with('success', 'Category updated successfully!');
}

}
