@extends('layouts.default')

@section('content')

	@if (Session::has('flash_message'))
		<div class="alert alert-success">
			<p>{{ Session::get('flash_message') }}</p>
		</div>
	@endif

	<h1>Resources list</h1>

	@if (!count($resources))
		<p>No resources</p>
	@else
		<ul>
			@foreach ($resources as $resource)
				<li>
					{{ link_to_action('ResourcesController@show', $resource->title, $parameters = array('id' => $resource->id), $attributes = array()); }}
				</li>
			@endforeach
		</ul>
	@endif

	@if (Auth::check())
		{{ link_to_action('ResourcesController@create', 'create a new resource', $parameters = array(), $attributes = array('class' => 'btn btn-primary', 'role'=>'button')); }}
	@endif
@stop