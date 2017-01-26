<?php

namespace App\Http\Controllers;

use App\Date;
use App\Idiom;
use App\Main_context;
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


    /**
     * @param $wordId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createSentence($wordId)
    {

        $word = Word::findOrFail($wordId);

        return view('admin.words.create_sentence', compact('word'));
    }


    /**
     * @param $wordId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createWordForm($wordId)
    {
        $word = Word::findOrFail($wordId);

        return view('admin.words.create_word_form', compact('word'));
    }


    /**
     * @param $dateId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @internal param $wordId
     */
    public function createContext($dateId)
    {
        $date = Date::findOrFail($dateId);

        return view('admin.words.main_context.create', compact('date'));
    }


    /**
     * @param $dateId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @internal param $wordId
     */
    public function createIdiom($dateId)
    {
        $date = Date::findOrFail($dateId);

        return view('admin.words.idiom.create', compact('date'));
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


        return redirect('dates');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
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
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
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
            $wordForm['is_verb'] = true;

        else if ($input['form_type'] == 2)
            $wordForm['is_adj'] = true;

        else if ($input['form_type'] == 3)
            $wordForm['is_adv'] = true;

        else if ($input['form_type'] == 4)
            $wordForm['is_noun'] = true;


        $word = Word::findOrFail($input['word_id']);

        $word->wordForms()->save(Word_form::create($wordForm));

        return redirect('words/' . $input['word_id']);

    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function storeContext(Request $request)
    {

        $this->validate($request, [
            'date_id' => 'required',
            'title_eng' => 'required',
            'title_per' => 'required',
            'context_per' => 'required',
            'context_eng' => 'required'
        ]);


        $input = $request->all();


        $context = [
            'title_eng' => $input['title_eng'],
            'title_per' => $input['title_per'],
            'context_per' => $input['context_per'],
            'context_eng' => $input['context_eng'],
        ];


        $date = Date::findOrFail($input['date_id']);

        $date->context()->save(Main_context::create($context));

        return redirect('dates');

    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function storeIdiom(Request $request)
    {

        $this->validate($request, [
            'idiom_eng' => 'required',
            'idiom_eng_def' => 'required',
            'idiom_per' => 'required',
            'idiom_per_def' => 'required',
            'image' => 'required'
        ]);


        $input = $request->all();


        $imageFile = $request->file('image');
        $name = $imageFile->getClientOriginalName();
        $imageFile->move('idiom_images', $name);



        $idiom = [
            'idiom_eng' => $input ['idiom_eng'],
            'idiom_eng_def' => $input['idiom_eng_def'],
            'idiom_per' => $input['idiom_per'],
            'idiom_per_def' => $input['idiom_per_def'],
            'image' => $name ,
        ];


        $date = Date::findOrFail($input['date_id']);

        $date->idiom()->save(Idiom::create($idiom));




        return redirect('dates');

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


    public function destroyIdiom($idiomId)
    {
        $idiom = Idiom::findOrFail($idiomId);

//        $dateId = $idiom->date_id;

        $idiom->delete();

        return redirect('dates');
    }


    public function destroyContext($contextId)
    {
        $main = Main_context::findOrFail($contextId);

//        $wordId = $main->date_id;

        $main->delete();

        return redirect('dates');
    }
}
