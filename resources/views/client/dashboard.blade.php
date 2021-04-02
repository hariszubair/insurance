@extends('layouts.app')

@section('content')
    
            <div class="card">
                <div class="card-body">

                          <div class="col-12 col-md-12 col-lg-12">
                    <div class="hero-action text-center">
                        <div class="row" style="width: 100%">
                            
                            <!-- Single Categories Item Start -->
                            <div class="col-xl-4 col-md-6 col-sm-6">
                                 <a href="{{URL('/auto/quote')}}">
                                <div class="single-categories-item">
                                    <div class="cate-icon">
                                        <img src="{{URL('/images/icon-img/car.png')}}" alt="">
                                    </div>
                                    <div class="cate-content">
                                        Car insurance<i class="uil uil-angle-right ml-2"></i> 
                                    </div>
                                    </a>
                                </div>
                            </div>
                            <!-- Single Categories Item Start -->

                            <!-- Single Categories Item Start -->
                            <div class="col-xl-4 col-md-6 col-sm-6">
                                <a href="{{URL('health_insurance')}}"> 
                                <div class="single-categories-item">
                                    <div class="cate-icon">
                                        <img src="{{URL('/images/icon-img/health.png')}}" alt="">
                                    </div>
                                    <div class="cate-content">
                                        Health insurance <i class="uil uil-angle-right ml-2"></i>
                                    </div>
                                     </a>
                                </div>
                            </div>
                            <!-- Single Categories Item Start -->

                            <!-- Single Categories Item Start -->
                            <div class="col-xl-4 col-md-6 col-sm-6">
                                <div class="single-categories-item">
                                     <a href="{{URL('life_insurance')}}">
                                    <div class="cate-icon">
                                        <img src="{{URL('/images/icon-img/life.png')}}" alt="">
                                    </div>
                                    <div class="cate-content">
                                        Life insurance <i class="uil uil-angle-right ml-2"></i> 
                                    </div>
                                    </a>
                                </div>
                            </div>
                            <!-- Single Categories Item Start -->

                            <!-- Single Categories Item Start -->
                            <div class="col-xl-4 col-md-6 col-sm-6">
                                <div class="single-categories-item">
                                    <a href="{{URL('home_insurance')}}">
                                    <div class="cate-icon">
                                        <img src="{{URL('/images/icon-img/home.png')}}" alt="">
                                    </div>
                                    <div class="cate-content">
                                        Homeowners insurance <i class="uil uil-angle-right ml-2"></i>
                                    </div>
                                    </a>
                                </div>
                            </div>
                            <!-- Single Categories Item Start -->

                            <!-- Single Categories Item Start -->
                            <div class="col-xl-4 col-md-6 col-sm-6">
                                <div class="single-categories-item">
                                    <a href="#"> 
                                    <div class="cate-icon">
                                        <img src="{{URL('/images/icon-img/gadget.png')}}" alt="">
                                    </div>
                                    <div class="cate-content">
                                        Gadget insurance <i class="uil uil-angle-right ml-2"></i>
                                    </div>
                                    </a>
                                </div>
                            </div>
                            <!-- Single Categories Item Start -->

                            <!-- Single Categories Item Start -->
                            <div class="col-xl-4 col-md-6 col-sm-6">
                                <div class="single-categories-item">
                                     <a href="{{URL('pet_insurance')}}"> 
                                    <div class="cate-icon">
                                        <img src="{{URL('/images/icon-img/pet.png')}}" alt="">
                                    </div>
                                    <div class="cate-content">
                                       Pet insurance <i class="uil uil-angle-right ml-2"></i>
                                    </div>
                                    </a>
                                </div>
                            </div>
                            <!-- Single Categories Item Start -->
                        </div>
            </div>
        </div>
     
@endsection
