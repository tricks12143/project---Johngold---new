<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chat;
use App\User;
use App\Chat_msg;
use App\Chat_user;
use Auth;

class ChatController extends Controller
{
    public function set_msg_chat(Request $request){
        $chatusers = Chat_user::all();

        if($request->input('user') == "user"){
            if(empty(session()->get('chatactive'))){
                session()->put('replycount', 0);
                session()->put('mereplycount', 1);
                $userid = 0;
                $username = "";
                $chat_id = "";
                $staff_id = "";
                if(count($chatusers) > 0){
                    foreach($chatusers as $chatuser){
                        $userid = $chatuser->user_id+1;
                    }
                    $username = "Anonymous".$userid;
                }
                else{
                    $username = "Anonymous1";
                    $userid = 1;
                }

                $staff_id = $this->getavailablestaff();
                
                $chat_users = new Chat_user;
                $chat_users->user_name = $username;
                $chat_users->save();

                $chats = new Chat;
                $chats->user_id = $userid;
                $chats->staff_id = $staff_id;
                $chats->stat = 'active';
                $chats->save();

                $chatss = Chat::all();
                if(count($chatss) > 0){
                    foreach($chatss as $chat){
                        $chat_id = $chat->chat_id;
                    }
                }

                $chat_msgs = new Chat_msg;
                $chat_msgs->chat_id = $chat_id;
                if($request->input('user') == 'user'){
                    $chat_msgs->user_id = $userid;
                }
                else{
                    $chat_msgs->staff_id = $staff_id; // to be implemented on dashboard
                }
                $chat_msgs->msg = $request->input('msg');
                $chat_msgs->save();

                session()->put('staff_id', $staff_id);
                session()->put('user_id', $userid);
                session()->put('chat_id', $chat_id);
                session()->put('chatactive', 'active');
            }
            else{
                $chat_msgs = new Chat_msg;
                $chat_msgs->chat_id = session()->get('chat_id');
                if($request->input('user') == 'user'){
                    $chat_msgs->user_id = session()->get('user_id');
                }
                else{
                    $chat_msgs->staff_id = session()->get('staff_id');
                }
                $chat_msgs->msg = $request->input('msg');
                $chat_msgs->save();

            }
        }
        else{
            $chat_msgs = new Chat_msg;
            $chat_msgs->chat_id = session()->get('chat_admin_id');
            $chat_msgs->staff_id = \Auth::user()->id;
            $chat_msgs->msg = $request->input('msg');
            $chat_msgs->save();

        }

    }

    public function get_staff_msg_chat(){
    	$users = User::where('ol_stat', 'Online')->get();
        if(count($users) > 0){
            foreach ($users as $user) {
                $user->id;
            }
        }
    }

