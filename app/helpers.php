<?php

if (!function_exists('extract_youtube_video_id')){
    function extract_youtube_video_id($url) {
        $video_id = '';

        // Extract video ID from different URL formats
        if (preg_match('/youtube\.com\/watch\?v=([^\&\?\/]+)/', $url, $matches)) {
            $video_id = $matches[1];
        } elseif (preg_match('/youtu\.be\/([^\&\?\/]+)/', $url, $matches)) {
            $video_id = $matches[1];
        } elseif (preg_match('/youtube\.com\/embed\/([^\&\?\/]+)/', $url, $matches)) {
            $video_id = $matches[1];
        }

        return $video_id;
    }
}
