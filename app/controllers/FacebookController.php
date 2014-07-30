<?php

class FacebookController extends \BaseController {
	
	function login() {
		$facebook = new Facebook(Config::get('facebook'));
		$params = array(
				'redirect_uri' => url('/login/fb/callback'),
				'scope' => 'email',
		);
		return Redirect::to($facebook->getLoginUrl($params));
		
	}
	
	function callback() {
		$code = Input::get('code');
		if (strlen($code) == 0) return Redirect::to('/fb')->with('message', 'There was an error communicating with Facebook');
		
		$facebook = new Facebook(Config::get('facebook'));
		$uid = $facebook->getUser();
		
		if ($uid == 0) return Redirect::to('/fb')->with('message', 'There was an error');
		
		$me = $facebook->api('/me');
		
		$profile = Profile::whereUid($uid)->first();
		if (empty($profile)) {
		
			$user = new User;
			$user->name = $me['first_name'].' '.$me['last_name'];
			$user->username=$me['first_name'].$me['last_name'];
			//choose unique one
			$user->email = $me['email'];
			$user->photo = 'https://graph.facebook.com/'.$me['id'].'/picture?type=large';
		
			$user->save();
		
			$profile = new Profile();
			$profile->uid = $uid;
			$profile->username = $me['id'];
			$profile = $user->profiles()->save($profile);
		}
		
		$profile->access_token = $facebook->getAccessToken();
		$profile->save();
		
		$user = User::find($profile->user_id);
		
		Auth::login($user);
		
		return Redirect::to('/fb')->with('message', 'Logged in with Facebook');
		
	}
	
	function status() {
		if (Auth::check()) {
			return Response::json(array(
					'login' => true,
					'info' => Auth::user(),
					200
			));
		}
		else{
			$loginUrl=action('FacebookController@login');
			return Response::json(array(
					'login' => false,
					'login_url' => $loginUrl,
					200
			));
		}
	}	
	

}