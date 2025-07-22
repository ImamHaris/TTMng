@foreach($listHome as $item)
    <div class="card mb-4">
        <div class="card-header border-bottom">
            <div class="media">
                <figure class="avatar avatar-40 mr-2">
                    <img src="{{ $item['avatar'] }}" alt="Generic placeholder image">
                </figure>
                <div class="media-body">
                    <h6 class="mb-0">{{ $item['nickname'] }}</h6>
                    <p class="mb-0 text-mute small">{{ '@'.$item['username'] }}</p>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="video-wrapper">
                <video autoplay muted loop playsinline controls>
                    <source src="{{ $item['url'] }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <p class="mt-2 mb-0">{{ $item['title'] }}</p>
                <p>{{ $item['music_info'] }}</p>
            </div>
        </div>
        <div class="card-footer border-top bg-light">
            <p class="small"><b>{{ $item['like'] }}</b> Likes, <b>{{ $item['comment'] }}</b> Comments, <b>{{ $item['share'] }}</b> Share </p>
        </div>
        <div class="card-footer border-top d-flex justify-content-center">
            <form action="{{ route('downloadVideo', ['encodedUrl' => $item['encodedUrl']]) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success">
                    <i class="mdi mdi-download"></i> Download
                </button>
            </form>
        </div>
    </div>
@endforeach