    public function get_msg_chat(Request $request){
        $staffid = "";
        $staffimg = "";
        $staffname = "";
        $chatid = "";
        $repcount = 0;
        $merepcount = 0;
        $srepcount = 0;
        $smerepcount = 0;
        if(empty(session()->get('chatactive'))){
            if($request->input('user') == "user"){
                if(empty($this->getavailablestaff())){
                    echo '<div class="jg-introduction-chat"><center>Its seems that there are no available staff.</center></div>';
                }
                else{
                    $staffname = "";
                    $users = User::where('id', $this->getavailablestaff())->get();
                    if(count($users) > 0){
                        foreach ($users as $user) {
                            $staffimg = $user->img;
                            $staffname = $user->fname;
                        }
                    }
                    echo '<div class="jg-introduction-chat"><div class="jg-intorduction-img"><img src="img/gallery/'. $staffimg . '"/></div><div class="jg-introduction-body"><h6>'.$staffname.'</h6><p>"Hello there! thank you for visiting out Website."</p></div></div>';
                }
            }
        }
            if($request->input('user') == "user"){
                $chats = Chat::where('chat_id', session()->get('chat_id'))->get();
                if(count($chats) > 0){
                    foreach ($chats as $chat) {
                        $staffid = $chat->staff_id;
                    }
                }
                $users = User::where('id', $staffid)->get();
                if(count($users) > 0){
                    foreach ($users as $user) {
                        $staffimg = $user->img;
                        $staffname = '<p style="line-height: 0;margin-bottom:9px;font-size:10px;">'.$user->fname.'</p>';
                    }
                }
                $chatid = session()->get('chat_id');
            }
            else{
                $chatid = session()->get('chat_admin_id');
            }

                $strprint = "";
                $num = 1;
                $chats = Chat::where('chat_id', session()->get('chat_admin_id'))->get();

                $chat_users = Chat_user::all();
                
                if(count($chats) > 0){
                    foreach($chats as $chat){
                        $username = "";
                        $chat_id = "";
                        if(count($chat_users) > 0){
                            foreach ($chat_users as $chat_user) {
                                if($chat_user->user_id == $chat->user_id){
                                    $username = $chat_user->user_name;
                                    $chat_id = $chat->chat_id;
                                }
                            }
                        }
                        $strprint .= $username;
                    }
                }
            $chat_msgs = Chat_msg::where('chat_id', $chatid)->get();
            
            if(count($chat_msgs) > 0){
                foreach ($chat_msgs as $chat_msg) {
                    if($request->input('user') == "user"){
                        if(!empty($chat_msg->user_id)){
                            $date = $chat_msg->created_at;
                            $d = date_parse_from_format("Y-m-d H:i:s", $date);
                            $hzero = "";
                            $mzero = "";
                            if($d["hour"] < 10){
                                $hzero = "0";
                            }
                            if($d["minute"] < 10){
                                $mzero = "0";
                            }
                            echo '<div class="jg-chat-time">'.$hzero.$d["hour"].":".$mzero.$d["minute"].'</div>';
                            echo '<div class="row"><div class="col-md-12"><div class="jg-chat-msg-right primary-color"><div class="jg-chat-msg">'. $chat_msg->msg .'</div></div></div></div>';
                            $merepcount++;
                        }
                        if(!empty($chat_msg->staff_id)){
                            
                            $date = $chat_msg->created_at;
                            $d = date_parse_from_format("Y-m-d H:i:s", $date);
                            $hzero = "";
                            $mzero = "";
                            if($d["hour"] < 10){
                                $hzero = "0";
                            }
                            if($d["minute"] < 10){
                                $mzero = "0";
                            }
                            if($chat_msg->msg == "Leave Conversation"){
                                echo '<center>'.$staffname.' have left this conversation.</center>';
                            }
                            else{
                                echo '<div class="jg-chat-time">'.$hzero.$d["hour"].":".$mzero.$d["minute"].'</div>';
                                echo '<div class="row"><div class="col-md-12"><div class="jg-chat-img"><img src="img/gallery/'. $staffimg . '"/></div>'.$staffname.'<div class="jg-chat-msg-left default-color"><div class="jg-chat-msg">'. $chat_msg->msg .'</div></div></div></div>';
                            }
                            
                            $repcount++;
                        }
                        
                    }
                    else{
                        if(!empty($chat_msg->staff_id)){
                            $date = $chat_msg->created_at;
                            $d = date_parse_from_format("Y-m-d H:i:s", $date);
                            $hzero = "";
                            $mzero = "";
                            if($d["hour"] < 10){
                                $hzero = "0";
                            }
                            if($d["minute"] < 10){
                                $mzero = "0";
                            }
                            if($chat_msg->msg == "Leave Conversation"){
                                echo '<center>You have left this conversation.</center>';
                                echo '<center><a href="'.url('/leavethisconvers', $chatid).'">Close this conversation</a></center>';
                                echo '<script>document.getElementById("jg-chat-submit").disabled = true;</script>';
                            }
                            else{
                                echo '<div class="jg-chat-time">'.$hzero.$d["hour"].":".$mzero.$d["minute"].'</div>';
                                echo '<div class="row"><div class="col-md-12"><div class="jg-chat-msg-right primary-color"><div class="jg-chat-msg">'. $chat_msg->msg .'</div></div></div></div>';
                                $smerepcount++;
                            }
                        }
                        if(!empty($chat_msg->user_id)){
                            $date = $chat_msg->created_at;
                            $d = date_parse_from_format("Y-m-d H:i:s", $date);
                            $hzero = "";
                            $mzero = "";
                            if($d["hour"] < 10){
                                $hzero = "0";
                            }
                            if($d["minute"] < 10){
                                $mzero = "0";
                            }
                            if($chat_msg->msg == "Leave Conversation"){
                                echo '<center>'.$strprint.' has left this conversation.</center>';
                                echo '<center><a href="'.url('/leavethisconvers', $chatid).'">Close this conversation</a></center>';
                                echo '<script>document.getElementById("jg-chat-submit").disabled = true;</script>';
                            }
                            else{
                                echo '<div class="jg-chat-time">'.$hzero.$d["hour"].":".$mzero.$d["minute"].'</div>';
                                echo '<div class="row"><div class="col-md-12"><h6>'.$strprint.'</h6><div class="jg-chat-msg-left default-color"><div class="jg-chat-msg">'. $chat_msg->msg .'</div></div></div></div>';
                                echo '<script>document.getElementById("jg-chat-submit").disabled = false;</script>';
                                $srepcount++;    
                            }
                            
                        }
                    }
                }
                if(session()->get('replycount') < $repcount){
                    session()->put('replycount', $repcount);
                    echo '<audio id="audio" src="'. url('sound/e_mail.mp3') .'" autostart="false" ></audio>';
                    echo '<script>var sound = document.getElementById("audio");sound.volume = 0.3;sound.play();var element = document.getElementById("DIV_CHAT");element.scrollTop = element.scrollHeight;</script>';
                }
                else if(session()->get('mereplycount') < $merepcount){
                    session()->put('mereplycount', $merepcount);
                    echo '<script>var element = document.getElementById("DIV_CHAT");element.scrollTop = element.scrollHeight;</script>';
                }
            }
                
    }

