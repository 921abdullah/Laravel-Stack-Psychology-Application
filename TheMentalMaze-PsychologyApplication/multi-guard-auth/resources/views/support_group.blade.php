<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Add Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  
  <!-- Scripts -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <title>{{ config('app.name') }} - Support Group</title>
  <style>
    #profile {
      display: none;
    }
  
    #ask_section {
      display: none;
    }
    
    #update_form {
      display: none;
    }
  
    #see_users {
      display: none;
    }
  
    .btn {
      border: none;
      background-color: inherit;
      padding: 8px 18px;
      font-size: 16px;
      cursor: pointer;
      display: inline-block;
    }
  
    /* On mouse-over */
    .btn:hover {
      background: #eee;
    }
  
    .success {
      color: green;
    }
  
    .info {
      color: dodgerblue;
    }
  
    .warning {
      color: orange;
    }
  
    .danger {
      color: red;
    }
  
    .default {
      color: black;
    }

    .container_{
      padding-top: 15px;
      padding-bottom: 15px;
      height: 100vh;    
    }

  .body h1 {
    margin: 0 0 10px 0;
    font-size: 48px;
    font-weight: 700;
    line-height: 56px;
    color: #fff;
  }

  .body h2 {
    color: rgba(255, 255, 255, 0.6);
    font-size: 30px;
    font-weight: 700;
  }
  
  .body h3 {
    color: rgba(255, 255, 255, 0.6);
    font-size: 24px;
    font-weight: 600;
    margin-bottom: 25px;
  }
  
  .body p {
    color: white;
    margin-bottom: 25px;
    font-size: 20px;
  }

  .active{
    color: blue;
    font-size: 25px;
  }

  </style>
