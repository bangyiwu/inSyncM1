@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">   <h1 class="">Facilties Management</h1>
        <a href="/location/conflict"><button type="button" class="btn btn-danger ml-5 right">View all conflicts </button></a></div>
 
    <div class="row mt-5 justify-content-center">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{ URL::to('/assets/images/MPSH.jpeg') }}" alt="Card image cap" style="width:18rem;height:16rem;">
            <div class="card-body">
              <h5 class="card-title">MPSH</h5>
              <p class="card-text">The hardcourt is mainly catered for basketball, volleyball, handball, takraw and other leisure sports activites. It closes at 2300.</p>
              <a href="/location/MPSH" class="btn btn-primary">Check Schedule</a>
            </div>
          </div>
          <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{ URL::to('/assets/images/DS.jpg') }}" alt="Card image cap" style="width:18rem;height:16rem;">
            <div class="card-body">
              <h5 class="card-title">Dance Studio</h5>
              <p class="card-text">The DS caters to anyone who wishes to hold dance practices. Prior permission should be gained from the PAD before booking.</p>
              <a href="/location/Dance Studio" class="btn btn-primary">Check Schedule</a>
            </div>
          </div>
          <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{ URL::to('/assets/images/FH.jpg') }}" alt="Card image cap" style="width:18rem;height:16rem;">
            <div class="card-body">
              <h5 class="card-title">Function Hall</h5>
              <p class="card-text">The FH is meant for any mass activites and consumption of food is allowed inside. The FH should be closed no later than 0200.</p>
              <a href="/location/Function Hall" class="btn btn-primary">Check Schedule</a>
            </div>
          </div>
          <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{ URL::to('/assets/images/SC.png') }}" alt="Card image cap" style="width:18rem;height:16rem;">
            <div class="card-body">
              <h5 class="card-title">Squash Court</h5>
              <p class="card-text">Priority for the squash court is given to the squash team. Captain of the squash team shall hold the key.</p>
              <a href="/location/Squash Court" class="btn btn-primary">Check Schedule</a>
            </div>
          </div>
          <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{ URL::to('/assets/images/lounge.jpg') }}" alt="Card image cap" style="width:18rem;height:16rem;">
            <div class="card-body">
              <h5 class="card-title">Lounge</h5>
              <p class="card-text">For any block recreational activity. Booking is not required for usage but people with booking gets priority when there is conflict.</p>
              <a href="/location/Lounge" class="btn btn-primary">Check Schedule</a>
            </div>
          </div>
          <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{ URL::to('/assets/images/DH.jpg') }}" alt="Card image cap" style="width:18rem;height:16rem;">
            <div class="card-body">
              <h5 class="card-title">Dining Hall</h5>
              <p class="card-text">The DH can only be utilised after dinner time, 2200, and should be cleaned after usage. DH should be closed by 0200.</p>
              <a href="/location/Dining Hall" class="btn btn-primary">Check Schedule</a>
            </div>
          </div>
    </div>
    
</div>

@endsection
