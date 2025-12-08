@extends('components.home.layout')
<!-- Header End -->
@section('content')
        <!-- Hero  -->
        @include('components.home.hero')
        <!-- Hero End -->

        <!-- Project Showcase -->
        @include('components.home.projects')
        <!-- Project Showcase -->

        <!-- About  -->
        @include('components.home.about')
        <!-- About End -->

        <!-- Service  -->
        @include('components.home.service')
        <!-- Service End -->

        <!-- Project  -->
        @include('components.home.project')
        <!-- Project End -->

        <!-- Pricing  -->
        @include('components.home.pricing')
        <!-- Pricing End -->

        <!-- Counter UP -->
        @include('components.home.counter')
        <!-- Counter UP End -->

        <!-- Testimonial  -->
        @include('components.home.testmonial')
        <!-- Testimonial End -->

        <!-- Process  -->
        @include('components.home.process')
        <!-- Process End -->

        <!-- News  -->
        @include('components.home.news')
        <!-- News End -->

        <!-- CTA  -->
        @include('components.home.cta')
        <!-- CTA End -->
@endsection