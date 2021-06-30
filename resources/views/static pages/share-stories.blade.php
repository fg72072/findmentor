@extends('layouts.app')

@section('title')
Tutor | Home
@stop

@section('header')
@include('includes.header')
@stop

@push('include-css')
<!-- Home Page Styling -->
<link rel="stylesheet" href="{{ asset('asset/css/index.css') }}">
<link rel="stylesheet" href="{{ asset('asset/css/request.css') }}">
<link rel="stylesheet" href="{{ asset('asset/css/static-pages.css') }}">
<!-- Home Page Styling -->
@endpush

@section('content')
<div class="container content no-padding-top mt-5 mb-5">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="row" style="max-width:830px; margin:0 auto;">
                <div class="col-sm-12-">
                    <div class="blog-page-article">

                        <h1 class="no-margin-top ">Share stories</h1>

                        <p>There is a lot of advice on the internet on how to teach and handle the classroom. Most of
                            it's theoretical - given by people who haven't taught in a real classroom. What teachers
                            need are practical examples and actionable advice based on real classroom stories. These
                            stories don't have to be grand projects. Even something as small as something you said to a
                            student which boosted their confidence is great and needs to be shared&nbsp;with the world.
                        </p>

                        <p>Send us the teaching strategies and tactics, that you have yourself used or experienced in a
                            classroom. You can share not only what worked but you can also share what didn't work. We
                            know teaching is hard work and in spite of the best efforts, things don't always work the
                            way we would like to.</p>

                        <p>You can use the following framework to share your story:&nbsp;</p>

                        <ul>
                            <li>What were other teachers doing?</li>
                            <li>What problems/challenges did that&nbsp;lead to?</li>
                            <li>From where and how did you get your idea/insight/strategy/tactic?</li>
                            <li>How did you implement it?</li>
                            <li>How did your action change the situation?</li>
                            <li>Was the final result better/worse/ no change?</li>
                            <li>How would you do things differently next time?</li>
                        </ul>

                        <p>Humans have communicated for centuries with stories. Stories stick in our minds and make
                            abstract concepts easier to understand.</p>

                        <p>If you have a story which you tell your students which helps them to understand and remember
                            information and difficult concepts, please share with us. We will publish it with your name.
                        </p>

                        <p>If you have a story regarding how you teach/handle students/manage a classroom, please send
                            it to us so other teachers can learn from it too.&nbsp;</p>

                        <p>Why share?</p>

                        <p><strong>Benefits to teachers:</strong> Teachers get tips and tricks to teach in a better way.
                        </p>

                        <p><strong>Benefits to students:</strong> Students who get taught by the teachers who are
                            influenced by your story will get better results.</p>

                        <p><strong>Benefit</strong><strong> to you:</strong>&nbsp; You get the opportunity to positively
                            impact the world in yet one more way.</p>

                        <p>&nbsp;</p>

                        <p>​</p>

                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('footer')
@include('includes.footer')
@stop
