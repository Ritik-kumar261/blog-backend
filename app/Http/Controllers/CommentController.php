<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Log;

class CommentController extends Controller
{
    //index
    public function index($id){
        $post_id = $id;
        if(!$post_id){
            return response()->json([
                "message"=>"There is no Post_id"
            ],422);
        }
        $comments = Comment::select('id','content')->where('post_id',"=", $post_id)->orderBy("created_at","desc")->paginate(5);
        if ($comments->isEmpty()) {
            return response()->json([
                "message" => "No comments found for this post."
            ], 200);
        }
        return response()->json([
            "message"=> "Successfully fetch the comment",
            "data"=>$comments,
            ],200);
    }
    // for storing the comment 
    public function storeComment(Request $request ){
        try {
             
            $post_id = $request->input("post_id");
            if(!$post_id ){
                throw new Exception("There is not post id ");
            }
            $blog = Blog::find($post_id);
            if(empty($blog)){
            throw new Exception("There is not such type of post present");
            }
            $comment = $request->validate([
                "comment"=>"string|required|max:255"
            ]);

            $data = Comment::create([
                "post_id"=> $post_id,
                "content"=> $comment["comment"]
            ]);
            return response()->json([
                "message"=> "Comment added sucessfully",
                "data"=> $data
                ],200);
        } catch (ValidationException $e) {
            return response()->json([
                "message"=> "Validation failed",
                "error"=>$e->getMessage()
            ],422);
        } catch (Exception $th) {
            return response()->json([
                "message"=> "something went wrong",
                "error"=>$th->getMessage()
            ],500);
        }
        
    }

    // for the deleate the comment 
    public function deleteComment($id){
        try {
            //code...
            $comment_id= $id;
            $comment = Comment::find($comment_id);

            if (!$comment) {
                return response()->json([
                    "message" => "Comment is already deleted or does not exist"
                ], 404);
            }
            
            $comment->delete();
            return response()->json([
                "message" => "Comment deleted successfully"
            ], 200);


        } catch (Exception $th) {
            //throw $th;
            return response()->json([
                "message"=> "something went wrong",
                "error"=>$th->getMessage()
            ],500);

        }
    }
}
