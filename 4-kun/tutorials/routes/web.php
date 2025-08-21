<?php

use App\Models\Post;
use App\Models\Task;
use App\Models\Uch;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test-model', function () {
    $create = Uch::create([
        'birinchi' => 'birinchi post',
        'ikkinchi' => 'ikkinchi post',
        'uchinchi' => 'uchinchi post',
    ]);
    $uch = Uch::query()->find(1);
    $uch->birinchi = 'yangilandi';
    $uch->save();
});
Task::create([
    'name' => 'learning laravel',
    'is_done' => false,
]);
Task::create([
    'name' => 'laravel laravel'
]);
Task::create([
    'name' => 'model va migratsiyani birga ishlatish',
    'is_done' => true,
]);

$finishTasks = Task::where('is_done', false)->get();
foreach ($finishTasks as $task) {
    echo $task->name . '<br>';
}

$task = Task::find(1);
if ($task) {
    $task->is_done = true;
    $task->save();
    $task?->delete();
};



//$post = new Post();
//$post->title = "Sarlavha";
//$post->name = "ism";
//$post->content = "kontent";
//$post->save(saqlandi);   bu malumot qo'shishni 1-usuli
Post::create([
    'title' => 'Bu ikkinchi usul',
    'name' => 'yangi ism',
    'content' => 'va yangi kontent',
]);
//$post = Post::all(); barcha postlarni olish uchun
$post = Post::find(1);

if ($post) {
    $post->delete();
}

