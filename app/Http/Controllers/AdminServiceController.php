<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminServiceController extends Controller
{
    /**
     * Display service administrator panel.
     */
    public function index()
     {
         $services = Service::all();
         return view('admin.services', compact('services'));
     }
 
     /**
      * Add new E-Service to index listings.
      */
     public function store(Request $request)
     {
         $request->validate([
             'name' => 'required|string|max:255',
             'description' => 'required|string',
             'link' => 'required|url',
             'icon_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
             'theme_color' => 'required|string',
             'is_featured' => 'required|boolean'
         ]);
 
         $iconPath = 'bi bi-briefcase';
         if ($request->hasFile('icon_image')) {
             $file = $request->file('icon_image');
             $filename = time() . '_' . $file->getClientOriginalName();
             $file->move(public_path('uploads/services'), $filename);
             $iconPath = 'uploads/services/' . $filename;
         }

         Service::create([
             'name' => $request->name,
             'description' => $request->description,
             'link' => $request->link,
             'icon_class' => $iconPath,
             'theme_color' => $request->theme_color,
             'is_featured' => $request->is_featured
         ]);
 
         return back()->with('success', 'New E-Service added successfully.');
     }
 
     /**
      * Update active E-Service details.
      */
     public function update(Request $request, $id)
     {
         $service = Service::findOrFail($id);
 
         $request->validate([
             'name' => 'required|string|max:255',
             'description' => 'required|string',
             'link' => 'required|url',
             'icon_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
             'theme_color' => 'required|string',
             'is_featured' => 'required|boolean'
         ]);
 
         $iconPath = $service->icon_class;
         if ($request->hasFile('icon_image')) {
             // Delete old image if exists and is not a default icon class
             if (!str_starts_with($service->icon_class, 'bi ')) {
                 $oldFile = public_path($service->icon_class);
                 if (File::exists($oldFile)) {
                     File::delete($oldFile);
                 }
             }

             $file = $request->file('icon_image');
             $filename = time() . '_' . $file->getClientOriginalName();
             $file->move(public_path('uploads/services'), $filename);
             $iconPath = 'uploads/services/' . $filename;
         }

         $service->update([
             'name' => $request->name,
             'description' => $request->description,
             'link' => $request->link,
             'icon_class' => $iconPath,
             'theme_color' => $request->theme_color,
             'is_featured' => $request->is_featured
         ]);
 
         return back()->with('success', 'E-Service details updated.');
     }
 
     /**
      * Delete E-Service listing.
      */
     public function destroy($id)
     {
         $service = Service::findOrFail($id);
         
         // Delete icon file if it's a custom uploaded file
         if (!str_starts_with($service->icon_class, 'bi ')) {
             $oldFile = public_path($service->icon_class);
             if (File::exists($oldFile)) {
                 File::delete($oldFile);
             }
         }

         $service->delete();
         return back()->with('success', 'E-Service deleted successfully.');
     }
}
