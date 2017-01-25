<?php

namespace App\Http\Controllers;

use App\Date;
use App\Sentence;
use App\Word;
use App\Pic;
use App\Pronounciation;
use App\Word_form;
use Illuminate\Http\Request;

use App\Http\Requests;

class WordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $date = Date::find($id);
        return view('admin.words.create', compact('date'));
    }


    public function createSentence($wordId)
    {

        $word = Word::findOrFail($wordId);

        return view('admin.words.create_sentence', compact('word'));
    }


    public function createWordForm($wordId)
    {
        $word = Word::findOrFail($wordId);

        return view('admin.words.create_word_form', compact('word'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'date_id' => 'required',
            'word' => 'required',
            'per_def' => 'required',
            'eng_def' => 'required',
            'sentence_eng' => 'required',
            'sentence_per' => 'required',
            'deleted_word' => 'required',
            'image' => 'required',
            'sound' => 'required',
        ]);


        $input = $request->all();

        $date = Date::findOrFail($input['date_id']);

        $word = Word::create([
            'word' => $input['word'],
            'per_def' => $input['per_def'],
            'eng_def' => $input['eng_def']
        ]);

        $date->words()->save($word);


        $sentence = Sentence::create([
            'sentence_eng' => $input['sentence_eng'],
            'sentence_per' => $input['sentence_per'],
            'deleted_word' => $input['deleted_word']
        ]);

        $word->sentences()->save($sentence);


        $imageFile = $request->file('image');
        $name = $imageFile->getClientOriginalName();
        $imageFile->move('images', $name);

        $pic = Pic::create([
            'file_name' => $name
        ]);

        $word->image()->save($pic);


        $soundFile = $request->file('sound');
        $name = $soundFile->getClientOriginalName();
        $soundFile->move('sounds', $name);

        $pronunciation = Pronounciation::create([
            'file_name' => $name
        ]);

        $word->pronunciation()->save($pronunciation);


        redirect('dates');
    }


    /**
     * @param Request $request
     */
    public function storeSentence(Request $request)
    {

        $this->validate($request, [
            'sentence_eng' => 'required',
            'sentence_per' => 'required',
            'deleted_word' => 'required',

        ]);


        $input = $request->all();

        $word = Word::findOrFail($input['word_id']);


        $sentence = Sentence::create([
            'sentence_eng' => $input['sentence_eng'],
            'sentence_per' => $input['sentence_per'],
            'deleted_word' => $input['deleted_word']
        ]);

        $word->sentences()->save($sentence);


        return redirect('/words/' . $input['word_id']);
    }


    /**
     * @param Request $request
     */
    public function storeWordForm(Request $request)
    {

        $this->validate($request, [
            'word' => 'required',
            'form_type' => 'required',
            'word_form_sentence' => 'required',
            'word_form_sentence_def' => 'required',
            'word_form_def' => 'required'
        ]);


        $input = $request->all();


        $wordForm = [
            'word' => $input['word'],
            'is_verb' => false,
            'is_adv' => false,
            'is_noun' => false,
            'is_adj' => false,
            'sentence' => $input['word_form_sentence'],
            'sentence_per' => $input['word_form_sentence_def'],
            'word_def' => $input['word_form_def']];


        if ($input['form_type'] == 1)
            $wordForm['is_verb'] = true ;

        else if ($input['form_type'] == 2)
            $wordForm['is_adj'] = true ;

        else if ($input['form_type'] == 3)
            $wordForm['is_adv'] = true ;

        else if ($input['form_type'] == 4)
            $wordForm['is_noun'] = true ;


        $word = Word::findOrFail($input['word_id']);

        $word->wordForms()->save(Word_form::create($wordForm));

        return redirect('words/'. $input['word_id']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $word = Word::findOrFail($id);
        return view('admin.words.show', compact('word'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function destroySentence($sentenceId)
    {
        $sentence = Sentence::findOrFail($sentenceId);

        $wordId = $sentence->word_id;

        $sentence->delete();

        return redirect('words/' . $wordId);
    }


    public function destroyWordForm($wordFormId)
    {
        $wordForm = Word_form::findOrFail($wordFormId);

        $wordId = $wordForm->word_id;

        $wordForm->delete();

        return redirect('words/' . $wordId);
    }
}
