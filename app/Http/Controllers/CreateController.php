<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Pagemain;
use App\Pagesub;
use App\Comment;
use App\Contentmain;
use App\Contentsub;
use App\Pagetype;
use App\Chat;
use App\Chat_user;
use App\Chat_msg;
use App\Staff;
use App\User;
use Auth;

class CreateController extends Controller
{
    

    public function deleteconfirmation($id){
        Staff::where('staff_id', $id)
        ->delete();
        return redirect('/dashboard/staff')->with('info', 'Staff Deleted Sucessfully');
    }

    public function updatemystaff($id){
        $pagemains = Pagemain::all();
        $userss = User::where('id', $id)->get();
        $users = User::all();
        return view('/admin/editstaff', ['userss' => $userss, 'users' => $users, 'pagemains' => $pagemains]);
    }

    public function edituserstat(Request $request, $id){
        $data = array(
            'level'=> $request->input('level'),
            'stat'=>$request->input('status')
            );
        User::where('id', $id)
        ->update($data);
    }

    public function confirmstaff($id){
        
        $data = array(
            'stat'=> 'active',
            'level' => '1'
            );
        User::where('id', $id)
        ->update($data);
        return redirect('/dashboard/staff')->with('info', 'Staff Updated Sucessfully');
    }

    public function home(){
    	$articles = Article::all();
    	$pagemains = Pagemain::all();
        $contentmains = Contentmain::all();
        $chat_users = Chat_user::all();
        $pageid = "";
        $num =0;
        foreach ($pagemains as $pagemain) {
            if($num < 1){
                $pageid = $pagemain->page_id;    
            }
            $num++;
        }

        $pagemainss = Pagemain::where('page_id', $pageid)->get();

        $comments = Comment::all();
        $contentsubs = Contentsub::where('page_id', $pageid)->get();
        $contentsubs1 = Contentsub::all();

        $editpermission = false;
    	return view('home', ['articles' => $articles, 'pagemains' => $pagemains, 'pagemains1' => $pagemainss, 'comments' => $comments, 'editpermission' => $editpermission, 'contentsubs' => $contentsubs, 'contentmains' => $contentmains, 'contentsubs1' => $contentsubs1, 'chat_users' => $chat_users]);
    }

    public function dashboard(){
        $articles = Article::all();
        $pagemains = Pagemain::all();
        $comments = Comment::all();
        $users = User::all();
        return view('admin/home', ['users' => $users, 'articles' => $articles, 'pagemains' => $pagemains, 'comments' => $comments]);
    }

    public function addtask(Request $request){
    	$this->validate($request, [
    		'title'=>'required',
    		'description'=>'required'
    		]);
    	$articles = new Article;
    	$articles->title = $request->input('title');
    	$articles->description = $request->input('description');
    	$articles->save();
    	return redirect('/dashboard')->with('info', 'Test Saved Sucessfully');
    }

    public function updatetask($id){
        $pagemains = Pagemain::all();
    	$articles = Article::find($id);
    	return view('admin/edittask', ['articles' => $articles, 'pagemains' => $pagemains]);
    }

    public function edittask(Request $request, $id){
    	$this->validate($request, [
    		'title'=>'required',
    		'description'=>'required'
    		]);
    	$data = array(
    		'title'=> $request->input('title'),
    		'description'=>$request->input('description')
    		);
    	Article::where('id', $id)
    	->update($data);
    	return redirect('/dashboard')->with('info', 'Test Updated Sucessfully');
    }

    public function viewtask($id){
        $pagemains = Pagemain::all();
    	$articles = Article::find($id);
    	return view('admin/viewtask', ['articles' => $articles, 'pagemains' => $pagemains]);
    }

    public function deletetask($id){
    	Article::where('id', $id)
    	->delete();
    	return redirect('/dashboard')->with('info', 'Test Deleted Sucessfully');
    }

    public function viewpages($id){
        $pagemains = Pagemain::where('page_id',$id)->get();
        $pagemainss = Pagemain::all();
        $contentmains = Contentmain::all();
        $contentsubs = Contentsub::where('page_id',$id)->get();
        $contentsubs1 = Contentsub::all();
        $chat_users = Chat_user::all();
        $editpermission = false;
        return view('pages', ['pagemains1' => $pagemains, 'pagemains' => $pagemainss, 'editpermission' => $editpermission, 'contentmains' => $contentmains, 'contentsubs' => $contentsubs, 'contentsubs1' => $contentsubs1, 'chat_users' => $chat_users]);
    }

    public function addcomment(Request $request){
        $this->validate($request, [
            'title'=>'required',
            'comment'=>'required'
            ]);
        $comments = new Comment;
        $comments->title = $request->input('title');
        $comments->comment = $request->input('comment');
        $comments->save();
        return redirect('/dashboard')->with('infocomment', 'Comment Saved Sucessfully');

    }

