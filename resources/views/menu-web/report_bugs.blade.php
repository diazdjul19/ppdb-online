@extends('layouts.master-web-ppdb')

@section('content-web')
    <!--================Hero Banner SM Area Start =================-->
    <section class="hero-banner" >
        <div class="section-intro text-center ">
            <img class="section-intro-img" src="/safario/img/home/ppdb-logo.png" alt="">
        </div>
        <br>
        <div class="container">
            @if ($message = Session::get('success_report'))
            <div class="alert alert-success alert-bordered pd-y-20" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                <div class="d-sm-flex align-items-center justify-content-start">
                <i class="icon ion-ios-checkmark alert-icon tx-52 mg-r-20 tx-success"></i>
                <div class="mg-t-20 mg-sm-t-0">
                    <h5 class="mg-b-2 tx-success">Terimakasih Karena Telah Melapor Kepada Kami &#128522;</h5>
                    <p class="mg-b-0 tx-gray">{{$message}}</p>
                </div>
                </div><!-- d-flex -->
            </div><!-- alert -->
        @endif
        </div>
		<div class="container-fluid bg-white" >
            <div class="row p-3" >
                <div class="col-md-12 p-5">
                    <div class="row">
                    <div class="col-md-12">
                    <h3 class="contact-title" style="color:black;">Report Bugs</h3>
                    </div>
                    <div class="col-md-8">
                        <div class="d-none d-sm-block mb-5 pb-4">
                            <form class="form-contact contact_form" action="{{route('report-bugs-store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                        <input class="form-control" name="subject" id="" type="text" placeholder="Enter Subject or Title" autocomplete="off" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                        <input class="form-control" name="name" id="" type="text" placeholder="Enter your name" autocomplete="off" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                        <input class="form-control" name="email" id="" type="email" placeholder="Enter email address" autocomplete="off" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <textarea class="form-control w-100" id="note1" name="text_report" placeholder="Enter Message"></textarea>
                                            <span><i>Max Ideal Width Image 700px.</i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                <button type="submit" class="button button-contactForm">Send Message</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-home"></i></span>
                            <div class="media-body">
                            <h3 style="color:black;">SMKN 4 Kota Bekasi</h3>
                            <p>Jalan Gandaria, Jalan Raya Kranggan Wetan, RT.001/RW.007, Kelurahan Jatirangga, Kecamatan Jatisampurna, Kota Bekasi, Jawa Barat 17434.</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                            <div class="media-body">
                            <h3><a href="https://wa.me/6289653652668">(+62) 896 5365 2668</a></h3>
                            <p>Kontak Admin PPDB.</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-email"></i></span>
                            <div class="media-body">
                            <h3><a href="mailto:diazdjul19@gmail.com">diazdjul19@gmail.com</a></h3>
                            <p>Email Admin PPDB.</p>
                            </div>
                        </div>
                        <br>
                        <div class="blog_right_sidebar">
                            <aside class="single_sidebar_widget">
                                <h4 class="widget_title">Terimaksih Telah Membantu &#128522;</h4>
                                <p>Bantuan Sekecil Apapun Akan Sangat Kami Hargai.</p>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	
    </section>
    <!--================Hero Banner SM Area End =================-->
@endsection


@push('summernote')
    <script>
        $(function(){
            'use strict';

            // Summernote editor
            $('#note1').summernote({
            height: 150,
            tooltip: false
            })
        });
    </script>
@endpush
