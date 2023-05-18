<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} - User Profile</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Scripts -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <style> 
    .body{
        background-color: #37517e;
    }
    .head{
        margin: 20px;
    }
    #groups, #resources, #remove, #add{
        display: none;
    }
    .body .card{
        margin: 10px
    }

    /* Style for the sidebar */
    #sidebar {
        position: fixed;
        top: 0;
        left: 0;
        bottom: 0;
        width: 25%; /* Adjust the width as needed */
        max-width: 300px;
        background-image: url('https://w0.peakpx.com/wallpaper/695/358/HD-wallpaper-shades-of-blue-nature-sky.jpg'); 
        background-size: cover;
        background-repeat: no-repeat;
        transition: all 0.3s ease-in-out;
        z-index: 1;
        background-color: #e9ecef; /* Set the background color of the sidebar */
        box-shadow: 0 0 50px rgba(0, 0, 0, 0.5); /* Add a shadow effect to the sidebar */
    }
    #sidebar .card {
        margin-top: 20px;
        cursor: pointer;
        background-color: white;
    }
    #sidebar .card:hover{
        background-color: rgb(142, 112, 112); /* New color when hovered */
        color: white;
    }
    /* Style for the logout card */
    #sidebar .card:first-of-type {
        background-color: white;
    }
    #sidebar .card:first-of-type .card-body {
        color: black;
    }
    #sidebar .card:first-of-type .card-body:hover {
        color: white;
    }
    #sidebar .card:first-of-type:hover {
        background-color: #63686d; /* New color when hovered */
    }
    
    
    #sidebar .card-title {
        font-size: 1.2rem;
        font-weight: bold;
        text-align: center;
        color: black;
    }
    #sidebar .card-body {
        text-align: center;
    }
    #sidebar .active {
        background-color: #e8e8e8;
    }
    /* Style for the content area */
    .content {
        margin-left: 25%;
        padding: 20px;
    }
    
    #hero {
        width: 100%;
        height: 80vh;
        background: #37517e;
    }

    #hero .container {
      padding-top: 72px;
    }
    
    #hero h1 {
      font-size: 48px;
      font-weight: 700;
      line-height: 56px;
      color: #fff;
      margin-bottom: 10px;
    }
    
    #hero h2 {
      color: rgba(255, 255, 255, 0.6);
      margin-bottom: 50px;
      font-size: 24px;
    }

    #hero .animated {
        animation: up-down 2s ease-in-out infinite alternate-reverse both;
    }

    @keyframes up-down {
        0% {
            transform: translateY(-30px);
        }
    
        100% {
            transform: translateY(-20px);
        }
    }

    @media (max-width: 768px) {
      #hero h1 {
        font-size: 28px;
        line-height: 36px;
      }
    
      #hero h2 {
        font-size: 18px;
        line-height: 24px;
        margin-bottom: 30px;
      }
    
      #hero .hero-img img {
        width: 70%;
      }
    }
    
    @media (max-width: 575px) {
      #hero .hero-img img {
        width: 80%;
      }
    
      #hero .btn-get-started {
        font-size: 16px;
        padding: 10px 24px 11px 24px;
      }
    }

    .content h1 {
        margin-top: 0;
        font-size: 3rem;
        text-align: center;
        color: white;
    }
    .content h2 {
        text-align: center;
    }
    
    body {
        background-color: #37517e;
    }
   
    /* Responsive styles */
    @media (min-width: 768px) {
        #sidebar {
            width: 25%; /* Adjust the width as needed */
        }
        .content {
            margin-left: 25%; /* Adjust the margin as needed */
            background-color: #37517e; /* Set the background color for the content area */
        }
    }
    </style>