    public function updatecomment($id){
        $comments = Comment::find($id);
        $pagemains = Pagemain::all();
        return view('admin/editcomment', ['comments' => $comments, 'pagemains' => $pagemains]);
    }

    public function editcomment(Request $request, $id){
        $this->validate($request, [
            'title'=>'required',
            'comment'=>'required'
            ]);
        $data = array(
            'title'=> $request->input('title'),
            'comment'=>$request->input('comment')
            );
        Comment::where('id', $id)
        ->update($data);
        return redirect('/dashboard')->with('infocomment', 'Comment Updated Sucessfully');
    }

    public function viewcomment($id){
        $pagemains = Pagemain::all();
        $comments = Comment::find($id);
        return view('admin/viewcomment', ['comments' => $comments, 'pagemains' => $pagemains]);
    }

    public function deletecomment($id){
        Comment::where('id', $id)
        ->delete();
        return redirect('/dashboard')->with('infocomment', 'Comment Deleted Sucessfully');
    }

    public function menulist(){
        $pagemains = Pagemain::all();
        $pagesubs = Pagesub::all();
        $pagetypes = Pagetype::all();
        $users = User::all();
        return view('admin/menulist', ['users' => $users, 'pagemains' => $pagemains, 'pagesubs' => $pagesubs, 'pagetypes' => $pagetypes]);
    }

    public function addmenu(Request $request){
        $this->validate($request, [
            'name'=>'required',
            'template'=>'required'
            ]);
        $pagemains = new Pagemain;
        $pagemains->name = $request->input('name');
        $pagemains->template = $request->input('template');
        $pagemains->pagetype_id = $request->input('category');
        $pagemains->save();

        $pagemains = Pagemain::all();
        $pageid = "";
        foreach ($pagemains as $pagemain) {
            $pageid = $pagemain->page_id;
        }

        $pagesubs = new Pagesub;
        $pagesubs->page_id = $pageid;
        $pagesubs->page_parent_id = $request->input('parent');
        $pagesubs->save();

        $folder = 'page'.$pageid;
        $path = base_path().'/resources/views/jgcontents/' . $folder;
        //File::makeDirectory($path, $mode = 0777, true);

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        return redirect('/dashboard/pages')->with('info', 'Page Saved Sucessfully');
    }

    public function updatepage($id){
        $pagemains = Pagemain::where('page_id', $id)->get();
        $pagemainss = Pagemain::all();
        $pagetypes = Pagetype::all();
        $contentmains = Contentmain::all();
        $contentsubs = Contentsub::where('page_id', $id)->get();
        $users = User::all();

        $pagesubs = Pagesub::where('page_id', $id)->get();
        $pagesubid="";
        foreach ($pagesubs as $pagesub) {
            $pagesubid = $pagesub->page_parent_id;
        }

        $pagemainsss = Pagemain::where('page_id', $pagesubid)->get();

        return view('admin/editpage', ['users' => $users, 'pagemains' => $pagemains, 'pagemainss' => $pagemainss, 'pagemainsss' => $pagemainsss, 'pagetypes' => $pagetypes, 'contentmains' => $contentmains, 'contentsubs' => $contentsubs]);
    }

    public function editpage(Request $request, $id){
        $this->validate($request, [
            'title'=>'required',
            'comment'=>'required'
            ]);
        $data = array(
            'name'=> $request->input('title'),
            'template'=>$request->input('comment'),
            'pagetype_id'=>$request->input('category')
            );
        $data2 = array(
            'page_parent_id'=> $request->input('parent')
            );
        Pagemain::where('page_id', $id)
        ->update($data);
        Pagesub::where('page_id', $id)
        ->update($data2);

        if(count($request->input('consubid')) > 0){
            foreach ($request->input('consubid') as $consubid) {
                $conid = "";
                $contype = "";
                $pageid = "";
                $contentname = "";
                $contentsubs = Contentsub::where('id', $consubid)->get();

                foreach ($contentsubs as $contentsub) {
                    $conid = $contentsub->content_id; // get content ID
                    $pageid = $contentsub->page_id; // get page ID
                    $contentname = $contentsub->content_name; // get content name
                }

                $contentmains = Contentmain::where('content_id', $conid)->get();

                foreach ($contentmains as $contentmain) {
                   $contype = $contentmain->type; //get the type
                }

                if($contype == "image"){
                    if(!empty($request->file($consubid))){

                        $input = $request->file($consubid);
                        $destinationPath = "img/gallery/"; // path to save to, has to exist and be writeable
                        $contentval = $request->file($consubid)->getClientOriginalName(); // original name that it was uploaded with
                        $input->move($destinationPath,$contentval); // moving the file to specified dir with the original name
                        $data = array(
                        'the_content'=> $contentval           
                        );
                        Contentsub::where('id', $consubid)
                        ->update($data);
                    }
                }
                else if($contype == "paragraph"){
                    $path = base_path().'/resources/views/jgcontents/page' . $pageid . '/' . $contentname . '.blade.php';
                    file_put_contents($path, $request->input($consubid));
                }
                else{

                    $data = array(
                    'the_content'=> $request->input($consubid)           
                    );
                    Contentsub::where('id', $consubid)
                    ->update($data);
                }
            }
        }
        
        return redirect('/dashboard/pages')->with('info', 'Pages Updated Sucessfully');
    }

