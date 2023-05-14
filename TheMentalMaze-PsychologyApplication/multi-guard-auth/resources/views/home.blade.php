@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif
            <h1>Hi {{ Auth::user()->name }} !!</h1>
            <br>
            <h2> Connect With Specialists -> 
                <a href="{{ URL::to('/assets/Hotline.pdf') }}" download="Hotline.pdf">Click !</a>
            </h2>
            <br>

            <!-- Only show the following card when the questionare has'nt been submitted -->
            <div class="card">
                <div class="card-header">
                    <br>
                    <h2 style="color: black;"">Some Questions For You!</h2>
                    <p>Note: The Questions are must to be honestly filled inorder to move forward!!</p>
                </div>
                <form class="form card-body" method="post" action="{{url('store-answers')}}">
                    @csrf
                    <label for="category">Relevant Problem : </label>
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
                    <label for="level">On a scale of 1-10, how severe would you rate your current mental health concern?</label>
                    <br>
                    <input class="form-control" type="number" name="level" value="{{ old('level') }}" required autocomplete="level" min="1" max="10"></input>
                    <br>
                    <label for="q1">1. Your age please?</label>
                    <br>
                    <textarea class="form-control" name="q1" value="{{ old('q1') }}" required autocomplete="q1"></textarea>
                    <br>
                    <label for="q2">2. How long have you been experiencing your current mental health concern?</label>
                    <br>
                    <textarea class="form-control" name="q2" value="{{ old('q2') }}" required autocomplete="q2"></textarea>
                    <br>
                    <label for="q3">3. Have you ever received professional help for your mental health concern before?</label>
                    <br>
                    <textarea class="form-control" name="q3" value="{{ old('q3') }}" required autocomplete="q3"></textarea>
                    <br>
                    <label for="q4">4. If yes, what kind of treatment did you receive and did it help?</label>
                    <br>
                    <textarea class="form-control" name="q4" value="{{ old('q4') }}" required autocomplete="q4"></textarea>
                    <br>
                    <label for="q5">5. How does your current mental health concern affect your daily life?</label>
                    <br>
                    <textarea class="form-control" name="q5" value="{{ old('q5') }}" required autocomplete="q5"></textarea>
                    <br>
                    <label for="q6">6. Is there anything else you would like to share about your mental health concern or your experience seeking treatment?</label>
                    <br>
                    <textarea class="form-control" name="q6" value="{{ old('q6') }}" required autocomplete="q6"></textarea>
                    <br>

                    <button type="submit" class="btn btn-secondary">
                        {{ __('Submit') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
