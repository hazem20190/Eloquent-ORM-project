<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Image;
use App\Models\Video;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Scopes\OldUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserControler extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::cursor();
        dump(get_class($users));
        return view('welcome', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $user = new User();
        // $user->name = 'hazem';
        // $user->email = 'hazem@test.com';
        // $user->password = '123456';
        // // dd($user);
        // $user->save();

        // $user = User::find('01k7j94bm3cgf5vzdd55x1cct6');
        // $user->name = 'hazem 22';
        // $user->save();

        // $user = DB::table('users')->insert([  // >>> Query Builder same pure sql -> insert data
        //     'name' => 'karem',
        //     'email' => 'karem@test.com',
        //     'password' => bcrypt('123456')
        // ]);
        // dd($user);

        // $user = DB::table('users')->insertGetId([   // >>> Query Builder same pure sql -> insert data
        //     'name' => 'aylin',
        //     'email' => 'aylin@test.com',
        //     'password' => Hash::make('123456')
        // ]);
        // dd($user);

        // $user = User::updateOrCreate(['name' => 'karem'], [
        //     'name' => 'karem2',
        //     'email' => 'karem2@test.com',
        //     'password' => bcrypt('123456')
        // ]);
        // dd($user);
        // $user = DB::table('users')->updateOrInsert(['name' => 'karem'], [  // >>> Query Builder same pure sql -> insert data
        //     'name' => 'karem3',
        //     'email' => 'karem3@test.com',
        //     'password' => bcrypt('123456')
        // ]);
        // dd($user);

        // $user = User::firstOrCreate(['name' => 'karem3'], [
        //     'email' => 'karem3@test.com',
        //     'password' => bcrypt('123456')
        // ]);
        // dd($user);

        // $user = User::firstOrNew(['name' => 'karem4'], [
        //     'email' => 'karem4@test.com',
        //     'password' => bcrypt('123456')
        // ]);
        // // dd($user);
        // $user->save();
        //##############################################
        // $user = User::updateOrCreate(['email' => 'asmaa@test.com'], ['name' => 'asmaa', 'password' => '123456']);

        // $user->name = 'asmaa2';

        // dump($user->isClean());
        // dump($user->isClean('name'));
        // dump($user->isClean('email'));
        // dump($user->isClean('email', 'name'));

        // dump($user->isDirty('name'));
        // dump($user->isDirty('email'));
        // dump($user->isDirty('email', 'name'));

        // dump($user->getOriginal('name'));

        // $user->save();
        // dump($user->wasChanged());  //Used After save() method
        // dump($user->wasChanged('email'));  //Used After save() method

        // $users = [
        //     ['name' => 'hazem-update3', 'email' => 'hazem@test.com', 'password' => '123456update3'],
        //     ['name' => 'asmaa', 'email' => 'asmaa@test.com', 'password' => '123456'],
        //     ['name' => 'karem', 'email' => 'karem@test.com', 'password' => '123456'],
        //     ['name' => 'aylin', 'email' => 'aylin@test.com', 'password' => '123456'],
        //     ['name' => 'noha',  'email' => 'noha@test.com',  'password' => '123456'],
        //     ['name' => 'moshy',  'email' => 'moshy@test.com',  'password' => '123456'],
        //     ['name' => 'salah',  'email' => 'salah@test.com',  'password' => '123456'],
        //     ['name' => 'yamen',  'email' => 'yamen@test.com',  'password' => '123456'],
        //     ['name' => 'younes',  'email' => 'younes@test.com',  'password' => '123456'],
        // ];

        // User::upsert($users, 'email', ['name', 'password']);

        // $user = User::find([1, 2, 3], 'name as user')->toArray();
        // dump($user);
        // $user = User::findOr(100, fn() => 'user not found');
        // dump($user);
        // $user = User::findOrFail(100);
        // dump($user);

        // $user = User::where('name', 'asmaa')->first();
        // $user = User::where('name', 'asmaa22')->firstOr('name', fn() => 'user not found');
        // $user = User::where('name', 'asmaa2')->firstOrFail();
        // dump($user);

        // $user = User::pluck('name', 'email');
        // dump($user);

        // $user = User::where('is_admin', 0)->value('email');
        // dump($user);

        // $user = User::where([['wallet', '>', 500], ['bank', '>', 500]])->count();
        // $user = User::where('wallet', '<', 400)->where('bank', '<', 400)->count();
        // $user = User::where(DB::raw('bank + wallet'), '>', 1000)->count();
        // $user = User::sum(DB::raw('bank + wallet'));
        // $user = User::whereRaw('wallet > ? AND bank > ?', [500, 500])->count();
        // $user = User::avg(DB::raw('bank + wallet'));
        // $user = User::min(DB::raw('bank + wallet'));
        // $user = User::max(DB::raw('bank + wallet'));
        // dump($user);

        // $user = User::all();
        // dump($user->whereStrict('wallet', 571));        // use after collection data to compare values by strict comparison

        // $user = User::whereBetween('bank', ['500', '900'])->get();
        // $user = User::whereNotBetween('bank', ['500', '900'])->get();
        // $user = User::whereIn('wallet', [571, 500, 797])->get();
        // $user = User::get();
        // dump($user->whereInStrict('wallet', ['571', 500, 797]));
        // $user = User::whereNotIn('wallet', [571, 500, 797])->get();
        // $user = User::whereNull('name')->get();
        // $user = User::whereNotNull('name')->get();
        // $user = User::firstWhere('wallet', '>', '800');
        // $user = User::whereWallet(26)->get();   //      wherecolumn($value)
        // $user = User::whereDate('created_at', '2025-10-19')->get();
        // $user = User::whereDay('created_at', '19')->get();
        // $user = User::whereMonth('created_at', '10')->get();
        // $user = User::whereYear('created_at', '2024')->get();
        // $user = User::whereAny(['wallet', 'bank'], '>', 800)->get();
        // $user = User::whereAll(['wallet', 'bank'], '>', 800)->get();

        // $user = User::orderBy('name', 'desc')->pluck('name');
        // $user = User::orderByRaw('LENGTH (name) ASC')->pluck('name');
        // $user = User::latest('name')->pluck('email', 'name');
        // $user = User::oldest('name')->pluck('email', 'name');
        // $query = User::inRandomOrder();
        // $user = $query->reorder()->latest()->pluck('name');
        // $user = User::groupBy('is_admin')->get()->toArray();
        // $user = User::skip(3)->take(3)->pluck('name');
        // $user = User::offset(3)->limit(3)->pluck('name');
        // dump($user);

        // $user = User::with('posts')->get();
        // $user = User::withCount('posts')->get();
        // $user = User::has('posts')->get();
        // $user = User::has('posts', '>', 2)->get();
        // $user = User::doesntHave('posts')->get();
        // $user = User::whereHas('posts', fn($query) => $query->where('likes', '>', 50))->get();

        // $user = User::whereHas(
        //     'posts',
        //     fn($query) => $query->where('likes', '>', 50),
        //     '>',
        //     2
        // )->get();  //  condition true > 2
        // $user = User::whereDoesntHave('posts', fn($query) => $query->where('likes', '>', 50))->get();
        // dd($user);

        // $user = User::chunk(5, fn($users) => dump($users));
        // $user = User::chunkById(5, fn($users) => dump($users));
        // $user = User::addSelect(['total_likes' => Post::selectRaw('SUM(likes)')->wherecolumn('user_id', 'users.id')])->get();
        // dump($user);

        // $user = User::find(1)->delete();
        // $user = User::where('id', 2)->delete();
        // $user = User::destroy(3, 4, 5);
        // $user = User::truncate();
        // dump($user);

        // $user = User::find(1)->delete();
        // $user = User::destroy(2);
        // $user = User::where('id', '>', 5)->delete();
        // $user = User::where('id', '<', 5)->get();
        // $user = User::withTrashed()->where('id', '<', 5)->get();
        // $user = User::withTrashed()->where('id', '<', 5)->restore();
        // $user = User::onlyTrashed()->where('id', '>', 10)->forceDelete();
        // dump($user);

        // $admin = User::firstOrCreate(['email'     => 'hazem@test.com'], [
        //     'name'      => 'hazem',
        //     'password'  => '123456',
        //     'is_admin'  => 1,
        //     'wallet'    => 1000,
        //     'bank'      => 2000,
        // ]);
        // dump($admin);

        // $user = $admin->replicate(['is_admin'])->fill([
        //     'email' => 'hazem@user.com'
        // ]);
        // $user->save();

        // $users = User::pluck('created_at')->toArray();
        // $users = User::withoutGlobalScope(OldUsers::class)->pluck('created_at')->toArray();
        // $users = User::withoutGlobalScopes()->pluck('created_at')->toArray();
        // $users = User::withoutGlobalScopesExcept([OldUsers::class])->pluck('created_at')->toArray();
        // $users = User::pluck('created_at')->toArray();
        // $users = User::newUsers()->pluck('created_at')->toArray();
        // $users = User::oldUsers()->pluck('created_at')->toArray();
        // $users = User::oldUsers()->orWhere->oldUsers()->pluck('created_at')->toArray();
        // $user = User::create([
        //     'name' => 'aylin',
        //     'email' => 'aylin@test.com',
        //     'password' => bcrypt('123456')
        // ]);
        // $user = User::withoutEvents(function () {
        //     User::create([
        //         'name' => 'moshy',
        //         'email' => 'moshy@test.com',
        //         'password' => bcrypt('123456')
        //     ]);
        // });

        // $user = User::find(12)->posts()->first()->title;
        // dump($user);
        // // $post = $user->posts->where('likes', '>', '50');
        // $post = Post::find(1)->user->name;
        // dump($post);

        // $user = Post::find(1)->user->name;  // withDefault method in post model -- where no user found

        // $users = User::find(12);
        // $posts = Post::whereBelongsTo($users)->get();
        // $user = User::find(12)->latestPost()->get();
        // $user = User::find(12)->oldestPost()->get();
        // $user = User::find(12)->mostLiked()->get();
        // $user = User::find(1)->userSerial;
        // $user = User::find(12);
        // foreach ($user->roles as $role) {
        //     dump($role->pivot->created_at);
        // }
        // $user = User::find(1);
        // dump($user->image);
        // $post = Post::find(1);
        // dump($post->image);
        // $image = Image::find(1);
        // $relation = $image->imageable_type;
        // dump($relation == 'App\Models\Post' ? $image->imageable->title : $image->imageable->name);

        // $video = Video::find(1);
        // dump($video->comments->pluck('comment')->toArray());
        // $post = Post::find(1);
        // dump($post->comments->pluck('comment')->toArray());
        // $comments = Comment::find(1);
        // dump($comments->getName());

        // $posts = Post::find(1);
        // $videos = Video::find(1);
        // $tags = Tag::find(1);
        // // foreach ($posts->tags as $tag) {

        // //     dump($tag);
        // // }
        // dump($posts->tags->pluck('tag_name')->toArray());
        // dump($videos->tags->pluck('tag_name')->toArray());
        // dump($tags->posts->pluck('title')->toArray());
        // dump($tags->videos->pluck('name')->toArray());


        //  Eager Loading

        // $users = User::get();                       // 21 Queries
        // $users = User::with('posts')->get();    // only 2 Queries
        // foreach ($users as $user) {
        //     foreach ($user->posts as $post) {
        //         dump($post->title);
        //         dump($post->user->email);   // 22 Queries Without chaperon()  but 2 Queries with chaperone() in user model
        //     }
        // }

        // $users = User::has('posts', '>', 1)->get();
        // $users = User::whereHas('posts', fn($query) => $query->where('likes', '>', 80));
        // $users = User::doesntHave('posts')->get();
        // $users = User::whereDoesntHave('posts', fn($query) => $query->where('wallet', '<', 1800));
        // dump($users->pluck('name')->toArray());

        // $users = User::withCount('posts as total_count')->get();
        // foreach ($users as $user) {
        //     dump($user->name . ' -- ' . $user->total_count);
        // }
        // $users = User::get();
        // foreach ($users->loadCount('posts as total_posts') as $user) {
        //     dump($user->name . ' -- ' . $user->total_posts);
        // }
        // $users = User::withSum('posts as total_likes', 'likes')->get();
        // foreach ($users as $user) {
        //     dump($user->name . ' -- ' . $user->total_likes);
        // }

        // $user = User::find(1);
        // $post = Post::find(1);
        // $post->user()->associate($user);
        // $post->save();
        // $post->user()->dissociate();
        // $post->save();

        // $user = User::find(1);
        // $user->roles()->attach([1 => ['expires' => 'true'], 2 => ['expires' => 'fals']]);
        // $user->roles()->detach();
        // $user->roles()->sync([1 => ['expires' => 'true'], 3 => ['expires' => 'true']]);
        // $user->roles()->syncWithPivotValues([1, 2, 3], ['expires' => 'yes']);
        // $user->roles()->syncWithoutDetaching([1, 2, 3]);
        // $user->roles()->toggle([1, 2]);
        // $user->roles()->updateExistingPivot([1, 2, 3], ['expires' => 'true']);

        // dump($user->roles()->pluck('role')->toArray());

        // $comment = Comment::find(3)->update(['comment' => 'comment 222 post 1']);   // No action in post model in updated_at
        // $comment = Comment::find(3);
        // $comment->update(['comment' => 'comment 22 post 11 frome update method']);
        // $comment->comment = 'comment 22 post 11';
        // $comment->save();
        // dump($comment);

        // Accessors , Mtators And Casts
        User::create([
            'name' => 'KAREM HAZEM MOHAMMED',
            'email' => 'karem_hazem@example.com',
            'is_admin' => 'true',

        ]);
        $user = User::get();
        dump($user->pluck('is_admin')->toArray());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