    public function updatecontentvalue(Request $request){
        

        $contentsubs = new Contentsub;

        for($i=0; $i<count($request->input('typecontents')); $i++){
            $contentbol = false;
            $contentname = "";
            $contentmains = Contentmain::where('content_id', $request->input('typecontents')[$i])->get();
            foreach($contentmains as $contentmain){
                $contentname = $contentmain->content_name;
            }
            $checkcontentmains = Contentsub::where('page_id', $request->input('pgi'))
            ->where('content_id', $request->input('typecontents')[$i])
            ->get();
            if(count($checkcontentmains) > 0){
                foreach($checkcontentmains as $checkcontentmain){
                    if($checkcontentmain->page_id != $request->input('pgi')){
                        $contentbol = true;
                    }
                }
            }
            else{
                $contentbol = true;
            }
            
            if($contentbol){
                $contentsubs = new Contentsub;
                $contentsubs->page_id = $request->input('pgi');
                $contentsubs->content_id = $request->input('typecontents')[$i];
                $contentsubs->content_name = $contentname;
                $contentsubs->save();

                // Write the contents of a file
                $path = base_path().'/resources/views/jgcontents/page' . $request->input('pgi') . '/' . $contentname . '.blade.php';
                
                fopen($path, "w");
            }
        }
        $contentsubs = Contentsub::where('page_id', $request->input('pgi'))->get();
        foreach($contentsubs as $contentsub){
            $contentname = "";
            $bol = true;
            if(count($request->input('typecontents')) > 0){
                for($i=0; $i<count($request->input('typecontents')); $i++){

                    if($contentsub->content_id == $request->input('typecontents')[$i]){
                        $bol = false;
                    }
                    else
                    {
                        $contentmains = Contentmain::where('content_id', $contentsub->content_id)->get();
                        foreach($contentmains as $contentmain){
                            $contentname = $contentmain->content_name;
                        }
                    }
                }
            }
            else{
                $contentmains = Contentmain::where('content_id', $contentsub->content_id)->get();
                    foreach($contentmains as $contentmain){
                        $contentname = $contentmain->content_name;
                    }
            }
            if($bol){
                
                Contentsub::where('id', $contentsub->id)->delete();
                $path = base_path().'/resources/views/jgcontents/page' . $request->input('pgi') . '/' . $contentname . '.blade.php';
                unlink($path);
            }
        }
        
        return redirect("/dashboard/updatepage/{$request->input('pgi')}")->with('info', 'Contents Saved Sucessfully');
    }

    public function deletemenu($id){
        Pagemain::where('page_id', $id)
        ->delete();

        Pagesub::where('page_id', $id)
        ->delete();

        Contentsub::where('page_id', $id)
        ->delete();

        $data = array(
            'page_parent_id'=> ''
            );
        Pagesub::where('page_parent_id', $id)
        ->update($data);

        $folder = 'page'.$id;
        $path = base_path().'/resources/views/jgcontents/' . $folder;

        if (! is_dir($path)) {
            throw new InvalidArgumentException("$dirPath must be a directory");
        }
        if (substr($path, strlen($path) - 1, 1) != '/') {
            $path .= '/';
        }
        $files = glob($path . '*', GLOB_MARK);
        foreach ($files as $file) {
            if (is_dir($file)) {
                self::deleteDir($file);
            } else {
                unlink($file);
            }
        }
        rmdir($path);
        
        return redirect('/dashboard/pages')->with('info', 'Page Deleted Sucessfully');
    }

    public function setup(){
        $contentmains = Contentmain::all();
        $contentsubs = Contentsub::all();
        $pagemains = Pagemain::all();
        $pagetypes = Pagetype::all();
        $users = User::all();
        return view('admin/setup', ['users' => $users, 'contentmains' => $contentmains, 'contentsubs' => $contentsubs, 'pagetypes' => $pagetypes, 'pagemains' => $pagemains]);
    }

