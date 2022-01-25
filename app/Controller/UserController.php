<?php

/**
 * Example controller for working with user.
 */

namespace FoxTool\Blackburn\Controller;

use FoxTool\Blackburn\Controller;
use FoxTool\Yukon\Core\Request;
use FoxTool\Yukon\Core\Response;
use FoxTool\Debra\EntityManager;
use FoxTool\Blackburn\Entity\User;

class UserController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return (new Response())->header('Content-Type', 'application/json')->json([
            "id" => 1,
            "name" => "John Doe"
        ]);
    }

    public function show(Request $request, $id)
    {
        return (new Response(401))->content("Show SINGLE User: {$id}");
    }

    public function create(Request $request)
    {
        echo 'Create User';
    }

    public function edit($id)
    {
        echo 'Edit User: ' . $id;
    }

    public function update(Request $request, $id)
    {
        echo 'Update User: ' . $id;
    }

    public function delete($id)
    {
        echo 'Delete User: ' . $id;
    }
}
