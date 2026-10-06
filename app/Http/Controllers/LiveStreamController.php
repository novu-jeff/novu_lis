<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LiveSession;

class LiveStreamController extends Controller
{
    public function index()
    {
        $url = LiveSession::where('key', 'live_session_url')->value('value');

        $embedUrl = $this->getEmbedUrl($url);

        return view('live.index', [
            'url' => $url,
            'embedUrl' => $embedUrl
        ]);
    }

    private function getEmbedUrl($url)
    {
        if (!$url) {
            return null;
        }

        // YOUTUBE
        if (str_contains($url, 'youtube.com') || str_contains($url, 'youtu.be')) {

            preg_match('/(youtu\.be\/|v=)([^&]+)/', $url, $matches);

            if (!empty($matches[2])) {
                return "https://www.youtube.com/embed/" . $matches[2];
            }
        }

        // FACEBOOK
        if (str_contains($url, 'facebook.com')) {

            return "https://www.facebook.com/plugins/video.php?href="
                . urlencode($url)
                . "&show_text=false&width=960";
        }

        return null;
    }
}