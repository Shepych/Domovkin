@php
$rtsp = 'rtsp://admin:88007257f@192.168.1.9:554';
//$params = '-r 23 -b:v 2048k -crf 50 -s 640x480 -f mpjpeg pipe:';
////Header('Accept-Ranges:bytes');
////Header('Connection:keep-alive');
////Header('Content-type: multipart/x-mixed-replace;boundary=ffserver');
//$command = 'ffmpeg -i rtsp://admin:Huskar800@192.168.1.9:554 output192.mp4';
////passthru('ffmpeg -i "rtsp://admin:Huskar800@192.168.1.9:554" -qscale 2 -r 23 -b:v 2048k -crf 50 -s 640x480 -f mpjpeg pipe:');
////passthru('ffplay -i ' . $rtsp);
////-t duration(3)
//
//$command = 'ffmpeg -i rtsp://admin:Huskar800@192.168.1.9:554 -t 10 -f image2pipe -';
////passthru("ffmpeg -i {$rtsp} -t 10 {$video}");
//
//header('Content-Type: video/mp4');
//$ffmpegCommand = "ffmpeg -t 20 -i $rtsp -c:v copy -an -f mp4 -movflags frag_keyframe+empty_moov -";
//passthru($ffmpegCommand);

@endphp

<?php

// Определите параметры для FFmpeg
//$ffmpegParams = '-t 10 -i ' . $rtsp . ' -vcodec libx264 -movflags frag_keyframe+empty_moov -nostdin -c:v copy -f mpegts -';
//$ffmpegParams = '-t 10 -i ' . $rtsp . ' -vcodec libx264 -movflags frag_keyframe+empty_moov -nostdin -c:v copy -f mp4 -';
//$command = 'ffmpeg ' . $ffmpegParams;
//
//header('Content-Type: video/mp4');
////header('Cache-Control: no-cache');
////header('Pragma: no-cache');
//passthru("ffmpeg $ffmpegParams");

?>


<?

$dir = $_SERVER['DOCUMENT_ROOT'] . '\hls';
$ffmpegCommand = "ffmpeg -i $rtsp -c copy -f hls -hls_list_size 5 -hls_time 5 $dir\stream.m3u8";
//echo $ffmpegCommand;
//die;
exec($ffmpegCommand);

?>
