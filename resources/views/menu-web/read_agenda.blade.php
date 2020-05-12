@extends('layouts.master-web-ppdb')

@section('content-web')

    <!--================Hero Banner SM Area Start =================-->
    <section class="hero-banner" >
        
		<div class="container-fluid">
            <div class="row p-3" style="background-color:#fff;">
                <div class="col-lg-8 posts-list">
                    
                    <div class="hero-banner-sm-content mt-3">
                        <h1><i class="fa fa-tags"></i> Agenda</h1>
                    </div>
                    
                    <div class="single-post p-2">
                        <div class="blog_details">
                            @if ($data_code != null)
                                <p>{!!$data_code->text_information!!}</p>
                            @elseif($data_code == null)
                                <p></p>
                            @endif
                        </div>
                    </div>
                </div>


                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <div class="text-center mt-3">
                            <img class="section-intro-img" src="/safario/img/home/ppdb-logo.png" alt="">
                        </div>
                        <br>
                        <aside class="single_sidebar_widget">
                            <h4 class="widget_title">Kontak Admin</h4>
                            <p>Jika mengalami kesulitan atau masalah silahkan kontak dengan Admin / Operator kami di bawah ini :</p>
                            <ul>
                                <li><strong><big><a href="https://wa.me/6289653652668" target="_blank">0896 5365 2668</a></big></strong></li>
                            </ul>
                            <p>Atau : Bisa dengan menggunakan layanan live chat yang telah kami sediakan.</p>
                        </aside>
                    </div>
                </div>

            </div>
        </div>
	
    </section>
    <!--================Hero Banner SM Area End =================-->



    <!--================Blog Area =================-->
	
	<!--================Blog Area =================-->


@endsection
