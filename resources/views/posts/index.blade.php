@extends('layouts.app')

@section('title')
    {{ config('app.name') . ' | Manage My Posts' }}
@endsection

@section('content')

    {{ Breadcrumbs::render('myPosts') }}

    <div class="card">
        <div class="card-body">
            <div class="head-text my-3">
                <h2>Manage Posts</h2>
            </div>
            @if ($myPosts->count() > 0)
                <table class="table text-center ">
                    <tbody>
                        @foreach ($myPosts as $post)
                            <tr class="focus:outline-none border-top border-bottom border-gray-100">
                                <th scope="row"
                                    class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <span class="mx-2 font-bold">
                                        {{ $loop->iteration }}
                                        <i class="ml-2 fas fa-chevron-right text-blue-light"></i>
                                    </span>
                                </th>
                                <td class="py-4 px-6">
                                    {{ $post->title }}
                                </td>
                                <td class="py-4 px-6">
                                    {{ $post->created_at->diffForHumans() }}
                                </td>
                                <td class="py-4 px-6 text-center">
                                    <span>
                                        <a href="{{ route('communities.posts.show', [$post->slug]) }}"
                                            class="btn btn-warning btn-xs mx-1 text-white">
                                            <i class="fad fa-eye"></i></a>
                                        <a href="{{ route('communities.posts.edit', [$post->community, $post]) }}"
                                            class="btn btn-primary btn-xs mx-1">
                                            <i class="fas fa-sync-alt"></i>
                                        </a>
                                        <form action="{{ route('communities.posts.destroy', [$post->community, $post]) }}"
                                            method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger bg-red-dark rounded mx-1  btn-xs">
                                                <i class="fad fa-trash"></i></button>
                                        </form>
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h4 class="text-center text-secondary ">
                    <i class="fad fa-sticky-note fa-2x my-3"></i>
                    <p>You dont have posts </p>
                </h4>
            @endif
        </div>
    </div>
@endsection