    public function insertcontent(Request $request){
       
        $blockbol = false;
        $this->validate($request, [
            'name'=>'required',
            'type'=>'required'          
            ]);

        if($request->input('type') == 'block'){
            $this->validate($request, [
            'block_list'=>'required'     
            ]);
            $blockbol = true;
        }

        $contentmains = new Contentmain;
        $contentmains->content_name = $request->input('name');
        $contentmains->type = $request->input('type');
        if($blockbol){
            $contentmains->defaultvalue = $request->input('block_list');
        }
        else{
            $contentmains->defaultvalue = "";
        }
        $contentmains->save();
        return redirect('/dashboard/setup')->with('info', 'Content Saved Sucessfully');
    }

    public function updatecontent($id){
        $contentmains = Contentmain::where('content_id', $id)->get();
        $pagemains = Pagemain::all();
        $users = User::all();
        return view('admin/editcontent', ['users' => $users, 'contentmains' => $contentmains, 'pagemains' => $pagemains]);
    }

    public function editcontent(Request $request, $id){
        $this->validate($request, [
            'title'=>'required',
            'type'=>'required'
            ]);

        if($request->input('type') == 'block'){
            $data = array(
            'content_name'=> $request->input('title'),
            'type'=> $request->input('type'),
            'defaultvalue'=> $request->input('block_list')
            );
        }
        else{
            $data = array(
            'content_name'=> $request->input('title'),
            'type'=> $request->input('type'),
            'defaultvalue'=> ""
            );
        }
        
        Contentmain::where('content_id', $id)
        ->update($data);
        return redirect('/dashboard/setup')->with('info', 'Content Updated Sucessfully');
    }

    public function deletecontent($id){
        Contentmain::where('content_id', $id)
        ->delete();

        Contentsub::where('content_id', $id)
        ->delete();

        return redirect('/dashboard/setup')->with('info', 'Content Deleted Sucessfully');
    }

    public function insertpagetype(Request $request){
        $this->validate($request, [
            'name'=>'required'            
            ]);
        $pagetypes = new Pagetype;
        $pagetypes->page_category = $request->input('name');
        $pagetypes->save();

        return redirect('/dashboard/setup')->with('infopagetype', 'Content Updated Sucessfully');
    }

    public function updatepagetype($id){
        $pagetypes = Pagetype::where('id', $id)->get();
        $pagemains = Pagemain::all();
        $users = User::all();
        return view('admin/editpagetype', ['users' => $users,'pagetypes' => $pagetypes, 'pagemains' => $pagemains]);
    }

    public function editpagetype(Request $request, $id){
        $this->validate($request, [
            'title'=>'required'
            ]);
        $data = array(
            'page_category'=> $request->input('title')            
            );
        Pagetype::where('id', $id)
        ->update($data);
        return redirect('/dashboard/setup')->with('infopagetype', 'Page Type Updated Sucessfully');
    }

    public function deletepagetype($id){
        Pagetype::where('id', $id)
        ->delete();
        return redirect('/dashboard/setup')->with('infopagetype', 'Page Type Deleted Sucessfully');
    }

    public function vieweditpages($id){
        $editpermission = false;
        $contentmains = Contentmain::all();
        $contentsubs = Contentsub::where('page_id', $id)->get();
        $contentsubs1 = Contentsub::all();
        $pagetypes = Pagetype::all();
        $chat_users = Chat_user::all();

        if(empty($id)){
            $pagemainss = Pagemain::all();
            $editpermission = true;
            return view('admin/start_edit_page', ['pagemains1' => $pagemainss, 'pagemains' => $pagemainss, 'editpermission' => $editpermission, 'contentmains' => $contentmains, 'contentsubs' => $contentsubs, 'pagetypes' => $pagetypes, 'contentsubs1' => $contentsubs1, 'chat_users' => $chat_users]);
        }
        else{
            $editpermission = true;
            $pagemains = Pagemain::where('page_id',$id)->get();
            $pagemainss = Pagemain::all();
            return view('admin/start_edit_page', ['pagemains1' => $pagemains, 'pagemains' => $pagemainss, 'editpermission' => $editpermission, 'contentmains' => $contentmains, 'contentsubs' => $contentsubs, 'pagetypes' => $pagetypes, 'contentsubs1' => $contentsubs1, 'chat_users' => $chat_users]);
        }
    }

