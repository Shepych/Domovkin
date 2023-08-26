{{--<!DOCTYPE html>--}}
{{--<html>--}}
{{--<head>--}}
{{--    <title>RTSP Stream</title>--}}
{{--</head>--}}
{{--<body>--}}
{{--<video controls autoplay>--}}
{{--    <source src="{{ route('stream') }}" type="video/mp4">--}}
{{--</video>--}}
{{--</body>--}}
{{--</html>--}}


<!DOCTYPE html>
<html>
<head>
    <title>Поток HLS</title>
    <script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
</head>
<body>
<video id="video" controls autoplay></video>

<script>
    if(Hls.isSupported()) {
        var video = document.getElementById('video');
        var hls = new Hls();
        hls.loadSource('/hls/stream.m3u8'); // Замените /path/to/hls/output/directory на путь, где вы сохраняете HLS файлы
        hls.attachMedia(video);
    }
</script>
</body>
</html>
