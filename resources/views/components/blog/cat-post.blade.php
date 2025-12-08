<div class="t-pt-120 t-pb-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-8">
                <div class="row">


                    @foreach($posts as $post)


                        <div class="col-12 t-mb-50">
                            <div class="blog-post border">
                                <div class="blog-post__img">
                                    <a href="{{ route('single-post', $post->slug) }}"
                                        class="t-link blog-post__img-link w-100">
                                        <img src="{{ $post->thumbnail }}" alt="zolfin" class="w-100 img-fluid">
                                    </a>
                                    <span
                                        class="blog-post__date d-flex flex-column align-items-center justify-content-center">
                                        <span class="blog-post__date-day d-block">
                                            {{ date("d", strtotime($post->created_at)) }}
                                        </span>
                                        <span class="blog-post__date-month text-capitalize d-block">
                                            {{ date("F", strtotime($post->created_at)) }}
                                        </span>
                                    </span>
                                </div>
                                <div class="blog-post__body">
                                    <h3 class="blog-post__title">
                                        <a href="{{ route('single-post', $post->slug) }}"
                                            class="t-link t-link--alpha blog-post__title-link">
                                            {{ $post->id }}. {{ $post->title }}
                                        </a>
                                    </h3>
                                    <p class="t-mt-30 t-text-heading">
                                        {{$post->excerpt}}
                                    </p>
                                </div>
                                <div class="blog-post__footer t-pb-30 t-pt-20">

                                    <ul class="t-list d-flex align-items-center blog-post__footer flex-wrap">
                                        <li class="blog-post__footer-list t-mb-15 t-mr-15">
                                            <a href="{{ route('user-post', $post->user->username) }}"
                                                class="t-link blog-post__author d-flex align-items-center">
                                                <span class="blog-post__author-img t-mr-8">
                                                    <img src="{{ $post->user->photo }}" alt="{{ $post->user->name}}"
                                                        class="img-fluid">
                                                </span>
                                                <span class="blog-post__author-name text-capitalize">
                                                    {{ $post->user->name }}
                                                </span>
                                            </a>
                                        </li>

                                        <li class="blog-post__footer-list t-mb-15 t-mr-15">
                                            <a href="/category/{{ $post->category->slug }}"
                                                class="t-link t-link--alpha sm-text blog-post__footer-link text-capitalize">
                                                <i class="las la-tags"></i>
                                                {{ $post->category->name }}

                                            </a>
                                        </li>

                                        <li class="blog-post__footer-list t-mb-15 t-mr-15">
                                            <a href="#"
                                                class="t-link t-link--alpha sm-text blog-post__footer-link text-capitalize">
                                                <i class="las la-calendar"></i>
                                                {{ date("d F", strtotime($post->created_at)) }}
                                            </a>
                                        </li>
                                        <li class="blog-post__footer-list t-mb-15 t-mr-15">
                                            <a href="#"
                                                class="t-link t-link--alpha sm-text blog-post__footer-link text-capitalize">
                                                <i class="las la-clock"></i>
                                                {{ $post->views }} views
                                            </a>
                                        </li>
                                    </ul>


                                </div>
                            </div>
                        </div>
                    @endforeach
                    @include('components.pagination')
                    <div class="col-12">



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>