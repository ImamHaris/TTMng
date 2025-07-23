<div class="list-group-item bg-light text-center py-2 text-mute">Latest</div>
@foreach($logDownloadeds as $item)
    <a class="list-group-item">
        <div class="row">
            <div class="col-auto">
                <figure class="avatar avatar-40">
                    <img src="{{ asset('assets/img/icon/download.png') }}" alt="">
                </figure>
            </div>
            <div class="col pl-0 align-self-center">
                <h6 class="mb-1 font-weight-normal">
                    <b>Success</b> downloaded video from <b><u>{{ $item->username }}</u></b>
                </h6>
                <p class="small text-mute">{{ $item->created_at }}</p>
            </div>
        </div>
    </a>
@endforeach
