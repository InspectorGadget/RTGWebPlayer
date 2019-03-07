<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

class RouteController extends Controller
{

    public function verifySession(): bool {
        return (Session::get('email')) ? true : false;
    }

    public function getVideoController(): VideoController {
        return new VideoController();
    }

    public function getAdminController(): AdminController {
        return new AdminController();
    }

    public function showHomePage() {
        return redirect(route('login'));
    }

    public function showLoginPage() {
        return view('login.index');
    }

    public function showAdminDashboard() {
        if (!$this->verifySession()) {
            return redirect(route('login'));
        }

        return view('dashboard.index', [
            'videos' => $this->getVideoController()->getAllVideos(),
            'admins' => $this->getAdminController()->getAllAdmins()
        ]);
    }

    public function showVideos() {
        if (!$this->verifySession()) {
            return redirect(route('login'));
        }

        return view('dashboard.videos', [
            'videos' => $this->getVideoController()->getAllVideos()
        ]);
    }

    public function showAddVideoPage() {
        if (!$this->verifySession()) {
            return redirect(route('login'));
        }

        return view('dashboard.add_video');
    }

}