    public function insertcontentsub(Request $request){
        

        $contentsubs = new Contentsub;

        for($i=0; $i<count($request->input('typecontents')); $i++){
            $contentbol = false;
            $contentname = "";
            $contentmains = Contentmain::where('content_id', $request->input('typecontents')[$i])->get();
            foreach($contentmains as $contentmain){
                $contentname = $contentmain->content_name;
            }
            $checkcontentmains = Contentsub::where('page_id', $request->input('pgi'))
            ->where('content_id', $request->input('typecontents')[$i])
            ->get();
            if(count($checkcontentmains) > 0){
                foreach($checkcontentmains as $checkcontentmain){
                    if($checkcontentmain->page_id != $request->input('pgi')){
                        $contentbol = true;
                    }
                }
            }
            else{
                $contentbol = true;
            }
            
            if($contentbol){
                $contentsubs = new Contentsub;
                $contentsubs->page_id = $request->input('pgi');
                $contentsubs->content_id = $request->input('typecontents')[$i];
                $contentsubs->content_name = $contentname;
                $contentsubs->save();

                // Write the contents of a file
                $path = base_path().'/resources/views/jgcontents/page' . $request->input('pgi') . '/' . $contentname . '.blade.php';
                
                fopen($path, "w");
            }
        }
        $contentsubs = Contentsub::where('page_id', $request->input('pgi'))->get();
        foreach($contentsubs as $contentsub){
            $contentname = "";
            $bol = true;
            if(count($request->input('typecontents')) > 0){
                for($i=0; $i<count($request->input('typecontents')); $i++){

                    if($contentsub->content_id == $request->input('typecontents')[$i]){
                        $bol = false;
                    }
                    else
                    {
                        $contentmains = Contentmain::where('content_id', $contentsub->content_id)->get();
                        foreach($contentmains as $contentmain){
                            $contentname = $contentmain->content_name;
                        }
                    }
                }
            }
            else{
                $contentmains = Contentmain::where('content_id', $contentsub->content_id)->get();
                    foreach($contentmains as $contentmain){
                        $contentname = $contentmain->content_name;
                    }
            }
            
            if($bol){
                
                Contentsub::where('id', $contentsub->id)->delete();
                $path = base_path().'/resources/views/jgcontents/page' . $request->input('pgi') . '/' . $contentname . '.blade.php';
                unlink($path);
            }
        }
        
        return redirect("/dashboard/editpage/{$request->input('pgi')}")->with('infopagetype', 'Page Type Saved Sucessfully');
    }

    public function insertcontentvalue(Request $request){

        $this->validate($request, [
            'area3'=>'required'
            ]);
        $contentval = "";
        $content_show = "";

        if($request->input('contenttype') == "image"){
            $input = $request->file('area3');
            $destinationPath = "img/gallery/"; // path to save to, has to exist and be writeable
            $contentval = $request->file('area3')->getClientOriginalName(); // original name that it was uploaded with
            $input->move($destinationPath,$contentval); // moving the file to specified dir with the original name

            $data = array(
            'the_content'=> $contentval           
            );
            Contentsub::where('id', $request->input('contentid'))
            ->update($data);
        }
        else if($request->input('contenttype') == "paragraph"){
            // Append to a file
            // Write the contents of a file
            $path = base_path().'/resources/views/jgcontents/page' . $request->input('pgi') . '/' . $request->input('contentname') . '.blade.php';
            file_put_contents($path, $request->input('area3'));
        }
        else if($request->input('contenttype') == "block"){
            $numlimit = "";
            $pagination = "";

            if(!empty($request->input('numlimit'))){
                $numlimit = $request->input('numlimit');
            }
            if(!empty($request->input('radbtn'))){
                echo $pagination = $request->input('radbtn');
            }
            for($i=0; $i < count($request->input('cbpagetype')); $i++){
                if($request->input('cbpagetype')[$i] == "all"){
                    $content_show = "all";
                    break;
                }
                if($i+1 == count($request->input('cbpagetype'))){
                    $content_show .= $request->input('cbpagetype')[$i];
                }
                else{
                    $content_show .= $request->input('cbpagetype')[$i] . ",";
                }
            }

            $contentval = $request->input('area3');
            $data = array(
            'the_content'=> $contentval,
            'content_show'=> $content_show,
            'num_of_items'=> $numlimit,
            'pagination'=> $pagination
            );
            Contentsub::where('id', $request->input('contentid'))
            ->update($data);
        }
        else{
            $contentval = $request->input('area3');
            $data = array(
            'the_content'=> $contentval           
            );
            Contentsub::where('id', $request->input('contentid'))
            ->update($data);
        }

        return redirect("/dashboard/editpage/{$request->input('pgi')}")->with('info', 'Page successfully updated');
    }

    public function viewstaff(Request $request){
        $articles = Article::all();
        $pagemains = Pagemain::all();
        $comments = Comment::all();
        $users = User::all();
        $logininfos = "";
        return view('admin/viewstaff', ['users' => $users, 'articles' => $articles, 'pagemains' => $pagemains, 'comments' => $comments, 'logininfos' => $logininfos]);
    }

    

