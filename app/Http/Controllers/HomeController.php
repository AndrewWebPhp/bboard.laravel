<?php

namespace App\Http\Controllers;

use App\Models\Bb;
use Illuminate\Http\Request;
use App\Http\Requests\BbRequest;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    private const BB_VALIDATOR = [
        'title' => 'required|max:50',
        'content' => 'required',
        'price' => 'required|numeric',
        'captcha' => 'required|captcha'
    ];

    private const BB_ERROR_MESSAGES = [
        'price.required' => 'У товара должна быть цена',
        'required' => 'Заполните это поле',
        'max' => 'Значенее не должно быть длинее :max символов',
        'numeric' => 'Введите число',
        'captcha.required' => 'Введите текст с картинки',
        'captcha.captcha' => 'Введите корректный текст с картинки',
    ];

    public function index()
    {
        return view('home',
                    ['bbs' => Auth::user()->bbs()->latest()->get()]);
    }


    public function showAddBbForm()
    {
        return view('bb_add');
    }

    public function storeBb(BbRequest $request)
    {

        // dd($request->pic->store('bbs'));
        // dd($request->pic->getClientOriginalName());
        // dd($request->captcha);
        // dd($request->rubric_id);

        
        // $validated = $request->validate(self::BB_VALIDATOR, self::BB_ERROR_MESSAGES);
        // Auth::user()->bbs()->create([
        //     'title' => $validated['title'],
        //     'content' => $validated['content'],
        //     'price' => $validated['price'],
        // ]);

        
        Auth::user()->bbs()->create([
            'title' => $request->title,
            'content' => $request->content,
            'price' => $request->price,
            'pic' => $request->pic->storeAs('bbs', $request->pic->getClientOriginalName(), 'public'),
        ]);
        

        return redirect()->route('home');
    }

    public function showEditBbForm(Bb $bb)
    {
        // заносим в шаблон выбранную запись
        return view('bb_edit', ['bb' => $bb]);
    }


    // параметр типа Request это объект запроса
    // тип Bb это объект модели, представляющий выбранное объявление
    public function updateBb(Request $request, Bb $bb)
    {
        $validated = $request->validate(self::BB_VALIDATOR, self::BB_ERROR_MESSAGES);
        $bb->fill([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'price' => $validated['price'],
        ]);
        $bb->save();

        return redirect()->route('home');
    }

    public function showDeleteBbForm(Bb $bb)
    {
        return view('bb_delete', ['bb' => $bb]);
    }

    public function destroyBb(Bb $bb)
    {
        $bb->delete();
        return redirect()->route('home');
    }
}
