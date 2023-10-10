@extends('frontend.layouts.main')

@section('title', $page->title . ' | ')

@section('content')

    <div class="post-header-section section mt-30">
        <div class="container">
            <div class="row row-1">
                <div class="col-12">
                    <div class="bg-warning">
                        <h4 class="p-lg-2 text-white"><b>Внимание! Это страница предварительного просмотра!</b></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Post Header Section Start -->
    <div class="post-header-section section mt-30 mb-30">
        <div class="container">
            <div class="row row-1">
                <div class="col-12">
                    <div class="post-header">
                        <h1 class="title">{{ $page->title }}</h1>

                        @if(in_array($page->type, \App\Models\Pages\Page::getType('main_top')))
                            <div class="meta fix">
                                {!! $page->category !!}
                                <span class="meta-item date"><i class="fa fa-clock-o"></i>{{ \Jenssegers\Date\Date::parse($page->created_at)->format('d F, Y') }}</span>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Post Section Start -->
    <div class="post-section section mt-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12 mb-50">
                    <div class="post-block-wrapper mb-50">
                        <div class="body">
                            <div class="row">

                                <div class="col-12">
                                    <!-- Single Post Start -->
                                    <div class="single-post">
                                        <div class="post-wrap">
                                            <div class="content">
                                                <div>
                                                    {!! $page->content !!}
                                                </div>
                                                @foreach($page->files as $file)
                                                    <img src="{{ url('storage/files/' . $file->file->uri) }}" alt="{{ $file->alt }}">
                                                @endforeach
                                            </div>

                                            <div class="tags-social float-left">
                                                <div class="tags float-left">
                                                    <i class="fa fa-tags"></i>
                                                    {!! Tags::tags($page) !!}
                                                </div>

                                                <div class="post-social float-right">
                                                    <a href="http://www.facebook.com/BerlinVisual" target="_blank" class="facebook"><i class="fa fa-facebook"></i></a>
                                                    <a href="http://twitter.com/berlinvisualcom" target="_blank" class="twitter"><i class="fa fa-twitter"></i></a>
                                                    <a href="https://www.youtube.com/user/BerlinVisual2012" target="_blank" class="youtube-play"><i class="fa fa-youtube-play"></i></a>
                                                    <a href="http://vk.com/public46122457" target="_blank" class="social-vkontakte"><i class="fa fa-vk"></i></a>
                                                    <a href="http://www.odnoklassniki.ru/berlin.visual" target="_blank" class="odnoklassniki"><i class="fa fa-odnoklassniki"></i></a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>
                    @if(in_array($page->type, \App\Models\Pages\Page::getType('main_top')))
                        <div class="post-nav mb-50">
                            @if($page_prev)
                                <a href="/{{ $page_prev->alias }}" class="prev-post"><span>предыдущая публикация</span>{{ $page_prev->title }}</a>
                            @endif
                            @if($page_next)
                                <a href="/{{ $page_next->alias }}" class="next-post"><span>следующая публикация</span>{{ $page_next->title }}</a>
                            @endif
                        </div>
                    @endif
                </div>

                <!-- Sidebar Start -->
                <div class="col-lg-4 col-12 mb-50">
                    <div class="row">

                        <div class="single-sidebar col-lg-12 col-md-6 col-12">
                            @include('frontend.blocks.followers')
                        </div>

                        <div class="single-sidebar col-lg-12 col-md-6 col-12">
                            @include('frontend.banners.banner_2')
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div><!-- Post Section End -->
@endsection