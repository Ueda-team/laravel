<?php

namespace App\Http\Controllers;

use App\Lib\OpenAI;
use App\Models\Auction;
use App\Models\Category;
use App\Models\News;
use App\Models\Tag;
use App\Models\Work;
use App\Models\PersonalInformation;
use App\Models\WorkFile;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use App\Lib\R2;
use Illuminate\Support\Str;
use JetBrains\PhpStorm\NoReturn;


class Dashboard extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index(): View|Factory|RedirectResponse|Application
    {
        if(!Auth::check()) return redirect()->route('login');
        $user = Auth::user();
        $avatar = R2::avatar_get($user->avatar);
        $news = News::all()->take(5);
        return view('dashboard.dashboard', ['avatar' => $avatar, 'user' => $user, 'title' => 'ダッシュボード',  'pi' => PersonalInformation::where('user_id', Auth::user()->id)->first(), 'news' => $news]);
    }

    public function work($id=""): View|Factory|RedirectResponse|Application
    {
        if(!Auth::check()) return redirect()->route('login');
        $works = Work::where('user_id', Auth::user()->id)->latest()->paginate(5);
        $user = Auth::user();
        $avatar = R2::avatar_get($user->avatar);
        return view('dashboard.work', ['title' => '出品サービス管理', 'avatar' => $avatar, 'works' => $works, 'user' => Auth::user(), 'pi' => PersonalInformation::where('user_id', Auth::user()->id)->first()]);
    }

    public function work_add(): View|Factory|RedirectResponse|Application
    {
        if(!Auth::check()) return redirect()->route('login');
        $categories = Category::all();
        $sort = [];
        $sort[] = '選択してください';
        foreach ($categories as $category){
            $sort[] = $category->name;
        }
        return view('dashboard.work-post', ['categories' => $sort]);
    }

    public function work_post(Request $request): Application|Factory|View
    {
        $title = $request['title'];
        $outline = $request['outline'];
        $price = $request['price'];
        $tag = $request['tag'];
        $category = $request['category'];
        $work = new Work();
        $model = $work->create([
            'title' => $title,
            'outline' => $outline,
            'price' => $price,
            'tag' => $tag,
            'category_id' => $category,
            'preview' => 0,
            'url' => '',
            'user_id' => Auth::user()->id,
            'auction_id' => 0,
            'buy_id' => 0,
            'types' => 0
        ]);

        //画像の保存
        do {
            $ran_id = $model->id . Str::random(7);
        } while (R2::work_exists($ran_id));
        $image = $request->file('file');
        $path = isset($image) && R2::work_put($image, $ran_id);
        if($path){
            $workFile = new WorkFile();
            $workFile->create([
                'work_id' => $model->id,
                'name' => $ran_id
            ]);
        }
        return view('dashboard.work-ok', ['work' => $model]);
    }

    public function auction_add(): View|Factory|RedirectResponse|Application
    {
        if(!Auth::check()) return redirect()->route('login');
        $categories = Category::all();
        $sort = [];
        $sort[] = '選択してください';
        foreach ($categories as $category){
            $sort[] = $category->name;
        }
        return view('dashboard.auction-post', ['categories' => $sort]);
    }

    public function auction_post(Request $request): Application|Factory|View
    {
        $title = $request['title'];
        $outline = $request['outline'];
        $start_price = $request['start_price'];
        $max_price = $request['max_price'];
        $file = $request['file'];
        $category = $request['category'];
        $type = $request['type'];
        $start_date = $request['start_date'];
        $end_date = $request['end_date'];
        $auction = new Auction();
        $auctionModel = $auction->create([
            'start_price' => $start_price,
            'max_price' => $max_price,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'status' => true
        ]);
        $work = new Work();
        $model = $work->create([
            'title' => $title,
            'outline' => $outline,
            'price' => $start_price,
            'tag' => '',
            'file' => $file,
            'category_id' => $category,
            'preview' => 0,
            'url' => '',
            'user_id' => Auth::user()->id,
            'auction_id' => $auctionModel->id,
            'buy_id' => 0,
            'types' => $type
        ]);
        $tags = explode(' ', $request['tag']);
        $tags = array_splice($tags, 5);
        foreach ($tags as $tag){
            $modelTag = new Tag();
            $modelTag->create([
                'work_id' => $model->id,
                'name' => $tag
            ]);
        }

        //画像の保存
        do {
            $ran_id = $model->id . Str::random(7);
        } while (R2::work_exists($ran_id));
        $image = $request->file('file');
        $path = isset($image) && R2::work_put($image, $ran_id);
        if($path){
            $workFile = new WorkFile();
            $workFile->create([
                'work_id' => $model->id,
                'name' => $ran_id
            ]);
        }
        return view('dashboard.work-ok', ['work' => $model]);
    }

    #[NoReturn] public function tag(Request $request)
    {
        header("Content-type: application/json; charset=UTF-8");
        $return_data = explode(' ', OpenAI::send_prompt('"'.$request['data'].'"というサービス内容に合うタグを5つ半角スペース区切りで考えてください'));
        echo json_encode($return_data);
        exit;
    }
}
