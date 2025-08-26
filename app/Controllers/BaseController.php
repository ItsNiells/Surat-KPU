<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class BaseController extends Controller
{
    protected $request;
    protected $helpers = ['url', 'form'];

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Wajib panggil parent
        parent::initController($request, $response, $logger);

        // Mulai session jika belum dimulai
        if (session_status() === PHP_SESSION_NONE) {
            session();
        }
    }
}