    public function getavailablestaff(){
        $staffarr = array();
        $chatarr = array();

        $prioritycount = "";
        $priorityuserid = "";

        $staffarr = $this->get_staff();
        
        for ($i=0; $i < count($staffarr); $i++) { 
            $chatarr[] = $this->get_chat($staffarr[$i]);
        }

        for($i=0; $i < count($chatarr); $i++){
            if($i == 0){
                $prioritycount = $chatarr[$i];
                $priorityuserid = $staffarr[$i];
            }
            else if($prioritycount > $chatarr[$i]){
                $prioritycount = $chatarr[$i];
                $priorityuserid = $staffarr[$i];
            }
        }
        return $priorityuserid;
    }

    public function get_staff(){
        $staffarr = array();

        $users = User::where('ol_stat', 'Online')
        ->where('stat', 'active')
        ->get();

        if(count($users) > 0){
            foreach ($users as $user) {
                $staffarr[] = $user->id;
            }
        }

        return $staffarr;
    }

    public function get_chat($id){
        $chatcount = array();
        $chatarr = array();

        $chats = Chat::where('stat', 'active')
        ->where('staff_id', $id)
        ->get();

        if(count($chats) > 0){
            foreach ($chats as $chat) {
                $chatcount[] = $chat->chat_id;
            }
        }
        return count($chatcount);
    }

    public function get_user_msg(){
        $strprint = "";
        $num = 1;
        $chats = Chat::where('stat', 'active')
        ->where('staff_id', \Auth::user()->id)
        ->get();

        $chat_users = Chat_user::all();
        
        $strprint = '<ul class="nav panel-tabs">';
        if(count($chats) > 0){
            foreach($chats as $chat){
                $username = "";
                $chat_id = "";
                if(count($chat_users) > 0){
                    foreach ($chat_users as $chat_user) {
                        if($chat_user->user_id == $chat->user_id){
                            $username = $chat_user->user_name;
                            $chat_id = $chat->chat_id;
                        }
                    }
                }
                $strprint .= '<li><a href="#tabs'. $chat_id .'" data-toggle="tab" onclick="chatnoxcontent('.$chat_id.')">'. $username .'</a></li>';
                $num++;
            }
        }
        $strprint .= '</ul>';

        echo $strprint;
    }

    public function get_dynamic_chatbox(Request $request){
        session()->put('chat_admin_id', $request->input('chat_id'));

        
    }

