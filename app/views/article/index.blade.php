

@foreach($articles as $article)
<div class="">
	<a href="{{ URL::route('article.show', $article->slug) }}">{{{ $article->title }}}</a>
</div>
@endforeach