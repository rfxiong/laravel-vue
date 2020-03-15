<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Jobs\ProcessTrade;

class TradeController extends CommonController
{
    //
    public function trade()
    {
    	//30分钟之后查询订单状态，如果没有付款则取消订单
    	$ticket_id = [
    		'tid' => date('Y-m').uniqid(),
    	];
    	$Job = new ProcessTrade($ticket_id);
    	$Job->dispatch(new ProcessTrade($ticket_id))->onQueue('trade');//->delay(3) ; //任务分发到redis中

	    return '111';
    }
}
