<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class BlogController extends Controller
{
    //
    public function index(){
        $blog=Blog::latest("created_at")->paginate(10);
        return $blog;
    }
    // for show the detail of the blog 
    public function blogDetails($id){
        try {
            //code...
            $blog=Blog::find($id);
            if(!$blog){
                return response()->json([
                    'message'=>'post not found',
                ],404);
            }
            return response()->json([
                'message' => 'Post retrieved successfully',
                'data' => $blog
            ], 200);
        } catch (\Exception $th) {
            //throw $th;
            return response()->json([
                'message'=> 'something went wrong',
                'error'=>$th->getMessage()
                ],500);
        }
    }
    // here for store the blog page 
    public function storeBlog(Request $request){
      // dump($request->all());
        try {
            // Validate request
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'content' => 'required',
                'author' => 'required|string|max:255',
                'publication_date' => 'required|date',
            ]);
    
            // Create blog post
            //$blog = Blog::create($validatedData);
            $blog = Blog::create(([
                'title'=> $validatedData['title'],
                'content'=> $validatedData['content'],
                'author'=> $validatedData['author'],
                'publication_date'=> $validatedData['publication_date']
            ]));
    
            // Return response
            return response()->json([
                'message' => 'Blog post created successfully!',
                'data' => $blog
            ], 201);
    
        } catch (ValidationException $e) {
            // Return validation errors
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            // Handle unexpected errors
            return response()->json([
                'message' => 'Something went wrong!',
                'error' => $e->getMessage()
            ], 500);
        }
        


    }
    public function updateBlog(Request $request,$id){
        try {
            $data = Blog::findOrFail($id);
            if(!$data){
                return response()->json([
                    'message'=> 'Not Post found relate this'
                    ],404);

            }
            $validatedData = $request->validate([
                'title' => 'sometimes|required|string|max:255',
                'content' => 'sometimes|string',
                'author' => 'sometimes|string|max:255',
                'publication_date' => 'sometimes|date',
            ]);
            // $data->update([
            //     'title'=> $validatedData['title'],
            //     'content'=> $validatedData['content'],
            //     'author'=> $validatedData['author'],
            //     'date'=> $validatedData['publication_date']
            // ]);
            $data->update((array)$validatedData);
            return response()->json([
                'message'=> 'post update successfully'
                ], 200);

        } catch (ValidationException $e) {
            // Return validation errors
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            // Handle unexpected errors
            return response()->json([
                'message' => 'Something went wrong!',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    // for deleating the Post

    public function deleateBlog($id){
        try {
            //code...
            $data = Blog::find($id);
            if(!$data){
                return response()->json([
                    'message'=> 'post not found'
                ],404);
                
            }
            $data->delete();
            return response()->json([
                'message'=> 'Post deleated success fully'
            ],200);
     

        } catch (\Exception $th) {
            //throw $th;
            return response()->json([
                 'message'=> 'something went wrong',
                 'error'=> $th->getMessage()
                 ],500);
        }
    }
}  
