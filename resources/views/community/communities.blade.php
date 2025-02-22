<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Community') }}
        </h2>
    </x-slot>

    <!-- Main column -->
    <div class="lg:pl-64 flex flex-col">
        <!-- Search header -->
        <div class="sticky top-0 z-10 flex-shrink-0 flex h-16 bg-white border-b border-gray-200 lg:hidden">
            <!-- Sidebar toggle, controls the 'sidebarOpen' sidebar state. -->
            <button @click="menu = true" type="button"
                    class="px-4 border-r border-gray-200 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-purple-500 lg:hidden">
                <span class="sr-only">Open sidebar</span>
                <!-- Heroicon name: outline/menu-alt-1 -->
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6h16M4 12h8m-8 6h16"/>
                </svg>
            </button>
            <div class="flex-1 flex justify-between px-4 sm:px-6 lg:px-8">
                <div class="flex-1 flex">
                    <div class="flex-shrink-0 flex items-center">
                        <img class="block lg:hidden h-8 w-auto" src="https://studyportal.s3.eu-west-2.amazonaws.com/logo_banner_style_v1.png" alt="Workflow">
                        <img class="hidden lg:block h-8 w-auto" src="https://studyportal.s3.eu-west-2.amazonaws.com/logo_banner_style_v1.png" alt="Workflow">
                    </div>
                </div>
                <div class="flex items-center">
                    <!-- Profile dropdown -->
                    <div class="ml-3 relative">
                        <div>
                            <button @click="profile = true" type="button"
                                    class="max-w-xs bg-white flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500"
                                    id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="sr-only">Open user menu</span>
                                <img class="h-8 w-8 rounded-full"
                                     src="https://images.unsplash.com/photo-1502685104226-ee32379fefbe?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                     alt="">
                            </button>
                        </div>

                        <!--
                          Dropdown menu, show/hide based on menu state.

                          Entering: "transition ease-out duration-100"
                            From: "transform opacity-0 scale-95"
                            To: "transform opacity-100 scale-100"
                          Leaving: "transition ease-in duration-75"
                            From: "transform opacity-100 scale-100"
                            To: "transform opacity-0 scale-95"
                        -->
                        <div x-show="profile" x-cloak
                             class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-200 focus:outline-none"
                             role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                             tabindex="-1">
                            <div class="py-1" role="none">
                                <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                                <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem"
                                   tabindex="-1" id="user-menu-item-0">View profile</a>
                                <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem"
                                   tabindex="-1" id="user-menu-item-1">Settings</a>
                                <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem"
                                   tabindex="-1" id="user-menu-item-2">Notifications</a>
                            </div>
                            <div class="py-1" role="none">
                                <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem"
                                   tabindex="-1" id="user-menu-item-3">Get desktop app</a>
                                <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem"
                                   tabindex="-1" id="user-menu-item-4">Support</a>
                            </div>
                            <div class="py-1" role="none">
                                <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem"
                                   tabindex="-1" id="user-menu-item-5">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <div class="py-10">
        <div class="max-w-3xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-12 lg:gap-8">
            <div class="hidden lg:block lg:col-span-3 xl:col-span-2">
                <nav aria-label="Sidebar" class="sticky top-4 divide-y divide-gray-300">
                    <div class="pb-8 space-y-1">

                        @if(auth()->user()->is_admin)
                        <a
                           class="bg-blue-500 text-gray-900 group flex items-center px-3 py-2 text-sm font-medium rounded-md"
                           aria-current="page" href="{{route('communities.manage')}}">
                            <!-- Heroicon name: outline/home -->
                            <span class="truncate">
                            Manage subjects
                          </span>
                        </a>
                        @endif

                        <!-- Current: "bg-gray-200 text-gray-900", Default: "text-gray-600 hover:bg-gray-50" -->
                        <a href="{{ route('community') }}"
                           class="bg-gray-200 text-gray-900 group flex items-center px-3 py-2 text-sm font-medium rounded-md"
                           aria-current="page">
                            <!-- Heroicon name: outline/home -->
                            <svg class="text-gray-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6"
                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                            </svg>
                            <span class="truncate">
                Home
              </span>
                        </a>

                        <a href="{{ route('community.popular') }}"
                           class="text-gray-600 hover:bg-gray-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md">
                            <!-- Heroicon name: outline/fire -->
                            <svg class="text-gray-400 group-hover:text-gray-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6"
                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z"/>
                            </svg>
                            <span class="truncate">
                Popular
              </span>
                        </a>

                        <a href="{{ route('community.communities') }}"
                           class="text-gray-600 hover:bg-gray-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md">
                            <!-- Heroicon name: outline/user-group -->
                            <svg class="text-gray-400 group-hover:text-gray-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6"
                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                            <span class="truncate">
                Communities
              </span>
                        </a>

                        <a href="{{ route('community.trending') }}"
                           class="text-gray-600 hover:bg-gray-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md">
                            <!-- Heroicon name: outline/trending-up -->
                            <svg class="text-gray-400 group-hover:text-gray-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6"
                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                            </svg>
                            <span class="truncate">
                Trending
              </span>
                        </a>
                    </div>
                    <div class="pt-10">
                        <p class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider"
                           id="communities-headline">
                            My Subjects
                        </p>
                        <div class="mt-3 space-y-2" aria-labelledby="communities-headline">

                            @foreach(auth()->user()->Subject()->get() as $subject)
                                <a href="{{ route('community.subject', $subject->id) }}"
                                   class="group flex items-center px-3 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                                <span class="truncate">
                                  {{$subject->subject}}
                                </span>
                                </a>
                            @endforeach

                        </div>
                    </div>
                </nav>
            </div>
            <main class="lg:col-span-9 xl:col-span-6">
                <div>
                    <h1 class="sr-only">Communities</h1>

                    {{$data->links()}}

                    <ul role="list" class="space-y-4">
                        @foreach($data as $sub)
                            <li class="bg-white px-4 py-6 shadow sm:p-6 sm:rounded-lg">
                                <article aria-labelledby="question-title-81614">
                                    <div>
                                        <div class="flex space-x-3">
                                            {{--<div class="flex-shrink-0">
                                                <img class="h-10 w-10 rounded-full"
                                                     src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                                     alt="">
                                            </div>--}}
                                            {{--<div class="min-w-0 flex-1">
                                                <p class="text-sm font-medium text-gray-900">
                                                    <a href="{{ route('community.profile', $sub->User->id) }}" class="hover:underline">{{$sub->User->name}}</a>
                                                </p>
                                                <p class="text-sm text-gray-500">
                                                    <a href="{{ route('community.post', $sub->id) }}" class="hover:underline">
                                                        <time datetime="{{$sub->created_at}}">Posted {{$sub->created_at->diffForHumans()}} on <a href="{{ route('community.subject', $sub->Subject->id) }}"><b>{{$sub->Subject->subject}}</b></a></time>
                                                    </a>
                                                </p>
                                            </div>--}}
                                            <div class="flex-shrink-0 self-center flex">
                                                <div class="relative inline-block text-left">
                                                   {{-- <div>
                                                        <button @click="dropdown = true" @click.away="dropdown = false" type="button"
                                                                class="-m-2 p-2 rounded-full flex items-center text-gray-400 hover:text-gray-600"
                                                                id="options-menu-0-button" aria-expanded="false"
                                                                aria-haspopup="true">
                                                            <span class="sr-only">Open options</span>
                                                            <!-- Heroicon name: solid/dots-vertical -->
                                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                                 viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                                <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"/>
                                                            </svg>
                                                        </button>
                                                    </div>--}}

                                                    <!--
                                                      Dropdown menu, show/hide based on menu state.

                                                      Entering: "transition ease-out duration-100"
                                                        From: "transform opacity-0 scale-95"
                                                        To: "transform opacity-100 scale-100"
                                                      Leaving: "transition ease-in duration-75"
                                                        From: "transform opacity-100 scale-100"
                                                        To: "transform opacity-0 scale-95"
                                                    -->
                                                </div>
                                            </div>
                                        </div>
                                        <h2 id="question-title-81614" class="mt-4 text-base font-medium text-gray-900">
                                            {{$sub->subject}}
                                        </h2>
                                    </div>
                                    <div class="mt-2 text-sm text-gray-700 space-y-4">
{{--                                        <p>{{$sub->body}}</p>--}}
                                    </div>
                                    <div class="mt-6 flex justify-between space-x-8">
                                        <div class="flex space-x-6">
                                            <span class="inline-flex items-center text-sm">
                                              <button type="button" class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
                                                <!-- Heroicon name: solid/thumb-up -->
                                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                                     aria-hidden="true">
                                                  <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"/>
                                                </svg>
                                                <span class="font-medium text-gray-900">{{$sub->User()->count()}}</span>
                                                <span class="sr-only">likes</span>
                                              </button>
                                            </span>
                                            <span class="inline-flex items-center text-sm">
                                              <button type="button" class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
                                                <!-- Heroicon name: solid/chat-alt -->
                                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                                     aria-hidden="true">
                                                  <path fill-rule="evenodd"
                                                        d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                                                        clip-rule="evenodd"/>
                                                </svg>
                                                <span class="font-medium text-gray-900">{{$sub->Post()->count()}}</span>
                                                <span class="sr-only">posts</span>
                                              </button>
                                            </span>
                                            <span class="inline-flex items-center text-sm">
                                              <button type="button" class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
                                                <!-- Heroicon name: solid/eye -->
                                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                                     aria-hidden="true">
                                                  <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                                                  <path fill-rule="evenodd"
                                                        d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                                        clip-rule="evenodd"/>
                                                </svg>
                                                <span class="font-medium text-gray-900">{{$sub->Post()->sum('posts.views')}}</span>
                                                <span class="sr-only">views</span>
                                              </button>
                                            </span>
                                        </div>
                                        <div class="flex text-sm">
                                            <span class="inline-flex items-center text-sm">
                                                <form method="post" action="{{ route('communities.join', $sub->id) }}">
                                                    @csrf
                                                  <button type="submit" class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
                                                    <!-- Heroicon name: solid/share -->
                                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                                         aria-hidden="true">
                                                      <path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z"/>
                                                    </svg>
                                                    <span class="font-medium text-gray-900">Join</span>
                                                  </button>
                                                </form>
                                            </span>
                                        </div>
                                    </div>
                                </article>
                            </li>
                    @endforeach
                    <!-- More questions... -->
                    </ul>
                </div>
            </main>
            {{--<aside class="hidden xl:block xl:col-span-4">
                <div class="sticky top-4 space-y-4">
                    <section aria-labelledby="who-to-follow-heading">
                        <div class="bg-white rounded-lg shadow">
                            <div class="p-6">
                                <h2 id="who-to-follow-heading" class="text-base font-medium text-gray-900">
                                    Who to follow
                                </h2>
                                <div class="mt-6 flow-root">
                                    <ul role="list" class="-my-4 divide-y divide-gray-200">
                                        @foreach($users as $user)
                                            <li class="flex items-center py-4 space-x-3">
                                                <div class="flex-shrink-0">
                                                    <img class="h-8 w-8 rounded-full"
                                                         src="https://images.unsplash.com/photo-1519345182560-3f2917c472ef?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                                         alt="">
                                                </div>
                                                <div class="min-w-0 flex-1">
                                                    <p class="text-sm font-medium text-gray-900">
                                                        <a href="#">{{$user->name}}</a>
                                                    </p>
                                                    @isset($user->username)
                                                        <p class="text-sm text-gray-500">
                                                            <a href="{{ route('community.profile', $user->id) }}">@ {{$user->username}}</a>
                                                        </p>
                                                    @endisset
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <button type="button"
                                                            class="inline-flex items-center px-3 py-0.5 rounded-full bg-rose-50 text-sm font-medium text-rose-700 hover:bg-rose-100">
                                                        <!-- Heroicon name: solid/plus-sm -->
                                                        <svg class="-ml-1 mr-0.5 h-5 w-5 text-rose-400"
                                                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                             fill="currentColor" aria-hidden="true">
                                                            <path fill-rule="evenodd"
                                                                  d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                                  clip-rule="evenodd"/>
                                                        </svg>
                                                        <span>
                            Follow
                          </span>
                                                    </button>
                                                </div>
                                            </li>
                                    @endforeach

                                    <!-- More people... -->
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </section>
                    <section aria-labelledby="trending-heading">
                        <div class="bg-white rounded-lg shadow">
                            <div class="p-6">
                                <h2 id="trending-heading" class="text-base font-medium text-gray-900">
                                    Trending
                                </h2>
                                <div class="mt-6 flow-root">
                                    <ul role="list" class="-my-4 divide-y divide-gray-200">
                                        <li class="flex py-4 space-x-3">
                                            <div class="flex-shrink-0">
                                                <img class="h-8 w-8 rounded-full"
                                                     src="https://images.unsplash.com/photo-1463453091185-61582044d556?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                                     alt="Floyd Miles">
                                            </div>
                                            <div class="min-w-0 flex-1">
                                                <p class="text-sm text-gray-800">What books do you have on your
                                                    bookshelf just to look smarter than you actually are?</p>
                                                <div class="mt-2 flex">
                          <span class="inline-flex items-center text-sm">
                            <button type="button" class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
                              <!-- Heroicon name: solid/chat-alt -->
                              <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                   fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                      d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                                      clip-rule="evenodd"/>
                              </svg>
                              <span class="font-medium text-gray-900">291</span>
                            </button>
                          </span>
                                                </div>
                                            </div>
                                        </li>

                                        <!-- More posts... -->
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </section>
                </div>
            </aside>--}}
        </div>

    </div>






</x-app-layout>
