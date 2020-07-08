<div>
    @section("title")All Post @endsection
    {{-- @section("sub_title")Category @endsection --}}
    
    <!-- Breadcrumbs -->
    <section class="breadcrumbs overlay bg-image">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Bread Title -->
                    <div class="bread-title">
                        <h2>Latest Post</h2>
                    </div>
                    <!-- Bread List -->
                    <ul class="bread-list">
                        <li><a href="/"><i class="fa fa-home"></i>Home</a></li>
                        <li><a href="#"><i class="fa fa-clone"></i>Blog</a></li>
                        <li class="active"><a href="#"><i class="fa fa-clone"></i>All Post</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Breadcrumbs -->
    
    <!-- Blog Archive -->
    <section class="blogs grid-sidebar archive section">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-12">
                    @include('frontend.kz.alert')
                    <div class="row">
                        @foreach ($posts as $post)
                        <div class="col-lg-6 col-md-6 col-12">
                            <!-- Single blog -->
                            <div class="single-blog">
                                <div class="blog-head">
                                    @if ($post->imageThumburl)
                                        <a href="{{ route('post.show', $post->slug) }}"><img src="{{ $post->imageThumburl }}" alt="{{ $post->title }}"></a>  
                                    @else
                                        <a href="{{ route('post.show', $post->slug) }}"><img src="/assets/kz/images/1000x665.png" alt="{{ $post->title }}"></a>
                                    @endif
                                </div>
                                <div class="blog-bottom">
                                    <h5>
                                        <a href="{{ route('post.show', $post->slug) }}">{{ $post->title}}</a>
                                    </h5>
                                    <ul class="blog-meta" >
                                        <li><i class="fa fa-user"></i> 
                                            <a href="{{ route('author', $post->author->slug) }}"><strong> {{ $post->author->name  }}</strong></a>
                                        </li>
                                    </ul>
                                    {!!  substr(strip_tags($post->excerpt), 0, 200) !!} [...]
                                <ul class="blog-meta">
                                    <li><i class="fa fa-calendar"></i>{{ $post->date }}</li>
                                    <li><a href="#"><i class="fa fa-tag"></i>{!! $post->tags_html !!}</a></li>
                                </ul>
                                </div>
                            </div>
                            <!--/ End Single blog -->
                        </div> 
                        @endforeach
                    </div>
                    <div class="row ">
                        <div class="col-12 ">
                            <!-- Pagination -->
                            <div class="pagination-main" style="padding:30px;">
                                {{$posts->appends(Request::all('vendor.pagination.bootstrap-4'))->links()}}
                            </div>
                            <!--/ End Pagination -->
                        </div>
                    </div>	
                </div>
                <div class="col-lg-3 col-12">
                    <livewire:main.sidebar></livewire:main.sidebar>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Blog Archive -->
    <!-- Newsletter -->
    {{--  <livewire:main.newsletter></livewire:main.newsletter>  --}}
    <!--/ End Newsletter -->
    </div>
    