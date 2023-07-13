<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Bb;
use App\Models\User;
use App\Models\Spare;
use App\Models\Rubric;
use App\Models\Account;
use App\Models\Machine;
use Illuminate\Support\Str;
use Illuminate\Http\Rqueest;
use Illuminate\Support\Collection;

class BbsController extends Controller
{
    
    public function index() 
    {

        // $rubric = Rubric::firstWhere('name', 'Легковые');
        // $bbs = $rubric->bbs()->orderBy('price', 'desc')->get();

        // foreach($bbs as $bb) {
        //     echo $bb->title . ' | ' . $bb->price . '<br>';
        // }

        /*
        $collection = collect([
            ['name' => 'Regena', 'age' => null],
            ['name' => 'Linda', 'age' => 14],
            ['name' => 'Diego', 'age' => 23],
            ['name' => 'Linda', 'age' => 84],
        ]);
        */
        //dd($collection->firstWhere('name', 'Linda'));
        
    
        echo 'Only expensive items:<br>';
        $bbss = Bb::expensive()->get();
        foreach($bbss as $item){
            echo $item->content . '<br>';
        }
        // dd($bbs);



        echo '<br>';
        echo '<a href="'. route('test', ['rubric_id' => 4, 'bbId' => 2]) .'">test11</a>';


        // $context = ['bbs' => Bb::latest()->get()];
        $context = ['bbs' => Bb::latest()->paginate(5)];
        return view('index', $context);
    }

    public function detail(Bb $bb) 
    {
        return view('detail', ['bb' => $bb]);
    }


    public function test($rubric_id, $bb_id) 
    {
        echo 'test <br>';
        echo $rubric_id . '<br>' . $bb_id;
    }

}