    public function changestat(Request $request){
        $data = array(
            'ol_stat' => $request->input('stat')
            );
            User::where('id', \Auth::user()->id)
            ->update($data);
            echo 'success';
    }

    public function accountsettings($id){
        $articles = Article::all();
        $pagemains = Pagemain::all();
        $comments = Comment::all();
        $users = User::where('id', $id)->get();
        $logininfos = "";
        return view('admin/settings', ['users' => $users, 'articles' => $articles, 'pagemains' => $pagemains, 'comments' => $comments, 'logininfos' => $logininfos]);
    }

    public function edituser(Request $request, $id){
        $input = $request->file('img');
            $destinationPath = "img/gallery/"; // path to save to, has to exist and be writeable
            $contentval = $request->file('img')->getClientOriginalName(); // original name that it was uploaded with
            $input->move($destinationPath,$contentval); // moving the file to specified dir with the original name

            $data = array(
            'lname' => $request->input('lname'),
            'fname' => $request->input('fname'),
            'mname' => $request->input('mname'),
            'email' => $request->input('email'),
            'img'=> $contentval           
            );
            User::where('id', $id)
            ->update($data);

            return redirect("/dashboard");
    }

    public function getnewsletter(){
        $pagemains = Pagemain::all();
        $pagesubs = Pagesub::all();
        $pagetypes = Pagetype::all();
        $contentmains = Contentmain::all();
        $users = User::all();
        return view('admin/newsletter', ['users' => $users, 'pagemains' => $pagemains, 'pagesubs' => $pagesubs, 'pagetypes' => $pagetypes, 'contentmains' => $contentmains]);
    }

    public function addnewsletter(Request $request){
        $this->validate($request, [
            'name'=>'required',
            'template'=>'required'
            ]);
        $pagemains = new Pagemain;
        $pagemains->name = $request->input('name');
        $pagemains->template = $request->input('template');
        $pagemains->pagetype_id = $request->input('category');
        $pagemains->save();

        $pagemains = Pagemain::all();
        $pageid = "";
        foreach ($pagemains as $pagemain) {
            $pageid = $pagemain->page_id;
        }

        $pagesubs = new Pagesub;
        $pagesubs->page_id = $pageid;
        $pagesubs->page_parent_id = $request->input('parent');
        $pagesubs->save();

        $folder = 'page'.$pageid;
        $path = base_path().'/resources/views/jgcontents/' . $folder;
        
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $contentmains = Contentmain::all();

        $stridarr = array();
        $strvalarr = array();
        $strcontarr = array();
        $strcontshowarr = array();
        $strcontvalarr = array();
        if(count($contentmains) > 0){
            foreach($contentmains as $contentmain){
                if($contentmain->content_id == "3"){
                    $stridarr[] = $contentmain->content_id;
                    $strvalarr[] = $contentmain->content_name;
                    $strcontarr[] = "pexels-photo-595879.jpeg";
                    $strcontshowarr[] = "";
                    $strcontvalarr[] = "";
                }
                if($contentmain->content_id == "2"){
                    $stridarr[] = $contentmain->content_id;
                    $strvalarr[] = $contentmain->content_name;
                    $strcontarr[] = "";
                    $strcontshowarr[] = "";
                    $strcontvalarr[] = "";
                }
                if($contentmain->content_id == "4"){
                    $stridarr[] = $contentmain->content_id;
                    $strvalarr[] = $contentmain->content_name;
                    $strcontarr[] = "header-bg.jpg";
                    $strcontshowarr[] = "";
                    $strcontvalarr[] = "";
                }
                if($contentmain->content_id == "9"){
                    $stridarr[] = $contentmain->content_id;
                    $strvalarr[] = $contentmain->content_name;
                    $strcontarr[] = "jg_nav";
                    $strcontshowarr[] = "0";
                    $strcontvalarr[] = "";
                }
                if($contentmain->content_id == "21"){
                    $stridarr[] = $contentmain->content_id;
                    $strvalarr[] = $contentmain->content_name;
                    $strcontarr[] = "Contact Us";
                    $strcontshowarr[] = "";
                    $strcontvalarr[] = "";
                }
                if($contentmain->content_id == "22"){
                    $stridarr[] = $contentmain->content_id;
                    $strvalarr[] = $contentmain->content_name;
                    $strcontarr[] = "";
                    $strcontshowarr[] = "";
                    $strcontvalarr[] = '<div class="col-lg-12 text-center" style="width: 1110px; background-color: rgb(255, 174, 0);"><h4 class="section-heading">&nbsp;<span class="fa fa-mobile jg-contact" aria-hidden="true" style="font-size: small; padding-left: 25px; padding-right: 10px;"></span><span style="font-size: small;">&nbsp;</span><font size="2">(0917) 794 9296&nbsp;<span class="fa fa-mobile jg-contact" aria-hidden="true" style="padding-left: 25px; padding-right: 10px;"></span>&nbsp;(0922) 857 5868&nbsp;<span class="fa fa-phone jg-contact" aria-hidden="true" style="padding-left: 25px; padding-right: 10px;"></span>&nbsp;(082)224 1839/&nbsp;(082) 300 3922</font><span style="font-size: 1rem;">&nbsp;</span><span class="fa fa-envelope jg-contact" aria-hidden="true" style="font-size: small; padding-left: 25px; padding-right: 10px;"></span><span style="font-size: small;">&nbsp;JOHNGOLD@JOHNGOLD.COM</span><span class="fa fa-envelope jg-contact" aria-hidden="true" style="font-size: small; padding-left: 25px; padding-right: 10px;"></span><span style="font-size: small;">&nbsp;DSTI BLDG., WATUSI ST., KM.5 BUHANGIN, DAVAO CITY, PHILIPPINES 8000</span><br></h4></div>';
                }
                if($contentmain->content_id == "28"){
                    $stridarr[] = $contentmain->content_id;
                    $strvalarr[] = $contentmain->content_name;
                    $strcontarr[] = "logo.png";
                    $strcontshowarr[] = "";
                    $strcontvalarr[] = "";
                }
                if($contentmain->content_id == "35"){
                    $stridarr[] = $contentmain->content_id;
                    $strvalarr[] = $contentmain->content_name;
                    $strcontarr[] = \Auth::user()->fname . " " . \Auth::user()->lname;
                    $strcontshowarr[] = "";
                    $strcontvalarr[] = "";
                }
            }
        }

        for($i = 0; $i < count($stridarr); $i++){
            $contentsubs = new Contentsub;
            $contentsubs->page_id = $pageid;
            $contentsubs->content_id = $stridarr[$i];
            $contentsubs->content_name = $strvalarr[$i];
            $contentsubs->the_content = $strcontarr[$i];
            $contentsubs->content_show = $strcontshowarr[$i];
            $contentsubs->save();

            // Write the contents of a file
            $path = base_path().'/resources/views/jgcontents/page' . $pageid . '/' . $strvalarr[$i] . '.blade.php';
                
            fopen($path, "w");


            // Write the contents of a file
            $path = base_path().'/resources/views/jgcontents/page' . $pageid . '/' . $strvalarr[$i] . '.blade.php';
            file_put_contents($path, $strcontvalarr[$i]);
        }

        return redirect('/dashboard/newsletter')->with('info', 'Page Saved Sucessfully');
    }

