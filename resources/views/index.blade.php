@extends('layout')

@section('content')

<section class="featured-posts">
    <div class="container">
        <div class="row no-gutters">
            @if(!empty($headline) && count($headline) > 0)
                <div class="col-md-6 col-xs-12 col-lg-4">
                    <div class="featured-slider mr-md-3 mr-lg-3">
                        <div class="item" style="background-image:url(/uploads/{{$headline[0]['gambar'] ?? 'default.jpg'}})">
                            <div class="post-content">
                                <a href="#" class="post-cat bg-primary">{{$headline[0]['nama_kategori'] ?? '-'}}</a>
                                <h2 class="slider-post-title">
                                    @if(isset($headline[0]))
                                        <a href="/detail/{{$headline[0]['id']}}">{{$headline[0]['judul']}}</a>
                                    @else
                                        <p>Tidak ada berita</p>
                                    @endif
                                </h2>
                                <div class="post-meta mt-2">
                                    <span class="posted-time"><i class="fa fa-clock-o mr-2 text-danger"></i>{{$headline[0]['created_at'] ?? '-'}}</span>
                                    <span class="post-author">by <a href="/">Rodinho Summon</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="col-12 text-center py-5">
                    <h3>Tidak ada berita headline.</h3>
                </div>
            @endif
        </div>
    </div>
</section>

<section class="block-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                <div class="py-40"></div>
                <div class="news-style-two">
                    <h3 class="news-title">
                        <span>Berita Terbaru</span>
                    </h3>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="post-list-block m-top-0">
                                @foreach($data as $news)
                                    <div class="post-block-wrapper post-float clearfix">
                                        <div class="post-thumbnail col-4">
                                            <a href="/detail/{{$news->id}}">
                                                <img class="img-fluid" src="/uploads/{{$news->gambar}}" alt="post-thumbnail" />
                                            </a>
                                        </div>
                                        <div class="post-content col-8">
                                            <h2 class="post-title title-sm">
                                                <a href="/detail/{{$news->id}}">{{$news->judul}}</a>
                                            </h2>
                                            <div class="post-meta">
                                                <span class="posted-time"><i class="fa fa-clock-o mr-2"></i>{{$news->created_at}}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
