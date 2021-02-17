@extends('layouts.app')


<section id="home">


<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <img class="d-block w-100" src="{{url(Storage::url('home/Banner-TIS.jpg'))}}" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{url(Storage::url('home/Banner2-TIS.jpg'))}}" alt="Second slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>



</section>