    public function updatenewletter($id){
        $pagemains = Pagemain::where('page_id', $id)->get();
        $pagemainss = Pagemain::all();
        $pagetypes = Pagetype::all();
        $contentmains = Contentmain::all();
        $contentsubs = Contentsub::where('page_id', $id)->get();
        $users = User::all();

        $pagesubs = Pagesub::where('page_id', $id)->get();
        $pagesubid="";
        foreach ($pagesubs as $pagesub) {
            $pagesubid = $pagesub->page_parent_id;
        }

        $pagemainsss = Pagemain::where('page_id', $pagesubid)->get();

        return view('admin.editnewsletter', ['users' => $users, 'pagemains' => $pagemains, 'pagemainss' => $pagemainss, 'pagemainsss' => $pagemainsss, 'pagetypes' => $pagetypes, 'contentmains' => $contentmains, 'contentsubs' => $contentsubs]);
    }

    public function editnewsletter(Request $request, $id){
        $this->validate($request, [
            'title'=>'required',
            'comment'=>'required'
            ]);
        $data = array(
            'name'=> $request->input('title'),
            'template'=>$request->input('comment'),
            'pagetype_id'=>$request->input('category')
            );
        $data2 = array(
            'page_parent_id'=> $request->input('parent')
            );
        Pagemain::where('page_id', $id)
        ->update($data);
        Pagesub::where('page_id', $id)
        ->update($data2);

        if(count($request->input('consubid')) > 0){
            foreach ($request->input('consubid') as $consubid) {
                $conid = "";
                $contype = "";
                $pageid = "";
                $contentname = "";
                $contentsubs = Contentsub::where('id', $consubid)->get();

                foreach ($contentsubs as $contentsub) {
                    $conid = $contentsub->content_id; // get content ID
                    $pageid = $contentsub->page_id; // get page ID
                    $contentname = $contentsub->content_name; // get content name
                }

                $contentmains = Contentmain::where('content_id', $conid)->get();

                foreach ($contentmains as $contentmain) {
                   $contype = $contentmain->type; //get the type
                }

                if($contype == "image"){
                    if(!empty($request->file($consubid))){

                        $input = $request->file($consubid);
                        $destinationPath = "img/gallery/"; // path to save to, has to exist and be writeable
                        $contentval = $request->file($consubid)->getClientOriginalName(); // original name that it was uploaded with
                        $input->move($destinationPath,$contentval); // moving the file to specified dir with the original name
                        $data = array(
                        'the_content'=> $contentval           
                        );
                        Contentsub::where('id', $consubid)
                        ->update($data);
                    }
                }
                else if($contype == "paragraph"){
                    $path = base_path().'/resources/views/jgcontents/page' . $pageid . '/' . $contentname . '.blade.php';
                    file_put_contents($path, $request->input($consubid));
                }
                else{

                    $data = array(
                    'the_content'=> $request->input($consubid)           
                    );
                    Contentsub::where('id', $consubid)
                    ->update($data);
                }
            }
        }
        
        return redirect('/dashboard/newsletter')->with('info', 'Pages Updated Sucessfully');
    }

