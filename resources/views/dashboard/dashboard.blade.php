<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="min-h-full">

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
                        <div class="flex-shrink-0 flex items-center w-full">
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
                            <div x-show="profile" x-cloak @click.away="profile = false"
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
            <main class="flex-1 pb-8" x-data="{command: false}" @keyup.shift.enter.window="command = true" @keyup.esc.window="command = false">

                <div x-show="command" x-cloak>
                    <!--
  This example requires Tailwind CSS v3.0+

  This example requires some changes to your config:

  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
                    <div class="fixed inset-0 z-10 overflow-y-auto p-4 sm:p-6 md:p-20" role="dialog" aria-modal="true">
                        <!--
                          Background overlay, show/hide based on modal state.

                          Entering: "ease-out duration-300"
                            From: "opacity-0"
                            To: "opacity-100"
                          Leaving: "ease-in duration-200"
                            From: "opacity-100"
                            To: "opacity-0"
                        -->
                        <div class="fixed inset-0 bg-gray-500 bg-opacity-25 transition-opacity" aria-hidden="true"></div>

                        <!--
                          Command palette, show/hide based on modal state.

                          Entering: "ease-out duration-300"
                            From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                            To: "opacity-100 translate-y-0 sm:scale-100"
                          Leaving: "ease-in duration-200"
                            From: "opacity-100 translate-y-0 sm:scale-100"
                            To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        -->
                        <div class="mx-auto max-w-xl transform overflow-hidden rounded-xl bg-white shadow-2xl ring-1 ring-black ring-opacity-5 transition-all">
                            <div class="relative">
                                <!-- Heroicon name: solid/search -->
                                <svg class="pointer-events-none absolute top-3.5 left-4 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                </svg>
                                <input type="text" class="h-12 w-full border-0 bg-transparent pl-11 pr-4 text-gray-800 placeholder-gray-400 focus:ring-0 sm:text-sm" placeholder="Search..." role="combobox" aria-expanded="false" aria-controls="options">
                            </div>

                            <!-- Default state, show/hide based on command palette state -->
                            <div class="border-t border-gray-100 py-14 px-6 text-center text-sm sm:px-14">
                                <!-- Heroicon name: outline/globe -->
                                <svg class="mx-auto h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <p class="mt-4 font-semibold text-gray-900">Search for stuff associated with your account</p>
                                <p class="mt-2 text-gray-500">Quickly access different tools by using this.</p>
                            </div>

                            <!-- Results, show/hide based on command palette state -->
                            <ul class="max-h-80 scroll-pt-11 scroll-pb-2 space-y-2 overflow-y-auto pb-2" id="options" role="listbox">
                                <li>
                                    <h2 class="bg-gray-100 py-2.5 px-4 text-xs font-semibold text-gray-900">Assignments</h2>
                                    <ul class="mt-2 text-sm text-gray-800">
                                        <!-- Active: "bg-indigo-600 text-white" -->
                                        @foreach(auth()->user()->Assignment()->get() as $a)
                                            <li class="cursor-default select-none px-4 py-2" id="option-1" role="option" tabindex="-1">{{$a->title}}</li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li>
                                    <h2 class="bg-gray-100 py-2.5 px-4 text-xs font-semibold text-gray-900">Notes</h2>
                                    <ul class="mt-2 text-sm text-gray-800">
                                        <!-- Active: "bg-indigo-600 text-white" -->
                                        @foreach(auth()->user()->Note()->get() as $n)
                                            <li class="cursor-default select-none px-4 py-2" id="option-3" role="option" tabindex="-1">{{$n->name}}</li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>

                            <!-- Empty state, show/hide based on command palette state -->
                            <div class="border-t border-gray-100 py-14 px-6 text-center text-sm sm:px-14">
                                <!-- Heroicon name: outline/emoji-sad -->
                                <svg class="mx-auto h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <p class="mt-4 font-semibold text-gray-900">No results found</p>
                                <p class="mt-2 text-gray-500">We couldn’t find anything with that term. Please try again.</p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="mt-8">
                    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
{{--                        <h2 class="text-lg leading-6 font-medium text-gray-900">Overview</h2>--}}

                        <!-- This example requires Tailwind CSS v2.0+ -->
                        <div class="rounded-lg bg-white overflow-hidden shadow">
                            <h2 class="sr-only" id="profile-overview-title">Profile Overview</h2>
                            <div class="bg-white p-6">
                                <div class="sm:flex sm:items-center sm:justify-between">
                                    <div class="sm:flex sm:space-x-5">
                                        <div class="flex-shrink-0">
                                            <img class="mx-auto h-20 w-20 rounded-full" src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                        </div>
                                        <div class="mt-4 text-center sm:mt-0 sm:pt-1 sm:text-left">
                                            <p class="text-sm font-medium text-gray-600">Welcome back,</p>
                                            <p class="text-xl font-bold text-gray-900 sm:text-2xl">{{auth()->user()->name}}</p>
                                            @switch(auth()->user()->hasVerifiedEmail())
                                                @case(1)
                                                    <p class="text-sm font-medium text-green-600">Verified User</p>
                                                    @break(1)
                                                @case(0)
                                                    <p class="text-sm font-medium text-red-600">Unverified. Please verify your email.</p>
                                                    @break(0)
                                            @endswitch
                                        </div>
                                    </div>
                                    <div class="mt-5 flex justify-center sm:mt-0">
                                        <a href="{{route('community.profile', auth()->id())}}" class="flex justify-center items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50"> View profile </a>
                                    </div>
                                </div>
                            </div>
                            <div class="border-t border-gray-200 bg-gray-50 grid grid-cols-1 divide-y divide-gray-200 sm:grid-cols-3 sm:divide-y-0 sm:divide-x">
                                <div class="px-6 py-5 text-sm font-medium text-center">
                                    <span class="text-gray-900">{{auth()->user()->Assignment()->where('assignment_user.user_id', auth()->id())->where('assignment_user.submitted_on', null)->count()}}</span>
                                    <span class="text-gray-600">Assignments due</span>
                                </div>

                                <div class="px-6 py-5 text-sm font-medium text-center">
                                    <span class="text-gray-900">{{auth()->user()->Post()->count()}}</span>
                                    <span class="text-gray-600">Posts</span>
                                </div>

                                <div class="px-6 py-5 text-sm font-medium text-center">
                                    <span class="text-gray-900">{{auth()->user()->Comment()->count()}}</span>
                                    <span class="text-gray-600">Comments made</span>
                                </div>
                            </div>
                        </div>


                    </div>

                    @if($notifications->count() > 0)
                    <h2 class="max-w-6xl mx-auto mt-8 px-4 text-lg leading-6 font-medium text-gray-900 sm:px-6 lg:px-8">Recent activity</h2>

                    <!-- Activity list (smallest breakpoint only) -->
                    <div class="shadow sm:hidden">
                        <ul role="list" class="mt-2 divide-y divide-gray-200 overflow-hidden shadow sm:hidden">
                            @foreach($notifications as $notif)
                            <li>
                                <a href="#" class="block px-4 py-4 bg-white hover:bg-gray-50">
                                    <span class="flex items-center space-x-4">
                                      <span class="flex-1 flex space-x-2 truncate">
                                        <!-- Heroicon name: solid/cash -->
                                        <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                          <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                        </svg>
                                        <span class="flex flex-col text-gray-500 text-sm truncate">
                                          <span class="truncate">{{json_encode($notif->data['user'])}} posted {{json_encode($notif->data['title'])}}</span>
{{--                                          <span><span class="text-gray-900 font-medium">$20,000</span> USD</span>--}}
                                          <time datetime="2020-07-11">{{$notif->created_at->format('h:m - D n M')}}</time>
                                        </span>
                                      </span>
                                        <!-- Heroicon name: solid/chevron-right -->
                                      <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                      </svg>
                                    </span>
                                </a>
                            </li>
                        @endforeach

                            <!-- More transactions... -->
                        </ul>

                        <nav class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200" aria-label="Pagination">
                            {{$notifications->links()}}
                            {{--<div class="flex-1 flex justify-between">
                                <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:text-gray-500"> Previous </a>
                                <a href="#" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:text-gray-500"> Next </a>
                            </div>--}}
                        </nav>
                    </div>

                    <!-- Activity table (small breakpoint and up) -->
                    <div class="hidden sm:block">
                        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                            <div class="flex flex-col mt-2">
                                <div class="align-middle min-w-full overflow-x-auto shadow overflow-hidden sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead>
                                        <tr>
                                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Activity</th>
                                            {{--<th class="px-6 py-3 bg-gray-50 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                                            <th class="hidden px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider md:block">Status</th>--}}
                                            <th class="px-6 py-3 bg-gray-50 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                        </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach($notifications as $notif)
                                        <tr class="bg-white">
                                            <td class="max-w-0 w-full px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                <div class="flex">
                                                    <a href="#" class="group inline-flex space-x-2 truncate text-sm">
                                                        <!-- Heroicon name: solid/cash -->
                                                        {{--<svg class="flex-shrink-0 h-5 w-5 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                            <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                                        </svg>--}}
                                                        <p class="text-gray-500 truncate group-hover:text-gray-900">
                                                            {{json_encode($notif->data['user'])}} posted {{json_encode($notif->data['title'])}}</p>
                                                    </a>
                                                </div>
                                            </td>
                                            {{--<td class="px-6 py-4 text-right whitespace-nowrap text-sm text-gray-500">
                                                <span class="text-gray-900 font-medium">$20,000 </span>
                                                USD
                                            </td>
                                            <td class="hidden px-6 py-4 whitespace-nowrap text-sm text-gray-500 md:block">
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 capitalize"> success </span>
                                            </td>--}}
                                            <td class="px-6 py-4 text-right whitespace-nowrap text-sm text-gray-500">
                                                <time datetime="2020-07-11">{{$notif->created_at->format('h:m - D n M')}}</time>
                                            </td>
                                        </tr>
                                        @endforeach
                                        <!-- More transactions... -->
                                        </tbody>
                                    </table>
                                    <!-- Pagination -->
                                    <nav class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6" aria-label="Pagination">
                                        {{$notifications->links()}}
                                        {{--<div class="hidden sm:block">
                                            <p class="text-sm text-gray-700">
                                                Showing
                                                <span class="font-medium">1</span>
                                                to
                                                <span class="font-medium">10</span>
                                                of
                                                <span class="font-medium">20</span>
                                                results
                                            </p>
                                        </div>
                                        <div class="flex-1 flex justify-between sm:justify-end">
                                            <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50"> Previous </a>
                                            <a href="#" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50"> Next </a>
                                        </div>--}}
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>

                    @else

                        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">
                            <div>
                                <div class="divide-y divide-gray-200 overflow-hidden rounded-lg bg-gray-200 shadow sm:grid sm:grid-cols-2 sm:gap-px sm:divide-y-0">
                                    <div class="rounded-tl-lg rounded-tr-lg sm:rounded-tr-none relative group bg-white p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500">
                                        <div>
      <span class="rounded-lg inline-flex p-3 bg-teal-50 text-teal-700 ring-4 ring-white">
        <!-- Heroicon name: outline/clock -->
        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
      </span>
                                        </div>
                                        <div class="mt-8">
                                            <h3 class="text-lg font-medium">
                                                <a href="{{route('timetable')}}" class="focus:outline-none">
                                                    <!-- Extend touch target to entire panel -->
                                                    <span class="absolute inset-0" aria-hidden="true"></span>
                                                    Set up your timetable
                                                </a>
                                            </h3>
                                            <p class="mt-2 text-sm text-gray-500">Add subjects and tutors to your timetable so you can keep track of when you have lessons with an easy to manage timetable.</p>
                                        </div>
                                        <span class="pointer-events-none absolute top-6 right-6 text-gray-300 group-hover:text-gray-400" aria-hidden="true">
      <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
        <path d="M20 4h1a1 1 0 00-1-1v1zm-1 12a1 1 0 102 0h-2zM8 3a1 1 0 000 2V3zM3.293 19.293a1 1 0 101.414 1.414l-1.414-1.414zM19 4v12h2V4h-2zm1-1H8v2h12V3zm-.707.293l-16 16 1.414 1.414 16-16-1.414-1.414z" />
      </svg>
    </span>
                                    </div>

                                    <div class="sm:rounded-tr-lg relative group bg-white p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500">
                                        <div>
      <span class="rounded-lg inline-flex p-3 bg-purple-50 text-purple-700 ring-4 ring-white">
        <!-- Heroicon name: outline/check-badge -->
        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
        </svg>
      </span>
                                        </div>
                                        <div class="mt-8">
                                            <h3 class="text-lg font-medium">
                                                <a href="{{route('assignments')}}" class="focus:outline-none">
                                                    <!-- Extend touch target to entire panel -->
                                                    <span class="absolute inset-0" aria-hidden="true"></span>
                                                    View your assignments
                                                </a>
                                            </h3>
                                            <p class="mt-2 text-sm text-gray-500">View and submit any work that your tutors have assigned to you in an easy-to-use panel as part of Study Portal.</p>
                                        </div>
                                        <span class="pointer-events-none absolute top-6 right-6 text-gray-300 group-hover:text-gray-400" aria-hidden="true">
      <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
        <path d="M20 4h1a1 1 0 00-1-1v1zm-1 12a1 1 0 102 0h-2zM8 3a1 1 0 000 2V3zM3.293 19.293a1 1 0 101.414 1.414l-1.414-1.414zM19 4v12h2V4h-2zm1-1H8v2h12V3zm-.707.293l-16 16 1.414 1.414 16-16-1.414-1.414z" />
      </svg>
    </span>
                                    </div>

                                    <div class="relative group bg-white p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500">
                                        <div>
      <span class="rounded-lg inline-flex p-3 bg-sky-50 text-sky-700 ring-4 ring-white">
        <!-- Heroicon name: outline/users -->
        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
        </svg>
      </span>
                                        </div>
                                        <div class="mt-8">
                                            <h3 class="text-lg font-medium">
                                                <a href="{{route('community')}}" class="focus:outline-none">
                                                    <!-- Extend touch target to entire panel -->
                                                    <span class="absolute inset-0" aria-hidden="true"></span>
                                                    Post in your community
                                                </a>
                                            </h3>
                                            <p class="mt-2 text-sm text-gray-500">Collaborate with other students in the community with posts and see other available things such as work placements while supporting one another.</p>
                                        </div>
                                        <span class="pointer-events-none absolute top-6 right-6 text-gray-300 group-hover:text-gray-400" aria-hidden="true">
      <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
        <path d="M20 4h1a1 1 0 00-1-1v1zm-1 12a1 1 0 102 0h-2zM8 3a1 1 0 000 2V3zM3.293 19.293a1 1 0 101.414 1.414l-1.414-1.414zM19 4v12h2V4h-2zm1-1H8v2h12V3zm-.707.293l-16 16 1.414 1.414 16-16-1.414-1.414z" />
      </svg>
    </span>
                                    </div>

                                    <div class="relative group bg-white p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500">
                                        <div>
      <span class="rounded-lg inline-flex p-3 bg-yellow-50 text-yellow-700 ring-4 ring-white">
        <!-- Heroicon name: outline/banknotes -->
        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
        </svg>
      </span>
                                        </div>
                                        <div class="mt-8">
                                            <h3 class="text-lg font-medium">
                                                <a href="{{route('profile')}}" class="focus:outline-none">
                                                    <!-- Extend touch target to entire panel -->
                                                    <span class="absolute inset-0" aria-hidden="true"></span>
                                                    Manage your profile
                                                </a>
                                            </h3>
                                            <p class="mt-2 text-sm text-gray-500">Keeping your profile updated is important as it will be the image that represents you on the study portal platform.</p>
                                        </div>
                                        <span class="pointer-events-none absolute top-6 right-6 text-gray-300 group-hover:text-gray-400" aria-hidden="true">
      <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
        <path d="M20 4h1a1 1 0 00-1-1v1zm-1 12a1 1 0 102 0h-2zM8 3a1 1 0 000 2V3zM3.293 19.293a1 1 0 101.414 1.414l-1.414-1.414zM19 4v12h2V4h-2zm1-1H8v2h12V3zm-.707.293l-16 16 1.414 1.414 16-16-1.414-1.414z" />
      </svg>
    </span>
                                    </div>

                                    <div class="sm:rounded-bl-lg relative group bg-white p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500">
                                        <div>
      <span class="rounded-lg inline-flex p-3 bg-rose-50 text-rose-700 ring-4 ring-white">
        <!-- Heroicon name: outline/receipt-refund -->
        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9.75h4.875a2.625 2.625 0 010 5.25H12M8.25 9.75L10.5 7.5M8.25 9.75L10.5 12m9-7.243V21.75l-3.75-1.5-3.75 1.5-3.75-1.5-3.75 1.5V4.757c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0c1.1.128 1.907 1.077 1.907 2.185z" />
        </svg>
      </span>
                                        </div>
                                        <div class="mt-8">
                                            <h3 class="text-lg font-medium">
                                                <a href="{{route('tickets')}}" class="focus:outline-none">
                                                    <!-- Extend touch target to entire panel -->
                                                    <span class="absolute inset-0" aria-hidden="true"></span>
                                                    Create a support ticket
                                                </a>
                                            </h3>
                                            <p class="mt-2 text-sm text-gray-500">Ever need any help directly from your tutor or support with a Study Portal related thing, drop a support ticket, and they will get back to you in a one-to-one channel.</p>
                                        </div>
                                        <span class="pointer-events-none absolute top-6 right-6 text-gray-300 group-hover:text-gray-400" aria-hidden="true">
      <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
        <path d="M20 4h1a1 1 0 00-1-1v1zm-1 12a1 1 0 102 0h-2zM8 3a1 1 0 000 2V3zM3.293 19.293a1 1 0 101.414 1.414l-1.414-1.414zM19 4v12h2V4h-2zm1-1H8v2h12V3zm-.707.293l-16 16 1.414 1.414 16-16-1.414-1.414z" />
      </svg>
    </span>
                                    </div>

                                    <div class="rounded-bl-lg rounded-br-lg sm:rounded-bl-none relative group bg-white p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500">
                                        <div>
      <span class="rounded-lg inline-flex p-3 bg-indigo-50 text-indigo-700 ring-4 ring-white">
        <!-- Heroicon name: outline/academic-cap -->
        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
        </svg>
      </span>
                                        </div>
                                        <div class="mt-8">
                                            <h3 class="text-lg font-medium">
                                                <a href="{{route('resources')}}" class="focus:outline-none">
                                                    <!-- Extend touch target to entire panel -->
                                                    <span class="absolute inset-0" aria-hidden="true"></span>
                                                    Find any resources you need
                                                </a>
                                            </h3>
                                            <p class="mt-2 text-sm text-gray-500">Share resources with other students to create nice collaborative platform where anything is possible.</p>
                                        </div>
                                        <span class="pointer-events-none absolute top-6 right-6 text-gray-300 group-hover:text-gray-400" aria-hidden="true">
      <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
        <path d="M20 4h1a1 1 0 00-1-1v1zm-1 12a1 1 0 102 0h-2zM8 3a1 1 0 000 2V3zM3.293 19.293a1 1 0 101.414 1.414l-1.414-1.414zM19 4v12h2V4h-2zm1-1H8v2h12V3zm-.707.293l-16 16 1.414 1.414 16-16-1.414-1.414z" />
      </svg>
    </span>
                                    </div>
                                </div>

                            </div>


                        </div>



                    @endif
                </div>
            </main>
        </div>
    </div>
</x-app-layout>
