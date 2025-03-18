@extends('layout')



@section('content')

<section class="featured-posts">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-6 col-xs-12 col-lg-4">
                <div class="featured-slider mr-md-3 mr-lg-3">
                    <div class="item" style="background-image:url(/uploads/{{$headline[0]['gambar']}})">
                        <div class="post-content">
                            <a href="#" class="post-cat bg-primary">{{$headline[0]['nama_kategori']}}</a>
                            <h2 class="slider-post-title">
                                <a href="/detail/{{$headline[0]['id']}}">{{$headline[0]['judul']}}</a>
                            </h2>
                            <div class="post-meta mt-2">
                                <span class="posted-time"><i class="fa fa-clock-o mr-2 text-danger"></i>{{$headline[0]['created_at']}}</span>
                                <span class="post-author">
                                    by
                                    <a href="/">Rodinho Summon</a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xs-12 col-lg-4">
                <div class="featured-slider mr-lg-3">
                    <div class="item" style="background-image:url(/uploads/{{$headline[1]['gambar']}})">
                        <div class="post-content">
                            <a href="#" class="post-cat bg-danger">{{$headline[1]['nama_kategori']}}</a>
                            <h2 class="slider-post-title">
                                <a href="/detail/{{$headline[1]['id']}}">{{$headline[1]['judul']}}</a>
                            </h2>
                            <div class="post-meta mt-2">
                                <span class="posted-time"><i class="fa fa-clock-o mr-2 text-danger"></i>19 hours ago</span>
                                <span class="post-author">
                                    <span> by </span>
                                    <a href="/">Rodinho Summon</a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-4">
                <div class="row mt-3 mt-lg-0">
                    <div class="col-lg-12 col-xs-12 col-sm-6 col-md-6">
                        <div class="post-featured-style" style="background-image:url(/uploads/{{$headline[2]['gambar']}})">
                            <div class="post-content">
                                <a href="#" class="post-cat bg-success">{{$headline[2]['nama_kategori']}}</a>
                                <h2 class="post-title">
                                    <a href="/detail/{{$headline[2]['id']}}">{{$headline[2]['judul']}}</a>
                                </h2>
                                <div class="post-meta mt-2">
                                    <span class="posted-time"><i class="fa fa-clock-o mr-2 text-danger"></i>19 hours ago</span>
                                    <span class="post-author">
                                        <span> by </span>
                                        <a href="author.html">Rodinho Summon</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-xs-12 col-sm-6 col-md-6">
                        <div class="post-featured-style" style="background-image:url(/uploads/{{$headline[3]['gambar']}})">
                            <div class="post-content">
                                <a href="#" class="post-cat bg-info">{{$headline[3]['nama_kategori']}}</a>
                                <h2 class="post-title">
                                    <a href="/detail/{{$headline[3]['id']}}">{{$headline[3]['judul']}}</a>
                                </h2>
                                <div class="post-meta mt-2">
                                    <span class="posted-time"><i class="fa fa-clock-o mr-2 text-danger"></i>19 hours ago</span>
                                    <span class="post-author">
                                        <span> by </span>
                                        <a href="/">Rodinho Summon</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                <div class="sidebar">
                    <div class="widget">
                        <h3 class="news-title">
                            <span>Stay in touch</span>
                        </h3>

                        <ul class="list-inline social-widget">
                            <li class="list-inline-item">
                                <a class="social-page youtube" href="#">
                                    <i class="fa fa-play"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="social-page facebook" href="#">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="social-page twitter" href="#">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="social-page pinterest" href="#">
                                    <i class="fa fa-pinterest"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="social-page linkedin" href="#">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                            </li>

                            <li class="list-inline-item">
                                <a class="social-page youtube" href="#">
                                    <i class="fa fa-youtube"></i>
                                </a>
                            </li>

                        </ul>

                    </div>
                    <div class="widget">
                        <h3 class="news-title">
                            <span>Hot News</span>
                        </h3>

                        <div class="post-overlay-wrapper">
                            <div class="post-thumbnail">
                                <img class="img-fluid" src="/theme/images/news/news-15.jpg" alt="post-thumbnail" />
                            </div>
                            <div class="post-content">
                                <a class="post-category white" href="post-category-1.html">Fashion</a>
                                <h2 class="post-title">
                                    <a href="single-post.html">First Look At Self-Portrait's Autumn Collection...</a>
                                </h2>
                                <div class="post-meta white">
                                    <span class="posted-time"><i class="fa fa-clock-o mr-1"></i>17 jun,2019</span>
                                    <span> by </span>
                                    <span class="post-author">
                                        <a href="author.html">Jammy Anderson</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="post-list-block">
                            <div class="post-block-wrapper post-float ">
                                <div class="post-thumbnail">
                                    <a href="single-post.html">
                                        <img class="img-fluid" src="/theme/images/news/news-03.jpg" alt="post-thumbnail" />
                                    </a>
                                </div>
                                <div class="post-content">
                                    <h2 class="post-title title-sm">
                                        <a href="single-post.html">Apple HomePod review: locked in</a>
                                    </h2>
                                    <div class="post-meta">
                                        <span class="posted-time"><i class="fa fa-clock-o mr-1"></i>2 hours ago</span>
                                    </div>
                                </div>
                            </div>
                            <div class="post-block-wrapper post-float">
                                <div class="post-thumbnail">
                                    <a href="single-post.html">
                                        <img class="img-fluid" src="/theme/images/news/news-05.jpg" alt="post-thumbnail" />
                                    </a>
                                </div>
                                <div class="post-content">
                                    <h2 class="post-title title-sm">
                                        <a href="single-post.html">Intel’s new smart glasses actually look good</a>
                                    </h2>
                                    <div class="post-meta">
                                        <span class="posted-time"><i class="fa fa-clock-o mr-1"></i> 15 March , 2019</span>
                                    </div>
                                </div>
                            </div>
                            <div class="post-block-wrapper post-float">
                                <div class="post-thumbnail">
                                    <a href="single-post.html">
                                        <img class="img-fluid" src="/theme/images/news/news-11.jpg" alt="post-thumbnail" />
                                    </a>
                                </div>

                                <div class="post-content">
                                    <h2 class="post-title title-sm">
                                        <a href="single-post.html">Free Two-Hour Delivery From Whole Foods</a>
                                    </h2>
                                    <div class="post-meta">
                                        <span class="posted-time"><i class="fa fa-clock-o mr-1"></i> 5 hours ago</span>
                                    </div>
                                </div>
                            </div>
                            <div class="post-block-wrapper post-float">
                                <div class="post-thumbnail">
                                    <a href="single-post.html">
                                        <img class="img-fluid" src="/theme/images/news/news-06.jpg" alt="post-thumbnail" />
                                    </a>
                                </div>

                                <div class="post-content">
                                    <h2 class="post-title title-sm">
                                        <a href="single-post.html">Here's How To Get Free Pizza On</a>
                                    </h2>
                                    <div class="post-meta">
                                        <span class="posted-time"><i class="fa fa-clock-o mr-1"></i> 17 June, 2019</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection