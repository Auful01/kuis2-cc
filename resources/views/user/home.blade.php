@extends('layout.main')

@section('content')
<section>
    <div class="jumbotron" style="margin-top: -80px ; margin-left: -60px ; max-width: 108%; height: 400px; background-repeat: no-repeat; background-size: cover;background-image: url({{asset('images/jumbotron.png')}});">
            <div class="text-center">
                <img src="{{asset('images/relax.png')}}" class="mt-5" height="100px" alt="">
                <span style="height: 2px; background-color: black"></span>
                <h2 style="font-weight: 700">TREATMENT CENTER</h2>
                <p>Far far away, behind the world mountains, far from the countries Vokalia adn Consonantia, there live the blind texts</p>
            </div>
      </div>
</section>
<section class="p-5">
    <div class="row">
        <div class="col-md-6">
            <div class="text-center">
                <img src="https://placeimg.com/640/480/any" style="max-height: 500px" class="img-fluid rounded " alt="">
            </div>
        </div>
        <div class="col-md-6">
            <h1>Benefits of Doing Treatments</h1>
            <p>ada banyak Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla, natus accusamus, itaque beatae deleniti aut doloribus voluptatibus facilis exercitationem, eaque aliquam dolorem! Perferendis, porro inventore quod ad modi aspernatur beatae?</p>
            <div class="row">
                <div class="col-md-1">
                  <i class="far fa-check-circle"></i>
                </div>
                <div class="col-md-11">
                  Untuk mengatasi pori Kulit Lorem ipsum dolor sit amet consectetur adipisicing elit. At sapiente aliquam itaque minima quia totam consequuntur accusamus dolorum veritatis temporibus obcaecati ad voluptate voluptas nemo amet placeat quibusdam, exercitationem quidem?
                </div>
                <div class="col-md-1">
                  <i class="far fa-check-circle"></i>
                </div>
                <div class="col-md-11">
                  Untuk mengatasi pori Kulit Lorem ipsum dolor sit amet consectetur adipisicing elit. At sapiente aliquam itaque minima quia totam consequuntur accusamus dolorum veritatis temporibus obcaecati ad voluptate voluptas nemo amet placeat quibusdam, exercitationem quidem?
                </div>
                <div class="col-md-1">
                  <i class="far fa-check-circle"></i>
                </div>
                <div class="col-md-11">
                  Untuk mengatasi pori Kulit Lorem ipsum dolor sit amet consectetur adipisicing elit. At sapiente aliquam itaque minima quia totam consequuntur accusamus dolorum veritatis temporibus obcaecati ad voluptate voluptas nemo amet placeat quibusdam, exercitationem quidem?
                </div>
                <div class="col-md-1">
                  <i class="far fa-check-circle"></i>
                </div>
                <div class="col-md-11">
                  Untuk mengatasi pori Kulit Lorem ipsum dolor sit amet consectetur adipisicing elit. At sapiente aliquam itaque minima quia totam consequuntur accusamus dolorum veritatis temporibus obcaecati ad voluptate voluptas nemo amet placeat quibusdam, exercitationem quidem?
                </div>
            </div>

        </div>

    </div>
</section>
<section>
    <h1 align="center">Gallery</h1>
    <div class="row d-flex justify-content-around">
        <div class="col-md-3 ">
            <img src="https://placeimg.com/640/480/any" class="img-fluid" style="height: 300px" alt="">
        </div>
        <div class="col-md-3">
            <img src="https://placeimg.com/640/480/any" class="img-fluid"  style="height: 300px" alt="">
        </div>
        <div class="col-md-3">
            <img src="https://placeimg.com/640/480/any"  class="img-fluid" style="height: 300px" alt="">
        </div>

    </div>
</section>
@endsection
