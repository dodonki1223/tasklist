<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Task; //Modelの読み込み

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // すべてのタスクを取得
        $tasks = Task::all();

        // indexページにすべてのタスクを渡して表示
        return view('tasks.index', [
           'tasks' => $tasks ,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // Taskモデルのインスタンスを作成
        $task = new Task;

        // Taskモデルをcreateページに渡して表示
        return view('tasks.create', [
            'task' => $task,
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

        // フォームで入力された内容をtasksテーブルに登録する
        $task = new Task;
        $task->content = $request->content;
        $task->save();

        // indexページに飛ぶ
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

        // 対象IDのタスクを取得
        $task = Task::find($id);

        // 対象IDのタスクをtasks/show.balade.phpファイルに渡して表示
        return view('tasks.show', [
            'task' => $task,
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
        // 対象IDのタスクを取得
        $task = Task::find($id);

        // 対象IDのタスクをeditページに渡して表示
        return view('tasks.edit', [
            'task' => $task,
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

        // 対象IDのタスクを取得
        $task = Task::find($id);

        // 編集フォームで入力されたタスク更新
        $task->content = $request->content;
        $task->save();

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
        
        // 対象IDのタスクを取得
        $task = Task::find($id);

        // 対象IDのタスクを削除する
        $task->delete();

        return redirect('/');

    }
}
