<?php

namespace App\Http\Controllers;

use App\Bid;
use Illuminate\Http\Request;
use Validator;

class BidController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }
    //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    public function index()
    {
        $respond = [];
        //++++++++++++++++++++++++++++++++++++++++++++++++++++++
        $list = Bid::latest()->get();
        //++++++++++++++++++++++++++++++++++++++++++++++++++++++
        $respond['status']        = true;
        $respond['message']       = 'Bid Latest List';
        $respond['response_data'] = $list;
        return $respond;

    }
    //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    public function get_product_max_bid(Request $request)
    {
        //++++++++++++++++++++++++++++++++++++++++++++++
        $respond = [];
        //++++++++++++++++++++++++++++++++++++++++++++++
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
        ]);
        if ($validator->fails()) {
            $respond['status']        = false;
            $respond['message']       = 'Validation Error';
            $respond['response_data'] = $validator->messages();
        } else {
            try {
                //++++++++++++++++++++++++++++++++++++++++++++++++++++++
                $list = Bid::where('product_id', $request->product_id)->max('bid_amount');
                //++++++++++++++++++++++++++++++++++++++++++++++++++++++
                if ($list) {
                    $respond['status']        = true;
                    $respond['message']       = 'Max bid by product ID';
                    $respond['response_data'] = $list;
                } else {
                    $respond['status']        = false;
                    $respond['message']       = 'No Product Max Bid Found';
                    $respond['response_data'] = null;
                }
            } catch (\Exception $e) {
                $respond['status']        = false;
                $respond['message']       = $e->getMessage();
                $respond['response_data'] = null;
            }
        }
        return $respond;

    }
    //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    public function get_user_max_bid(Request $request)
    {
        //++++++++++++++++++++++++++++++++++++++++++++++
        $respond = [];
        //++++++++++++++++++++++++++++++++++++++++++++++
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
        ]);
        if ($validator->fails()) {
            $respond['status']        = false;
            $respond['message']       = 'Validation Error';
            $respond['response_data'] = $validator->messages();
        } else {
            try {
                //++++++++++++++++++++++++++++++++++++++++++++++++++++++
                $list = Bid::where('user_id', $request->user_id)->max('bid_amount');
                //++++++++++++++++++++++++++++++++++++++++++++++++++++++
                if ($list) {
                    $respond['status']        = true;
                    $respond['message']       = 'Max bid by user ID';
                    $respond['response_data'] = $list;
                } else {
                    $respond['status']        = false;
                    $respond['message']       = 'Opps!! sorry!! problem occurred.Please try again!';
                    $respond['response_data'] = null;
                }
            } catch (\Exception $e) {
                $respond['status']        = false;
                $respond['message']       = $e->getMessage();
                $respond['response_data'] = null;
            }
        }
        return $respond;

    }
    //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    public function get_bid_by_user(Request $request)
    {
        //++++++++++++++++++++++++++++++++++++++++++++++
        $respond = [];
        //++++++++++++++++++++++++++++++++++++++++++++++
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
        ]);
        if ($validator->fails()) {
            $respond['status']        = false;
            $respond['message']       = 'Validation Error';
            $respond['response_data'] = $validator->messages();
        } else {
            try {
                //++++++++++++++++++++++++++++++++++++++++++++++++++++++
                $list = Bid::where('user_id', $request->user_id);
                //++++++++++++++++++++++++++++++++++++++++++++++++++++++
                if ($list) {
                    $respond['status']        = true;
                    $respond['message']       = 'Bid Details By User';
                    $respond['response_data'] = $list;
                } else {
                    $respond['status']        = false;
                    $respond['message']       = 'Opps!! sorry!! problem occurred.Please try again!';
                    $respond['response_data'] = null;
                }
            } catch (\Exception $e) {
                $respond['status']        = false;
                $respond['message']       = $e->getMessage();
                $respond['response_data'] = null;
            }
        }
        return $respond;
    }
    //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    public function get_bid_by_product(Request $request)
    {
        //++++++++++++++++++++++++++++++++++++++++++++++
        $respond = [];
        //++++++++++++++++++++++++++++++++++++++++++++++
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
        ]);
        if ($validator->fails()) {
            $respond['status']        = false;
            $respond['message']       = 'Validation Error';
            $respond['response_data'] = $validator->messages();
        } else {
            try {
                //++++++++++++++++++++++++++++++++++++++++++++++++++++++
                $list = Bid::where('product_id', $request->product_id);
                //++++++++++++++++++++++++++++++++++++++++++++++++++++++
                if ($list) {
                    $respond['status']        = true;
                    $respond['message']       = 'Bid Details By Product';
                    $respond['response_data'] = $list;
                } else {
                    $respond['status']        = false;
                    $respond['message']       = 'Opps!! sorry!! problem occurred.Please try again!';
                    $respond['response_data'] = null;
                }
            } catch (\Exception $e) {
                $respond['status']        = false;
                $respond['message']       = $e->getMessage();
                $respond['response_data'] = null;
            }
        }
        return $respond;
    }
    //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    public function bid_add(Request $request)
    {
        //++++++++++++++++++++++++++++++++++++++++++++++
        $respond = [];
        //++++++++++++++++++++++++++++++++++++++++++++++
        $validator = Validator::make($request->all(), [
            'user_id'    => 'required',
            'product_id' => 'required',
            'bid_amount' => 'required',
        ]);
        if ($validator->fails()) {
            $respond['status']        = false;
            $respond['message']       = 'Validation Error';
            $respond['response_data'] = $validator->messages();
        } else {
            try {
                //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ +
                //$get_count = Bid::where('user_id', $request->user_id)->where('product_id', $request->product_id)->count();
                $get_count = 0;
                //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
                if ($get_count == 0) {
                    $bid = new Bid;
                    //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
                    $bid->user_id    = $request->user_id;
                    $bid->product_id = $request->product_id;
                    $bid->bid_amount = $request->bid_amount;
                    //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
                    if ($bid->save()) {
                        //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
                        $list = Bid::find($bid->id);
                        //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
                        $respond['status']        = true;
                        $respond['message']       = 'Bid created successfully';
                        $respond['response_data'] = $list;
                    } else {
                        $respond['status']        = true;
                        $respond['message']       = 'Opps!! sorry!! problem occurred.Please try again!';
                        $respond['response_data'] = null;
                    }
                } else {
                    $respond['status']        = true;
                    $respond['message']       = 'You have already submited this bit. Cant resubmit.';
                    $respond['response_data'] = null;
                }
            } catch (\Exception $e) {
                $respond['status']        = false;
                $respond['message']       = $e->getMessage();
                $respond['response_data'] = null;
            }
        }
        return $respond;
    }
}
