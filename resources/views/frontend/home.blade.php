@extends('frontend.template')
@section('content')

  <section id="hero" class="d-flex flex-column justify-content-end align-items-center">
    <div id="heroCarousel" class="container carousel carousel-fade" data-ride="carousel">
      <?php
      foreach($slider as $i => $slid){ ?>

      <div class="carousel-item {{ $i == 0 ? ' active' : ''  }}">
        <div class="carousel-container">
          <img src="{{asset('/slider/'.$slid->image)}}" class="img-responsive animate__animated" alt="">
        </div>
      </div>
      <?php
      } ?>
      

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>

    </div>

    {{-- <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
      <defs>
        <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
      </defs>
      <g class="wave1">
        <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
      </g>
      <g class="wave2">
        <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
      </g>
      <g class="wave3">
        <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
      </g>
    </svg> --}}

  </section>

  <main id="main">

    <section id="about" style="padding-top:20px" class="about">
      <div class="container">

        <div class="row content" data-aos="fade-up">
          <div class="col-md-7">
            <div class="section-title" data-aos="zoom-out">
              <h2>Live</h2>
              {{-- <p>Who we are</p> --}}
            </div>
                <iframe class="responsive-iframe" width="100%" height="355" src="{{$link->link}}?autoplay=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
          <div class="col-md-5 pt-4 pt-lg-0">
            <div class="section-title" data-aos="zoom-out">
              <h2>Schedule</h2>
              {{-- <p>Who we are</p> --}}
            </div>
            <div data-aos="zoom-in-left" style="overflow-y: scroll;height:355px;background: linear-gradient(to right, #000046, #1cb5e0);" class="card" height="355">
              <table style="color:white;" class="table table-striped">
                  <tr>
                    <th colspan="2" style="text-align:right">
                      {{tanggal_indonesia(date('Y-m-d'))}}
                    </th>
                  </tr>
                  @foreach($jadwal as $i => $jadwal)
                  <tr>
                    <th style="width:10%">{{$jadwal->jam}}</th>
                    <th style="padding-left:20px">{{$jadwal->nama_acara}}</th>
                  </tr>
                  @endforeach
              </table>
            </div>
          </div>
        </div>

      </div>
    </section>

    <div style="text-align:center" data-aos="zoom-out">
      <h2>News</h2>
    </div>
    <section id="" class="" style="padding-top:5px; padding-bottom:5px">
      <div class="container">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            @foreach($news as $i => $news)
            <div class="carousel-item {{ $i == 0 ? ' active' : ''  }}">
              <div class="row" data-aos="zoom-out">
                <div class="col-lg-4 text-center text-lg-left">
                  <img src="{{asset('/news/'.$news->foto)}}" width="100%" height="200px" alt="">
                </div>
                <div class="col-lg-8 text-center text-lg-left">
                  <h3>{{substr($news->judul,0,100)}}</h3>
                  <p><?= substr($news->deskripsi,0,300)?> ...</p>
                  <br>
                  <a class="cta-btn align-middle" href="{{route('detailberita',encrypt($news->id_news))}}">Show Detail</a>
                </div>
                {{-- class dan id cta --}}
              </div>
            </div>
            @endforeach
          </div>
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>

    </section>

    <section id="testimonials" class="testimonials">
      <div class="container">

        <div class="section-title" data-aos="zoom-out">
          <h2>Program Acara</h2>
        </div>

        <div class="owl-carousel testimonials-carousel" data-aos="fade-up">
          @foreach($programacara as $i => $program)
          <div class="testimonial-item" >
            <a href="{{route('programdetail',encrypt($program->id_artikel))}}">
              <img src="{{asset('/artikel/'.$program->foto)}}" class="img-responsive" width="250px" height="300px" alt="">
            </a>
          </div>
          @endforeach
        </div>

      </div>
    </section>

    <section data-aos="fade-up" id="testimonials" class="testimonials">
      <div class="container">

        <div class="section-title" data-aos="zoom-out">
          <h2>Instagram</h2>
        </div>

        <!-- SnapWidget -->
        <script src="https://cdn.lightwidget.com/widgets/lightwidget.js"></script><iframe src="//lightwidget.com/widgets/f9a1f69d0a195039b5f812ca100e0c31.html" scrolling="no" allowtransparency="true" class="lightwidget-widget" style="width:100%;border:0;overflow:hidden;"></iframe>

      </div>
    </section>

    <center><h3>Kategori Program Acara</h3></center>
    <section id="team" class="team">
      <div class="container">
        @foreach($kategori as $i => $kategori)
        <div class="section-title" data-aos="zoom-out">
          <h2>{{$kategori->kategori}}</h2>
        </div>
          <?php $bagikategori = DB::table('tb_artikel')->where('id_kategori',$kategori->id_kategori)->get(); ?>
          <div class="owl-carousel testimonials-carousel" data-aos="fade-up">
            
            @foreach($bagikategori as $bagi)
            <div style="margin-left:10px; margin:right:10px" class="testimonial-item">
              <div class="member" data-aos="fade-up">
                <div class="member-img">
                  <img src="{{asset('/artikel/'.$bagi->foto)}}" style="width:350px; height:300px" class="img-fluid" alt="">
                  <div class="social">
                    <a href="{{route('programdetail',encrypt($bagi->id_artikel))}}"><i class="icofont-eye"></i></a>
                  </div>
                </div>
                <div class="member-info">
                  <h4>{{$bagi->judul}}</h4>
                  <span><?= substr($bagi->descripsi, 0,40)?> ....</span>
                </div>
              </div>
            </div>
            @endforeach

          </div>

        @endforeach
      </div>
    </section>

  </main>
@endsection