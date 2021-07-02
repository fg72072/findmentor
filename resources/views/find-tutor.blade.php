@extends('layouts.app')

@section('title')
Tutor | Find
@stop

@push('include-css')
<link rel="stylesheet" href="{{ asset('asset/css/FindTutor.css') }}" class="color-switcher-link">
@endpush

@section('content')
<div class="preloader">
    <div class="preloader_image"></div>
</div>

<section class="flex ">
    <h1 class="TutorHead pl-5 pr-5 text-center mt-5">All Tutor</h1>
    <hr class="w-25 mx-auto">
    <form action="{{route('findtutor')}}" method="get">
        <div class='container flex pt-5'>
            <input class="mr-5" type="text" id="searchInput" name="subject" placeholder="Skill.."
                @if(isset($params['subject']) ) value="{{ $params['subject']}}" @endif>
            <div id='submitsearch' class="mr-5">
                <span>Search</span>

            </div>

            <input type="text" id="searchInput" name="location" placeholder="Location.." @if(isset($params['location']))
                value="{{ $params['location']}}" @endif>
            <div id='submitsearch'>
                <span>Search</span>
            </div>

        </div>
        <div style="text-align: center;">
            <button type="submit" class="btn btn-primary  mt-5 FindBtn">Find</button>
        </div>
    </form>
</section>

<section>
    <div class="container categories">
        <ul class="nav nav-tabs">
            <li><a href="javascript:void(0)">All</a></li>
            <li><a href="javascript:void(0)">Online</a></li>
            <li><a href="javascript:void(0)">Home</a></li>
            <li><a href="javascript:void(0)">Assignment</a></li>
            <li>
                <select name="cars" id="Grades" class="level">
                    <option value="" disabled selected>Level</option>
                    <option value="Beginner">Beginner</option>
                    <option value="Intermediate">Intermediate</option>
                    <option value="Expert">Expert</option>
                </select>
            </li>
        </ul>
    </div>
</section>
<section class="ls s-py-60 s-pt-lg-100 s-pb-lg-70">
    <div class="container content row">
        @if (count($data)>0)
        @foreach ($data as $item)
        @if (isset($item['subject'][0]))
        <div
            class="col-12 col-md-12 all level_from_{{$item['subject'][0]->level_from}} level_to_{{$item['subject'][0]->level_to}}  @if($item['info']->travel_to_student == 'yes') home_available @endif @if($item['info']->online_available == 'yes') online_available @endif @if ($item['info']->help_with == 'yes') home_assignment @endif">
            <div class="h-100 bordered rounded">
                <div class="course-front">
                    <div class="vertical-item mt-5 ml-5 mr-5">
                        <div class="item-content">
                            <a href="{{route('tutor_profile',['id'=>$item->id])}}">
                                <h1 class="Teachername">{{$item->name}}</h1>
                            </a>
                            {{-- <p class="subject pt-3">Maths Teacher</p> --}}

                            <div class="tagcloud pt-4">
                                @foreach ($item['subject'] as $subject)
                                <a href="?subject={{$subject->subject}}"
                                    class="tag-cloud-link Maths">{{$subject->subject}} </a>
                                @endforeach
                            </div>

                            <div class="listing_desc pt-5">
                                <p>
                                    I want to learn Automation Testing, I am Manual Tester
                                    so want upgrade for that I want to learn Selenium with
                                    any easy programming language. I will be available on
                                    Weekends online so please let me know your fees,
                                    course time and any other details. Please share your
                                    whats app number where we can discuss, email me on...
                                </p>
                            </div>
                            <div class="listing_icons pt-5">
                                <div class="TextIcon" data-toggle="tooltip" data-placement="top"
                                    title="{{$item['info']->location}}">
                                    <span class="fa fa-map-marker icons" aria-hidden="true"></span>
                                    <p>{{$item['info']->location}}</p>
                                </div>
                                <div class="TextIcon" data-toggle="tooltip" data-placement="top"
                                    title="USD {{$item['info']->min_fee}} - {{$item['info']->max_fee}}/{{$item['info']->fee_charge}} (INR 200 - 500/hour)">
                                    <span class="fa fa-usd icons" aria-hidden="true"></span>
                                    <p>{{$item['info']->min_fee}}-{{$item['info']->max_fee}}/{{$item['info']->fee_charge}}
                                    </p>
                                </div>
                                <div class="TextIcon" data-toggle="tooltip" data-placement="top"
                                    title="{{$item['info']->total_experience_online}} years of online teaching experience">
                                    <span class="fa fa-desktop" aria-hidden="true"></span>
                                    <p>{{$item['info']->total_experience_online}} Yr</p>
                                </div>
                                <div class="TextIcon" data-toggle="tooltip" data-placement="top"
                                    title="{{$item['info']->total_experience}} years of total teaching experience">
                                    <span class="fa fa-user-plus" aria-hidden="true"></span>
                                    <p>{{$item['info']->total_experience}} Yr</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endforeach
        @endif
    </div>
</section>
@stop

@push('include-js')



<script>
    $(document).ready(function () {
        var search = '';
        var level = '';

        $('.categories li a').click(function(e){

            search = $(this).html();

            $('.all').hide()

            if(search == 'Assignment'){
                $('.home_assignment').show()
            }
            if(level == 'Beginner'){
                $('.level_to_begginer').show()
            }
            if(level == 'Intermediate'){
                $('.level_to_intermediate').show()
            }
            if(level == 'Expert'){
                $('.level_to_expert').show()
            }
            if(search == 'Home'){
                $('.home_assignment').show()
            }
            if(search == 'Online'){
                $('.online_available').show()
            }
            if(search == 'Assignment'){
                $('.home_assignment').show()
            }
            if(search == 'All'){
                $('.all').show()
            }
        });

        $('#Grades').change(function(e){

            level = $(this).val();

            $('.all').hide()

            if(search == 'Home'){
                $('.home_assignment').show()
            }
            if(search == 'Online'){
                $('.online_available').show()
            }
            if(search == 'Assignment'){
                $('.home_assignment').show()
            }
            if(level == 'Beginner'){
                $('.level_to_begginer').show()
            }
            if(level == 'Intermediate'){
                $('.level_to_intermediate').show()
            }
            if(level == 'Expert'){
                $('.level_to_expert').show()
            }

        });
    });

</script>

@endpush