    public function leaveconversation(){
        $chat_msgs = new Chat_msg;
        $chat_msgs->chat_id = session()->get('chat_id');
        $chat_msgs->user_id = session()->get('user_id');
        $chat_msgs->msg = 'Leave Conversation';
        $chat_msgs->save();

        session()->flush();

        return redirect('/');
    }

    public function leavethisconvers($id){
        $data = array(
        'stat'=> 'close'           
        );
        Chat::where('chat_id', session()->get('chat_admin_id'))
        ->update($data);

        session()->forget('chat_admin_id');

        return redirect('/dashboard');
    }

    public function adminleavecon(){
        $chat_msgs = new Chat_msg;
        $chat_msgs->chat_id = session()->get('chat_admin_id');
        $chat_msgs->staff_id = \Auth::user()->id;
        $chat_msgs->msg = 'Leave Conversation';
        $chat_msgs->save();

        return redirect('/dashboard');
    }

    public function getchatlist(Request $request){
        $strprint = "";
        $chats = Chat::where('staff_id', $request->input('user_id'))
        ->orderBy('chat_id', 'DESC')
        ->get();

        $strprint = '<div class="panel-group" id="accordion">';
        if(count($chats) > 0){
            foreach ($chats as $chat) {
                $username = "";
                $strprint .= '<div class="panel panel-default">';
                $strprint .= '<div class="panel-heading">';
                $strprint .= '<h4 class="panel-title" data-toggle="collapse" data-target="#collapse'.$chat->chat_id.'">';
                $strprint .= $chat->created_at;
                $strprint .= '</h4>';
                $strprint .= '</div>';
                $strprint .= '<div id="collapse'.$chat->chat_id.'" class="panel-collapse collapse">';
                $strprint .= '<div class="panel-body">';
                $strprint .= '<blockquote class="jg-chat-container">';

                $chat_users = Chat_user::where('user_id', $chat->user_id)->get();
                if(count($chat_users) > 0){
                    foreach ($chat_users as $chat_user) {
                        $username = $chat_user->user_name;
                    }
                }

                $chat_msgs = Chat_msg::where('chat_id', $chat->chat_id)->get();
            
                if(count($chat_msgs) > 0){
                    foreach ($chat_msgs as $chat_msg) {
                            if(!empty($chat_msg->staff_id)){
                                $date = $chat_msg->created_at;
                                $d = date_parse_from_format("Y-m-d H:i:s", $date);
                                $hzero = "";
                                $mzero = "";
                                if($d["hour"] < 10){
                                    $hzero = "0";
                                }
                                if($d["minute"] < 10){
                                    $mzero = "0";
                                }
                                if($chat_msg->msg == "Leave Conversation"){
                                    $strprint .= '<center>You have left this conversation.</center>';
                                }
                                else{
                                    $strprint .= '<div class="jg-chat-time">'.$hzero.$d["hour"].":".$mzero.$d["minute"].'</div>';
                                    $strprint .= '<div class="row"><div class="col-md-12"><div class="jg-chat-msg-right primary-color"><div class="jg-chat-msg">'. $chat_msg->msg .'</div></div></div></div>';
                                    
                                }
                            }
                            if(!empty($chat_msg->user_id)){
                                $date = $chat_msg->created_at;
                                $d = date_parse_from_format("Y-m-d H:i:s", $date);
                                $hzero = "";
                                $mzero = "";
                                if($d["hour"] < 10){
                                    $hzero = "0";
                                }
                                if($d["minute"] < 10){
                                    $mzero = "0";
                                }
                                if($chat_msg->msg == "Leave Conversation"){
                                    $strprint .= '<center>'.$username.' has left this conversation.</center>';
                                }
                                else{
                                    $strprint .= '<div class="jg-chat-time">'.$hzero.$d["hour"].":".$mzero.$d["minute"].'</div>';
                                    $strprint .= '<div class="row"><div class="col-md-12"><h6>'.$username.'</h6><div class="jg-chat-msg-left default-color"><div class="jg-chat-msg">'. $chat_msg->msg .'</div></div></div></div>';  
                                }
                            }
                    }
                }
                
                $strprint .= '</blockquote>';
                $strprint .= '</div>';
                $strprint .= '</div>';
                $strprint .= '</div>';
            }
        }
        $strprint .= '</div>';

        echo $strprint;
    }
    
            
      
}