<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Message;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //一覧習得
        $messages = Message::orderBy('id', 'desc')->paginate(25);

        return view('messages.index', [
            'messages' => $messages,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $message = new Message;

        return view('messages.create', [
            'message' => $message,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //バリデーション
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required|max:255',
        ]);

        //メッセージ作成
        $message = new Message;
        $message->title = $request->title;
        $message->content = $request->content;
        $message->save();
        //リダイレクト
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = Message::findOrFail($id);

        return view('messages.show', [
            'message' => $message,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $message = Message::findOrFail($id);

        return view('messages.edit', [
            'message' => $message,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //バリデーション
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required|max:255'
        ]);

        //メッセージ取得
        $message = Message::findOrFail($id);
        //更新処理
        $message->title = $request->title;
        $message->content = $request->content;
        $message->save();

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = Message::findOrFail($id);

        $message->delete();

        return redirect('/');
    }
}
