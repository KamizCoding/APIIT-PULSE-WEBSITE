<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

Use Illuminate\Support\Facades\Auth;

use App\Models\BlogPost;
use App\Models\BlogPostLike;
use App\Models\contact;
use Alert;

class TemplateController extends Controller
{
    public function index()
    {
        return view('FrontendPages.home');
    }

    public function expandpost($id){
        $post = BlogPost::find($id);

        $sharebuttons = \Share::page(
            url("/expandpost/{$id}"),
            'Check out this blog post!',
        )->facebook()
          ->telegram()
          ->linkedin()
          ->whatsapp()
          ->twitter();

        // Pass the post and share buttons to the view
        return view('FrontendPages.expandpost', compact('post', 'sharebuttons'));
    }

    public function blog(){

        $post = BlogPost::where('post_status','=','active')->paginate(6);;

        return view('FrontendPages.blog',compact('post'));
    }

    public function createblogpost(){
        return view('FrontendPages.createblogpost');
    }

    public function new_user_post(Request $request){
        $user = Auth::user();

        $user_id = $user->id;

        $username = $user->name;

        $usertype = $user->usertype;

        $post=new BlogPost;

        $post->heading = $request->heading;

        $post->about = $request->about;

        $post->post_status = 'pending';

        $post->user_id = $user_id;

        $post->name = $username;

        $post->usertype = $usertype;

        $image = $request->picture;

        if($image){

            $imagename = time(). '.' .$image->getClientOriginalExtension();

            $request->picture->move('blogpostpic', $imagename);

            $post->picture = $imagename;
        }

        $post->save();

        Alert::info('Congratulations', 'Your post has been succesfully added to the blog');

        return redirect()->back();
    }

    public function contact(){
        return view('FrontendPages.contact');
    }

    public function contact_us(Request $request){
        $post= new contact;

        $post->user_name = $request->user_name;

        $post->user_email = $request->user_email;

        $post->subject = $request->subject;

        $post->message = $request->message;

        $post->save();

        Alert::info('Congratulations', 'Your post has been succesfully deleted from the blog');

        return redirect()->back();
    }

    public function myblogposts(){
        $user = Auth::user();

        $user_id = $user->id;

        $post= BlogPost::where('user_id','=',$user_id)->get();

        return view('FrontendPages.myblogposts', compact('post'));
    }

    public function delete_my_blog_post($id)
    {
        $post = BlogPost::find($id);

        $post->delete();

        Alert::info('Successful', 'Your post has been succesfully deleted from the blog');

        return redirect()->back();
    }

    public function my_post_update($id){

        $update = BlogPost::find($id);

        return view('FrontendPages.postupdate', compact('update'));
    }

    public function update_user_post(REQUEST $request, $id){

        $update = BlogPost::find($id);

        $update->heading=$request->heading;

        $update->about=$request->about;

        $image = $request->picture;

        if($image){

            $imagename = time(). '.' .$image->getClientOriginalExtension();

            $request->picture->move('blogpostpic', $imagename);

            $update->picture = $imagename;
        }

        $update->save();

        Alert::info('Congratulations', 'Your post in the blog has been update succesfully');

        return redirect()->back();
    }

    public function search(Request $request)
    {
    $query = $request->get('query');

    // Perform search logic using your Post model
    $posts = BlogPost::where('heading', 'like', "%{$query}%")
                ->orWhere('about', 'like', "%{$query}%")
                ->paginate(2); // Adjust pagination as needed

    return view('FrontendPages.search', compact('posts', 'query'));
    }

    public function like(BlogPost $post)
    {
        $user = Auth::user();
        if ($user) {
            $like = $post->likes()->where('user_id', $user->id)->first();
            if (!$like) {
                $post->likes()->create(['user_id' => $user->id]);
            }
        }
        return redirect()->back();
    }

    public function unlike(BlogPost $post)
    {
        $user = Auth::user();
        if ($user) {
            $like = $post->likes()->where('user_id', $user->id)->first();
            if ($like) {
                $like->delete();
            }
        }
        return redirect()->back();
    }
}