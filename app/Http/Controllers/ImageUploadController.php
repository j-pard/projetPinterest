<?php
   
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
  
class ImageUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function upload()
    {
        return view('imageUpload');
    }
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function uploadPost(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
  
        $imageName = time().'.'.$request->image->extension();  
   
        $request->image->move(public_path('images'), $imageName);

        // Updating DB : User->avatar
        $auth =  Auth::user()->id;
        User::where('id', $auth)
            ->update([
                  'avatar' => 'images/' . $imageName
            ]);
   
        return back()
            ->with('success','You have successfully upload image.')
            ->with('image',$imageName);
   
    }

    // COVER

    public function coverUpload()
    {
        return view('coverUpload');
    }
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function coverUploadPost(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
  
        $imageName = time().'.'.$request->image->extension();  
   
        $request->image->move(public_path('images/cover'), $imageName);

        // Updating DB : User->cover
        $auth =  Auth::user()->id;

        User::where('id', $auth)
            ->update([
                  'cover' => '/images/cover/' . $imageName
            ]);
   
        return back()
            ->with('success','You have successfully upload image.')
            ->with('image',$imageName);
   
    }
}