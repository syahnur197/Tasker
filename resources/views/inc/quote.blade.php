@if (!empty($quote))
	<blockquote class="blockquote text-center border-right">
		<p class="mb-0">{{ $quote->quoteText }}</p>
		<footer class="blockquote-footer">{{ $quote->quoteAuthor }}</footer>
	</blockquote>
@endif