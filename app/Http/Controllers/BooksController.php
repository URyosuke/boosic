<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GuzzleHttp\Client;

class BooksController extends Controller
{
    public function form(Request $request)
    {
        $data = [];
        $items = null;
        
        //外部APIのURLを指定する(楽天ブックス書籍検索API)
        $url = 'https://app.rakuten.co.jp/services/api/BooksBook/Search/20170404';
        
        if(!empty($request->keyword))
        {
            //検索キーワード入力の場合
            $option = [
                'query' => [
                    //レスポンスのフォーマット形式はjson
                    'format' => 'json',
                    
                    //書籍タイトルの取得
                    'title' => $request->keyword,
                    
                    //著者名の取得
                    //'author' => urlencode($request->author),
                    
                    //取得したアプリケーションID
                    'applicationId' => '1026863389812584245'
                ]
            ];
            
            $config = ['base_uri' => "{{ route('posts.selectbook') }}"];
            $client = new Client($config);
            
            $response = $client->request('GET',$url,$option);
            
            
            $list = json_encode(json_decode($response->getBody()->getContents(), true), JSON_UNESCAPED_UNICODE);
            

            // JSONを連想配列化
            $items = json_decode($list, true)["Items"];
            
            //レスポンスの中身を確認
            // dd($items);

            // api.blade.phpというビューに第二引数の値をビュー側にitemsという名前の連想配列として渡す
            //return view('posts.selectbook' , compact('items'));
        }
        
        $data = [
            'items' => $items,
            'keyword' => $request->keyword,
        ];
        
        return view('posts.selectbook', $data);
    }
}
