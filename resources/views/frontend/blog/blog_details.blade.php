@extends('frontend.main_master')
@section('title',$post->tieu_de_seo)
@section('keyword',$post->keyword)
@section('meta_description',$post->meta_des)
@section('meta_img',$post->post_image)
@push('scripts')
<script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Article",
      "headline": "{{ $post->tieu_de_seo }}",
      "mainEntityOfPage": "{{ url()->current() }}",
      "image": "{{ url($post->post_image) }}",  
      "author": {
      "@type": "Person",
      "name": "admin",
      "url": "{{ url()->current() }}"
    },  
    "publisher": {
    "@type": "Organization",
    "name": "admin",
    "logo": {
    "@type": "ImageObject",
    "url": "{{ asset('frontend/assets/images/ladigitop-logo.png') }}"
  }
},
"datePublished": "{{ $post->created_at }}",
"dateModified": "{{ $post->updated_at }}"
}
</script>
@endpush
@section('content')
<div class="banhmi">
<ul class="bread__crumb">
    <li><a href="{{ url('/') }}">Home </a></li>
    <li> - <a href="{{ url($blogcategory->blog_category_slug).'/cm/'.$blogcategory->id }}">{{ $blogcategory->blog_category_name }} </a></li>
</ul>
</div>
<div class="blog__inner__box">
    <h1 class="bvtitle">{{ $post->post_title }}</h1>
    <div class="toc-container">
        <p id="tdtoc">Nội dung chính <i class="icon-07"></i></p>
        <ul class="toc-list">
            @foreach ($toc as $item)
                {!! $item !!}
            @endforeach
        </ul>
    </div>
	{!! $html !!}
</div>


@endsection