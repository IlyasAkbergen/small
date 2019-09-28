<?php

namespace App\Http\Controllers;

use App\Attachment;
use App\Helper;
use App\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Получение всех заявок
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'questions' => Question::with(['answers', 'user', 'attachments'])->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formData = [];
        foreach ($request->all() as $key => $item){
            if($key == '_token' || $key == 'ru'){
                continue;
            }
            $formData[$key] = $item;
        }

        $question = new Question();
        $question->fill($formData);
        $question->save();

        $attachment = new Attachment();
        $filename = $formData['file']->getBasename();
        $extension = $formData['file']->extension();

        $path = Helper::storeAttachement('public/attachments', $formData['file'], $filename.'.'.$extension);
        $attachment->filename = $filename;
        $attachment->path = $path;
        $attachment->question_id = $question->id;
        $attachment->save();

        return response()->json([
            'question' => $question->with(['answers', 'user', 'attachments'])->first()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $question = Question::findOrFail($id);
        $question->fill($request->question);
        $question->save();

        return abort(200, 'OK');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Question::findOrFail($id)->delete();
        return abort(200, 'OK');
    }
}
