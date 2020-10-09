@extends('master')
	@section('title', 'Welcome to My Blog')
	<br/>
	<br/>
		@section('sidebar')
			@parent
			<p>Hi Everyone!</p>
			@endsection
		
	@section('content1')
	<p>Vinaya Ainunissa</p>
	<p>Mahasiswa Politeknik Negeri Malang</p>
	<p>Prodi Manajemen Informatika</p>
	<p>Jurusan Teknologi Informasi</p>
	<b></b>
	<b></b>

	@if(count($article))
	<ul>
		@foreach($article as $a)
		<p>Nomor 	: {{ $a->id }}</p>
		<p>Narasi 	: {{ $a->content }}</p>
		<p>Gambar	: {{ $a->feature_image }}</p>
		@endforeach	
	</ul>
	@else
	<p>Post tidak ada</p>
	@endif
	@endsection
	<b></b>
	<b></b>
	<td>
		<a href="/article/edit/{{ $a->id }}">edit</a>
		|
		<a href="/article/hapus/{{ $a->id }}">hapus</a>
	</td>