</head>
<body style="background-color: #37517e;">
    <div class="container-fluid">
        <div class="container_ row">
            <div class="col-sm-2" style="top: 0; bottom: 0; ">
                <div class="d-flex flex-column flex-shrink-0 p-4 bg-light h-100">
                    <a href="#" onclick="view_group_info()" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                    <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
                    @foreach ($data as $data)    
                    <span id="nav-group" class="active">{{$data->group_name}}</span>
                    @endforeach
                    </a>
                    <hr>
                    <ul class="nav nav-pills flex-column mb-auto">
                      <!-- Show 'All Members' to admin and profile view to user -->
                      <li class="nav-item">
                        <!-- for admin view -->
                        @auth('helper')
                        <a href="#" class="nav-link link-dark" onclick="view_update_form()">
                          <span id="nav-update" class="lead">Update Group Info</span>
                        </a>
                        @else
                        <a href="#" class="nav-link link-dark" onclick="view_profile()">
                          <span id="nav-profile" class="lead">My Profile</span>
                        </a>
                        @endauth
                      </li>
                      @foreach ($all_users as $user)
                      <li class="nav-item">
                        <a href="#" class="content nav-link link-dark" aria-current="page" id="{{$user->name}}">
                          {{ $user->name }}
                        </a>
                      </li>
                      @endforeach
                    </ul>
                    <hr>
                    <div class="dropdown">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                      </a>
                      <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                        </form>
                      </div>
                    </div>
                  </div>
            </div>
            <div class="body col-sm-10" style="  background: #37517e;">

                <!-- GROUP INFO -->
                <div id="group_info">
                  <br>
                  <h1>{{$data->group_name}}</h1>
                  <h3>Made for people having issues with {{$data->category}}</h3>
                  <br>
                  <h2>ADMIN: <span>{{$data->name}}</span></h2>
                  <p>{{$data->admin}}</p>
                  <br>
                  <h2>Group Description</h2>
                  <p>{{$data->description}}</p>
                  <br>
                  @auth('helper')
                  <form action="{{ url('delete-group') }}" method="POST">
                    @csrf
                    <button class="btn-primary" type="submit">Delete Group</button>
                  </form>
                  <br>
                  <button class="btn-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
                    </svg>
                    <a href="{{url('/helper/dashboard')}}" style="text-decoration:none; color:white">
                    Dashboard
                    </a>
                  </button>
                  @else
                  <button class="btn-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
                    </svg>
                    <a href="{{url('/profile')}}" style="text-decoration:none; color:white">
                    User Profile
                    </a>
                  </button>
                  @endauth
                </div>
                <!-- END (GROUP INFO) -->
                
                <!-- PROFILE OF CURRENT USER -->
                <div id="profile">
                  <br>
                  <h1>{{Auth::user()->name}}</h1>
                  <p>{{Auth::user()->email}}</p>
                  <br>
                  <h2>Your Asked Question(s)</h2>
                  <br>
                  @foreach ($ques as $question)
                  @if(Auth::user()->name == $question->name)
                  <div class="row">
                    <div class="col-12 col-sm-12">
                      <div class="card">
                        <div class="card-header"><h4>{{$question->question}}</h4></div>
                        <div class="card-body"> 
                          @foreach($ans as $answer_for_user)
                          @if($answer_for_user->question_id == $question->id) 
                          <p class="lead" style="color: black">{{$answer_for_user->answer}}</p>
                          <hr>
                          @endif
                          @endforeach
                        </div>
                      </div>
                    </div>
                  </div>
                  <br>
                  @endif
                  @endforeach
                  <br>
                  <button onclick="view_ask_section()">Ask a Question</button>
                </div>
                <!-- END (PROFILE OF CURRENT USER) -->
                
                <!-- SEE USERS AND THEIR QUESTIONS -->
                <div id="see_users">
                  <br>
                  <!-- <h1>Member: <span class="lead" id="UserName"></span></h1> -->
                  <h1>Member Profile</h1>
                  <br>
                  <h2>Question(s)</h2>
                  <div id="display"></div>
                  <script>
                    var ask_section = document.getElementById('ask_section');
                    var see_users = document.getElementById('see_users');
                    var group_info = document.getElementById('group_info');
                    // var profile = document.getElementById('profile');
                    // var update_form = document.getElementById('update_form');

                    // to display username in it 
                    // var UserName = document.getElementById('UserName');

                    // in order to display the 'see_users' element and set its innerHTML to '' on new click
                    const content = document.querySelectorAll(".content");
                    content.forEach((content) => {
                      content.addEventListener("click", (e) => {
                        see_users.style.display = "block";
                        ask_section.style.display = "none";
                        group_info.style.display = "none";
                        @auth('helper')
                        document.getElementById('update_form').style.display = "none";
                        document.getElementById('nav-update').className = "lead";
                        @else
                        document.getElementById('profile').style.display = "none";
                        document.getElementById('nav-profile').className = "lead";
                        @endauth
                        document.getElementById('display').innerHTML = '';
                      });
                    });
                    @foreach($ques as $ques)
                    @if ($ques -> name == Auth:: user() -> name)
                    // SKIP AS ITS THE CURRENT USER
                    @else
                    var name = '{{$ques->name}}'
                    var clickedElement = document.getElementById(name);
                    clickedElement.addEventListener('click', function (event) {
                      var clickedElementId = event.target.id;
                      if ('{{$ques->name}}' === clickedElementId) {
                        document.getElementById('display').innerHTML += `<br> <div class="row">
                        <div class="col-12 col-sm-12">
                          <div class="card">
                            <div class="card-header"><h4>{{$ques->question}}</h4></div>
                            <div class="card-body"> 
                            @foreach($ans as $answer)
                            @if($answer->question_id == $ques->id) 
                            <p class="lead" style="color: black">{{$answer->answer}}</p>
                            <hr>
                            @endif
                            @endforeach
                            <br>
                            @auth("helper")
                            <form action="{{ url("store-answer-admin") }}" method="POST">
                            @else
                            <form action="{{ url("store-answer-user") }}" method="POST">
                            @endauth
                            @csrf
                            <input type="hidden" name="question_id" value="{{$ques->id}}" required>
                            <input type="hidden" name="group_name" value="{{$data->group_name}}" required>
                            <label for="answer">Your Answer Here</label>
                            <br>
                            <textarea class="form-control" name="answer" rows="3" required></textarea>
                            <br>
                            <button type="submit">Submit</button>
                            </form>
                            </div>
                            </div>
                            </div>
                            </div>
                            `;
                      }
                    });
                    @endif
                    @endforeach
                  </script>
                  <br>
                </div>
                <!-- END (SEE USERS AND THEIR QUESTIONS) -->
                
                <!-- ASK QUESTION -->
                <div id="ask_section">
                  <br>
                  <h1>Ask a Question</h1>
                  <br>
                  <br>
                  <h2>Ask any question here without hesitation so that your fellow group members can answer!!</h2>
                  <br>
                  <br>
                  <form action="{{ url('store-question') }}" method="POST">
                    @csrf
                    <input type="hidden" name="group_name" value="{{$data->group_name}}">
                    <label for="question"><p>Ask your question here</p></label>
                    <textarea class="form-control" name="question" required autocomplete="question" required></textarea>
                    <br>
                    <button class="btn-primary" type="submit">Post</button>
                  </form>
                  <br>
                  <button class="btn-primary" onclick="view_profile()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
                    </svg>
                    Back
                  </button>
                </div>
                <!-- END (ASK QUESTION) -->
                
                <!-- UPDATE FORM -->
                <div id="update_form">
                  <br>
                  <h1>Update Group Data</h1>
                  <br>
                  <br>
                  <h2>Add the new data !!</h2>
                  <br>
                  <br>
                  <form action="{{ url('update-group-data') }}" method="POST">
                    @csrf
                    <!-- <input class="form-control" type="hidden" name="name" id="name"> -->
                    <label style="color: white;" for="name">Group Name : </label>
                    <input class="form-control" type="text" name="name" id="name" required>
                    <br>
                    <label style="color: white;" for="description">Description : </label>
                    <br>
                    <textarea class="form-control" type="text" name="description" id="description" required></textarea>
                    <br>
                    <label style="color: white;" for="image">Group Image : </label>
                    <input class="form-control" type="file" id="image" name="image" required>
                    <br>
                    <button type="submit" class="btn-secondary">Submit</button>
                  </form>
                </div>
                <!-- END (UPDATE FORM) -->
                
                </div>
                <script>
                  var group_info = document.getElementById('group_info');
                  var ask_section = document.getElementById('ask_section');
                  var see_users = document.getElementById('see_users');
                  var profile = document.getElementById('profile');
                  var update_form = document.getElementById('update_form');
                  var nav_group = document.getElementById('nav-group');
                  // var nav_profile = document.getElementById('nav-profile');
                  // var nav_update = document.getElementById('nav-update');

                  function view_group_info() {
                    group_info.style.display = "block";
                    profile.style.display = "none";
                    ask_section.style.display = "none";
                    see_users.style.display = "none";
                    update_form.style.display = "none";
                    nav_group.className = " active";
                    @auth('helper')
                    document.getElementById('nav-update').className = "lead";
                    @else
                    document.getElementById('nav-profile').className = "lead";
                    @endauth
                  }

                  function view_profile() {
                    profile.style.display = "block";
                    ask_section.style.display = "none";
                    see_users.style.display = "none";
                    group_info.style.display = "none";
                    update_form.style.display = "none";
                    nav_group.className = "fs-4";
                    document.getElementById('nav-profile').className = "active";
                  }

                  function view_ask_section() {
                    ask_section.style.display = "block";
                    see_users.style.display = "none";
                    profile.style.display = "none";
                    group_info.style.display = "none";
                    update_form.style.display = "none";
                  }
                  
                  function view_update_form() {
                    update_form.style.display = "block";
                    ask_section.style.display = "none";
                    see_users.style.display = "none";
                    profile.style.display = "none";
                    group_info.style.display = "none";
                    nav_group.className = "fs-4";
                    document.getElementById('nav-update').className = "active";
                  }

                </script>
            </div>
        </div>
    </div>
    
</body>
</html>
