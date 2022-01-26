<?php

namespace FoxTool\Blackburn\Controller;

use FoxTool\Blackburn\Controller;
use FoxTool\Yukon\Core\View;

class HomeController extends Controller
{
    public function index()
    {
        return View::make("welcome", [
            "title" => "Blackburn - small framework",
            "user" => "John Doe"
        ]);
    }
}
