<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use App\Models\Category;
use App\Models\Work;
use App\Models\PersonalInformation;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use App\Lib\R2;


class Dashboard extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index(): Factory|View|Application
    {
        $user = Auth::user();
        $avatar = R2::avatar_get($user->avatar);
        return view('dashboard.dashboard', ['avatar' => $avatar, 'user' => $user, 'title' => 'ダッシュボード',  'pi' => PersonalInformation::where('user_id', Auth::user()->id)->first()]);
    }

    public function work($id=""): Factory|View|Application
    {
        $works = Work::where('user_id', Auth::user()->id)->paginate(5);
        return view('dashboard.work', ['title' => '出品サービス管理', 'works' => $works, 'user' => Auth::user(), 'pi' => PersonalInformation::where('user_id', Auth::user()->id)->first()]);
    }

    public function work_add(): Factory|View|Application
    {
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
        // アップロードされたファイルの取得
        $image = $request->file('file');
        // ファイルの保存とパスの取得
        $path = isset($image) ? $image->store('items', 'public') : '';


        $title = $request['title'];
        $outline = $request['outline'];
        $price = $request['price'];
        $tag = $request['tag'];
        $file = $request['file'];
        $category = $request['category'];
        $work = new Work();
        $model = $work->create([
            'title' => $title,
            'outline' => $outline,
            'price' => $price,
            'tag' => $tag,
            'file' => $file,
            'category_id' => $category,
            'preview' => 0,
            'url' => $path,
            'user_id' => Auth::user()->id,
            'auction_id' => 0,
            'buy_id' => 0,
            'types' => 0
        ]);
        return view('dashboard.work-ok', ['work' => $model]);
    }

    public function auction_add(): Factory|View|Application
    {
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
        $tag = $request['tag'];
        $file = $request['file'];
        $category = $request['category'];
        $auction = new Auction();
        $auctionModel = $auction->create([
            'start_price' => $start_price,
            'max_price' => $max_price,
            'start_date' => now(),
            'end_date' => now(),
            'status' => true
        ]);
        $work = new Work();
        $model = $work->create([
            'title' => $title,
            'outline' => $outline,
            'price' => $start_price,
            'tag' => $tag,
            'file' => $file,
            'category_id' => $category,
            'preview' => 0,
            'url' => '',
            'user_id' => Auth::user()->id,
            'auction_id' => $auctionModel->id,
            'buy_id' => 0
        ]);
        return view('dashboard.work-ok', ['work' => $model]);
    }

    public function work_all(): Factory|View|Application
    {
        $works = Work::get();
        $page = Work::paginate(5);
        return view('dashboard.work', ['works' => $works, 'page' => $page]);
    }
}
