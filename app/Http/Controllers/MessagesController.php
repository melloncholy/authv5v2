<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Conversation;
use App\Models\Access;
use App\Models\DeletedMessage;
use App\Models\User;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\DB;


class MessagesController extends Controller {

    public function show()
    {
        return view('messages.create-conversation');
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'title' => 'max:255',
            'userId' => 'integer|numeric',
            'message' => 'max:1000',
            'user_id' => 'integer|numeric',
        ]);

        Conversation::create([
            'title' => $request->title,
            'owner_id' => $request->userId,
        ]);

        $conversation_id = Conversation::pluck('id')
            ->last();

        Message::create([
            'message' => $request->message,
            'user_id' => $request->userId,
            'conversation_id' => $conversation_id,
        ]);

        $participants = explode(" ", $request->participants);

        Access::create([
            'conversation_id' => $conversation_id,
            'user_id' => $request->userId,
        ]);

        foreach ($participants as $participant) {
            $user = User::where('email', '=', $participant)
                ->first();

            Access::create([
                'conversation_id' => $conversation_id,
                'user_id' => $user->id,
            ]);
        }

        return redirect('messages/');
    }

    public function showConversations()
    {
        $conversations = Access::where('user_id', '=', auth()->user()->id)
            ->join('conversations', 'accesses.conversation_id', '=', 'conversations.id')
            ->get();

        return view('messages.conversations-list', compact('conversations'));
    }

    public function toConversation($id)
    {
        $messages = Message::with('user')
            ->where('conversation_id', '=', $id)
            ->get();

        foreach ($messages as $message) {
            // $message->with('deleted_messages')
            //         ->where('user_id', '!=', auth()->user()->id)
            //         ->where('conversation_id', '=', $id)
            //         ->update([
            //             'is_seen' => 1
            //         ]);

            if (DeletedMessage::where('user_id', '!=', auth()->user()->id)->where('messages_id', '=', $message->id)) {
                $message->where('user_id', '!=', auth()->user()->id)
                    ->where('conversation_id', '=', $id)
                    ->update([
                        'is_seen' => 1
                    ]);

            }
            else {
                //die();
            }




                // $message->where('user_id', '!=', auth()->user()->id)
                //     ->where('conversation_id', '=', $id)
                //     ->update([
                //         'is_seen' => 1
                //     ]);
        }

        $conversation_id = $id;

        return view('messages.conversation', compact('messages'), compact('conversation_id'));
    }

    public function sendMessage(Request $request)
    {
        Message::create([
            'message' => $request->message,
            'user_id' => $request->myId,
            'conversation_id' => $request->conversationId,
        ]);

        return redirect('messages/' . $request->conversationId);
    }

    public function deleteMessage(Request $request)
    {
        DeletedMessage::create([
            'message_id' => $request->messageId,
            'user_id' => $request->myId,
        ]);

        return redirect('messages/' . $request->conversationId);
    }

}
// class MessagesController extends Controller
// {
//     // Show conversation list

//     public function show()
//     {
//         $conversations = Conversation::with('user')
//             ->where('user_one', '=', auth()->user()->id)
//             ->orWhere('user_two', '=', auth()->user()->id)
//             ->get();

//         return view('messages.conversations-list', compact('conversations'));
//     }

//     // Create new conversation or redirect into existing

//     public function create(Request $request)
//     {
//         if (DB::table('conversations')
//             ->where('user_one', $request->myId)
//             ->where('user_two', $request->userId)
//             ->orWhere(function ($query) use ($request){
//                 $query->where('user_one', $request->userId)
//                         ->where('user_two', $request->myId);
//             })
//             ->exists()
//         ) {
//             $conversations = DB::table('conversations')
//                 ->where('user_one', '=', $request->myId)
//                 ->where('user_two', '=', $request->userId)
//                 ->orWhere(function ($query) use ($request){
//                     $query
//                         ->where('user_one', '=', $request->userId)
//                         ->where('user_two', '=', $request->myId);
//                 })
//                 ->first();

//             return redirect('messages/' . $conversations->id);
//         } else {
//             Conversation::create([
//                 'user_one' => $request->myId,
//                 'user_two' => $request->userId,
//             ]);

//             $conversations = DB::table('conversations')
//                 ->where('user_one', '=', $request->myId)
//                 ->where('user_two', '=', $request->userId)
//                 ->orWhere(function ($query) use ($request){
//                     $query->where('user_one', '=', $request->userId)
//                             ->where('user_two', '=', $request->myId);
//                 })
//                 ->first();

//             return redirect('messages/' . $conversations->id);
//         }
//     }

//     // Show conversation

//     public function showConversation($id)
//     {

//         $messages = Message::with('user')
//             ->where('conversation_id', '=', $id)
//             ->get();

//         foreach ($messages as $message) {

//             $message
//                 ->where('user_id', '!=', auth()->user()->id)
//                 ->update([
//                     'is_seen' => 1
//                 ]);
//         }


//         $conversation_id = $id;

//         return view('messages.conversation', compact('messages'), compact('conversation_id'));
//     }
//     // Send message

//     public function sendMessage(Request $request)
//     {

//         Message::create([
//             'message' => $request->message,
//             'user_id' => $request->myId,
//             'conversation_id' => $request->conversationId,
//         ]);

//         return redirect('messages/' . $request->conversationId);
//     }


// }
