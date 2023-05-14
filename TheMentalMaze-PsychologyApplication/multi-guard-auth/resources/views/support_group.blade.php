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
                    <span class="fs-4">{{$data->group_name}}</span>
                    @endforeach
                    </a>
                    <hr>
                    <ul class="nav nav-pills flex-column mb-auto">
                      <!-- Show 'All Members' to admin and profile view to user -->
                      <li class="nav-item">
                        <!-- for admin view -->
                        @auth('helper')
                        <a href="#" class="nav-link link-dark">
                          <span class="lead">All Members</span>
                        </a>
                        @else
                        <a href="#" class="nav-link link-dark" onclick="view_profile()">
                          <span class="lead">My Profile</span>
                        </a>
                        @endauth
                      </li>
                      @foreach ($all_users as $user)
                      <li class="nav-item">
                        <a href="#" class="content nav-link link-dark" aria-current="page" id="{{$user->name}}"
                          onclick="toggleActive('content')">
                          {{ $user->name }}
                        </a>
                      </li>
                      @endforeach
                      <li class="nav-item">
                        <a href="#" class="nav-link active" aria-current="page">
                          <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
                          Insert element
                        </a>
                      </li>
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
                  <h2>Some Relevant Resources for dealing with {{$data->category}}</h2>
                  <!-- @auth('helper')
                      <button class="btn-secondary">Update</button>
                      @endauth -->
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
                    var profile = document.getElementById('profile');
                    var group_info = document.getElementById('group_info');

                    // to display username in it 
                    // var UserName = document.getElementById('UserName');

                    // in order to display the 'see_users' element and set its innerHTML to '' on new click
                    const content = document.querySelectorAll(".content");
                    content.forEach((content) => {
                      content.addEventListener("click", (e) => {
                        see_users.style.display = "block";
                        profile.style.display = "none";
                        ask_section.style.display = "none";
                        group_info.style.display = "none";
                        document.getElementById('display').innerHTML = '';
                      });
                    });

                    @foreach($ques as $ques)
                    @if ($ques -> name == Auth:: user() -> name)
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
                            <form action="{{ url("store-answer") }}" method="POST">
                            @csrf
                            <input type="hidden" name="question_id" value="{{$ques->id}}">
                            <input type="hidden" name="group_name" value="{{$data->group_name}}">
                            <label for="answer">Your Answer Here</label>
                            <br>
                            <textarea class="form-control" name="answer" rows="3"></textarea>
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
                    <textarea class="form-control" name="question" required autocomplete="question"></textarea>
                    <br>
                    <button class="btn-primary" type="submit">Post</button>
                  </form>
                </div>
                <!-- END (ASK QUESTION) -->
                
                </div>
                <script>

                  var group_info = document.getElementById('group_info');
                  var ask_section = document.getElementById('ask_section');
                  var see_users = document.getElementById('see_users');
                  var profile = document.getElementById('profile');

                  function view_group_info() {
                    group_info.style.display = "block";
                    profile.style.display = "none";
                    ask_section.style.display = "none";
                    see_users.style.display = "none";
                  }

                  function view_profile() {
                    profile.style.display = "block";
                    ask_section.style.display = "none";
                    see_users.style.display = "none";
                    group_info.style.display = "none";
                  }

                  function view_ask_section() {
                    ask_section.style.display = "block";
                    see_users.style.display = "none";
                    profile.style.display = "none";
                    group_info.style.display = "none";
                  }
                </script>
            </div>
        </div>
    </div>
    
</body>
</html>