    public function updatenewscontentvalue(Request $request){
        

        $contentsubs = new Contentsub;

        for($i=0; $i<count($request->input('typecontents')); $i++){
            $contentbol = false;
            $contentname = "";
            $contentmains = Contentmain::where('content_id', $request->input('typecontents')[$i])->get();
            foreach($contentmains as $contentmain){
                $contentname = $contentmain->content_name;
            }
            $checkcontentmains = Contentsub::where('page_id', $request->input('pgi'))
            ->where('content_id', $request->input('typecontents')[$i])
            ->get();
            if(count($checkcontentmains) > 0){
                foreach($checkcontentmains as $checkcontentmain){
                    if($checkcontentmain->page_id != $request->input('pgi')){
                        $contentbol = true;
                    }
                }
            }
            else{
                $contentbol = true;
            }
            
            if($contentbol){
                $contentsubs = new Contentsub;
                $contentsubs->page_id = $request->input('pgi');
                $contentsubs->content_id = $request->input('typecontents')[$i];
                $contentsubs->content_name = $contentname;
                $contentsubs->save();

                // Write the contents of a file
                $path = base_path().'/resources/views/jgcontents/page' . $request->input('pgi') . '/' . $contentname . '.blade.php';
                
                fopen($path, "w");
            }
        }
        $contentsubs = Contentsub::where('page_id', $request->input('pgi'))->get();
        foreach($contentsubs as $contentsub){
            $contentname = "";
            $bol = true;
            if(count($request->input('typecontents')) > 0){
                for($i=0; $i<count($request->input('typecontents')); $i++){

                    if($contentsub->content_id == $request->input('typecontents')[$i]){
                        $bol = false;
                    }
                    else
                    {
                        $contentmains = Contentmain::where('content_id', $contentsub->content_id)->get();
                        foreach($contentmains as $contentmain){
                            $contentname = $contentmain->content_name;
                        }
                    }
                }
            }
            else{
                $contentmains = Contentmain::where('content_id', $contentsub->content_id)->get();
                    foreach($contentmains as $contentmain){
                        $contentname = $contentmain->content_name;
                    }
            }
            if($bol){
                
                Contentsub::where('id', $contentsub->id)->delete();
                $path = base_path().'/resources/views/jgcontents/page' . $request->input('pgi') . '/' . $contentname . '.blade.php';
                unlink($path);
            }
        }
        
        return redirect("/dashboard/updatenewletter/{$request->input('pgi')}")->with('info', 'Contents Saved Sucessfully');
    }

    public function deletemenunews($id){
        Pagemain::where('page_id', $id)
        ->delete();

        Pagesub::where('page_id', $id)
        ->delete();

        Contentsub::where('page_id', $id)
        ->delete();

        $data = array(
            'page_parent_id'=> ''
            );
        Pagesub::where('page_parent_id', $id)
        ->update($data);

        $folder = 'page'.$id;
        $path = base_path().'/resources/views/jgcontents/' . $folder;

        if (! is_dir($path)) {
            throw new InvalidArgumentException("$dirPath must be a directory");
        }
        if (substr($path, strlen($path) - 1, 1) != '/') {
            $path .= '/';
        }
        $files = glob($path . '*', GLOB_MARK);
        foreach ($files as $file) {
            if (is_dir($file)) {
                self::deleteDir($file);
            } else {
                unlink($file);
            }
        }
        rmdir($path);
        
        return redirect('/dashboard/newsletter')->with('info', 'Page Deleted Sucessfully');
    }
}