</head>
<body>
    <div id="sidebar" class="bg-light">
        <div class="card">
            <div class="card-body">
                <h3>{{ Auth::user()->name }}</h3>
            </div>
        </div>
        <div class="card" id="support-groups">
            <div class="card-body">
                <h5 class="card-title">Support Groups</h5>
                <p class="card-text">View All the support groups you are a part of</p>
            </div>
        </div>
        <div class="card" id="helping-material">
            <div class="card-body">
                <h5 class="card-title">Helping Material</h5>
                <p class="card-text">View All the online material you can take help from</p>
            </div>
        </div>
        <div class="card nav-item">
            <a class="card-title" href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
               style="text-decoration: none;" role="button" >
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>

    <!-- MAIN -->
    <div id="main" class="content container-lg">
        <h1 class="head"><i>Hi {{ Auth::user()->name }}! Welcome Back!!</i></h1>
        <section id="hero" class="d-flex align-items-center">
            <div class="container">
              <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1">
                  <h1>Our Belief!</h1>
                  <h2>"Mental Health is Not a Destination, But a Process."</h2>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                  <img src="https://thumbs.dreamstime.com/b/psychotherapy-practice-woman-psychologist-bconsulting-patient-siety-psychiatry-concept-vector-illustration-mental-disorder-177288961.jpg" class="img-fluid animated" alt="">
                </div>
              </div>
            </div>
        </section>
        <footer id="footer" style="color: #37517e;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 text-left">
                        <button class="btn btn-secondary" onclick = "view_remove_form()">Remove Category</button>
                    </div>
                    <div class="col-md-6 text-right">
                        <button class="btn btn-secondary" onclick = "view_add_form()">Add Category</button>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- MAIN END -->

    <!-- REMOVE INFO -->
    <div id="remove" class="content container-lg">
        <h1 class="head"><i>Remove Your personal information if you want</i></h1>
        <br>
        <form class="form card-body" method="post" action="{{url('remove-answers')}}">
            @csrf
            <label style="color: white;" for="category">Relevant Problem : </label>
            <select class="form-control" name="category" id="category">
                <option value="Anxiety">Anxiety</option>
                <option value="Gender Dysphoria">Gender Dysphoria</option>
                <option value="Mood Disorder">Mood Disorders</option>
                <option value="Personality Disorder">Personality Disorder</option>
                <option value="Eating Disorder">Eating Disorder</option>
                <option value="Psychotic Disorder">Psychotic Disorder</option>
                <option value="Sleep Disorder">Sleep Disorder</option>
                <option value="Neurodevelopmental Disorder">Neurodevelopmental Disorder</option>
                <option value="Trauma">Trauma</option>
                <option value="Substance-related Disorder">Substance-related Disorder</option>
            </select>                    
            <br>
            <button type="submit" class="btn btn-primary">
                {{ __('Submit') }}
            </button>
        </form>
        <br><br>
        <div class="container-fluid">
            <div class="row text-center">
                <button class="btn btn-secondary" onclick = "view_add_form()">Switch to Add Category</button>
            </div>
        </div>
    </div>
    <!-- REMOVE INFO END-->
    
    <!-- ADD INFO -->
    <div id="add" class="content container-lg">
        <h1 class="head"><i>Add further personal information if you want</i></h1>
        <br>
        <form class="form card-body" method="post" action="{{url('store-answers')}}">
            @csrf
            <label style="color: white;" for="category">Relevant Problem : </label>
            <select class="form-control" name="category" id="category">
                <option value="Anxiety">Anxiety</option>
                <option value="Gender Dysphoria">Gender Dysphoria</option>
                <option value="Mood Disorder">Mood Disorders</option>
                <option value="Personality Disorder">Personality Disorder</option>
                <option value="Eating Disorder">Eating Disorder</option>
                <option value="Psychotic Disorder">Psychotic Disorder</option>
                <option value="Sleep Disorder">Sleep Disorder</option>
                <option value="Neurodevelopmental Disorder">Neurodevelopmental Disorder</option>
                <option value="Trauma">Trauma</option>
                <option value="Substance-related Disorder">Substance-related Disorder</option>
            </select>                    
            <br>
            <label style="color: white;" for="level">On a scale of 1-10, how severe would you rate your current mental health concern?</label>
            <br>
            <input class="form-control" type="number" name="level" value="{{ old('level') }}" required autocomplete="level" min="1" max="10"></input>
            <br>
            <button type="submit" class="btn btn-primary">
                {{ __('Submit') }}
            </button>
        </form>
        <br><br>
        <div class="container-fluid">
            <div class="row text-center">
                <button class="btn btn-secondary" onclick = "view_remove_form()">Switch to Remove Category</button>
            </div>
        </div>
    </div>
    <!-- ADD INFO END-->

    <!-- Support Groups -->
    <div id="groups" class="content container-lg">
        <h1 class="head"><i>Some Relevant Support Groups</i></h1>
        <br>
        <br>
        @foreach ($category as $group_category)
        <br>
        <h1 class="display-4"><i>{{ $group_category->category }}</i></h1>
        <br>
        <div class="body d-flex flex-wrap">
            @foreach ($groups_info as $group_info)
            @if($group_category->category == $group_info->category)
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title" id="Group_name" >{{ $group_info->name }}</h5>
                    <p class="card-text">{{ $group_info->description }}</p>
                    <a href="{{ url('/support-group', ['name' => $group_info->name]) }}" class="btn btn-primary">Open</a>
                </div>
            </div>
            @endif
            @endforeach
        </div>
        @endforeach
    </div>
    
    <!-- Support Groups END -->

    <!-- RESOURCES -->
    <div id="resources" class="content container-lg">
        <h1 class="head"><i>Some Relevant Helping Material</i></h1>
        <br>
        <br>
        <div class="body d-flex flex-wrap">
        @foreach ($resources as $resources)
        <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">Helping Material for {{$resources->category}}</h5>
              <a href="{{ $resources->resource }}" class="btn btn-primary">Watch!!</a>
            </div>
        </div>
        @endforeach
        </div>
    </div>
    <!-- RESOURCES END -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script>
        // Function to toggle active class on sidebar cards
        function toggleActive(element) {
            var cards = document.querySelectorAll("#sidebar .card");
            cards.forEach(function(card) {
                card.classList.remove("active");
            });
            element.classList.add("active");
        }
    
        // Function to switch sidebar content based on clicked card
        function switchContent(event) {

            var main = document.getElementById("main");
            var groups = document.getElementById("groups");
            var resources = document.getElementById("resources");
            var remove = document.getElementById("remove");
            var add = document.getElementById("add");

            var clickedCard = event.target.closest(".card");
            if (clickedCard.id === "support-groups") 
            {
                groups.style.display = "block";
                resources.style.display = "none";
                main.style.display = "none";   
                remove.style.display = "none";
                add.style.display = "none";
            } 
            else if (clickedCard.id === "helping-material") {
                resources.style.display = "block";
                groups.style.display = "none";
                main.style.display = "none";
                remove.style.display = "none";
                add.style.display = "none";
            }
            else
            {
                main.style.display = "block";
                resources.style.display = "none";
                groups.style.display = "none";
                remove.style.display = "none";  
                add.style.display = "none"; 
            }
            toggleActive(clickedCard);
        }

        function view_remove_form(){
            remove.style.display = "block";
            add.style.display = "none";
            main.style.display = "none";
            resources.style.display = "none";
            groups.style.display = "none";
        }
        
        function view_add_form(){
            add.style.display = "block";
            remove.style.display = "none";
            main.style.display = "none";
            resources.style.display = "none";
            groups.style.display = "none";
        }
    
        // Attach event listeners to sidebar cards
        var cards = document.querySelectorAll("#sidebar .card-body");
        cards.forEach(function(card) {
            card.addEventListener("click", switchContent);
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    
</body>
</html>
