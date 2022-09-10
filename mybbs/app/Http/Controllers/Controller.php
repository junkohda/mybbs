<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    protected function buildView(string $viewName)
    {
        $userName = "";
        $loginUserId = "";
        
        /*
        $user = LoginUser::loginUser();
        $userName = $user->userName;
        $loginUserId = $user->userId;

        switch ($user->userType) {
            case UserTypes::Admin:
                $isAdmin = true;
                break;
            case UserTypes::Staff:
                $isStaff = true;
                break;
            case UserTypes::User:
                $isUser = true;
                break;
        }*/

        $env = config("app.env");
        $envname = "";
        $headerstyle = "background-color: #E8EAF6";
        if ($env == "production") {
            $headerstyle = "";
        } else if ($env == "staging") {
            $headerstyle = "background-color: #E8EAF6";
            $envname = " (" . $env . ")";
        } else {
            $headerstyle = "background-color: #E8EAF6";
            $envname = " (" . $env . ")";
        }

        $view = view($viewName)
            ->with(compact([
                "userName", "loginUserId", "envname", "headerstyle"
            ]));

        return $view;
    }

}
