<?php
/**
 * Notes:
 * User: Administrator
 * Date: 2023/1/9
 * Time: 13:10
 * @return
 */

namespace App\Admin\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ApiController extends  Controller
{
    public function user(Request $request){
        $data  =$request->all();
        if(!empty($data['q'])){
            $data = User::query()->where('full_name','like','%'.$data['q'].'%')
                ->select('full_name as text','id')->get()->toArray();
        }else{
            $data = User::query()->pluck('full_name as text','id');
        }
        foreach ($data as $key=>$value)
        {
            $result[$key]['id'] = $value['id'];
            $result[$key]['text'] = $value['text'];

        }
        array_unshift($result,['id'=>'','text'=>'请选择场所']);

         //$backData  =  User::query()->where('full_name', 'like', "%".$data['q']."%")->orderByDesc('id')->paginate(null, ['id', 'full_name as text']);

        return response()->json(['data'=>$result]);
    }
}
